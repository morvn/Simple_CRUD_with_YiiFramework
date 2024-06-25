<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"><?= Html::encode($this->title) ?></h1>
                        <p class="card-text">Silakan isi kolom berikut untuk login:</p>

                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'col-form-label'],
                                'inputOptions' => ['class' => 'form-control'],
                                'errorOptions' => ['class' => 'invalid-feedback'],
                            ],
                        ]); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n{error}",
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            <?= Html::a('Daftar', ['site/register'], ['class' => 'btn btn-link']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>