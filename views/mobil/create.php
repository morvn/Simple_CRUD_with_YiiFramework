<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\mobil $model */

$this->title = 'Create Mobil';
$this->params['breadcrumbs'][] = ['label' => 'Mobil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>