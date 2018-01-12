<?php

namespace backend\controllers;

use Yii;
use backend\models\Uprawnienia;
use backend\models\UprawnieniaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UprawnieniaController implements the CRUD actions for Uprawnienia model.
 */
class UprawnieniaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Uprawnienia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UprawnieniaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Uprawnienia model.
     * @param integer $user_id
     * @param integer $podkategoria_id
     * @return mixed
     */
    public function actionView($user_id, $podkategoria_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $podkategoria_id),
        ]);
    }

    /**
     * Creates a new Uprawnienia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uprawnienia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'podkategoria_id' => $model->podkategoria_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Uprawnienia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $podkategoria_id
     * @return mixed
     */
    public function actionUpdate($user_id, $podkategoria_id)
    {
        $model = $this->findModel($user_id, $podkategoria_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'podkategoria_id' => $model->podkategoria_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Uprawnienia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $podkategoria_id
     * @return mixed
     */
    public function actionDelete($user_id, $podkategoria_id)
    {
        $this->findModel($user_id, $podkategoria_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Uprawnienia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $podkategoria_id
     * @return Uprawnienia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $podkategoria_id)
    {
        if (($model = Uprawnienia::findOne(['user_id' => $user_id, 'podkategoria_id' => $podkategoria_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
