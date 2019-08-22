<?php

/* @var $this SiteController */

$this->pageTitle= 'Productos';
?>

<?php if (!empty($producto)): ?>
	<?php foreach ($producto as $i => $data): ?>
		<div class="span50 go-left">
			<h1 class="invisible"><?php echo $data['titulo'] ;?></h1>
			<?php echo $this->tituloProducto($data['titulo']) ;?>
			<h5>BIOLENE<sup class="marca-registrada">&reg;</sup></h5>
			<br>
			<br>
			<?php if(array_key_exists('izquierda', $data)) foreach ($data['izquierda'] as $j => $col): ?>
				<?php if ($col['titulo_atributo']!="-"): ?>
					<h5><?php echo $col['titulo_atributo'] ;?></h5>
					<br>
				<?php endif; ?>
				<?php if ($col['tipo']=="texto"): ?>
					<?php if ($col['lista']==1): ?>
						<?php $lista= explode("\r\n", nl2br($col['texto']));?>
						<ul class="lista">
							<?php foreach ($lista as $li): ?>
								<li><?php echo $li ;?></li>
							<?php endforeach; ?>
						</ul>
					<?php else: ?>
						<p><?php echo nl2br($col['texto']) ;?></p>
					<?php endif; ?>
					<br>
					<br>
				<?php else: ?>
					<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/productos/".$col['pic'], $col['titulo_atributo'],array('class'=> 'img-producto', 'title'=>$col['titulo_atributo'] =="-" ? "" : $col['titulo_atributo']) ); ;?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<div class="span50 go-right">
			<?php if(array_key_exists('derecha', $data)) foreach ($data['derecha'] as $j => $col): ?>
				<br>
				<?php if ($col['titulo_atributo']!="-"): ?>
					<br>
					<h4><?php echo $col['titulo_atributo'] ;?></h4>
					<br>
				<?php endif; ?>
				<?php if ($col['tipo']=="texto"): ?>
					<?php if ($col['lista']==1): ?>
						<?php $lista= explode("\r\n", ($col['texto']));?>
						<ul class="lista">
							<?php foreach ($lista as $li): ?>
								<li><?php echo $li ;?></li>
							<?php endforeach; ?>
						</ul>
					<?php else: ?>
						<p><?php echo nl2br($col['texto']) ;?></p>
						<br>
					<?php endif; ?>
				<?php else: ?>
					<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/productos/".$col['pic'], $col['titulo_atributo'],array('class'=> 'img-producto', 'title'=>$col['titulo_atributo'] =="-" ? "" : $col['titulo_atributo']) ); ;?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<div class="span100 go-center">
			<br>
			<?php if(array_key_exists('centro', $data)) foreach ($data['centro'] as $j => $col): ?>
				<?php if ($col['titulo_atributo']!="-"): ?>
					<br>
					<h4><?php echo $col['titulo_atributo'] ;?></h4>
					<br>
				<?php endif; ?>
				<?php if ($col['tipo']=="texto"): ?>
					<?php if ($col['lista']==1): ?>
						<?php $lista= explode("\r\n", ($col['texto']));?>
						<ul class="lista">
							<?php foreach ($lista as $li): ?>
								<li><?php echo $li ;?></li>
							<?php endforeach; ?>
						</ul>
					<?php else: ?>
						<p><?php echo nl2br($col['texto']) ;?></p>
						<br>
					<?php endif; ?>
				<?php else: ?>
					<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/productos/".$col['pic'], $col['titulo_atributo'],array('class'=> 'img-producto', 'title'=>$col['titulo_atributo'] =="-" ? "" : $col['titulo_atributo']) ); ;?>
				<?php endif; ?>
			<?php endforeach; ?>
			<br>
			<br>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<h1 class="title">PRODUCTOS</h1>
	<br>
	En contrucción...
<?php endif; ?>
