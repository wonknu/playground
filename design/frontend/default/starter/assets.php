<?php
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/frontend/default/starter/assets',
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
	                    ),
	                    'options' => array(
	                        'output' => 'frontend/css/starter'
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