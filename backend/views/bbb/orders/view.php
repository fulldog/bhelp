<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">基本信息</h3>
      </div>
      <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'member_id',
            [
                'attribute' => 'members.username',
                'filter' => false, //不显示搜索框
                'label' => '购买者',
            ],
//            [
//                'label'=>'推荐者',
//                'value'=>function($model){
//                    $info = (new \common\models\bbb\MemberVipInfos())->getRelatedCodeUser($model->rec_code);
//                    if ($info){
//                        return $info['username'];
//                    }
//                    return ;
//                }
//            ],
            'order_sn',
            [
                'attribute' => 'trade_type',
                'filter' => ['JSAPI' => 'JSAPI']
            ],
            'trade_no',
            'month_limit',
            'out_trade_no',
            'money',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->statusText;
                },
                'filter' => ['待支付', '已支付', '已退款']
            ],
            [
                'attribute' => 'goods',
                'filter' => false, //不显示搜索框
                'value' => function ($model) {
                    if ($model->relateSpecial){
                        return $model->relateSpecial->author.'-'.$model->relateSpecial->title;
                    }else{
                        return $model->goods;
                    }
                }
            ],
            'desc',
            'updated_at:datetime',
            'created_at:datetime',
        ],
    ]) ?>
      </div>
    </div>
  </div>
</div>
