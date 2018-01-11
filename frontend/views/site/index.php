<?php
    use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Word App</h1>

        <p class="lead">Naucz się z nami angielskiego! Aby uzyskać dostępo do większej ilości podkategorii zaloguj się w zakładce "Login"</p>

        <p><a class="btn btn-lg btn-success" href="/yii-advanced-app-2.0.13/advanced/frontend/web/index.php?r=site%2Flogin">Zaloguj się</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <?= Html::a('Pomieszczenia', ['podkategoria/index'],['class' => 'btn btn-default btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-3">
                <?= Html::a('Pomieszczenia', ['podkategoria/index'],['class' => 'btn btn-default btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-3">
                <?= Html::a('Pomieszczenia', ['podkategoria/index'],['class' => 'btn btn-default btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-3">
                <?= Html::a('Pomieszczenia', ['podkategoria/index'],['class' => 'btn btn-default btn-primary btn-lg btn-block']) ?>
            </div>
        </div>

    </div>
</div>
