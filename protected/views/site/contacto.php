<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle= 'Contacto';

?>

<div class="span50 go-left">
	<h1 class="title">CONTACTO</h1>
	<br class="f10">
	<p class="justify">
		Para nosotros es un placer atenderte. Por eso, te ofrecemos estos medios para responder a cada una de tus solicitudes de la manera que más rápida y eficaz.
	</p>
	<br>
	<br>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
			<?php if ( ($msgs =Yii::app()->user->getFlashes())!==null ): ?>
				<?php foreach ($msgs as $type => $message): ?>
					<div class="alert alert-<?php echo $type ;?>">
						<button type="button" class="close" data-dismiss="alert" onclick="$(this).parent().slideUp(200, function(){ $(this).remove(); });">&times;</button>
						<span>
							<h6><?php echo "¡".ucfirst($type=="exito" ? "Mensaje enviado" : $type)."!" ;?></h6>
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
					<?php echo $form->labelEx($model,'telefono'); ?>
					<?php // echo $form->textField($model,'telefono'); ?>
					<?php $this->widget('CMaskedTextField', array(
						'model' => $model,
						'attribute' => 'telefono',
						'mask' => '+99 999 999 9999',
					)); ?>
					<span class="light-error"><?php echo $form->error($model,'telefono'); ?></span>
					<div class="hint">Ingrese el código de país y ciudad.</div>
				</div>
				<br>
				<div class="row">
					<?php echo $form->labelEx($model,'ciudad'); ?>
					<?php echo $form->textField($model,'ciudad'); ?>
					<span class="light-error"><?php echo $form->error($model,'ciudad'); ?></span>
				</div>
				<br>
				<div class="row">
					<?php echo $form->labelEx($model,'pais'); ?>
					<?php echo $form->textField($model,'pais'); ?>
					<span class="light-error"><?php echo $form->error($model,'pais'); ?></span>
				</div>
				<br>
				<div class="row">
					<?php echo $form->labelEx($model,'body'); ?>
					<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
					<span class="light-error"><?php echo $form->error($model,'body'); ?></span>
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
			<?php //endif; ?>
			<br>
			<br>
			<br>
		<?php $this->endWidget(); ?>
	</div>
</div>
<div class="span50 go-right img-contacto">
	<?php $dir = array_diff( scandir(Yii::app()->params['baseDir'].'/assets/contacto/'), array('..', '.') ); ?>
	<?php foreach ($dir as $i => $file): ?>
		<?php if ( substr($file,strlen($file)-3,3)=="jpg" || substr($file,strlen($file)-3,3)=="jpeg" || substr($file,strlen($file)-3,3)=="png" || substr($file,strlen($file)-3,3)=="gif" ) : ?>
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/contacto/".$file, "#".($i+1));?>
			<br>
			<br>
		<?php endif; ?>
	<?php endforeach; ?>
	<br>
	<br>
	<table border="0" cellspacing="0" cellpadding="10" class="datos-contacto">
		<tr>
			<td align="center" valign="middle" width="40px" height="40px">
				<div class="contacto-direccion"></div>
			</td>
			<td align="left" valign="middle">
				<?php echo Yii::app()->session['init-empresa']['direccion'] ;?><br>
			</td>
		</tr>
			<td align="center" valign="middle" width="40px" height="40px">
				<div class="contacto-telefonos"></div>
			</td>
			<td align="left" valign="middle">
				<?php echo Yii::app()->session['init-telefonos']['telefonos'] ;?><br>
			</td>
		</tr>
			<td align="center" valign="middle" width="40px" height="40px">
				<div class="contacto-twitter"></div>
			</td>
			<td align="left" valign="middle">
				<a href="https://twitter.com/<?php echo $twitter['user'] ;?>" target="_blank"><?php echo "@".$twitter['user'] ;?></a><br>
			</td>
		</tr>
	</table>
</div>