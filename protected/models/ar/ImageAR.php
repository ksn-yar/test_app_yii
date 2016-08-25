<?php

/**
 * @inheritdoc
 *
 */
class ImageAR extends ImageBaseAR
{
	const IMAGE_EXT = 'png';


	/** @var mixed Description */
	public $image_file;
	/** @var string Повтор пароля */
	public $repeat_password;

	protected $_old_attr;

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		$attr = parent::attributeLabels();
		
		$new_attr = [
			'repeat_password'	=> 'Повтор пароля',
			'image_file'		=> 'Файл',
		];
		
		return CMap::mergeArray($attr, $new_attr);
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		$rules = parent::rules();

		$new_rules = [
			['image_file', 'required'],
			['image_file', 'validateImageFile'],
			['repeat_password', 'required'],
			['password', 'compare', 'compareAttribute' => 'repeat_password'],
		];

		return CMap::mergeArray($rules, $new_rules);
	}

	/**
	 * Валидация картинки
	 * @param type $attribute
	 */
	public function validateImageFile($attribute)
	{
//		$this->addError($attribute, 'your password is not strong enough!');
	}

	/**
	 * @inheritdoc
	 */
	public function setAttributes($values, $safeOnly = true)
	{
		parent::setAttributes($values, $safeOnly);

		$this->filename = ( $this->isNewRecord ) ? $this->generateFilename() : $this->filename;

		if ( isset($values['image_file']) ) {
			$this->prepareImage($values['image_file']);
		}

	}

	/**
	 * @inheritdoc
	 */
	protected function beforeSave()
	{
		$parent = parent::beforeSave();

		if ( ! $parent ) {
			return false;
		}

		if ( $this->isNewRecord ) {
			$this->password = Yii::app()->securityManager->hashData($this->password);
		} else {
			// пароль не меняли
			if ( $this->_old_attr['password'] == $this->password ) {
				// унижтожаем
				unset($this->password);
			} else {
				$this->password = Yii::app()->securityManager->hashData($this->password);
			}
		}

		//@todo нужно добавить проверку сохранения картинки, так же надо добавить при изменении записи сравнение картинок,
		// что бы не пересохранять одно и тоже
		file_put_contents(Yii::getPathOfAlias('abs_data') .'/'. $this->filename, $this->image_file);

		return true;
	}

	/**
	 * @inheritdoc
	 */
	protected function afterFind()
	{
		$this->_old_attr = $this->attributes;

		$this->repeat_password = $this->password;

//		$this->image_file = base64_encode(file_get_contents(Yii::getPathOfAlias('abs_data') .'/'. $this->filename));
		
		parent::afterFind();
	}

	/**
	 * @inheritdoc
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Подготавливаем картинку, данные приходят: data:image/png;base64,iVBORw0......
	 * @param string $data
	 */
	public function prepareImage($data)
	{
		$filtered = explode(',', $data);

		if ( isset($filtered[1]) ) {
			$this->image_file = base64_decode($filtered[1]);
		}
	}

	/**
	 * Генерим имя файла, только буквы, числа и дефис
	 * @return string
	 */
	public function generateFilename()
	{
		$str = Yii::app()->securityManager->generateRandomString(30);
		$str = preg_replace('/[^0-9a-zA-z]/', '-', $str);
		return $str .'.'. self::IMAGE_EXT;
	}
}