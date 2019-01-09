<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\bbb\Notice */

$this->title = '创建公告';
$this->params['breadcrumbs'][] = ['label' => 'Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-index" style="padding: 20px">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
