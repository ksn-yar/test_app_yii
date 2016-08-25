<?php

/**
 * Проверка пароля
 */
class CheckPassF extends CFormModel
{
	public $password;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return array(
			array('password', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password' => 'Пароль',
		);
	}

	/**
	 *
	 * @param ImageAR $model
	 */
	public function check($model)
	{
		$pass= Yii::app()->securityManager->hashData($this->password);
	
		if ( $pass != $model->password ) {
			$this->addError('password','Incorrect username or password.');
			return false;
		}

		return true;
	}
}
