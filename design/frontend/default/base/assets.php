<?php
return array(
	'assetic_configuration' => array(
		'modules' => array(
			'default_playground' => array(
				'root_path' => array(
					__DIR__ . '/../../../../design/frontend/default/base/assets',
				),
			    'collections' => array(
                    'head_frontend_js' => array(
                        'assets' => array(
                            //'html5.js' => 'js/html5.js',
                            //'pie.js' => 'js/lib/pie.js',
                            //'selectivizr-min.js' => 'js/lib/selectivizr-min.js',
                            'jquery-1.9.0.min.js' => 'js/lib/jquery-1.9.0.min.js',
                            'jquery-ui.js' => 'http://code.jquery.com/ui/1.10.2/jquery-ui.js',
                            'bowser.min.js' => 'js/lib/bowser.min.js',
                            'loader.js' => 'js/loader.js',
                            'popin.js' => 'js/popin.js',
                            'jscrollpane.js' => 'js/lib/jscrollpane.js',
                            'mousewheel.js' => 'js/lib/mousewheel.js',
                            'jquery.validate.min.js'=> 'js/lib/jquery.validate.min.js',
                            'jquery.nivo.slider.js' => 'js/lib/jquery.nivo.slider.js',
                            'jquery.uniform-2.0.js' => 'js/lib/jquery.uniform-2.0.js',
                            'jquery.limit-1.2.source.js' => 'js/lib/jquery.limit-1.2.source.js',
                            'wScratchpad.js' => 'js/lib/wScratchPad.js',
                            'jquery.timer.js' => 'js/lib/jquery.timer.js',
                            'dz.min.js' => 'js/lib/dz.min.js',
                            'sniffer.js' => 'js/sniffer.js',
                            'functions.js' => 'js/functions.js',
                            'script.js' => 'js/script.js',
                            'users.js' => 'js/users.js',
                            'share.js' => 'js/share.js',
                            'games.js' => 'js/games.js',
                            'bootstrap.min.js' => 'js/bootstrap.min.js',
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
                '@frontend_css',
                '@head_frontend_js',
                '@head_frontendplayground_js',
            ),
        ),
	),
);