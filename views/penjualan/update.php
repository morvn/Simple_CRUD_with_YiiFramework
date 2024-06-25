<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penjualan $model */

$this->title = 'Update Penjualan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjualan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Gunakan Yii ActiveForm untuk form -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>