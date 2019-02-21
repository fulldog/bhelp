<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\bbb\BbbDocash */

$this->title = 'Create Bbb Docash';
$this->params['breadcrumbs'][] = ['label' => 'Bbb Docashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
