<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\bbb\NoticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '公告列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-index" style="padding: 20px">

    <h3><?= Html::encode($this->title) ?></h3>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('新增公告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label'=>'创建者',
                'attribute' => 'relate.username',
            ],
            [
                'label'=>'类型',
                'attribute' => 'type',
                'value'=>function($model){
                      return $model->getStatus($model->type);
                },
                'filter'=>[1=>'公告',2=>'消息']
            ],
            [
                'attribute' => 'notice',
            ],
            [
                'attribute' => 'created_at',
                'filter' => false, //不显示搜索框
                'format'=>'datetime'
            ],
//            [
//                'attribute' => 'updated_at',
//                'filter' => false, //不显示搜索框
//                'format'=>'datetime'
//            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}  {delete}',
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
                ]
            ],
        ],
    ]); ?>
</div>
