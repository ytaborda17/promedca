<?php

/* @var $this SiteController */

$this->pageTitle= 'Productos';

?>
<h1 class="title">PRODUCTOS</h1>
<br>
<p>La siguiente es una lista de nuestros productos médicos con más amplia distribución en el país:</p>

<br>

<ul>
	<li><?php echo CHtml::link('Catalogo',array('productos/catalogo')); ?></li>
	<?php foreach ($productos as $i => $prod): ?>
		<li><?php echo CHtml::link($prod['label'],array('productos/'.$prod['url'])); ?></li>
	<?php endforeach; ?>
</ul>
