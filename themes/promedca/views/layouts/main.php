<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo CHtml::decode($this->pageTitle); ?></title>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
</head>
<body>
	<div class="bgFix"></div>
	<div class="banner">
		<div id="header">
			<?php echo CHtml::link('', Yii::app()->getBaseUrl(true), array('id' => 'logo','title'=>'Inicio')); ?>
			<?php // echo CHtml::image(Yii::app()->theme->baseUrl."/img/medical_group.png", "", array('id' => 'logo2')); ?>
		</div><!-- header-->
	</div>
	<div id="page">
		<dis id="wrap">
			<div id="main">
				<div id="mainMenu">
						<?php
							$this->widget('zii.widgets.CMenu', array(
								'items' => Yii::app()->session['init-menuItems'], 
								'activeCssClass'=>'active',
							));
						?>
				</div><!-- mainmenu -->
				<div id="mainContent">
					<?php echo $content; ?>
				</div>
			</div>
		</div><!-- page -->
		<div id="footer">
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/assets/global/logo-footer.png", "" ); ?>
			<div class="footAddress">
				<?php 
				$n = count( explode(', ', Yii::app()->session['init-telefonos']['telefonos']) )
				?>
				<?php echo Yii::app()->session['init-empresa']['direccion'].( $n>1 ? "Teléfonos: ": "Teléfono: " ).Yii::app()->session['init-telefonos']['telefonos'] ;?><br>
				<?php echo Yii::app()->session['init-empresa']['nombre_legal']." ".Yii::app()->session['init-empresa']['rif'] ;?> &copy; 2014 Todos los derechos reservados.
			</div>
		</div><!-- footer -->
	</div>
</body>
</html>
