<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rola */

$this->title = 'Update Rola: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rola-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
