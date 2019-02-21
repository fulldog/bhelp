<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '支付日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $this->title; ?></h3>
<!--        <div class="box-tools">-->
<!--            --><?//= Html::a('新增专栏', ['create'], ['class' => 'btn btn-success']) ?>
<!--        </div>-->
      </div>
      <div class="box-body table-responsive">

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
//                  [
//                      'attribute' => 'transaction_id',
//                      'label' => '微信单号'
//                  ],
                  [
                      'attribute' => 'total_fee',
                      'label' => '总额',
                      'value' => function ($model) {
                          return $model->total_fee / 100;
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
                      'attribute' => 'pay_status',
                      'value' => function ($model) {
                          $map = ['未支付', '已支付'];
                          return $map[$model->pay_status];
                      },
                      'filter' => ['未支付', '已支付']
                  ],
                  [
                      'attribute' => 'pay_time',
                      'format' => ['date', "php:Y-m-d H:i:s"],
//                      'headerOptions' => ['width' => '12%'],
                      'filter' => \kartik\daterange\DateRangePicker::widget([
                          'name' => 'SearchModel[pay_time]',
                          'value' => Yii::$app->request->get('SearchModel')['pay_time'],
                          'convertFormat' => true,
                          'pluginOptions' => [
                              'locale' => [
                                  'format' => 'Y-m-d',
                                  'separator' => '/',
                              ]
                          ]
                      ])
                  ],
//            'trade_type',
                  'refund_sn',
//            'refund_fee',
                  [
                      'attribute' => 'is_refund',
                      'label' => '退款',
                      'value' => function ($model) {
                          $map = ['未退款', '已退款'];
                          return $map[$model->is_refund];
                      },
                      'filter' => ['未退款', '已退款']
                  ],
//            'status',
//            'created_at:datetime',
//            'updated_at:datetime',

                  [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '  {refund} {delete}',//{update}
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
                                  'class' => 'btn btn-info btn-sm '
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
                                  'class' => 'btn btn-danger btn-sm '
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
                                  'class' => 'btn btn-danger btn-sm '
                              ];
                              if (!$model->is_refund && $model->pay_status)
                                  return Html::a('退款', $url, $options);
                          },
                      ]
                  ],
              ],
          ]); ?>
      </div>
    </div>
  </div>
