<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\bbb\Orders */

$this->title = 'Create Orders';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
