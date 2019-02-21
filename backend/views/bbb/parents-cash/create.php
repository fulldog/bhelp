<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbParentsCash */

$this->title = 'Create Bbb Parents Get';
$this->params['breadcrumbs'][] = ['label' => 'Bbb Parents Gets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
