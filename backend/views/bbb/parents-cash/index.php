<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '收益查看';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $this->title; ?></h3>
        <!--        <div class="box-tools">-->
        <!--            --><? //= Html::a('新增专栏', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'uid',
                'filter'=>false
            ],
            [
                'attribute' => 'child_uid',
                'filter'=>false
            ],
            [
                'attribute' => 'order_id',
                'filter'=>false
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->statusText;
                },
                'headerOptions' => ['width' => '6%'],
                'filter' => ['待审核', '已确认', '已拒绝']
            ],
            [
                'attribute' => 'goods',
                'filter'=>false
            ],
            'desc',
            [
                'attribute' => 'money',
                'filter'=>false
            ],
            [
                'attribute' => 'get_money',
                'filter'=>false
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', "php:Y-m-d H:i:s"],
//                      'headerOptions' => ['width' => '12%'],
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'name' => 'SearchModel[created_at]',
                    'value' => Yii::$app->request->get('SearchModel')['created_at'],
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'Y-m-d',
                            'separator' => '/',
                        ]
                    ]
                ])
            ],
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} ',//{delete}
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-info btn-sm '
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
</div>
