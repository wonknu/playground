<?php
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/frontend/default/base/assets',
				),
			    'collections' => array(
                    'head_frontend_js' => array(
                        'assets' => array(
                            'loader.js' => 'js/loader.js',
                            'popin.js' => 'js/popin.js',
                            'dz.min.js' => 'js/lib/dz.min.js',
                            'sniffer.js' => 'js/sniffer.js',
                            'functions.js' => 'js/functions.js',
                            'script.js' => 'js/script.js',
                            'users.js' => 'js/users.js',
                            'share.js' => 'js/share.js',
                            'games.js' => 'js/games.js',
                        ),
                        'filters' => array(),
                        'options' => array(
                            'output' => 'frontend/js/head_main',
                        ),
                    ),
			        'head_frontendplayground_js' => array(
			            'assets' => array(
			                'js/lib/easyxdm/easyxdm.min.js',
			                'js/lib/playground/pattern.js',
			                'js/lib/playground/user.js',
			                'js/lib/playground/app.js',
			            ),
			            'filters' => array(),
			        ),

                    'frontend_images' => array(
                        'assets' => array(
                            'images/**/*.png',
                            'images/**/*.jpg',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'frontend',
                        )
                    ),
	                'frontend_css' => array(
	                    'assets' => array(
	                        'css/base.css'
	                    ),
	                    'options' => array(
	                        'output' => 'frontend/css/base'
	                    )
	                ),
                ),
			),
		),
        'routes' => array(
            'frontend.*' => array(
                '@frontend_css' => '@frontend_css',
            ),
        ),
	),
);