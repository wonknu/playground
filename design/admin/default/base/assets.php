<?php 
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_base' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/admin/default/base/assets',
				),
				'collections' => array(
					/*'modern_admin_css' => array(
						'assets' => array(
							'grg.css' => 'css/grg.css',
						),
					),*/
					'admin_images' => array(
						'assets' => array(
							'images/**/*.jpg',
							'images/**/*.png',
						),
						'options' => array(
							'move_raw' => true,
							'output' => 'zfcadmin/',
						)
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
			'admin' => array(
				'collections' => array(
					/*'admin_css' => array(
						'assets' => array(
							'grg.css' => 'css/grg.css',
							'ie.css' => '',
						),
					),*/
					'head_admin_js' => array(
						'assets' => array(
							'api-deezer.js' => 'js/api-deezer.js'
						),
					    'options' => array(
	                        'output' => 'zfcadmin',
                        )
					),
				),
			),
		),
		/*'routes' => array(
			'admin.*' => array(
				'@modern_admin_css',
			),
		),*/
	),
);