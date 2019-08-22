<?php
/* @var $this SiteController */
/* @var $model ServiciosForm */
/* @var $form CActiveForm */

$this->pageTitle='Servicios';

Yii::app()->clientScript->registerScript('search', "
	$('input.MultiFile-applied').wrap('<div class=\"file-upload\"></div>').before('<span class=\"icon16 iconUpload\"></span>');
");

?>

<div class="span50 go-left">
	<?php foreach ($servicios as $i => $data): ?>
		<h1 class="invisible">Servicios</h1>
		<h2 class="titulo"><?php echo strtoupper($data['titulo']) ;?></h2>
		<br class="f10">
		<p class="justify"><?php echo nl2br($data['descripcion']) ;?></p>
		<br>
		<br>
	<?php endforeach; ?>

	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'service-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
			),
		)); ?>
			<?php if ( ($msgs =Yii::app()->user->getFlashes())!==null ): ?>
				<?php foreach ($msgs as $type => $message): ?>
					<div class="alert alert-<?php echo $type ;?>">
						<button type="button" class="close" data-dismiss="alert" onclick="$(this).parent().slideUp(200, function(){ $(this).remove(); });">&times;</button>
						<span>
							<h6><?php echo "¡".($type=="exito" ? "Mensaje enviado" : $type)."!" ;?></h6>
							<?php echo $message ;?>
						</span>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			<div class="row">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name'); ?>
				<span class="light-error"><?php echo $form->error($model,'name'); ?></span>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email'); ?>
				<span class="light-error"><?php echo $form->error($model,'email'); ?></span>
			</div>
			<br>

			<div class="row">
				<?php echo $form->labelEx($model,'parte'); ?>
				<?php echo $form->textField($model,'parte'); ?>
				<span class="light-error"><?php echo $form->error($model,'parte'); ?></span>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'modelo'); ?>
				<?php echo $form->textField($model,'modelo'); ?>
				<span class="light-error"><?php echo $form->error($model,'modelo'); ?></span>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'serial'); ?>
				<?php echo $form->textField($model,'serial'); ?>
				<span class="light-error"><?php echo $form->error($model,'serial'); ?></span>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'fabricante'); ?>
				<?php echo $form->textField($model,'fabricante'); ?>
				<span class="light-error"><?php echo $form->error($model,'fabricante'); ?></span>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'body'); ?>
				<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
				<span class="light-error"><?php echo $form->error($model,'body'); ?></span>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'file'); ?>
				<?php $this->widget('CMultiFileUpload', array(
						'attribute' => 'files',
						'name'      => 'file',
						'accept'    => 'jpg|jpeg|gif|png|pdf|doc|docx|ppt|pptx', 
						'denied'    => 'Archivos permitidos: jpg, jpeg, gif, png, pdf, doc, docx, ppt, pptx.', 
						'remove'    => '<span class="times txt-hover">&times;</span>',
						'max'			=> 1,
						'options'=>array(
							'onFileSelect'=>'function(e, v ,m){
								var fileSize = e.files[0].size;
								if ( fileSize > 5120*1024 ) { // 5MB
									alert("Tamaño máximo de archivo: 5MB.");
									return false;
								}
							}',
						)
				)); ?>
				<span class="light-error"><?php echo $form->error($model,'file'); ?></span>
			</div>
			<br>
			<?php if(CCaptcha::checkRequirements()): ?>
				<div class="row">
					<?php echo $form->labelEx($model,'verifyCode'); ?>
					<?php echo $form->textField($model,'verifyCode'); ?>
					<span class="light-error"><?php echo $form->error($model,'verifyCode'); ?></span>
					<div class="hint">
						Por favor ingrese las letras tal como se muestran en la imagen inferior.<br/>
						Las letras no son sensibles a mayúsculas o minúsculas.
					</div>
					<div class="captcha">
						<?php $this->widget('CCaptcha',array(
							'buttonLabel'=>'text',
							'buttonType'=>'button',
							'buttonOptions'=>array( 
								'type'=>'image',
								'src'=>Yii::app()->request->baseUrl.'/images/refresh-icon.png', 
								'class'=>'refresh-captcha',
								'title'=>'Nuevo código',
							)
						)) ;?>
					
					</div>
				</div>
			<?php endif; ?>
			<br>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Enviar'); ?>
			</div>
			<br>
			<br>
			<br>
		<?php $this->endWidget(); ?>
	</div>
</div>
<div class="span50 go-right img-servicios">
	<?php foreach ($galeria as $i => $pic): ; ?>
		<?php echo CHtml::image(
			Yii::app()->request->baseUrl."/assets/servicios/".$pic['pic0'], 
			$pic['titulo'], 
			array(
				'onmouseover'=>"this.src='".Yii::app()->request->baseUrl."/assets/servicios/".$pic['pic1']."';",
				'onmouseout'=>"this.src='".Yii::app()->request->baseUrl."/assets/servicios/".$pic['pic0']."';",
			)
		); ?>
	<?php endforeach; ?>
	<br>
	<br>
</div>