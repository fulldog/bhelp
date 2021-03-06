<?php
use yii\grid\GridView;
use common\helpers\AddonUrl;
use common\helpers\AddonHtmlHelper;

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $this->title; ?></h3>
                <div class="box-tools">
                    <?= AddonHtmlHelper::create(['edit']); ?>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    //重新定义分页样式
                    'tableOptions' => ['class' => 'table table-hover'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'visible' => false, // 不显示#
                        ],
                        'id',
                        'title',
                        [
                            'attribute' => 'cate_id',
                            'value' => 'cate.title',
                            'filter' => AddonHtmlHelper::activeDropDownList($searchModel,
                                'cate_id',
                                $cates,
                                [
                                    'prompt' => '全部',
                                    'class' => 'form-control'
                                ]
                            )
                        ],
                        [
                            'label'=> '推荐位',
                            'filter' => false, //不显示搜索框
                            'attribute' => 'position',
                            'value' => function ($model) {
                                $arr = [
                                    '0' => "不推荐",
                                    '1' => "首页",
                                    '2' => "列表",
                                    '4' => "内页",
                                ];
                                return $arr[$model->position];
                            },
                        ],
                        [
                            'attribute' => 'sort',
                            'filter' => false, //不显示搜索框
                            'value' => function ($model) {
                                return AddonHtmlHelper::sort($model->sort);
                            },
                            'format' => 'raw',
                            'headerOptions' => ['class' => 'col-md-1'],
                        ],
                        [
                            'label'=> '创建日期',
                            'attribute' => 'created_at',
                            'filter' => false, //不显示搜索框
                            'format' => ['date', 'php:Y-m-d H:i:s'],
                        ],
                        // 'updated_at',
                        [
                            'header' => "操作",
                            'class' => 'yii\grid\ActionColumn',
                            'template'=> '{edit} {status} {delete}',
                            'buttons' => [
                                'edit' => function ($url, $model, $key) {
                                    return AddonHtmlHelper::edit(['edit', 'id' => $model->id]);
                                },
                                'status' => function ($url, $model, $key) {
                                    return AddonHtmlHelper::status($model->status);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return AddonHtmlHelper::delete(['hide', 'id' => $model->id]);
                                },
                            ],
                        ],
                    ],
                ]); ?>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>