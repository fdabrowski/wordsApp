<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ZestawSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zestawy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Zestaw', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'user.username',
            'jezyk1.nazwa',
            'jezyk2.nazwa',
            'podkategoria.nazwa',
            'nazwa',
            'zestaw:ntext',
            'ilosc_slowek',
            'data_dodania',
            'data_edycji',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
