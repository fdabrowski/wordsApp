<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Zestaw */

$this->title = 'Dodaj Zestaw';
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'jezyk1' => $jezyk1,
        'jezyk2' => $jezyk2,
        'podkategorie' => $podkategorie,
    ]) ?>

</div>
