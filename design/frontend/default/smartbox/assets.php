<?php
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/frontend/default/smartbox/assets',
				),
			    'collections' => array(
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
	                        'css/starter.css'
	                        //'css/smartbox.css'
	                    ),
	                    'options' => array(
	                        'output' => 'frontend/css/base'
	                        //'output' => 'frontend/css/smartbox'
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