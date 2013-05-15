<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\ServiceManager;

class Contact extends ProvidesEventsForm
{

    protected $serviceManager;

    public function __construct ($name = null, ServiceManager $sm, Translator $translator)
    {

        parent::__construct($name);
        $this->setServiceManager($sm);

        $this->add(array(
            'name' => 'lastname',
            'options' => array(
                'label' => $translator->translate('Votre Nom', 'application'),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => $translator->translate('Votre Nom', 'application'),
                'class' => 'large-input required',
            ),
        ));

        $this->add(array(
            'name' => 'firstname',
            'options' => array(
                'label' => $translator->translate('Votre Prénom', 'application'),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => $translator->translate('Votre Prénom', 'application'),
                'class' => 'large-input required',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'options' => array(
                'label' => $translator->translate('Votre Email', 'application'),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => $translator->translate('Votre Email', 'application'),
                'class' => 'large-input required email',
            ),
        ));

        $this->add(array(
                'type' => 'Zend\Form\Element\Select',
                'name' => 'object',
                'options' => array(
                    'label' => $translator->translate('Objet', 'application'),
                    'value_options' => array(
                                                'technical-pb'	=>	$translator->translate('Je rencontre un problème technique', 'application'),
                                                'games-questions'	=>	$translator->translate('J\'ai une question sur les jeux', 'application'),
                                                'no-invit'	=>	$translator->translate('Je n\'ai pas reçu mon lot ou mon invitation', 'application'),
                                                'comment'	=>	$translator->translate('J\'ai une remarque ou suggestion à formuler', 'application'),
                                                'other'	=>	$translator->translate('Autre', 'application'),
                                            ),
                    'empty_option' => $translator->translate('Sélectionner', 'application'),
                ),
                'attributes' => array(
                    'class' => 'required',
                ),
        ));

        $this->add(array(
                'type' => 'Zend\Form\Element\Textarea',
                'name' => 'message',
                'options' => array(
                    'label' => $translator->translate('Votre question', 'application'),
                ),
                'attributes' => array(
                    'placeholder' => $translator->translate('Votre question', 'application'),
                    'class' => 'required',
                ),
        ));

        $submitElement = new Element\Button('submit');
        $submitElement->setLabel($translator->translate('Envoyer', 'application'))
            ->setAttributes(array(
            'type' => 'submit',
            'class'=> 'btn btn-success'
        ));

        $this->add($submitElement, array(
            //'priority' => - 100
        ));

    }

     /**
     * Retrieve service manager instance
     *
     * @return ServiceManager
     */
    public function getServiceManager ()
    {
        return $this->serviceManager;
    }

    /**
     * Set service manager instance
     *
     * @param  ServiceManager $serviceManager
     * @return User
     */
    public function setServiceManager (ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }

}
