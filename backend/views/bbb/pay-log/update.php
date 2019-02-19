<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\PayLog */

$this->title = 'Update Pay Log: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
