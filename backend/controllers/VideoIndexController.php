<?php

namespace backend\controllers;

use Yii;
use backend\models\VideoIndex;
use backend\models\search\VideoIndexSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoIndexController implements the CRUD actions for VideoIndex model.
 */
class VideoIndexController extends Controller
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
     * Lists all VideoIndex models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoIndexSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoIndex model.
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
     * Creates a new VideoIndex model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VideoIndex();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $links = $post['link'];

            $model->video_link = json_encode($links);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);

        }
    }

    /**
     * Updates an existing VideoIndex model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $links = array_filter($post['link']);
            $model->video_link = json_encode($links);
            $model->save();
            Yii::$app->session->setFlash('success', "Успешно сохранено!");
            return $this->redirect('/admin');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing VideoIndex model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDelimage($img)
    {
        $arr = explode("|", base64_decode($img));
        $path = Yii::getAlias("@frontend") . '/web/images/' . $arr[0];
        @unlink($path);

        $model = $this->findModel($arr[1]);

        if ($arr[2] == 1) $model->images->img = "";


        $model->save();
        return $this->redirect(['update', 'id' => $model->id]);
    }

    /**
     * Finds the VideoIndex model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VideoIndex the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VideoIndex::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
