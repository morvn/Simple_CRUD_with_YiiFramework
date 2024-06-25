<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Penjualan $model */

$this->title = 'Detail Penjualan #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penjualan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id_karyawan',
                'label' => 'Karyawan',
                'value' => function ($model) {
                    return $model->karyawan->nama; // Assuming you have a relation named 'karyawan'
                },
            ],
            [
                'attribute' => 'id_mobil',
                'label' => 'Mobil',
                'value' => function ($model) {
                    return $model->mobil->merk; // Assuming you have a relation named 'mobil'
                },
            ],
            'tanggal_penjualan',
            'nama_pembeli',
            'alamat_pembeli',
            'telf_pembeli',
        ],
    ]) ?>

</div>