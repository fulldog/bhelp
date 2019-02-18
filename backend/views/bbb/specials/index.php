<?php
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;
use common\helpers\HtmlHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '专栏管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $this->title; ?></h3>
        <div class="box-tools">
            <?= Html::a('新增专栏', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
      </div>
      <div class="box-body table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'head',
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
            [
                'attribute' => 'img',
                'value'=>function($model){
                    return Html::img($model->img,['style'=>'width:100px;']);
                },
                'filter'=>false,
                'format'=>'raw'
            ],
            'price',
            'totle',
//            'subscrible_count',
//            'created_at',
//            'updated_at',
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
