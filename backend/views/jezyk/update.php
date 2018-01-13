<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jezyk */

$this->title = 'Zmień Jezyk: ' . $model-> nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Jezyki', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Zmień';
?>
<div class="jezyk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
