<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Список';
?>

<h1><?= CHtml::encode($this->pageTitle); ?></h1>

<p><?= CHtml::link('Создать картинку', ['/site/create']); ?></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'image-ar-grid',
    'dataProvider' => $dataProvider,
    'columns'=>array(
        'id',
        'name',
		[
			'name' => 'filename',
			'value' => 'CHtml::image($data->getImage(), "", ["width" => 100])',
			'type' => 'html',
		],
        'created_at',
        'updated_at',
        [
			'class' => 'CButtonColumn',
			'template' => '{view} {update}'
		]
    ),
)); ?>