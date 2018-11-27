<?php

namespace backend\controllers;

use backend\models\Store;
use Yii;
use backend\models\Product;
use backend\models\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        //  $prod = Product::findOne(2)->getProductDish()->with('idDish')->with('idProduct')->asArray()->all();

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $store = Store::find()->all();
        $model->advantages = implode(",",$_POST['Product']['advantages']);
        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            $model->imageDetail = UploadedFile::getInstance($model, 'imageDetail');

            $model->honors = UploadedFile::getInstance($model, 'honors');
            $model->instruction = UploadedFile::getInstance($model, 'instruction');
            $model->guarantee = UploadedFile::getInstance($model, 'guarantee');
            $model->recipies = UploadedFile::getInstance($model, 'recipies');


            $post = Yii::$app->request->post();


            //----------------------------------------------------------------------------

            $storlink = $post['Product']['shops'];
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

            $questions = $post['question'];
            $answer_quest = $post['answer_quest'];
            $question_ua = [];
            $question_ru = [];
            if ($questions != []) {
                if ($questions['ua'] != []) {
                    foreach ($questions['ua'] as $key => $question) {
                        if ($question == "") {
                            continue;
                        }
                        $question_ua[$key]['question_ua'] = $question;
                        if (isset($answer_quest['ua'][$key])) {
                            $question_ua[$key]['answer_quest_ua'] = $answer_quest['ua'][$key];
                        }
                    }
                }

                if ($questions != []) {
                    if ($questions['ru'] != []) {
                        foreach ($questions['ru'] as $key => $question) {
                            if ($question == "") {
                                continue;
                            }
                            $question_ru[$key]['question_ru'] = $question;
                            if (isset($answer_quest['ru'][$key])) {
                                $question_ru[$key]['answer_quest_ru'] = $answer_quest['ru'][$key];
                            }
                        }
                    }
                }
            }

            $model->questions_ua = json_encode($question_ua);
            $model->questions_ru = json_encode($question_ru);

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'store' => $store,

            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->advantages = explode(',', $model->advantages);
        if ($model->load(Yii::$app->request->post())) {

            $model->advantages = implode(",",$_POST['Product']['advantages']);

            $model->img = UploadedFile::getInstance($model, 'img');
            $model->imageDetail = UploadedFile::getInstance($model, 'imageDetail');
            $model->honors = UploadedFile::getInstance($model, 'honors');
            $model->instruction = UploadedFile::getInstance($model, 'instruction');
            $model->guarantee = UploadedFile::getInstance($model, 'guarantee');
            $model->recipies = UploadedFile::getInstance($model, 'recipies');
            $post = Yii::$app->request->post();
//----------------------------------------------------------------------------


            $storlink = $post['Product']['shops'];
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


            $questions = $post['question'];
            $answer_quest = $post['answer_quest'];
            $question_ua = [];
            $question_ru = [];
            if ($questions != []) {
                if ($questions['ua'] != []) {
                    foreach ($questions['ua'] as $key => $question) {
                        if ($question == "") {
                            continue;
                        }
                        $question_ua[$key]['question_ua'] = $question;
                        if (isset($answer_quest['ua'][$key])) {
                            $question_ua[$key]['answer_quest_ua'] = $answer_quest['ua'][$key];
                        }
                    }
                }

                if ($questions != []) {
                    if ($questions['ru'] != []) {
                        foreach ($questions['ru'] as $key => $question) {
                            if ($question == "") {
                                continue;
                            }
                            $question_ru[$key]['question_ru'] = $question;
                            if (isset($answer_quest['ru'][$key])) {
                                $question_ru[$key]['answer_quest_ru'] = $answer_quest['ru'][$key];
                            }
                        }
                    }
                }
            }

            $model->questions_ua = json_encode($question_ua);
            $model->questions_ru = json_encode($question_ru);


            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $store = Store::find()->all();
            return $this->render('update', [
                'model' => $model,
                'store' => $store,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
        if ($arr[2] == 2) {
            $res = [];
            foreach ($model->images->imageDetail as $item) {
                if ($item != $arr[0]) $res[] = $item;
            }
            $model->images->imageDetail = $res;
        }
        if ($arr[2] == 3) $model->images->honors = "";
        if ($arr[2] == 4) $model->images->recipies = "";
        if ($arr[2] == 5) $model->images->guarantee = "";
        if ($arr[2] == 6) $model->images->instruction = "";


        $model->save();
        return $this->redirect(['update', 'id' => $model->id]);
    }


    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
