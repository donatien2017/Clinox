<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Consultation;
use backend\models\ConsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsultationController implements the CRUD actions for Consultation model.
 */
class ConsultationController extends Controller
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
     * Lists all Consultation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsultationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consultation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Consultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consultation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consultation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Consultation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Consultation();

        if ($model->load(Yii::$app->request->post())) {

            $model->idconsultation = $model->count() +1;
            $model->iduser = Yii::$app->user->id;

            if( $model->save()){

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create consultation';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré la consultation N°' . $model->idconsultation;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idconsultation]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Consultation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->iduser = Yii::$app->user->id;

            if( $model->save()) {

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Update consultation';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a modifié la consultation N°' . $model->idconsultation;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->idconsultation]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Consultation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
