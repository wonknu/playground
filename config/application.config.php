<?php
return array(
    'modules' => array(
    	'DoctrineModule',
    	'DoctrineORMModule',
    	'DoctrineDataFixtureModule',
        //'OcraCachedViewResolver',
		'ZendDeveloperTools',
        'Jhu\ZdtLoggerModule',
        'PlaygroundTemplateHint',
    	'AsseticBundle',
		'ZfcBase',
        'ZfcUser',
    	'BjyAuthorize',
    	'PlaygroundCore',
        'PlaygroundDesign',
        'PlaygroundFaq',
		'PlaygroundUser',
    	'PlaygroundCms',
		'PlaygroundReward',
    	'PlaygroundGame',
        'PlaygroundPartnership',
        'PlaygroundFacebook',
    	'PlaygroundFlow',
    	'PlaygroundStats',
        'PlaygroundTranslate',
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
        'config_cache_enabled' => false,
        
        // The key used to create the configuration cache file name.
        'config_cache_key' => 'playground_config',
        
        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        'module_map_cache_enabled' => false,
        
        // The key used to create the class map cache file name.
        'module_map_cache_key' => 'playground_map',
        
        // The path in which to cache merged configuration.
        'cache_dir' => './data/cache',
    ),
);
