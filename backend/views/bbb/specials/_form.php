<?php
use yii\widgets\ActiveForm;
use common\helpers\AddonUrl;
use common\widgets\webuploader\Images;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbSpecials */
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
          <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'head')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'desc')->textarea() ?>

          <?= $form->field($model, 'img')->widget(Images::className(), [
              'config' => [
                  // 可设置自己的上传地址, 不设置则默认地址
                  // 'server' => '',
                  'pick' => [
                      'multiple' => false,
                  ],
              ]
          ]); ?>

          <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'totle')->textInput() ?>

          <?= $form->field($model, 'subscrible_count')->textInput() ?>

          <?= $form->field($model, 'status')->radioList(['1' => '启用','0' => '禁用']); ?>

      </div>
      <div class="box-footer text-center">
        <button class="btn btn-primary" type="submit">保存</button>
        <span class="btn btn-white" onclick="history.go(-1)">返回</span>
      </div>
        <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

