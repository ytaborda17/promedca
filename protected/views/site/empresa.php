<?php

/* @var $this SiteController */

$this->pageTitle= 'Empresa';
?>
<h1 class="invisible">Empresa</h1>

<div class="span50 go-left">
	<?php foreach ($empresa['base'] as $data): ?>
		<?php echo $this->tituloEmpresa($data['titulo']) ;?>
		<br class="f10">
		<p class="justify"><?php echo nl2br($data['descripcion']) ;?></p>
		<br>
		<br>
	<?php endforeach; ?>
	<h4 class="enfasis">FILOSOFIA DE LA EMPRESA</h4>
	<br>
	<br>
	<?php foreach ($empresa['filosofia'] as $data): ?>
		<h2><?php echo $this->tituloEmpresa($data['titulo']) ;?></h2>
		<br class="f10">
		<p class="justify"><?php echo nl2br($data['descripcion']) ;?></p>
		<br>
		<br>
	<?php endforeach; ?>
	<br>
	<br>
	<br>
</div>
<div class="span50 go-right">
	<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/empresa/empresa.jpg", "Verificar",array('class'=> 'img-empresa') ); ?>
</div>
