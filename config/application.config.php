<?php
return array(
    'modules' => array(
        'Application',
    	'DoctrineModule',
    	'DoctrineORMModule',
    	'DoctrineDataFixtureModule',
		'ZendDeveloperTools',
        'Jhu\ZdtLoggerModule',
		'ZfcBase',
        'ZfcUser',
    	'BjyAuthorize',
    	'ZfcAdmin',
    	'AdfabCore',
        'AdfabFaq',
		'AdfabUser',
    	'AdfabCms',
		'AdfabReward',
    	'AdfabGame',
        'AdfabPartnership',
        'AdfabFacebook',
    	'AdfabFlow'
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
