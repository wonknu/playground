<?php 
return array(
    'assetic_configuration' => array(
        'modules' => array(
            'default_base' => array(
                'root_path' => array(
                    __DIR__ . '/../../../../design/admin/default/test/assets',
                ),
                'collections' => array(
                    'admin_images' => array(
                        'assets' => array(
                            'images/**/*.jpg',
                            'images/**/*.png',
                            'images/**/*.gif',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'admin/',
                        )
                    ),
                    
                    'admin_fonts' => array(
                        'assets' => array(
                            'fonts/**/*.eot',
                            'fonts/**/*.svg',
                            'fonts/**/*.ttf',
                            'fonts/**/*.woff',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'admin'
                        )
                    ),
                ),
            ),
        ),
    ),
);