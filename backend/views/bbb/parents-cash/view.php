<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbParentsCash */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bbb Parents Gets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
                  'uid',
                  'child_uid',
                  'order_id',
                  'goods',
                  'desc',
                  'money',
                  'status',
                  'get_money',
                  'created_at:datetime',
                  'updated_at:datetime',
              ],
          ]) ?>

      </div>
    </div>
  </div>
</div>
