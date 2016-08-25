<?php

/**
 * 
 */
class SiteController extends Controller
{
	/**
	 * Список картинок
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('ImageBaseAR');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new ImageAR();

		if ( isset($_POST['ImageAR']) ) {

			$model->setAttributes($_POST['ImageAR']);
			
			if( $model->save() ) {
				$this->redirect(array('view','id' => $model->id));
			}
		}

		$this->render('edit', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		$access = $this->checkAccess($model);

		if ( $access !== true ) {
			return $access;
		}

		if ( isset($_POST['ImageAR']) ) {

			$model->setAttributes($_POST['ImageAR']);

			if( $model->save() ) {
				$this->redirect(array('view','id' => $model->id));
			}
		}

		$this->render('edit', array(
			'model' => $model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ImageBaseAR the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = ImageAR::model()->findByPk($id);

		if ( $model === null ) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ImageAR $model the model to be validated
	 */
	public function actionPerformAjaxValidation()
	{
		if ( isset($_POST['ImageAR']) && Yii::app()->request->isAjaxRequest ) {

			$model = new ImageAR();
			$model->setAttributes($_POST['ImageAR']);

			echo CActiveForm::validate($model);
		} else {
			throw new CHttpException(404);
		}
	}

	/**
	 * Проверка права доступа к редактированию
	 * @param ImageAR $model
	 */
	public function checkAccess($model)
	{
		// доступ есть, ничего не делаем
		if ( Yii::app()->session->get('access_granted_update_image') && Yii::app()->session->get('access_granted_update_image') == $model->id ) {
			return true;
		}

		// нету доступа, отображаем форму для ввода пароля
		$form = new CheckPassF();

		if ( isset($_POST['CheckPassF']) ) {

			$form->setAttributes($_POST['CheckPassF']);

			if ( $form->validate() && $form->check($model) ) {
				Yii::app()->session->add('access_granted_update_image', $model->id);
				$this->redirect(array('update', 'id' => $model->id));
			}
		}

		return $this->render('pass', array(
			'model' => $form,
		));
	}
}