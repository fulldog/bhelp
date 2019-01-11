<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\PayLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-log-view">

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
            'order_sn',
            'openid',
            'order_group',
            'mch_id',
            'out_trade_no',
            'transaction_id',
            'total_fee',
            'fee_type',
            'pay_type',
            'pay_fee',
            'pay_status',
            'pay_time:datetime',
            'trade_type',
            'refund_sn',
            'refund_fee',
            'is_refund',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
