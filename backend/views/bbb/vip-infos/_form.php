<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\MemberVipInfos */
/* @var $form yii\widgets\ActiveForm */
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

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'rec_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'openid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vipage')->textInput() ?>

    <?= $form->field($model, 'vipstart_at')->textInput() ?>

    <?= $form->field($model, 'vipend_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

      </div>
      <div class="box-footer text-center">
        <button class="btn btn-primary" type="submit">保存</button>
        <span class="btn btn-white" onclick="history.go(-1)">返回</span>
      </div>
        <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
