<?php
$fwPath = preg_replace('/\W\w+\s*(\W*)$/', '$1', dirname(__FILE__).DIRECTORY_SEPARATOR);

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'          =>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'              =>'Productos Médicos C.A.',
	'theme'             =>'promedca',
	// 'sourceLanguage'    =>'es', 	//language for messages and views
	'language'          =>'es', 	// user language (for Locale)
	'charset'           =>'utf-8',	// charset to use
	'defaultController' =>'site',
	'preload'           =>array('log'), // preloading 'log' component
	'timeZone'          =>'America/Caracas',
	'behaviors'         =>array(
		'class'=>'application.components.RegisterVisitor',
	),

	'import'=>array( // autoloading model and component classes
		'application.models.*',
		'application.components.*',
		'application.extensions.YiiMailer.*',
	),

	'modules'=>array(
		/*'gii'=>array( // uncomment the following to enable the Gii tool
			'class'     =>'system.gii.GiiModule',
			'password'  =>'LVdEOqBFr8',
			'ipFilters' =>array('127.0.0.1','::1'), // If removed, Gii defaults to localhost only. Edit carefully to taste.
		),*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true, // enable cookie-based authentication
		),
		'urlManager'=>array( // uncomment the following to enable URLs in path-format
			'class'=>'ext.seoUrlManager.components.ExtSeoUrlManager',
			// 'wwwMode'=>'strip',
			'urlFormat'      =>'path',
			'showScriptName' =>false,
			'urlSuffix'      =>'',
			'rules'=>array(
				''=>'site/index',
				'<action:[\w\-]+>' => 'site/<action>',
				'productos/catalogo' => 'site/productosCatalogo',
				'productos/<title:[\w\-]+>' => 'site/productosDetalle',
			),
		),
		'db'=>require(dirname(__FILE__).'/database.php'), // database settings are configured in database.php
		'errorHandler'=>array(
			'errorAction'=>'site/error', // use 'site/error' action to display errors
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	'params'=>array( // application-level parameters that can be accessed using Yii::app()->params['paramName']
		'adminEmail' => 'info@pmedicalgroup.com', // this is used in contact page
		'dominio'    => 'http://promedca.com/',
		'sitio'      => 'promedca',
		'moneda'     => 'Bs.',
		'theme'      => 'promedca',
		'fwPath'     => preg_replace('/\W\w+\s*(\W*)$/', '$1', $fwPath),
		'baseDir'    => $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['REQUEST_URI']),
		'visitorRegistration' => true, // cambiar a true al instalar en el servidor de produccion
	),
);