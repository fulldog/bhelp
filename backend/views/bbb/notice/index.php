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
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增公告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'label'=>'创建者',
                'attribute' => 'relate.username',
            ],
            [
                'label'=>'类型',
                'value'=>function($model){
                      return $model->getStatus($model->type);
                }
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

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}&nbsp;&nbsp;{delete}'
            ],
        ],
    ]); ?>
</div>
