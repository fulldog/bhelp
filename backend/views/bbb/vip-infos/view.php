<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\MemberVipInfos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Member Vip Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-vip-infos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'member_id',
            'rec_code',
            'parent_id',
            'openid',
            'vipage',
            'vipstart_at',
            'vipend_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
