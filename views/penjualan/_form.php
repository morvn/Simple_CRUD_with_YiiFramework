<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Karyawan;
use app\models\Mobil;

/** @var yii\web\View $this */
/** @var app\models\Penjualan $model */
/** @var yii\widgets\ActiveForm $form */

// Pastikan bahwa model Penjualan memiliki relasi dengan Karyawan dan Mobil
?>

<div class="penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_karyawan')->dropDownList(
        ArrayHelper::map(Karyawan::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Karyawan']
    )->label('Karyawan') ?>

    <?= $form->field($model, 'id_mobil')->dropDownList(
        ArrayHelper::map(Mobil::find()->all(), 'id', 'merk'),
        ['prompt' => 'Pilih Mobil']
    )->label('Mobil') ?>

    <?= $form->field($model, 'tanggal_penjualan')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'nama_pembeli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pembeli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telf_pembeli')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>