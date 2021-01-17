<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Livros */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="livros-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>

    <?php 
        
        $categoria = app\models\Categoria::find()->all();
        $listData= \yii\helpers\ArrayHelper::map($categoria,'id','nome');
        echo $form->field($model, 'categoria_id')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
        );
    ?>
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
