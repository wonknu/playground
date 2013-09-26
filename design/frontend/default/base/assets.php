<?php 
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/frontend/default/base/assets',
				),
				'collections' => array(
					'frontend_images' => array(
						'assets' => array(
						    'images/*.ico',
						    'images/**/*.gif',
							'images/**/*.jpg',
							'images/**/*.png',
						),
						'options' => array(
							'move_raw' => true,
							'output' => 'frontend/',
						)
					),
				    
				    'frontend_fonts' => array(
				        'assets' => array(
				            'fonts/**/*.eot',
				            'fonts/**/*.svg',
				            'fonts/**/*.ttf',
				            'fonts/**/*.woff',
				        ),
				        'options' => array(
				            'move_raw' => true,
				            'output' => 'frontend'
				        )
				    ),
				    
                    'frontend_css' => array(
                        'assets' => array(
                            'css/playground.css'
                        ),
                        'options' => array(
                            'output' => 'frontend/css/playground'
                        )
                    ),
				),
			),
		),
        'routes' => array(
            'frontend.*' => array(
                '@frontend_css',
            ),
        ),
	),
);