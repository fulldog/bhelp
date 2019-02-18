<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbSpecials */

$this->title = '专栏更新: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '专栏列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
