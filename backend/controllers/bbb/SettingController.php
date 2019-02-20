<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/2/20
 * Time: 13:25
 */

namespace backend\controllers\bbb;


use yii\web\Controller;

class SettingController extends Controller
{

    private $keys = [

    ];

    function actionIndex(){

        if (\Yii::$app->request->isPost){
            foreach (\Yii::$app->request->post('data') as $k=>$v){
                if (!empty($v)){
                    \Yii::$app->db->createCommand("update ".\Yii::$app->db->tablePrefix."bbb_setting set `value`='{$v}' where `key`='{$k}'")->execute();
                }
            }
            \Yii::$app->session->setFlash('success','保存成功');
        }

        $sql = "select * from ".\Yii::$app->db->tablePrefix."bbb_setting";
        $res = \Yii::$app->db->createCommand($sql)->queryAll();
        $data = [];
        if (!empty($res)){
            foreach ($res as $v){
                $data[$v['key']] = $v['value'];
            }
        }
        return $this->render('index',[
            'data'=>$data
        ]);
    }
}