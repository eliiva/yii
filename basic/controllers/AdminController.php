<?php

namespace app\controllers;
use Yii;
use app\models\LoginForm;
use app\models\User;
use app\models\News;
use yii\data\ActiveDataProvider;
use yii\widgets\DetailView;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$dataProvider = new ActiveDataProvider([
				'query' => News::find(),
				'pagination' => [
					'pageSize' => 4,
				],
			]);
			return $this->render('index', [
				'data' => $dataProvider,
			]);
    }
	
	public function actionCreate()
    {
        $model = new News();
     //   $model->date = date('d.m.Y',now());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $image = new UploadImage();
            $image->image = UploadedFile::getInstance($model, 'img');

            if ($image->image) {
                $model->img = "{$image->image->baseName}.{$image->image->extension}";
                $image->upload();
            }
           
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	//    public function actionAbout()
    //{
    //    return $this->render('about');
    //}
	//
	//    public function actionLogin()
    //{
	//	//if (Yii::$app->request->post()) {
	//	//	echo '<pre>';
	//	//	print_r(Yii::$app->request->post());
	//	//	echo '</pre>';
	//	//	Yii::$app->end();
	//	//}
	//	
	//	if (!Yii::$app->user->isGuest) {
	//		return $this->goHome();
	//	}
	//
	//	$model = new LoginForm();
	//	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	//		if ($model->login())
	//			return $this->goBack();
	//		else {
	//			Yii::$app->session->setFlash('error', 'Возникла ошибка при авторизации');
	//			Yii::error('ошибка при регистрации');
	//			return $this->refresh();
	//		}
	//	}
    //    return $this->render('login', ['model' => $model]);
    //}
	//public function actionLogout() {
	//	Yii::$app->user->logout();
	//	return $this->goHome();
	//}
	//
	//public function actionNews($id = 0) {
	//	if (!$id) {
	//		$dataProvider = new ActiveDataProvider([
	//			'query' => News::find()
	//				->where(['del_flag' => 0]),
	//			'pagination' => [
	//				'pageSize' => 4,
	//			],
	//		]);
	//		return $this->render('news', [
	//			'data' => $dataProvider,
	//		]);
	//	}
	//	
	//	else {
	//		$model = News::find()->where(['id' => $id])->one();
	//		
	//		return $this->render('onenews', [
	//			'model'=>$model,
	//		]);
	//		//$model = new ActiveDataProvider([
	//		//	'query' => News::find()
	//		//		->where(['id' => $id]),
	//		//]);
	//		//return $this->render('onenews', [
	//		//	'model' => $model,
	//		//]);
	//	}
	//}
}
