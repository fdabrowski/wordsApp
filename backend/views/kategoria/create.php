<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kategoria */

$this->title = 'Dodaj Kategorię';
$this->params['breadcrumbs'][] = ['label' => 'Kategorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
