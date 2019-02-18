<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '专栏列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $this->title; ?></h3>
        <div class="box-tools">
            <?= Html::a('添加内容', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
      </div>
      <div class="box-body table-responsive">
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

                  'id',
                  [
                      'attribute' => '专栏分类',
                      'value'=>function($model){
                          return $model->special['author'];
                      },
                  ],
                  [
                      'attribute' => 'status',
                      'value'=>function($model){
                          $arr = [1=>'启用',0=>'禁用'];
                          return $arr[$model->status];
                      },
                      'filter'=>[1=>'启用',0=>'禁用']
                  ],
                  'title',
                  'desc',
//                  'content:ntext',
                  'view_count',
                  //'created_at',
                  //'updated_at',
                  [
                      'class' => 'yii\grid\ActionColumn',
                      'template'=>'{update} {delete}',
                      'buttons' => [
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
                      ]
                  ],
              ],
          ]); ?>
      </div>
    </div>
  </div>
