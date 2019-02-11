<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbSpecials */

$this->title = 'Create Bbb Specials';
$this->params['breadcrumbs'][] = ['label' => 'Bbb Specials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbb-specials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
