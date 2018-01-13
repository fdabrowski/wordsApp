<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Zestaw */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="zestaw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList( $users) ?>

    <?= $form->field($model, 'jezyk1_id')->dropDownList( $jezyk1) ?>

    <?= $form->field($model, 'jezyk2_id')->dropDownList( $jezyk2) ?>

    <?= $form->field($model, 'podkategoria_id')->dropDownList( $podkategorie) ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zestaw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ilosc_slowek')->textInput() ?>

    <?= $form->field($model, 'data_dodania')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'data_edycji')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zmień', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
