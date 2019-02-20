<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbDocash */

$this->title = 'Create Bbb Docash';
$this->params['breadcrumbs'][] = ['label' => 'Bbb Docashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbb-docash-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
