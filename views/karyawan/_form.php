<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Karyawan;

/** @var yii\web\View $this */
/** @var app\models\Karyawan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->dropDownList(
        ['Manager' => 'Manager', 'Staff' => 'Staff', 'Teknisi' => 'Teknisi', 'Sales' => 'Sales'],
        ['prompt' => 'Pilih Jabatan']
    ) ?>

    <?= $form->field($model, 'gaji')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>