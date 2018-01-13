<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    
/* @var $this yii\web\View */
/* @var $searchModel backend\models\KategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Yii Application';
?>
<div class="site-index">

        <div class="jumbotron">
        <h1>Word App</h1>
        <h2>Panel administratora</h2>

    </div>

    <div class="body-content">
        <h2 class="jumbotron text-center">Wybierz kategorię aby edytować daną tabelę</h2>
        <div class="row">
            <?= Html::a('Kategorie', ['kategoria/index'], ['class' => 'btn btn-primary btn-block'])
            ?>
            
            <?= Html::a('Podkategorie', ['podkategoria/index'], ['class' => 'btn btn-primary btn-block'])
            ?>

            <?= Html::a('Zestawy', ['zestaw/index'], ['class' => 'btn btn-primary btn-block'])
            ?>


            <?= Html::a('Konta', ['user/index'], ['class' => 'btn btn-primary btn-block'])
            ?>
            
            <?= Html::a('Jezyki', ['jezyk/index'], ['class' => 'btn btn-primary btn-block'])
            ?>
            <?php
//                foreach($dataProvider->models as $model) {
//                    $link = Html::a($model->nazwa, ['kategoria/view', 'id' => $model->id],['class' => 'btn btn-default btn-primary btn-lg btn-block button-category']);
//                    echo '<div class="col-lg-3">'.$link.'</div>';
//                }
            ?>
        </div>

    </div>
</div>
