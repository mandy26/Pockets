<?php

return array(
	'components' => array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=pockets',
			'emulatePrepare' => true,
			'charset' => 'utf8',
		),
		'format' => array(
			'dateFormat' => 'n/j/Y',
		),
	),
);