<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

// Menambahkan CSS langsung di dalam file view
$this->registerCss('
    .site-profile {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
        background-color: #007bff;
        color: #fff;
        text-align: center;
        padding: 10px;
        border-radius: 8px 8px 0 0;
    }

    .profile-content {
        margin-top: 20px;
    }

    .profile-item {
        margin-bottom: 10px;
    }

    .profile-item strong {
        margin-right: 10px;
    }
');
?>

<div class="site-profile">
    <div class="profile-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="profile-content">
        <div class="profile-item">
            <strong>Nama:</strong> Evan Febditya Pratama
        </div>
        <div class="profile-item">
            <strong>Kelas:</strong> TI B
        </div>
        <div class="profile-item">
            <strong>NIM:</strong> 22330053
        </div>
        <div class="profile-item">
            <strong>Universitas:</strong> Janabadra
        </div>
    </div>
</div>