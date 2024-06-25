<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $jabatan
 * @property float|null $gaji
 * @property string|null $tanggal_masuk
 *
 * @property Penjualan[] $penjualan
 */
class karyawan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gaji'], 'number'],
            [['tanggal_masuk'], 'safe'],
            [['nama', 'jabatan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
            'gaji' => 'Gaji',
            'tanggal_masuk' => 'Tanggal Masuk',
        ];
    }

    /**
     * Gets query for [[Penjualan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualan()
    {
        return $this->hasMany(Penjualan::class, ['id_karyawan' => 'id']);
    }
}
