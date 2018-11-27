<?php

namespace backend\controllers;

use backend\models\Store;
use Yii;
use backend\models\Offers;
use backend\models\search\OffersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OffersController implements the CRUD actions for Offers model.
 */
class OffersController extends Controller
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
     * Lists all Offers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OffersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Offers model.
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
     * Creates a new Offers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Offers();
        if ($model->load(Yii::$app->request->post())) {
            //----------------------------------------------------------------------------
            $post = Yii::$app->request->post();
            $storlink = $post['Offers']['shops'];
            $stack = [];
            foreach ($storlink as $k => $v) {
                if (!empty($v)) {
                    $store = Store::findOne(['id' => $k]);
                    $stack += [$k => [
                        'id' => $k,
                        'title' => $store->name,
                        'image' => $store->images->logo_store,
                        'link' => $v,
                    ],
                    ];

                }
            }
            $stack = json_encode($stack);
            $model->storlink = $stack;

//----------------------------------------------------------------------------
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Offers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //----------------------------------------------------------------------------
            $post = Yii::$app->request->post();
            $storlink = $post['Offers']['shops'];
            $stack = [];
            foreach ($storlink as $k => $v) {
                if (!empty($v)) {
                    $store = Store::findOne(['id' => $k]);
                    $stack += [$k => [
                        'id' => $k,
                        'title' => $store->name,
                        'image' => $store->images->logo_store,
                        'link' => $v,
                    ],
                    ];

                }
            }
            $stack = json_encode($stack);
            $model->storlink = $stack;

//----------------------------------------------------------------------------
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Offers model.
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
        $path = Yii::getAlias("@frontend") .'/web/images/' . $arr[0];
        @unlink($path);

        $model = $this->findModel($arr[1]);

        if($arr[2]==1) $model->images->img = "";



        $model->save();
        return $this->redirect(['update', 'id' => $model->id]);
    }

    /**
     * Finds the Offers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
