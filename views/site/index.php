<?php

/** @var yii\web\View $this */

use app\models\Mobil; // Adjust the namespace according to your model
use yii\helpers\Html;

$this->title = 'evan';
?>
<div class="site-index">

    <section class="hero text-center my-5">
        <div class="container">
            <h1 class="display-3 text-primary" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); font-weight: bold;">Abadi Solusi Utama</h1>
            <p class="lead text-secondary" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-style: italic;">Dealer Resmi Penjualan Mobil</p>
        </div>
    </section>


    <div class="body-content">

        <div class="row">
            <?php
            $mobilList = Mobil::find()->all();

            foreach ($mobilList as $mobil) {
            ?>
                <div class="col-lg-4 mb-3">
                    <div class="card shadow"> <!-- Add the shadow class here -->
                        <?= Html::img(Yii::getAlias('@web/assets/mobil/') . $mobil->gambar_path, ['class' => 'card-img-top', 'alt' => 'Gambar Mobil']) ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($mobil->merk . ' ' . $mobil->model) ?></h5>
                            <p class="card-text">Tahun: <?= Html::encode($mobil->tahun) ?></p>
                            <p class="card-text">Warna: <?= Html::encode($mobil->warna) ?></p>
                            <p class="card-text">Harga: Rp <?= Html::encode(number_format($mobil->harga, 2)) ?></p>

                            <?php
                            if (Yii::$app->user->isGuest) {
                                // User is a guest, show login link
                                echo Html::a('Login untuk Pesan Mobil', ['/site/login'], ['class' => 'btn btn-primary']);
                            } else {
                                // User is logged in, show order button
                                echo Html::a('Pesan Mobil', ['/penjualan/create', 'mobil_id' => $mobil->id], ['class' => 'btn btn-success']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>