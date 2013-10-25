<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     *
     */
    protected $options;
    /**
     * @var gameService
     */
    protected $gameService;

    /**
     * @var quizService
     */
    protected $quizService;

    /**
     * @var pageService
     */
    protected $pageService;

    /**
     * @var gameService
     */
    protected $rewardService;

    /**
     * @var achievementService
     */
    protected $achievementService;

     /**
     * @var mailService
     */
    protected $mailService;

    public function indexAction()
    {

        $layoutViewModel = $this->layout();

        $slider = new ViewModel();
        $slider->setTemplate('application/common/top_promo');

        $sliderGames = $this->getGameService()->getActiveSliderGames();
        $sliderPages = $this->getPageService()->getActiveSliderPages();

        // I merge both types of articles and sort them in reverse order of their key
        // And as their key is some sort of... date !, It means I sort it in date reverse order ;)
        $sliderItems = array_merge($sliderGames,$sliderPages);

        krsort($sliderItems);

        $slider->setVariables(array('sliderItems' => $sliderItems));

        $layoutViewModel->addChild($slider, 'slider');

        $games = $this->getGameService()->getActiveGames();
        $pages = $this->getPageService()->getActivePages();

        // I merge both types of articles and sort them in reverse order of their key
        // And as their key is some sort of... date !, It means I sort it in date reverse order ;)
        $items = array_merge($games,$pages);
        krsort($items);

        if (is_array($items)) {
            $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($items));
            $paginator->setItemCountPerPage(7);
            $paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
        } else {
            $paginator = $items;
        }

        $bitlyclient = $this->getOptions()->getBitlyUrl();
        $bitlyuser = $this->getOptions()->getBitlyUsername();
        $bitlykey = $this->getOptions()->getBitlyApiKey();

        $this->getViewHelper('HeadMeta')->setProperty('bt:client', $bitlyclient);
        $this->getViewHelper('HeadMeta')->setProperty('bt:user', $bitlyuser);
        $this->getViewHelper('HeadMeta')->setProperty('bt:key', $bitlykey);

        $this->layout()->setVariables(
            array(
                'sliderItems'	=> $sliderItems,
                /*'adserving'       => array(
                    'cat1' => 'playground',
                    'cat2' => 'homepage',
                    'cat3' => ''
                )*/
            )
        );

        return new ViewModel(
            array(
                'items'	=> $paginator,
               )
        );
    }

    public function commentcamarcheAction()
    {
        return new ViewModel();
    }

    public function activityAction()
    {
        $filter = $this->getEvent()->getRouteMatch()->getParam('filter');
        $events = $this->getRewardService()->getEventMapper()->findActivity($this->zfcUserAuthentication()->getIdentity()->getId(),$filter);
        $total = count($events);

        if (is_array($events)) {
            $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($events));
            $paginator->setItemCountPerPage(25);
            $paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
        } else {
            $paginator = $events;
        }

        /*$this->layout()->setVariables(
            array(
                'adserving'       => array(
                    'cat1' => 'playground',
                    'cat2' => 'myaccount',
                    'cat3' => ''
                )
            )
        );*/

        return new ViewModel(
            array(
                'events' => $paginator,
                'filter' => $filter,
                'total' => $total
            )
        );
    }

    /**
     * user sponsor friend
     */
    public function sponsorfriendsAction ()
    {
        $user 		 = $this->zfcUserAuthentication()->getIdentity();
        $subjectMail = "Gagnez pleins de cadeaux sur Playground";
        $topic 		 = "Parrainage depuis l'espace client";
        $statusMail  = null;
        $sg 		 = $this->getGameService();
        $events 	 = $this->getRewardService()->getEventMapper()->findActivity($this->zfcUserAuthentication()->getIdentity()->getId(),'sponsor');

        $form = $this->getServiceLocator()->get('playgroundgame_sharemail_form');
        $form->setAttribute('method', 'post');

        $games = $this->getGameService()->getActiveGames();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost()->toArray();
            $form->setData($data);
            if ($form->isValid()) {
                $result = $this->getServiceLocator()->get('playgroundgame_lottery_service')->sendShareMail($data, $games, $user, 'share_game_list', $subjectMail, $topic);
                if ($result) {
                    $statusMail = true;
                }
            }
        }

        $secretKey = strtoupper(substr(sha1($user->getId().'####'.time()),0,15));
        $socialLinkUrl = $this->url()->fromRoute('frontend', array(), array('force_canonical' => true)).'?key='.$secretKey;
        // With core shortener helper
        $socialLinkUrl = $this->shortenUrl()->shortenUrl($socialLinkUrl);
        $fbShareImage = $this->url()->fromRoute('frontend', array(), array('force_canonical' => true)) . 'images/common/logo.png';

        $bitlyclient = $this->getOptions()->getBitlyUrl();
        $bitlyuser = $this->getOptions()->getBitlyUsername();
        $bitlykey = $this->getOptions()->getBitlyApiKey();

        $this->getViewHelper('HeadMeta')->setProperty('bt:client', $bitlyclient);
        $this->getViewHelper('HeadMeta')->setProperty('bt:user', $bitlyuser);
        $this->getViewHelper('HeadMeta')->setProperty('bt:key', $bitlykey);
        $this->getViewHelper('HeadMeta')->setProperty('og:image', $fbShareImage);

        $viewModel = new ViewModel(array(
            'events'     => $events,
            'statusMail' => $statusMail,
            'form'       => $form,
            'socialLinkUrl'    => $socialLinkUrl,
            'secretKey'		   => $secretKey
        ));

        return $viewModel;
    }

    public function fbshareAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);

        $topic = "Partage Facebook depuis l'espace client";

        $fbId = $this->params()->fromQuery('fbId');
        $user = $this->zfcUserAuthentication()->getIdentity();

        if (!$fbId) {
            return false;
        }

        $this->getServiceLocator()->get('playgroundgame_lottery_service')->postFbWall($fbId, NULL, $user, $topic);

        return true;

    }

    public function tweetAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);

        $topic = "Partage Twitter depuis l'espace client";

        $tweetId = $this->params()->fromQuery('tweetId');
        $user = $this->zfcUserAuthentication()->getIdentity();

        if (!$tweetId) {
            return false;
        }

        $this->getServiceLocator()->get('playgroundgame_lottery_service')->postTwitter($tweetId, NULL, $user, $topic);

        return true;

    }

    public function googleAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);

        $topic = "Partage Google depuis l'espace client";

        $googleId = $this->params()->fromQuery('googleId');
        $user = $this->zfcUserAuthentication()->getIdentity();

        if (!$googleId) {
            return false;
        }

        $this->getServiceLocator()->get('playgroundgame_lottery_service')->postGoogle($googleId, NULL, $user, $topic);

        return true;

    }

    public function contactAction()
    {
        $mailService = $this->getMailService();

        $to = '';
        $config = $this->getGameService()->getServiceManager()->get('config');
        if (isset($config['contact']['email'])) {
            $to = $config['contact']['email'];
        }

        $form = $this->getServiceLocator()->get('application_contact_form');
        $form->setAttribute('method', 'post');

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost()->toArray();
            $form->setData($data);
            if ($form->isValid()) {
                $from = $data['email'];
                $subject= 'Contact : '.$data['object'];
                $result = $mailService->createHtmlMessage($from, $to, $subject, 'application/email/question', array('data' => $data));

                if ($result) {
                   return $this->redirect()->toRoute('contact/contactconfirmation');
                }
            }
        }

        return new ViewModel(array(
                'form' => $form,
            )
        );
    }

    public function contactconfirmationAction()
    {
        return new ViewModel();
    }

    public function getAchievementService()
    {
        if (!$this->achievementService) {
            $this->achievementService = $this->getServiceLocator()->get('playgroundreward_achievement_service');
        }

        return $this->achievementService;
    }

    public function setAchievementService($achievementService)
    {
        $this->achievementService = $achievementService;

        return $this;
    }

    public function getRewardService()
    {
        if (!$this->rewardService) {
            $this->rewardService = $this->getServiceLocator()->get('playgroundreward_event_service');
        }

        return $this->rewardService;
    }

    public function setRewardService(GameService $rewardService)
    {
        $this->rewardService = $rewardService;

        return $this;
    }

    public function getGameService()
    {
        if (!$this->gameService) {
            $this->gameService = $this->getServiceLocator()->get('playgroundgame_game_service');
        }

        return $this->gameService;
    }

    public function setGameService(GameService $gameService)
    {
        $this->gameService = $gameService;

        return $this;
    }

    public function getQuizService ()
    {
        if (! $this->quizService) {
            $this->quizService = $this->getServiceLocator()->get('playgroundgame_quiz_service');
        }

        return $this->quizService;
    }

    public function setQuizService (QuizService $quizService)
    {
        $this->quizService = $quizService;

        return $this;
    }

    public function getPageService()
    {
        if (!$this->pageService) {
            $this->pageService = $this->getServiceLocator()->get('playgroundcms_page_service');
        }

        return $this->pageService;
    }

    public function setPageService(\PlaygroundCms\Service\Page $pageService)
    {
        $this->pageService = $pageService;

        return $this;
    }

    public function getMailService()
    {
        if (!$this->mailService) {
            $this->mailService = $this->getServiceLocator()->get('playgroundgame_message');
        }

        return $this->mailService;
    }

    public function setMailService($mailService)
    {
        $this->mailService = $mailService;

        return $this;
    }

    public function getOptions()
    {
        if (!$this->options) {
            $this->setOptions($this->getServiceLocator()->get('playgroundcore_module_options'));
        }

        return $this->options;
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    protected function getViewHelper($helperName)
    {
        return $this->getServiceLocator()->get('viewhelpermanager')->get($helperName);
    }
}
