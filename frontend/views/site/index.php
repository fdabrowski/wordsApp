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

        <p class="lead">Naucz się z nami angielskiego! Aby zachować wyniki swoich testów, zaloguj się w zakładce "Logowanie"</p>

    </div>

    <div class="body-content">
        <h2 class="text-center">Kategorie<br></h2>
        <br>
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
