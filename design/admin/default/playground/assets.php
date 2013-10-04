<?php
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'playground_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/admin/default/playground/assets',
				),
				'collections' => array(
				    
                    'admin_images' => array(
                        'assets' => array(
                            'images/*.ico',
                            'images/**/*.gif',
                            'images/**/*.jpg',
                            'images/**/*.png',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'zfcadmin/',
                        ),
                    ),
                    
                    'admin_fonts' => array(
                        'assets' => array(
                            'fonts/*.eot',
                            'fonts/*.svg',
                            'fonts/*.ttf',
                            'fonts/*.woff',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'zfcadmin/',
                        ),
                    ),
                    
                    'playground_css' => array(
                        'assets' => array(
                            'bootstrap.min.css'              => 'css/lib/bootstrap.min.css',
                            'datepicker.css'                 => 'css/lib/datepicker.css',
                            'administration.css'             => 'css/administration.css',
                            'login.css'                      => 'css/login.css',
                        ),
                        'options' => array(
                            'output' => 'zfcadmin/css/playground'
                        ),
                    ),
                    
                    'head_playground_js' => array(
                        'assets' => array(
                            'jquery-1.10.2.min.js'          => 'js/lib/jquery-1.10.2.min.js',
                            'bootstrap.min.js'              => 'js/lib/bootstrap.min.js',
                            'bootstrap-datepicker.js'       => 'js/lib/bootstrap-datepicker.js',
                        ),
                        'filters' => array(),
                        'options' => array(
                            'output' => 'zfcadmin/js/head_playground'
                        ),
                    ),
                    
                    'playground_home_css' => array(
                        'assets' => array(
                            'jquery.gridster.min.css' => 'css/lib/jquery.gridster.min.css',
                            'gridster.css' => 'css/gridster.css',
                        ),
                        'options' => array(
                            'output' => 'zfcadmin/css/gridster'
                        ),
                    ),
                    
                    'head_playground_home_js' => array(
                        'assets' => array(
                            'jquery.gridster.min.js'        => 'js/lib/jquery.gridster.min.js',
                        ),
                        'filters' => array(),
                        'options' => array(
                            'output' => 'zfcadmin/js/head_playground_home'
                        ),
                    ),
                    
				),
			),
		),
        
        'routes' => array(
            'admin.*' => array(
                '@playground_css',
                '@head_playground_js',
            ),
            'admin.stats' => array(
                '@playground_home_css',
                '@head_playground_home_js',
            ),
            'admin' => array(
                '@playground_home_css',
                '@head_playground_home_js',
            ),
        ),
        
	),
);