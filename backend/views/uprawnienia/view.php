<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Uprawnienia */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Uprawnienia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Zmień', ['update', 'user_id' => $model->user_id, 'podkategoria_id' => $model->podkategoria_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'user_id' => $model->user_id, 'podkategoria_id' => $model->podkategoria_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username',
            'podkategoria.nazwa',
        ],
    ]) ?>

</div>
