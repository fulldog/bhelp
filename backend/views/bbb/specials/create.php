<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbSpecials */

$this->title = $model->isNewRecord ? '新增' : '编辑';
$this->params['breadcrumbs'][] = ['label' => '专栏列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= $this->render('_form', [
    'model' => $model,
]) ?>

