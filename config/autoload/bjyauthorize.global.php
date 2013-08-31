<?php

return array(
    'bjyauthorize' => array(

        'default_role' => 'guest',
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationDoctrineEntity',
        'role_providers' => array(
            'BjyAuthorize\Provider\Role\Config' => array(
                'guest' => array(),
                'user'  => array('children' => array(
                    'admin' => array(),
                )),
            ),

        	'BjyAuthorize\Provider\Role\DoctrineEntity' => array(
                'role_entity_class' => 'AdfabUser\Entity\Role',
   		    ),
        ),

        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                'game' => array(),
                'user' => array(),
                'core' => array(),
                'reward' => array(),
                'partner' => array(),
                'cms' => array(),
                'faq' => array(),
                'facebook' => array(),
                'application' => array(),
            	'flow' => array(),
            ),
        ),

        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                    array(array('admin'), 'game',     		array('list','add','edit','delete')),
                    array(array('admin'), 'game',     		array('prizecategory_list','prizecategory_add','prizecategory_edit','prizecategory_delete')),
                    array(array('admin'), 'user',     		array('list','add','edit','delete')),
                    array(array('admin'), 'reward',   		array('list','add','edit','delete')),
                    array(array('admin'), 'partner',  		array('list','add','edit','delete')),
                    array(array('admin'), 'cms',      		array('list','add','edit','delete')),
                    array(array('admin'), 'faq',     		array('list','add','edit','delete')),
                    array(array('admin'), 'facebook', 		array('list','add','edit','delete')),
                    array(array('admin'), 'core',     		array('edit')),
                    array(array('admin'), 'application',    array('list')),
                	array(array('admin'), 'flow',   		array('list','add','edit','delete')),
                ),
            ),
        ),

        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
            	//Front Area
                array('controller' => 'index', 'action' => 'index',           'roles' => array('guest', 'user')),
                array('controller' => 'Application\Controller\Index',         'roles' => array('guest', 'user')),
                array('controller' => 'zfcuser',                              'roles' => array('guest', 'user')),
                array('controller' => 'adfabuser_user',                       'roles' => array('guest', 'user')),
                array('controller' => 'adfabuser_forgot',                     'roles' => array('guest', 'user')),
                array('controller' => 'adfabcms',                             'roles' => array('guest', 'user')),
            	array('controller' => 'adfabgame',                            'roles' => array('guest', 'user')),
            	array('controller' => 'adfabgame_treasurehunt',               'roles' => array('guest', 'user')),
            	array('controller' => 'adfabgame_lottery',                    'roles' => array('guest', 'user')),
                array('controller' => 'adfabgame_quiz',                       'roles' => array('guest', 'user')),
                array('controller' => 'adfabgame_postvote',                   'roles' => array('guest', 'user')),
                array('controller' => 'adfabgame_instantwin',                 'roles' => array('guest', 'user')),
                array('controller' => 'adfabgame_prizecategory',              'roles' => array('guest', 'user')),
            	array('controller' => 'adfabreward',                          'roles' => array('guest', 'user')),
                array('controller' => 'adfabpartnership',                     'roles' => array('guest', 'user')),
                array('controller' => 'facebook',                             'roles' => array('guest', 'user')),
                array('controller' => 'adfabcore_console',                    'roles' => array('guest', 'user')),
                array('controller' => 'adfabfaq',                             'roles' => array('guest', 'user')),
            	array('controller' => 'adfabflow',                            'roles' => array('guest', 'user')),
            	array('controller' => 'adfabflowrestauthent',                 'roles' => array('guest', 'user')),
            	array('controller' => 'adfabflowrestsend',               	  'roles' => array('guest', 'user')),
            	array('controller' => 'adfabgame_easyxdm',                 	  'roles' => array('guest', 'user')),


                // Admin area
                //array('controller' => 'ZfcAdmin\Controller\AdminController',  'roles' => array('admin')),
            	array('controller' => 'adfabuseradmin',                       'roles' => array('admin')),
            	array('controller' => 'adfabgameadmin',                       'roles' => array('admin')),
                array('controller' => 'adfabgame_admin_lottery',              'roles' => array('admin')),
                array('controller' => 'adfabgame_admin_instantwin',           'roles' => array('admin')),
                array('controller' => 'adfabgame_admin_quiz',                 'roles' => array('admin')),
                array('controller' => 'adfabgame_admin_postvote',             'roles' => array('admin')),
                array('controller' => 'adfabgame_admin_prizecategory',        'roles' => array('admin')),
            	array('controller' => 'adfabgame_admin_treasurehunt',         'roles' => array('admin')),
                array('controller' => 'adfabfaq_admin',                       'roles' => array('admin')),
                array('controller' => 'adfabfacebook_admin_app',              'roles' => array('admin')),
                array('controller' => 'adfabpartnership_admin',               'roles' => array('admin')),
            	array('controller' => 'AdfabCore\Controller\System',          'roles' => array('admin')),
                array('controller' => 'AdfabCore\Controller\Formgen',         'roles' => array('admin')),
            	array('controller' => 'AdfabCore\Controller\Dashboard',       'roles' => array('admin')),
            	array('controller' => 'adfabrewardadmin',                     'roles' => array('admin')),
                array('controller' => 'adfabcmsadmindynablock',               'roles' => array('admin')),
            	array('controller' => 'adfabcmsadminblock',                   'roles' => array('admin')),
            	array('controller' => 'adfabcmsadminpage',                    'roles' => array('admin')),
            	array('controller' => 'elfinder',                             'roles' => array('admin')),
            	array('controller' => 'DoctrineORMModule\Yuml\YumlController','roles' => array('admin')),
            	array('controller' => 'applicationadmin',					  'roles' => array('admin')),
            	array('controller' => 'adfabflowadminaction',				  'roles' => array('admin')),
            	array('controller' => 'adfabflowadminobject',				  'roles' => array('admin')),
            	array('controller' => 'adfabflowadminstory',				  'roles' => array('admin')),
            	array('controller' => 'adfabflowadmindomain',				  'roles' => array('admin')),
            ),

            /*'BjyAuthorize\Guard\Route' => array(
                array('route' => 'zfcuser', 'roles' => array('guest','user')),
                array('route' => 'zfcuser/logout', 'roles' => array('guest','user')),
                array('route' => 'zfcuser/login', 'roles' => array('guest','user')),
                array('route' => 'zfcuser/register', 'roles' => array('guest','user')),
                // Below is the default index action used by the [ZendSkeletonApplication](https://github.com/zendframework/ZendSkeletonApplication)
                array('route' => 'frontend', 'roles' => array('guest', 'user')),
                array('route' => 'admin', 'roles' => array('admin')),
            ),*/
        ),
    ),
);