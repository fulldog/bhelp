<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = '报错日志';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="tabs-container">
        <?= $this->render('_nav', [
            'type' => 'error'
        ]) ?>
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php $form = ActiveForm::begin([
                                'action' => Url::to(['error']),
                                'method' => 'get'
                            ]); ?>
                            <div class="col-sm-5">
                                <?= Html::dropDownList('error_code', $error_code, ['' => '全部', 1 => '正常状态', 2 => '异常状态'], ['class' => 'form-control']);?>
                            </div>
                            <div class="input-group m-b">
                                <?= Html::tag('span', '<button class="btn btn-white"><i class="fa fa-search"></i> 搜索</button>', ['class' => 'input-group-btn'])?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>提交方法</th>
                                <th>用户</th>
                                <th>模块</th>
                                <th>控制器方法</th>
                                <th>Url</th>
                                <th>IP</th>
                                <th>地区</th>
                                <th>状态码</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($models as $model){ ?>
                                <tr id = <?= $model->id; ?>>
                                    <td><?= $model->id; ?></td>
                                    <td><?= Html::encode($model->method); ?></td>
                                    <td><?= !empty($model->member_id) ? '登录用户' : '游客' ?></td>
                                    <td><?= $model->module; ?></td>
                                    <td><?= Html::encode($model->controller); ?>/<?= Html::encode($model->action); ?></td>
                                    <td><?= Html::encode($model->url); ?></td>
                                    <td><?= long2ip($model->ip); ?></td>
                                    <td>
                                        <?php
                                        if (!empty($model['ip']) && ($ipData = \Zhuzhichao\IpLocationZh\Ip::find(long2ip($model['ip'])))) {
                                            echo $ipData[0] . '·' . $ipData[1] . '·' . $ipData[2];
                                        } else {
                                            echo '本地';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if($model->error_code < 300){ ?>
                                            <span class="label label-primary"><?= $model->error_code; ?></span>
                                        <?php }else{ ?>
                                            <span class="label label-danger"><?= $model->error_code; ?></span>
                                        <?php } ?>
                                    </td>
                                    <td><?= Yii::$app->formatter->asDatetime($model->created_at); ?></td>
                                    <td>
                                        <a href="<?= Url::to(['error-view','id' => $model->id])?>" data-toggle='modal' data-target='#ajaxModalLg'><span class="btn btn-info btn-sm">查看详情</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= LinkPager::widget([
                                    'pagination' => $pages,
                                    'maxButtonCount' => 5,
                                    'firstPageLabel' => "首页",
                                    'lastPageLabel' => "尾页",
                                    'nextPageLabel' => "下一页",
                                    'prevPageLabel' => "上一页",
                                ]);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>