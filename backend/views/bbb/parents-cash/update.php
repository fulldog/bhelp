<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbParentsCash */

$this->title = 'Update Bbb Parents Get: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bbb Parents Gets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
