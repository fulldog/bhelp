<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\NoticeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notice-index" style="padding: 20px">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

<!--    --><?//= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'type')->dropDownList([''=>'全部','1'=>'公告',2=>'消息'],[
        'style'=>'width:200px;'
    ])?>
    <?= $form->field($model, 'notice')->textInput(['style'=>'width:600px;']) ?>

<!--    --><?//= $form->field($model, 'created_at') ?>

<!--    --><?//= $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
