<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kategoria */

$this->title = $model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Kategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'opis:ntext',
        ],
    ]) ?>
    <h3>Podkategorie</h3>
    <?php
        foreach($dataProvider->models as $model) {
            $link = Html::a($model['nazwa'], ['podkategoria/view', 'id' => $model['id']],['class' => 'btn btn-default btn-primary btn-lg btn-block button-category']);
            echo '<div class="col-lg-3">'.$link.'</div>';
        }
    ?>

</div>
