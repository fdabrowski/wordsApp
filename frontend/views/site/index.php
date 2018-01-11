<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Word App</h1>

        <p class="lead">Naucz się z nami angielskiego! Aby uzyskać dostępo do większej ilości podkategorii zaloguj się w zakładce "Login"</p>

        <p>
            <!-- <a class="btn btn-lg btn-success" href="/yii-advanced-app-2.0.13/advanced/frontend/web/index.php?r=site%2Flogin">Zaloguj się</a> -->
            <?= Html::a('Zaloguj się', ['login'],['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <div class="body-content">
        <h2 class="jumbotron text-center">Kategorie</h2>
        <div class="row">
            <?php
                foreach($dataProvider->models as $model) {
                    $link = Html::a($model->nazwa, ['kategoria/view', 'id' => $model->id],['class' => 'btn btn-default btn-primary btn-lg btn-block button-category']);
                    echo '<div class="col-lg-3">'.$link.'</div>';
                }
            ?>
        </div>

    </div>
</div>
