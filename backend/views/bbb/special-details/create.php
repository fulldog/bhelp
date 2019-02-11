<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbSpecialDetails */

$this->title = 'Create Bbb Special Details';
$this->params['breadcrumbs'][] = ['label' => 'Bbb Special Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbb-special-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
