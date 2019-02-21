<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbParentsCash */

$this->title = 'Update Bbb Parents Get: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bbb Parents Gets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息--更新</h3>
            </div>
            <?php $form = \yii\widgets\ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "<div style='clear: both'><div class='col-sm-1 text-right'>{label}</div><div class='col-sm-11'>{input}{hint}{error}</div></div>",
                ]
            ]); ?>
            <div class="box-body">

<!--                --><?//= $form->field($model, 'uid')->textInput() ?>
<!--                --><?//= $form->field($model, 'child_uid')->textInput() ?>
<!--                --><?//= $form->field($model, 'order_id')->textInput() ?>
<!--                --><?//= $form->field($model, 'goods')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'status')->dropDownList([
                    '0'=>'待审核',
                    '1'=>'已确认',
                    '2'=>'已拒绝'
                ]) ?>
                <?= $form->field($model, 'money')->textInput(['disabled' => true]) ?>
                <?= $form->field($model, 'get_money')->textInput(['disabled' => true]) ?>
<!--                --><?//= $form->field($model, 'created_at')->textInput() ?>
<!--                --><?//= $form->field($model, 'updated_at')->textInput() ?>
            </div>
            <div class="box-footer text-center">
                <button class="btn btn-primary" type="submit">保存</button>
                <span class="btn btn-white" onclick="history.go(-1)">返回</span>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
</div>
