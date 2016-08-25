<?php
/* @var $this SiteController */
/* @var $model CheckPassF */
/* @var $form CActiveForm  */

$this->pageTitle = '';
?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->telField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
