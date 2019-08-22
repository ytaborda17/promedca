<?php $this->beginContent('//layouts/main'); 
/*$promos = Yii::app()->db->createCommand()
	->select("precio, concat(id,pic) as imagen")
	->from("promociones")
	->where("activo=1")
	->order("id asc")
	->queryAll()
;
// $promocion['precio']!="" ? number_format($promocion['precio'],2,",",".") : ""*/
?>
<div class="container">
	<div class="column1">
		<div class="rotar-promos">
			<?php foreach ($promos as $i => $promocion): ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl."/resources/promociones/".$promocion['imagen'], "Promoción #".($i+1));?>
			<?php endforeach; ?>
		</div><!-- promociones -->
		<div class="enfasis noSlct">PROMOCIONES</div>
   	<div class="nav"></div>
   	<div class="span50"><div class="logoSpa"></div></div>
   	<div class="span50"><div class="logoMedCasa" style="margin-leftt:10px;border-left:2px #812780 solid;"></div></div>
	</div>
	<div class="column2 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
