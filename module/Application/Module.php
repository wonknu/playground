<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Validator\AbstractValidator;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {

        $translator = $e->getApplication()->getServiceManager()->get('translator');
        AbstractValidator::setDefaultTranslator($translator,'adfabcore');

        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * Configuration des helpers de vue
     * @return multitype:multitype:NULL |\Application\AbsoluteUrl
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'head' => function ($sm) {
                    return new View\Helper\Head();
                },
                'header' => function ($sm) {
                    return new View\Helper\Header();
                },
                'column_right' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $rssUrl = '';
                    $config = $locator->get('config');
                    if (isset($config['rss']['url'])) {
                        $rssUrl = $config['rss']['url'];
                    }
                    $viewHelper = new View\Helper\ColumnRight();
                    $viewHelper->setRssUrl($rssUrl);

                    return $viewHelper;
                },
                'column_left' => function ($sm) {
                return new View\Helper\ColumnLeft();
                },
                'footer' => function ($sm) {
                    return new View\Helper\Footer();
                },
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(

                'application_contact_form' => function($sm) {
                    $translator = $sm->get('translator');
                      $form = new Form\Contact(null, $sm, $translator);

                    return $form;
                },
            ),
        );
    }
}
