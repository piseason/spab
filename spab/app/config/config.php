<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'  => 'Mysql',
		'host'     => 'localhost',
		'username' => 'leonardo',
		'password' => '123456',
		'name'     => 'spab',
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'viewsDir'       => __DIR__ . '/../../app/views/',
		'pluginsDir'     => __DIR__ . '/../../app/plugins/',
		'libraryDir'     => __DIR__ . '/../../app/library/',
		'baseUri'        => '/',
	),
	'cache' => array(
		'voltCacheDir' => __DIR__ . '/../../cache/volt/'
	),
	'models' => array(
		'metadata' => array(
			'adapter' => 'Memory'
		)
	)
));
