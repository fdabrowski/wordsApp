<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jezyk */

$this->title = 'Dodaj Jezyk';
$this->params['breadcrumbs'][] = ['label' => 'Jezyki', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jezyk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
