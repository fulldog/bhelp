<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\bbb\Notice */

$this->title = '创建公告';
$this->params['breadcrumbs'][] = ['label' => 'Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
