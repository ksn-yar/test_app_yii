<?php
/* @var $this ImageARController */
/* @var $model ImageAR */

$this->pageTitle = 'Картинка' . $model->name;
?>

<h1>Картинка "<?= CHtml::encode($this->pageTitle); ?>"</h1>

<p><?= CHtml::link('Изменить картинку', ['/site/update', 'id' => $model->id]); ?></p>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'name',
		[
			'label' => 'filename',
			'type' => 'html',
			'value' => CHtml::image($model->getImage()),
		],
        'created_at',
        'updated_at',
    ),
)); ?>