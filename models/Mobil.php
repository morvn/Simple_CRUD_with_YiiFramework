<?php

namespace app\models;

use yii\web\UploadedFile;
use yii\helpers\Inflector;
use Yii;

/**
 * This is the model class for table "mobil".
 *
 * @property int $id
 * @property string|null $merk
 * @property string|null $model
 * @property int|null $tahun
 * @property string|null $warna
 * @property float|null $harga
 * @property string|null $gambar_path
 * @property UploadedFile|null $gambar
 *
 * @property Penjualan[] $penjualan
 */
class Mobil extends \yii\db\ActiveRecord
{
    public $gambar; // Additional property for file upload

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun'], 'integer'],
            [['harga'], 'number'],
            [['merk', 'model'], 'string', 'max' => 50],
            [['warna'], 'string', 'max' => 20],
            [['gambar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merk' => 'Merk',
            'model' => 'Model',
            'tahun' => 'Tahun',
            'warna' => 'Warna',
            'harga' => 'Harga',
            'gambar_path' => 'Gambar',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * Gets query for [[Penjualan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualan()
    {
        return $this->hasMany(Penjualan::class, ['id_mobil' => 'id']);
    }

    /**
     * Uploads and saves the image to the 'assets/mobil' folder.
     * Updates the image path in the 'gambar_path' attribute.
     * Called before saving the model.
     */
    public function upload()
    {
        if ($this->gambar !== null) {
            $uniqueFileName = Inflector::slug($this->gambar->baseName) . '_' . time() . '.' . $this->gambar->extension;
            $path = Yii::getAlias('@webroot') . '/assets/mobil/' . $uniqueFileName;

            if ($this->gambar->saveAs($path)) {
                $this->gambar_path = $uniqueFileName;
                return true;
            } else {
                Yii::error('Failed to save the file: ' . $path);
                return false;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Call the upload function before saving the model
            $this->upload();
            return true;
        }
        return false;
    }
}
