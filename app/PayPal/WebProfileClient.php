<?php

namespace DeskFlix\PayPal;


use PayPal\Api\FlowConfig;
use PayPal\Api\InputFields;
use PayPal\Api\Presentation;
use PayPal\Api\WebProfile;
use PayPal\Rest\ApiContext;

class WebProfileClient
{
    /**
     * @var ApiContext
     */
    private $apiContext;


    /**
     * WebProfileClient constructor.
     */
    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
    }

    public function create(PaypalWebProfile $webProfileModel){
        $flowConfig = new FlowConfig();
        $flowConfig->setLandingPageType('Billing');

        $presentation = new Presentation();
        $presentation
            ->setLogoImage($webProfileModel->logo_url)
            ->setBrandName($webProfileModel->name)
            ->setLocaleCode('BR')
            ->setReturnUrlLabel('Retornar')
            ->setNoteToSellerLabel('Obrigado');

        $inputFields = new InputFields();
        $inputFields
            ->setAllowNote(false)
            ->setNoShipping(1)
            ->setAddressOverride(0);

        $payPalWebProfile = new WebProfile();
        $payPalWebProfile
            ->setName("$webProfileModel->name-" .uniqid())
            ->setFlowConfig($flowConfig)
            ->setPresentation($presentation)
            ->setInputFields($inputFields)
            ->setTemporary(false);

        return $payPalWebProfile->create($this->apiContext);

    }

}