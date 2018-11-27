<?php
/**
 * 基于UDP的快速DEBUG工具
 * @author wonli <wonli@live.com>
 *
 * 使用方法
 * 在代码中引入文件, 配置好您的app_id和app_key, 登录网站注册后创建
 * 在需要调试的地方使用, 将日志发送至服务器, 就可以即时收到日志推送了
 * require 'LogStation.php';
 * (new \LogStation\UdpLog())->write('内容', '标签')
 * (new \LogStation\UdpLog())->addToLog('标签', '内容')->write('内容', '标签')
 */

namespace common\helpers;

/**
 * @author wonli <wonli@live.com>
 *
 * Class UdpLog
 * @package LogStation
 */
class LogStation extends LogBase
{
    public $channels = [];
    /**
     * 请填写你创建的app_id
     *
     * @var string
     */
    private $app_id = '';

    /**
     * 请填写你创建的app_key
     *
     * @var string
     */
    private $app_key = '';

    private $station_server = '118.24.73.121';
    private $port = 9091;
    private $timeout = null;

    /**
     * LogStation constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->setDefaultLogData('');

        $fp = fsockopen("udp://{$this->station_server}", $this->port, $error_no, $error_string, $this->timeout);
        if (!$fp) {
            return;
        }

        $this->fp = $fp;
    }

    function set_db($db = ''){
        if ($db){
            $this->app_id = $this->channels[$db]['app_id'];
            $this->app_key = $this->channels[$db]['app_key'];
        }else{
            $this->app_id = array_pop($this->channels)['app_id'];
            $this->app_key = array_pop($this->channels)['app_key'];
        }
        return $this;
    }

    /**
     * 写入日志
     *
     * @param string|array $log
     * @param string $tag
     * @return mixed|void
     */
    function write($log, $tag = '')
    {
        if (is_array($log)) {
            $this->addToLog($tag, $log);
        } else {
            $this->addToLog($log);
        }

        $this->send($tag);
    }

    /**
     * 发送日志
     *
     * @param string $name
     */
    function send($name = '')
    {
        if (is_resource($this->fp)) {
            $content = $this->formatRemoteLog($name, 'udp');
            $body = pack('a*', json_encode($content));

            //日志分割成小块
            $logSections = str_split($body, 456);
            $sectionCount = count($logSections);

            $appInfo = $this->getAppHeaderPack();
            $packageId = mt_rand(1000000, 9999999);

            if ($sectionCount > 1) {
                foreach ($logSections as $i => $segment) {
                    $packageInfo = pack("Nnn", $packageId, $sectionCount, $i);
                    fwrite($this->fp, $packageInfo . $appInfo . $segment);
                }
            } else {
                fwrite($this->fp, pack("Nnn", $packageId, 1, 1) . $appInfo . $body);
            }

            fclose($this->fp);
        }
    }

    /**
     * app信息
     *
     * @return string
     */
    private function getAppHeaderPack()
    {
        $sign = $this->makeSign($this->app_id, $this->app_key);
        return pack('a16a32', $this->app_id, $sign);
    }
}


abstract class LogBase
{
    /**
     * @var resource
     */
    protected $fp;

    /**
     * 要收集的默认日志内容
     * <pre>
     * G GET
     * P POST
     * C COOKIE
     * S SESSION
     * </pre>
     *
     * @var bool
     */
    protected $defaultLogData = 'GPCS';

    /**
     * stack
     *
     * @var array
     */
    private $stack = array();

    function __construct()
    {
        error_reporting(0);
        date_default_timezone_set('Asia/Shanghai');
        set_error_handler(array($this, 'errorHandler'));
        register_shutdown_function(array($this, 'fatalHandler'));
    }

    /**
     * @param string $log
     * @param string $name
     * @return mixed
     */
    abstract function write($log, $name);

    /**
     * 增加到stack
     * <pre>
     * 字符串类型的日志只传第一个参数即可
     * 当日志内容为一个数组时, 第一个参数为日志的分组key
     * </pre>
     *
     * @param string $e
     * @param array|string $data
     * @return $this
     */
    function addToLog($e, $data = array())
    {
        $content = $e;
        if (!empty($data)) {
            if (!is_array($data)) {
                $data = array($data);
            }

            $content = self::prettyArray($e, $data);
        }

        $this->stack[] = $content;
        return $this;
    }

