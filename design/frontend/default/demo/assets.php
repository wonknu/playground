<?php 
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/frontend/default/demo/assets',
				),
				'collections' => array(
					'frontend_images' => array(
						'assets' => array(
						    'images/*.ico',
							'images/**/*.jpg',
							'images/**/*.png',
						    'images/**/*.gif',
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
				),
			),
		),
	),
);