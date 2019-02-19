<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\MemberVipInfos */

$this->title = 'Update Member Vip Infos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Member Vip Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
