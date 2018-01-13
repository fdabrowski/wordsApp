<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UprawnieniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uprawnienia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Dodaj Uprawnienia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

<<<<<<< HEAD
            'user_id',
            'podkategoria_id',
=======
            'user.username',
            'podkategoria.nazwa',
>>>>>>> 83ba1b13640378fc48b2219342376c318221244e

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
