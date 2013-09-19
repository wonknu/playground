<?php

return array(
    'bjyauthorize' => array(

        'default_role' => 'guest',
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationDoctrineEntity',
        'unauthorized_strategy' => 'PlaygroundUser\View\Strategy\UnauthorizedStrategy',
        'role_providers' => array(
            'BjyAuthorize\Provider\Role\Config' => array(
                'guest' => array(),
                'user'  => array('children' => array(
                    'admin' => array(),
                )),
            ),

            'BjyAuthorize\Provider\Role\DoctrineEntity' => array(
                'role_entity_class' => 'PlaygroundUser\Entity\Role',
            ),
        ),

        'resource_providers' => array(
            'BjyAuthorize\Provider\Resource\Config' => array(
                'game'          => array(),
                'user'          => array(),
                'core'          => array(),
                'reward'        => array(),
                'partner'       => array(),
                'cms'           => array(),
                'faq'           => array(),
                'facebook'      => array(),
                'application'   => array(),
                'flow'          => array(),
                'stats'         => array(),
                'design'        => array(),
            ),
        ),

        'rule_providers' => array(
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                    array(array('admin'), 'game',           array('list','add','edit','delete')),
                    array(array('admin'), 'game',           array('prizecategory_list','prizecategory_add','prizecategory_edit','prizecategory_delete')),
                    array(array('admin'), 'user',           array('list','add','edit','delete')),
                    array(array('admin'), 'reward',         array('list','add','edit','delete')),
                    array(array('admin'), 'partner',        array('list','add','edit','delete')),
                    array(array('admin'), 'cms',            array('list','add','edit','delete')),
                    array(array('admin'), 'faq',            array('list','add','edit','delete')),
                    array(array('admin'), 'facebook',       array('list','add','edit','delete')),
                    array(array('admin'), 'core',           array('dashboard', 'edit')),
                    array(array('admin'), 'application',    array('list')),
                    array(array('admin'), 'flow',           array('list','add','edit','delete')),
                    array(array('admin'), 'stats',          array('list')),
                    array(array('admin'), 'design',         array('system')),
                ),
            ),
        ),

        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                //Front Area
                array('controller' => 'index', 'action' => 'index',                'roles' => array('guest', 'user')),
                array('controller' => 'Application\Controller\Index',              'roles' => array('guest', 'user')),
                array('controller' => 'zfcuser',                                   'roles' => array('guest', 'user')),
                array('controller' => 'playgrounduser_user',                       'roles' => array('guest', 'user')),
                array('controller' => 'playgrounduser_forgot',                     'roles' => array('guest', 'user')),
                array('controller' => 'playgroundcms',                             'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame',                            'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_treasurehunt',               'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_lottery',                    'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_quiz',                       'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_postvote',                   'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_instantwin',                 'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_prizecategory',              'roles' => array('guest', 'user')),
                array('controller' => 'playgroundreward',                          'roles' => array('guest', 'user')),
                array('controller' => 'playgroundpartnership',                     'roles' => array('guest', 'user')),
                array('controller' => 'facebook',                                  'roles' => array('guest', 'user')),
                array('controller' => 'playgroundcore_console',                    'roles' => array('guest', 'user')),
                array('controller' => 'playgroundfaq',                             'roles' => array('guest', 'user')),
                array('controller' => 'playgroundflow',                            'roles' => array('guest', 'user')),
                array('controller' => 'playgroundflowrestauthent',                 'roles' => array('guest', 'user')),
                array('controller' => 'playgroundflowrestsend',                    'roles' => array('guest', 'user')),
                array('controller' => 'playgroundgame_easyxdm',                    'roles' => array('guest', 'user')),


                // Admin area
                //array('controller' => 'ZfcAdmin\Controller\AdminController',  'roles' => array('admin')),
                array('controller' => 'playgrounduseradmin_login',                 'roles' => array('guest', 'user')),
                array('controller' => 'playgrounduseradmin',                       'roles' => array('admin')),
                array('controller' => 'playgroundgameadmin',                       'roles' => array('admin')),
                array('controller' => 'playgroundgame_admin_lottery',              'roles' => array('admin')),
                array('controller' => 'playgroundgame_admin_instantwin',           'roles' => array('admin')),
                array('controller' => 'playgroundgame_admin_quiz',                 'roles' => array('admin')),
                array('controller' => 'playgroundgame_admin_postvote',             'roles' => array('admin')),
                array('controller' => 'playgroundgame_admin_prizecategory',        'roles' => array('admin')),
                array('controller' => 'playgroundgame_admin_treasurehunt',         'roles' => array('admin')),
                array('controller' => 'playgroundfaq_admin',                       'roles' => array('admin')),
                array('controller' => 'playgroundfacebook_admin_app',              'roles' => array('admin')),
                array('controller' => 'playgroundpartnership_admin',               'roles' => array('admin')),
                array('controller' => 'PlaygroundDesign\Controller\System',        'roles' => array('admin')),
                array('controller' => 'PlaygroundCore\Controller\Formgen',         'roles' => array('admin')),
                array('controller' => 'PlaygroundDesign\Controller\Dashboard',     'roles' => array('admin')),
                array('controller' => 'playgroundrewardadmin',                     'roles' => array('admin')),
                array('controller' => 'playgroundcmsadmindynablock',               'roles' => array('admin')),
                array('controller' => 'playgroundcmsadminblock',                   'roles' => array('admin')),
                array('controller' => 'playgroundcmsadminpage',                    'roles' => array('admin')),
                array('controller' => 'elfinder',                                  'roles' => array('admin')),
                array('controller' => 'DoctrineORMModule\Yuml\YumlController',     'roles' => array('admin')),
                array('controller' => 'applicationadmin',                          'roles' => array('admin')),
                array('controller' => 'playgroundflowadminaction',                 'roles' => array('admin')),
                array('controller' => 'playgroundflowadminobject',                 'roles' => array('admin')),
                array('controller' => 'playgroundflowadminstory',                  'roles' => array('admin')),
                array('controller' => 'playgroundflowadmindomain',                 'roles' => array('admin')),
                array('controller' => 'adminstats',                                'roles' => array('admin')),
                array('controller' => 'PlaygroundDesign\Controller\CompanyAdmin',  'roles' => array('admin')),
                array('controller' => 'PlaygroundDesign\Controller\SkinAdmin',     'roles' => array('admin')),
            ),
        ),
    ),
);