<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\bbb\MemberVipInfos */

$this->title = 'Create Member Vip Infos';
$this->params['breadcrumbs'][] = ['label' => 'Member Vip Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
