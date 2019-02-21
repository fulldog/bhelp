<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbDocash */

$this->title = 'Update Bbb Docash: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bbb Docashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "<div style='clear: both'><div class='col-sm-1 text-right'>{label}</div><div class='col-sm-11'>{input}{hint}{error}</div></div>",
                ]
            ]); ?>
            <div class="box-body">

                <?= $form->field($model, 'uid')->textInput(['disabled'=>'disabled']) ?>

                <?= $form->field($model, 'cash')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?>

                <?= $form->field($model, 'status')->dropDownList(['0'=>'待审核',1=>'已提现',2=>'已拒绝'])
                    ->hint('<span style="color: red">当状态为已提现,提交后自动触发金钱交易,此操作不可撤销</span>') ?>

            </div>
            <div class="box-footer text-center">
              <?if($model->status!=1):?>
                <button class="btn btn-primary" type="submit">保存</button>
              <?endif;?>
                <span class="btn btn-white" onclick="history.go(-1)">返回</span>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>