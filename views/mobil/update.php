<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\mobil $model */

$this->title = 'Update Mobil: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mobil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>