<?php
use yii\widgets\ActiveForm;
use common\helpers\AddonUrl;
use common\widgets\webuploader\Images;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbSpecialDetails */
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
          <?= $form->field($model, 'title')->textInput(); ?>
          <?= $form->field($model, 'sid')->widget(Select2::classname(), [
              'data' => \common\models\bbb\BbbSpecials::getAllAuthors(),
              'options' => ['placeholder' => '请选择'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
          ]);?>
          <?= $form->field($model, 'desc')->textarea(); ?>
          <?= $form->field($model, 'voice')->widget('common\widgets\webuploader\Files', [
              'config' => [
                  'pick' => [
                      'multiple' => false,
                  ],
                  'accept' => [
                      'extensions' => ['amr', 'mp3', 'wma', 'wav', 'amr'],
                      'mimeTypes' => 'audio/*',
                  ],
                  'formData' => [
                      // 保留原名称
                      'originalName' => false
                  ],
                  'fileSingleSizeLimit' => 5120 * 1024 * 20,// 大小限制
                  'independentUrl' => true,
                  'select' => true, // 选择在线图片
              ]
          ])->label('音频')->hint('只支持 mp3/wma/wav/amr 格式,大小不超过为100M');?>
          <?= $form->field($model, 'view_count')->textInput() ?>
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
