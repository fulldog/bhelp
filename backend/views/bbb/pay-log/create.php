<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\bbb\PayLog */

$this->title = 'Create Pay Log';
$this->params['breadcrumbs'][] = ['label' => 'Pay Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
