<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbParentsCash */

$this->title = 'Create Bbb Parents Get';
$this->params['breadcrumbs'][] = ['label' => 'Bbb Parents Gets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbb-parents-get-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
