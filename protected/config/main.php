<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(require(dirname(__FILE__).DIRECTORY_SEPARATOR.'common.php'), array(
	'defaultController' => 'dashboard',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'caseSensitive' => false,        
		),
		'errorHandler'=>array(
			'errorAction'=>'dashboard/error',
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
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'defaultScriptFilePosition' => CClientScript::POS_END,
			'packages' => array(
				'jquery.ui.css' => array(
					'css' => array('jui/css/base/jquery-ui.css'),
				),
				'datepicker' => array(
					'depends' => array('jquery.ui', 'jquery.ui.css'),
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
	),

), require(dirname(__FILE__).DIRECTORY_SEPARATOR.'private.php'));