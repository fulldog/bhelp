<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单列表';
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
                  [
                      'attribute' => 'members.username',
                      'filter' => false, //不显示搜索框
                      'label' => '购买者',
                  ],
                  'order_sn',
                  'out_trade_no',
                  [
                      'attribute' => 'trade_type',
                      'filter' => ['JSAPI' => 'JSAPI']
                  ],
//            'trade_no',
                  [
                      'attribute' => 'month_limit',
                      'filter' => false, //不显示搜索框
                  ],
//            [
//                'label'=>'推荐用户',
//                'value'=>function($model){
//                    $info = (new \common\models\bbb\MemberVipInfos())->getRelatedCodeUser($model->rec_code);
//                    if ($info){
//                        return $info['username'];
//                    }
//                    return ;
//                }
//            ],
                  [
                      'attribute' => 'money',
                      'filter' => false, //不显示搜索框
                  ],
                  [
                      'attribute' => 'status',
                      'value' => function ($model) {
                          return $model->orderstatus;
                      },
                      'filter' => ['待支付', '已支付', '已退款']
                  ],
                  'goods',
//            'desc',
                  [
                      'attribute' => 'updated_at',
                      'filter' => false, //不显示搜索框
                      'value' => function ($model) {
                          return date('Y-m-d H:i:s', $model->updated_at);
                      }
                  ],
                  [
                      'attribute' => 'created_at',
                      'filter' => false, //不显示搜索框
                      'value' => function ($model) {
                          return date('Y-m-d H:i:s', $model->created_at);
                      }
                  ],
//            'updated_at:datetime',
//            'created_at:datetime',
                  [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{delete}',
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
                      ]
                  ],
              ],
          ]); ?>
      </div>
    </div>
  </div>
