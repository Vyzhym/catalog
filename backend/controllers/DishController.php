<?php

namespace backend\controllers;

use Yii;
use backend\models\Dish;
use backend\models\search\DishSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DishController implements the CRUD actions for Dish model.
 */
class DishController extends Controller
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
     * Lists all Dish models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dish model.
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
     * Creates a new Dish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dish();
        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();

            $ingridients = $post['ingridient'];
            $count_ingr = $post['count_ingr'];

            $ingridient_ua = [];
            $ingridient_ru = [];
            if( $ingridients != []){
                if( $ingridients['ua'] != []){
                    foreach ( $ingridients['ua'] as $key=> $ingridient){
                        if( $ingridient == ""){
                            continue;
                        }
                        $ingridient_ua[$key]['ingridient_ua']=  $ingridient;
                        if(isset($count_ingr['ua'][$key])){
                            $ingridient_ua[$key]['count_ingr_ua']= $count_ingr['ua'][$key];
                        }
                    }
                }

                if( $ingridients != []) {
                    if( $ingridients['ru'] != []){
                        foreach ( $ingridients['ru'] as $key=> $ingridient){
                            if( $ingridient == ""){
                                continue;
                            }
                            $ingridient_ua[$key]['ingridient_ru']=  $ingridient;
                            if(isset($count_ingr['ru'][$key])){
                                $ingridient_ua[$key]['count_ingr_ru']= $count_ingr['ru'][$key];
                            }
                        }
                    }
                }
            }


            $model->ingridients_ua = json_encode($ingridient_ua);
            $model->ingridients_ru = json_encode($ingridient_ru);
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            $ingridients = $post['ingridient'];
            $count_ingr = $post['count_ingr'];
            $ingridient_ua = [];
            $ingridient_ru = [];
            if( $ingridients != []){
                if( $ingridients['ua'] != []){
                    foreach ( $ingridients['ua'] as $key=> $ingridient){
                        if( $ingridient == ""){
                            continue;
                        }
                        $ingridient_ua[$key]['ingridient_ua']=  $ingridient;
                        if(isset($count_ingr['ua'][$key])){
                            $ingridient_ua[$key]['count_ingr_ua']= $count_ingr['ua'][$key];
                        }
                    }
                }

                if( $ingridients != []) {
                    if( $ingridients['ru'] != []){
                        foreach ( $ingridients['ru'] as $key=> $ingridient){
                            if( $ingridient == ""){
                                continue;
                            }
                            $ingridient_ru[$key]['ingridient_ru']=  $ingridient;
                            if(isset($count_ingr['ru'][$key])){
                                $ingridient_ru[$key]['count_ingr_ru']= $count_ingr['ru'][$key];
                            }
                        }
                    }
                }
            }

            $model->ingridients_ua = json_encode($ingridient_ua);
            $model->ingridients_ru = json_encode($ingridient_ru);
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dish model.
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

        if($arr[2]==1) $model->images->image_dish = "";



        $model->save();
        return $this->redirect(['update', 'id' => $model->id]);
    }


    /**
     * Finds the Dish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dish::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
