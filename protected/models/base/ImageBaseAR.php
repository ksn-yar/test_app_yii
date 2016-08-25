<?php

/**
 * Картинки, "images".
 *
 * @inheritdoc
 *
 */
class ImageBaseAR extends ImageGenAR
{
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return array(
			'id'			=> 'ID',
			'filename'		=> 'Имя файла',
			'name'			=> 'Название',
			'password'		=> 'Пароль',
			'created_at'	=> 'Создан',
			'updated_at'	=> 'Изменен',
		);
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return array(
			array('filename, name, password', 'required'),
			array('filename, name, password', 'length', 'max' => 255),
		);
	}

	/**
	 * @inheritdoc
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImage()
	{
		return YII::getPathOfAlias('rel_data') .'/'. $this->filename;
	}
}