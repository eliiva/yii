<?php

namespace app\controllers;
use Yii;
use app\models\LoginForm;
use app\models\User;
use app\models\News;
use yii\data\ActiveDataProvider;
use yii\widgets\DetailView;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

	    public function actionAbout()
    {
        return $this->render('about');
    }
	
	    public function actionLogin()
    {
		//if (Yii::$app->request->post()) {
		//	echo '<pre>';
		//	print_r(Yii::$app->request->post());
		//	echo '</pre>';
		//	Yii::$app->end();
		//}
		
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
	
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->login())
				return $this->goBack();
			else {
				Yii::$app->session->setFlash('error', 'Возникла ошибка при авторизации');
				Yii::error('ошибка при регистрации');
				return $this->refresh();
			}
		}
        return $this->render('login', ['model' => $model]);
    }
	public function actionLogout() {
		Yii::$app->user->logout();
		return $this->goHome();
	}
	
	public function actionNews($id = 0) {
		if (!$id) {
			$dataProvider = new ActiveDataProvider([
				'query' => News::find()
					->where(['del_flag' => 0]),
				'pagination' => [
					'pageSize' => 4,
				],
			]);
			return $this->render('news', [
				'data' => $dataProvider,
			]);
		}
		
		else {
			$model = News::find()->where(['id' => $id])->one();
			
			return $this->render('onenews', [
				'model'=>$model,
			]);
			//$model = new ActiveDataProvider([
			//	'query' => News::find()
			//		->where(['id' => $id]),
			//]);
			//return $this->render('onenews', [
			//	'model' => $model,
			//]);
		}
	}
}
