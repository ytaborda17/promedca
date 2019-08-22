<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cycle2.js'); 

Yii::app()->clientScript->registerScript('search', "
// redefine Cycle's updateActivePagerLink function 
	$.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) { 
		$(pager).find('li').removeClass('activeLI') .filter('li:eq('+currSlideIndex+')').addClass('activeLI'); 
	}; 
	$('.rotador-principal').cycle({ 
		fx: 'fade',
		speed: 300,
		pager:  '.nav',
		pagerAnchorBuilder: function(idx, slide) { 
			return '<li><a href=\"#\"><span class=\"invisible\">' + idx + '</span></a></li>'; 
		},
	});
");

?>
<div class="rotador-principal">
	<?php foreach ($archivos as $i => $file): ?>
		<?php echo CHtml::image($url.$file['pic'], "#".($i+1));?>
	<?php endforeach; ?>
</div>
<div class="nav"></div>
<hr class="separador"></hr>
<div class="contenedor-pasos">
	<div class="paso-1">
		<div class="paso-opaco">
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/index/pasos/1.jpg", "Solicitud" ); ?>
			<div class="sombra"></div>
		</div>
		<p>Haz un pedido proporcionando detalles especificos como: numero de parte, modelo, constructor, fotografia si esta disponible. </p>
	</div>
	<div class="paso-2">
		<div class="paso-opaco">
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/index/pasos/2.jpg", "Propuesta" ); ?>
			<div class="sombra"></div>
		</div>
		<p>Nosotros presentamos el presupuesto al cliente para ser aprobado. </p>
	</div>
	<div class="paso-3">
		<div class="paso-opaco">
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/index/pasos/3.jpg", "Verificar" ); ?>
			<div class="sombra"></div>
		</div>
		<p>El pago es recibido y procesado, agendando el envio segun las indicaciones del cliente. </p>
	</div>
</div>
<hr class="separador"></hr>
<div class="empresas">
	<h4 class="enfasis">SOCIOS ESTRATÉGICOS</h4><br><br>
	<a href="http://www.mac1global.com/system/?lang=es" target="_blank">
		<?php echo CHtml::image(
			Yii::app()->request->baseUrl."/assets/index/empresas/mac.png", 
			"MAC1", 
			array(
				'onmouseover'=>"this.src='".Yii::app()->request->baseUrl."/assets/index/empresas/mac-over.png';",
				'onmouseout'=>"this.src='".Yii::app()->request->baseUrl."/assets/index/empresas/mac.png';",
			)
		); ?>
	</a>
	<?php 
		/*echo CHtml::image(
			Yii::app()->request->baseUrl."/assets/index/empresas/suclinsa.png", 
			"MACI", 
			array(
				'onmouseover'=>"this.src='".Yii::app()->request->baseUrl."/assets/index/empresas/suclinsa-over.png';",
				'onmouseout'=>"this.src='".Yii::app()->request->baseUrl."/assets/index/empresas/suclinsa.png';",
			)
		);
		echo CHtml::image(
			Yii::app()->request->baseUrl."/assets/index/empresas/salud_equipos.png", 
			"MACI", 
			array(
				'onmouseover'=>"this.src='".Yii::app()->request->baseUrl."/assets/index/empresas/salud_equipos-over.png';",
				'onmouseout'=>"this.src='".Yii::app()->request->baseUrl."/assets/index/empresas/salud_equipos.png';",
			)
		);*/
	?>
</div>