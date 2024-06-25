<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penjualan $model */

$this->title = 'Formulir Pembelian';
?>

<div class="penjualan-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Tambahkan form langsung di sini -->
    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pembeli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pembeli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telf_pembeli')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>
</div>