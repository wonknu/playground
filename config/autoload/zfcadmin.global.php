<?php
/**
 * ZfcAdmin Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    'use_admin_layout' => true,
    'admin_layout_template' => 'layout/admin/admin',
);

/**
 * You do not need to edit below this line
 */
return array(
    'zfcadmin' => $settings,
    
    /*'bjyauthorize' => array(

        'guards' => array(
			'BjyAuthorize\Guard\Controller' => array(
                array('controller' => 'ZfcAdmin\Controller\AdminController', 'roles' => array('guest','user')),
            ),
            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'zfcadmin', 'roles' => array('user')),
            ),
        ),
    ),*/
);
