<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'mysql:host=localhost;dbname=promedca_site',
	// datos de produccion
	/*'username'         => 'promedca_admin',
	'password'         => '~$I4Nz=FsI{X',*/
	// datos para site.ytaborda.com
	/*'connectionString' => 'mysql:host=localhost;dbname=ytaborda_promedcasite',
	'username'         => 'ytaborda_site',
	'password'         => '!8Zn!v=ZTXCv',*/
	// datos para pruebas
	'username'         => 'root',
	'password'         => '',
	
	'class'            => 'CDbConnection',
	'emulatePrepare'   => true,
	'charset'          => 'utf8',
);