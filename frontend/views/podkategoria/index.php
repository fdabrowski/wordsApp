<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PodkategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Podkategorie';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'nazwa',

        ],
    ]); ?>
</div>
