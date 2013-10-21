<?php
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'admin_default_playground' => array(
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
                    
                    /**
                     * MAIN CSS FILES
                     */
                    'playground_css' => array(
                        'assets' => array(
                            'bootstrap.min.css'              => 'css/lib/bootstrap.min.css',
                            'datepicker.css'                 => 'css/lib/datepicker.css',
                            'style.css'                      => 'css/style.css',
                        ),
                        'options' => array(
                            'output' => 'zfcadmin/css/playground'
                        ),
                    ),
                    
                    /**
                     * MAIN JS FILES
                     */
                    'playground_js' => array(
                        'assets' => array(
                            'jquery-1.10.2.min.js'          => 'js/lib/jquery-1.10.2.min.js',
                            //'jquery-1.10.2.min.map'          => 'js/lib/jquery-1.10.2.min.map',
                            'bootstrap.min.js'              => 'js/lib/bootstrap.min.js',
                            'bootstrap-datepicker.js'       => 'js/lib/bootstrap-datepicker.js',
                            'main.js'                       => 'js/main.js',
                        ),
                        'filters' => array(),
                        'options' => array(
                            'output' => 'zfcadmin/js/script_playground'
                        ),
                    ),
                    
                    /**
                     * USER CSS FILES
                     */
                    'playground_user_css' => array(
                        'assets' => array(
                            'user-style.css'                      => 'css/playground-user/style.css',
                        ),
                        'options' => array(
                            'output' => 'zfcadmin/css/user'
                        ),
                    ),
                    
                    /**
                     * STATS CSS FILES
                     */
                    'playground_stats_css' => array(
                        'assets' => array(
                            'jquery.gridster.min.css' => 'css/lib/jquery.gridster.min.css',
                            'stats-style.css' => 'css/playground-stats/style.css',
                        ),
                        'options' => array(
                            'output' => 'zfcadmin/css/stats'
                        ),
                    ),
                    
                    /**
                     * STATS JS FILES
                     */
                    'playground_stats_js' => array(
                        'assets' => array(
                            'jquery.gridster.min.js'        => 'js/lib/jquery.gridster.min.js',
                        ),
                        'filters' => array(),
                        'options' => array(
                            'output' => 'zfcadmin/js/script_stats'
                        ),
                    ),
                    
                    /**
                     * THEMES CSS FILES
                     */
                    'playground_theme_css' => array(
                        'assets' => array(
                            'design-style.css' => 'css/playground-design/style.css',
                        ),
                        'options' => array(
                            'output' => 'zfcadmin/css/design'
                        ),
                    ),
                    
                    /**
                     * THEMES JS FILES
                     */
                    'playground_theme_js' => array(
                        'assets' => array(
                            'design-script.js'        => 'js/playground-design/script.js',
                        ),
                        'filters' => array(),
                        'options' => array(
                            'output' => 'zfcadmin/js/script_theme'
                        ),
                    ),
                    
                    /**
                     * CKEDITOR
                     */
                    'admin_ckeditor' => array(
                        'assets' => array(
                            'js/lib/ckeditor/*',
                            'js/lib/ckeditor/**/*',
                            'js/lib/ckeditor/**/**/*',
                            'js/lib/ckeditor/**/**/**/*',
                            'js/ckeditor-custom/*',
                            'js/ckeditor-custom/**/*',
                            'css/ckeditor-custom/*',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'zfcadmin',
                        )
                    ),
				),
			),
		),
        
        'routes' => array(
            'admin.*' => array(
                '@playground_css',
                '@playground_js',
            ),
            'admin' => array(
                '@playground_stats_css',
                '@playground_user_css',
                '@playground_stats_js',
            ),
            'admin/stats.*' => array(
                '@playground_stats_css',
                '@playground_stats_js',
            ),
            'admin/playgrounddesign.*' => array(
                '@playground_theme_css',
                '@playground_theme_js',
            ),
        ),
	),
);