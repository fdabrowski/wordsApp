<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Zestaw */

$this->title = 'Zmień Zestaw: ' . $model-> nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Zmień';
?>
<div class="zestaw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'jezyk1' => $jezyk1,
        'jezyk2' => $jezyk2,
        'podkategorie' => $podkategorie,
    ]) ?>

</div>
