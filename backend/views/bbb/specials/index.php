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
            <?= HtmlHelper::create(['ajax-edit'], '创建', [
                'data-toggle' => 'modal',
                'data-target' => '#ajaxModal',
            ])?>
        </div>
      </div>
      <div class="box-body table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'author',
            'head',
            'title',
            'desc',
            //'img',
            //'price',
            //'totle',
            //'subscrible_count',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
      </div>
    </div>
  </div>
