<?php

use app\models\Penjualan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Mobil;
use app\models\Karyawan;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="penjualan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penjualan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_karyawan',
                'label' => 'Nama Karyawan',
                'value' => function ($model) {
                    return $model->karyawan ? Html::a($model->karyawan->nama, ['karyawan/view', 'id' => $model->karyawan->id]) : '';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'id_mobil',
                'label' => 'Nama Mobil',
                'value' => function ($model) {
                    return $model->mobil ? Html::a($model->mobil->merk . ' ' . $model->mobil->model, ['mobil/view', 'id' => $model->mobil->id]) : '';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'tanggal_penjualan',
                'format' => 'datetime',
            ],
            'nama_pembeli',
            'alamat_pembeli',
            'telf_pembeli',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Penjualan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>