<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\Notice */

$this->title = '公告修改' ;
$this->params['breadcrumbs'][] = ['label' => 'Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
