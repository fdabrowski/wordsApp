<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1>Word App</h1>
    <p>Naucz się z nami angielskiego! Aby uzyskać dostępo do większej ilości podkategorii zaloguj się w zakładce "Login"</p>
        <?= Html::a('Kraje', ['country/index'],
        ['class' => 'btn btn-info']) ?>

    <?= Html::a('Owoce', ['fruits/index'],
        ['class' => 'btn btn-info']) ?>

    <?= Html::a('Zamówienia', ['orders/index'],
        ['class' => 'btn btn-info']) ?>

    <?= Html::a('Sprzedawcy', ['sellers/index'],
        ['class' => 'btn btn-info']) ?>
    
</div>
