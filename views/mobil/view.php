<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\mobil $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mobil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mobil-view">

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
            'merk',
            'model',
            'tahun',
            'warna',
            'harga',
            [
                'attribute' => 'gambar_path',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@web/assets/mobil/' . $model->gambar_path), ['alt' => 'Gambar Mobil', 'class' => 'img-thumbnail']);
                },
            ],
        ],
    ]) ?>

</div>