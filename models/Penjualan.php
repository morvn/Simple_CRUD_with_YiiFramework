<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property int $id
 * @property int|null $id_karyawan
 * @property int|null $id_mobil
 * @property string|null $tanggal_penjualan
 * @property string|null $nama_pembeli
 * @property string|null $alamat_pembeli
 * @property string|null $telf_pembeli
 *
 * @property Karyawan $karyawan
 * @property Mobil $mobil
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_mobil'], 'safe'],
            [['tanggal_penjualan'], 'safe'],
            [['nama_pembeli', 'alamat_pembeli', 'telf_pembeli'], 'string', 'max' => 255],
            [['id_karyawan'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::class, 'targetAttribute' => ['id_karyawan' => 'id']],
            [['id_mobil'], 'exist', 'skipOnError' => true, 'targetClass' => Mobil::class, 'targetAttribute' => ['id_mobil' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_karyawan' => 'Id Karyawan',
            'id_mobil' => 'Id Mobil',
            'tanggal_penjualan' => 'Tanggal Penjualan',
            'nama_pembeli' => 'Nama Pembeli',
            'alamat_pembeli' => 'Alamat Pembeli',
            'telf_pembeli' => 'Telf Pembeli'
        ];
    }

    /**
     * Gets query for [[Karyawan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::class, ['id' => 'id_karyawan']);
    }

    /**
     * Gets query for [[Mobil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMobil()
    {
        return $this->hasOne(Mobil::class, ['id' => 'id_mobil']);
    }
}
