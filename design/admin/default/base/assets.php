<?php 
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'grgtest' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/admin/default/base/assets',
				),
				'collections' => array(
					'modern_admin_css' => array(
						'assets' => array(
							'grg.css' => 'css/grg.css',
						),
					),
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
				),
			),
			'admin' => array(
				'collections' => array(
					'admin_css' => array(
						'assets' => array(
							'grg.css' => 'css/grg.css',
							'ie.css' => '',
						),
					),
					'head_admin_js' => array(
						'assets' => array(
							'admin.js' => ''
						),
					),
				),
			),
		),
		/*'routes' => array(
			'zfcadmin.*' => array(
				'@modern_admin_css',
			),
		),*/
	),
);