    /**
     * 是否附带默认LOG数据
     *
     * @param string $data
     * @return $this
     */
    function setDefaultLogData($data = 'GPCS')
    {
        $this->defaultLogData = $data;
        return $this;
    }

    /**
     * 获取日志内容
     *
     * @param bool $string
     * @return array|string
     */
    function getLogContent($string = true)
    {
        $content = array();
        if ($this->defaultLogData) {
            $tokens = str_split($this->defaultLogData);
            $allowToken = array('G' => true, 'P' => true, 'C' => true, 'S' => true);
            foreach ($tokens as $t) {
                if (isset($allowToken[$t])) {
                    switch ($t) {
                        case 'G':
                            $content[] = self::prettyArray('gets', $_GET);
                            break;
                        case 'P':
                            $content[] = self::prettyArray('posts', $_POST);
                            break;
                        case 'C':
                            $content[] = self::prettyArray('cookies', $_COOKIE);
                            break;
                        case 'S':
                            $session = array();
                            if (isset($_SESSION)) {
                                $session = &$_SESSION;
                            }
                            $content[] = self::prettyArray('sessions', $session);
                            break;
                    }
                }
            }
        }

        if ($this->stack) {
            while ($log = array_shift($this->stack)) {
                array_unshift($content, $log);
            }
        }
        if ($string) {
            return implode(PHP_EOL, $content);
        }

        return $content;
    }

    /**
     * 格式化远程日志
     *
     * @param string $name
     * @param string $type
     * @return array
     */
    protected function formatRemoteLog($name = '', $type = 'udp')
    {
        $content = $this->getLogContent(false);
        if (!empty($content)) {
            array_walk($content, function (&$v) {
                $v = $v . PHP_EOL;
            });
            $content = implode(PHP_EOL, $content);
        } else {
            $content = '';
        }

        return array(
            'type' => $type,
            'name' => $name,
            'content' => $content,
            'time' => date('Y-m-d H:i:s'),
        );
    }

    /**
     * 用于远程日志验证的签名
     *
     * @param string $app_id
     * @param string $app_key
     * @return string
     */
    protected function makeSign($app_id, $app_key)
    {
        return md5($app_id . $app_key);
    }

    /**
     * 格式化数组
     *
     * @param string $name
     * @param array $data
     * @param int $i
     * @return string
     */
    static function prettyArray($name, array $data, $i = 2)
    {
        $space = str_pad('', $i, ' ', STR_PAD_LEFT);
        if (!empty($data)) {
            array_walk($data, function (&$v, $k) use ($i, $space) {
                if (is_array($v)) {
                    $v = $space . self::prettyArray($k, $v, $i + 2);
                } elseif (is_object($v)) {
                    $v = $space . self::prettyArray($k, get_object_vars($v), $i + 2);
                } else {
                    if (!is_int($k)) {
                        $v = $k . ': ' . $v;
                    }

                    $v = $space . $v;
                }
            });
        } else {
            $data[] = $space . '-';
        }

        array_unshift($data, $name);
        return implode(PHP_EOL, $data);
    }

    /**
     * 错误处理
     *
     * @param $no
     * @param $str
     * @param $file
     * @param $line
     */
    function errorHandler($no, $str, $file, $line)
    {
        $file = 'app::' . str_replace(PROJECT_REAL_PATH, 'APP', $file);
        $message = sprintf("[发送日志时产生错误] %s (%s, line %s, error %s)", $str, $file, $line, $no);
        if (is_resource($this->fp)) {
            $this->addToLog('- logStation -', $message);
        }
    }

    /**
     * 错误处理
     */
    function fatalHandler()
    {
        $error = error_get_last();
        if (!empty($error)) {
            $this->errorHandler('', $error['message'], $error['file'], $error['line']);
        }
    }

    /**
     * 关闭连接
     */
    function close()
    {
        if (is_resource($this->fp)) {
            fclose($this->fp);
        }
    }

    /**
     * 析构函数
     */
    function __destruct()
    {
        if (is_resource($this->fp)) {
            fclose($this->fp);
        }
    }
}