<?php

return array(
    'router' => array(
        'routes' => array(
            'frontend' => array(
                'options' => array(
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'child_routes' => array(
                    'pagination' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[:p]',
                            'defaults' => array(
                                'controller' => 'Application\Controller\Index',
                                'action'     => 'index',
                            ),
                        	'constraints' => array('p' => '[0-9]*'),
                        ),
                    ),
                    'jeuxconcours' => array(
                    	'type'    => 'Zend\Mvc\Router\Http\Literal',
                    	'options' => array(
               				'route'    => 'jeux-concours',
                    		'defaults' => array(
                   				'controller'    => 'Application\Controller\Index',
                    			'action'        => 'jeuxconcours',
                    		),
                    	),
                   		'may_terminate' => true,
                   		'child_routes' => array(
                    		'pagination' => array(
                   				'type'    => 'Segment',
                    			'options' => array(
                   					'route'    => '[/:p]',
                    				'defaults' => array(
                   						'controller' => 'Application\Controller\Index',
                    					'action'     => 'jeuxconcours',
                    				),
                    				'constraints' => array('p' => '[0-9]*'),
               					),
               				),
                  		),
                    ),
                    'activity' => array(
                    	'type' => 'Segment',
                    	'options' => array(
               				'route' => 'mon-compte/mon-activite[/:filter]',
              				'constraints' => array(
                   				'filter' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    		),
                    		'defaults' => array(
                   				'controller' => 'Application\Controller\Index',
          						'action'     => 'activity',
               				),
                    	),
                    	'may_terminate' => true,
                   		'child_routes' => array(
                    		'pagination' => array(
                  				'type'    => 'Segment',
          						'options' => array(
                    				'route'    => '[/:p]',
                   					'defaults' => array(
                    					'controller' => 'Application\Controller\Index',
                    					'action'     => 'activity',
      								),
          							'constraints' => array('p' => '[0-9]*'),
                 				),
                    		),
                   		),
                    ),
                    'badges' => array(
                    	'type' => 'Literal',
                    	'options' => array(
                  			'route' => 'mon-compte/mes-badges',
                    		'defaults' => array(
                    			'controller' => 'Application\Controller\Index',
                    			'action'     => 'badges',
             				),
                  		),
                    ),
                    'sponsorfriends' => array(
                    	'type' => 'Literal',
                    	'options' => array(
                    		'route' => 'mon-compte/sponsor-friends',
                    		'defaults' => array(
                    			'controller' => 'Application\Controller\Index',
                    			'action'     => 'sponsorfriends',
               				),
                   		),
                    	'may_terminate' => true,
                    	'child_routes' => array(
                    		'fbshare' => array(
                  				'type' => 'Literal',
                    			'options' => array(
                    				'route' => '/fbshare',
                    				'defaults' => array(
                    					'controller' => 'Application\Controller\Index',
                    					'action'     => 'fbshare',
       								),
                    			),
                    		),
                    		'tweet' => array(
                    			'type' => 'Literal',
                    			'options' => array(
                    				'route' => '/tweet',
                    				'defaults' => array(
                    					'controller' => 'Application\Controller\Index',
                    					'action'     => 'tweet',
                    				),
                  				),
               				),
                    		'google' => array(
                    			'type' => 'Literal',
                    			'options' => array(
                    				'route' => '/google',
                    				'defaults' => array(
                    					'controller' => 'Application\Controller\Index',
                    					'action'     => 'google',
                    				),
               					),
                    		),
                    	),
                    ),
                    'contact' => array(
                    	'type' => 'Literal',
                    	'options' => array(
                    		'route' => 'contactez-nous',
                    		'defaults' => array(
                    			'controller' => 'Application\Controller\Index',
                    			'action'     => 'contact',
               				),
                  		),
                    	'may_terminate' => true,
                    	'child_routes' => array(
               				'contactconfirmation' => array(
                    			'type'    => 'Literal',
                    			'options' => array(
                    				'route'    => '/confirmation',
                    				'defaults' => array(
                    					'controller' => 'Application\Controller\Index',
                    					'action'     => 'contactconfirmation',
                    				),
                    			),
                    		),
                    	),
                    ),
                ),
            ),

             'admin' => array(
                'child_routes' => array(
                    'applicationadmin' => array(
                    'type' => 'Literal',
                    'priority' => 1000,
                        'options' => array(
                        'route' => '/application-admin',
                            'defaults' => array(
                                'controller' => 'applicationadmin',
                                'action' => 'index',
                            ),
                        ),
                        'child_routes' =>array(
                            'statistics' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/statistics',
                                    'defaults' => array(
                                        'controller' => 'applicationadmin',
                                        'action' => 'index',
                                    ),
                                ),
                            ),
                            'download' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/download',
                                    'defaults' => array(
                                        'controller' => 'applicationadmin',
                                        'action'     => 'download',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'core_layout' => array(
        'Application' => array(
            'default_layout' => 'layout/homepage-2columns-right',
            'children_views' => array(
                'col_right'  => 'common/column-right.phtml',
            ),
            'controllers' => array(
            	'applicationadmin'   => array(
            		'default_layout' => 'layout/admin',
            	),
                'Application\Controller\Index'   => array(
                    'default_layout' => 'layout/1column',
                    'actions' => array(
                        'index' => array(
                            'default_layout' => 'layout/homepage-2columns-right',
                            'children_views' => array(
                                'col_right'  => 'application/common/column_right.phtml',
                            ),
                        ),
                        'jeuxconcours' => array(
                            'default_layout' => 'layout/jeuxconcours-2columns-right',
                            'children_views' => array(
                                'col_right'  => 'application/common/column_right.phtml',
                            ),
                        ),
                        'activity' => array(
                            'default_layout' => 'layout/2columns-left',
                            'children_views' => array(
                                'col_left'  => 'playground-user/layout/col-user.phtml',
                            ),
                        ),
                        'prizecategories' => array(
                            'default_layout' => 'layout/2columns-right',
                            'children_views' => array(
                                'col_right'  => 'application/common/column_right.phtml',
                            ),
                        ),
                        'badges' => array(
                            'default_layout' => 'layout/2columns-left',
                            'children_views' => array(
                                'col_left'  => 'playground-user/layout/col-user.phtml',
                            ),
                        ),
                        'sponsorfriends' => array(
                            'default_layout' => 'layout/2columns-left',
                            'children_views' => array(
                                'col_left'  => 'playground-user/layout/col-user.phtml',
                            ),
                        ),
                        'contact' => array(
                            'default_layout' => 'layout/2columns-left',
                            'children_views' => array(
                                'col_left'  => 'playground-user/layout/col-user.phtml',
                            ),
                        ),
                        'contactconfirmation' => array(
                            'default_layout' => 'layout/2columns-left',
                            'children_views' => array(
                                'col_left'  => 'playground-user/layout/col-user.phtml',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'translator' => array(
        'locale' => 'fr_FR',
        'translation_file_patterns' => array(
            array(
                'type'     => 'phpArray',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.php'
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'applicationadmin' => 'Application\Controller\Admin\StatisticsController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view/admin',
            __DIR__ . '/../view/frontend',
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Comment ça marche ?',
                'route' => 'commentcamarche',
            ),
            array(
                'label' => 'Mon activité',
                'route' => 'activity',
            ),
            array(
                'label' => 'Mes badges et mes points',
                'route' => 'badges',
            ),
            array(
                'label' => 'Parrainer mes amis',
                'route' => 'sponsorfriends',
            ),
            array(
                'label' => 'Jeux concours',
                'route' => 'jeuxconcours',
            ),
            'pagination' => array(
                'label' => 'Jeux concours',
                'route'=> '/:p',
                'controller' => 'Application\Controller\Index',
                'action'     => 'jeuxconcours',
            ),
            array(
                'label' => 'Contactez-nous',
                'route' => 'contact',
            ),
            array(
                'label' => 'Contactez-nous',
                'route' => 'confirmation',
                'controller' => 'Application\Controller\Index',
                'action'     => 'contactconfirmation',
            ),
            array(
                'label' => 'Thématiques',
                'route' => 'thematiques[/:prizecategoryname][/:prizecategory]',
                'controller' => 'Application\Controller\Index',
                'action'     => 'prizecategories',
            ),
        ),
        /*'admin' => array(
            'applicationadmin' => array(
                'label' => 'Statistiques',
                'route' => 'admin/applicationadmin/statistics',
                'resource' => 'application',
                'privilege' => 'list',
            ),
        ),*/
    ),
);
