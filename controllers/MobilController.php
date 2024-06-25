<?php

namespace app\controllers;

use app\models\Mobil;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * MobilController implements the CRUD actions for Mobil model.
 */
class MobilController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mobil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Mobil::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mobil model.
     *
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mobil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mobil();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->gambar = UploadedFile::getInstance($model, 'gambar');

            if ($model->validate()) {
                if ($model->gambar) {
                    $model->gambar_path = null; // Reset the path to avoid validation issues
                    if ($model->upload() && $model->save(false)) {
                        Yii::$app->session->setFlash('success', 'Mobil has been created successfully.');
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        Yii::$app->session->setFlash('error', 'Error saving Mobil.');
                    }
                } else {
                    Yii::info('Error uploading image: ' . print_r($model->errors, true), 'app\controllers\MobilController');
                }
            } else {
                Yii::info('Model validation failed: ' . print_r($model->errors, true), 'app\controllers\MobilController');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mobil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->gambar = UploadedFile::getInstance($model, 'gambar');

                if ($model->validate()) {
                    if ($model->upload() && $model->save()) {
                        Yii::$app->session->setFlash('success', 'Mobil has been updated successfully.');
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        Yii::$app->session->setFlash('error', 'Error updating Mobil.');
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Model validation failed.');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mobil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Mobil has been deleted successfully.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Mobil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id ID
     * @return Mobil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Mobil::findOne($id);
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
