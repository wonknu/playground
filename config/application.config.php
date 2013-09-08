<?php
return array(
    'modules' => array(
    	'DoctrineModule',
    	'DoctrineORMModule',
    	'DoctrineDataFixtureModule',
		'ZendDeveloperTools',
        'Jhu\ZdtLoggerModule',
    	'AsseticBundle',
		'ZfcBase',
        'ZfcUser',
    	'BjyAuthorize',
    	'PlaygroundCore',
        'PlaygroundFaq',
		'PlaygroundUser',
    	'PlaygroundCms',
		'PlaygroundReward',
    	'PlaygroundGame',
        'PlaygroundPartnership',
        'PlaygroundFacebook',
    	'PlaygroundFlow',
    	'PlaygroundStats',
   		'Application',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
        	'./module',
            './vendor',
        ),
    ),
);
