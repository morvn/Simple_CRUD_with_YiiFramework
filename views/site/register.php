<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\RegisterForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"><?= Html::encode($this->title) ?></h1>
                        <p class="card-text">Silakan isi kolom berikut untuk mendaftar:</p>

                        <?php $form = ActiveForm::begin([
                            'id' => 'register-form',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'col-form-label'],
                                'inputOptions' => ['class' => 'form-control'],
                                'errorOptions' => ['class' => 'invalid-feedback'],
                            ],
                        ]); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>

                            <?= Html::a('Masuk', ['/site/login'], ['class' => 'btn btn-link']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>