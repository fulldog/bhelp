<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '支付日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-log-index"style="padding: 20px">

    <h3><?= Html::encode($this->title) ?></h3>
<!--    <p>-->
<!--        --><?//= Html::a('Create Pay Log', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_sn',
//            'openid',
//            'order_group',
//            [
//                'attribute'=>'mch_id',
//                'label'=>'商户号'
//            ],
//            [
//                'attribute'=>'out_trade_no',
//                'label'=>'外部单号'
//            ],
            [
                'attribute'=>'transaction_id',
                'label'=>'微信单号'
            ],
            [
                'attribute'=>'total_fee',
                'label'=>'总额',
                'value'=>function($model){
                    return $model->total_fee/100;
                }
            ],
//            'fee_type',
//            'pay_type',
//            [
//                'attribute'=>'pay_fee',
//                'label'=>'已支付',
//                'value'=>function($model){
//                    return $model->pay_fee/100;
//                }
//            ],
            [
                'attribute'=>'pay_status',
                'value'=>function($model){
                    $map = ['未支付','已支付'];
                    return $map[$model->pay_status];
                },
                'filter'=>['未支付','已支付']
            ],
            'pay_time:datetime',
//            'trade_type',
            'refund_sn',
//            'refund_fee',
            [
                'attribute'=>'is_refund',
                'label'=>'退款',
                'value'=>function($model){
                    $map = ['未退款','已退款'];
                    return $map[$model->is_refund];
                },
                'filter'=>['未退款','已退款']
            ],
//            'status',
//            'created_at:datetime',
//            'updated_at:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'  {refund} {delete}',//{update}
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'class'=>'btn btn-info btn-sm '
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class'=>'btn btn-danger btn-sm '
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    },
                    'refund' => function ($url, $model, $key) {
                        $options = [
                            'title' => '退款',
                            'aria-label' => '退款',
                            'data-confirm' => '你确定要退款吗？',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class'=>'btn btn-danger btn-sm '
                        ];
                        if (!$model->is_refund && $model->pay_status)
                              return Html::a('退款', $url, $options);
                    },
                ]
            ],
        ],
    ]); ?>
</div>
