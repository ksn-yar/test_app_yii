 <?php
/* @var $this SiteController */
/* @var $model ImageAR */
/* @var $form CActiveForm */

$this->pageTitle = (( $model->isNewRecord ) ? 'Создать' : 'Изменить') . ' картинку';
?>

<h1><?= CHtml::encode($this->pageTitle); ?></h1>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'image-edit-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => false,
		'clientOptions' => array(
			'validationUrl' => '/site/performajaxvalidation',
			'validateOnSubmit' => true,
			'validateOnChange' => false,
			'beforeValidate' => 'js:function(form){ beforeValidateEditImage(form); return true; }',
		),
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::hiddenField('dummy', ( $model->isNewRecord ) ? null : $model->getImage(), ['id' => 'js_id_edit_img_src']); ?>
		<?php echo $form->hiddenField($model,'image_file'); ?>
		<div class="canvas_place">
			<canvas id="js_id_canvas" class="edit_canvas" width="500" height="300"></canvas>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repeat_password'); ?>
		<?php echo $form->passwordField($model,'repeat_password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'repeat_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>