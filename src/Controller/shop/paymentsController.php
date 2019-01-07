<?php
/**
 * Created by PhpStorm.
 * User: Dawid Pierzak
 * Date: 04.01.2019
 * Time: 01:29
 */

namespace App\Controller\shop;

use App\Service\shop\payments\csSetiService;
use App\Service\shop\payments\GoSettiService;
use App\Service\shop\payments\hostPlayService;
use App\Service\shop\payments\liveserverService;
use App\Service\shop\payments\microSmsService;
use App\Service\shop\payments\oneShotOneKillService;
use App\Service\shop\payments\przelewy24Service;
use App\Service\shop\payments\pukawkaService;
use App\Service\shop\payments\tPayService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default route for payments
 * @Route("/pay")
*/
class paymentsController extends AbstractController
{
    private $csSeti;
    private $goSetti;
    private $hostPlay;
    private $microSms;
    private $oneShotOneKill;
    private $pukawka;
    private $przelewy24;
    private $tPay;
    private $liveserver;

    public function __construct(
        csSetiService $csSetiService,
        GoSettiService $goSettiService,
        hostPlayService $hostPlayService,
        microSmsService $microSmsService,
        oneShotOneKillService $oneShotOneKillService,
        przelewy24Service $przelewy24Service,
        pukawkaService $pukawkaService,
        tPayService $tPayService,
        liveserverService $liveserver)
    {
        $this->csSeti           = $csSetiService;
        $this->goSetti          = $goSettiService;
        $this->hostPlay         = $hostPlayService;
        $this->microSms         = $microSmsService;
        $this->oneShotOneKill   = $oneShotOneKillService;
        $this->przelewy24       = $przelewy24Service;
        $this->pukawka          = $pukawkaService;
        $this->tPay             = $tPayService;
        $this->liveserver       = $liveserver;
    }

    /**
     * get payments list
     * @Route("/list", name="paymentList")
     * @Template("frontend/payments/list.html.twig")
     * @return array
     */
    public function paymentList(){
        return [];
    }

    /**
     * get payments via type
     * @Route("/sms/{type}", name="paymentType")
     * @Template("frontend/payments/details.html.twig")
     * @return array
     */
    public function paymentDetails(string $type){
        if($type == 'cssetti') $pay = $this->csSeti;
        else if($type == 'gosetti') $pay = $this->goSetti;
        else if($type == 'hostplay') $pay = $this->hostPlay;
        else if($type == 'microsms') $pay = $this->microSms;
        else if($type == 'oneshotonekill') $pay = $this->oneShotOneKill;
        else if($type == 'przelewy24') $pay = $this->przelewy24;
        else if($type == 'pukawka') $pay = $this->pukawka;
        else if($type == 'tpay') $pay = $this->tPay;
        else if($type == 'liveserver') $pay = $this->liveserver;
        else $pay = false;
        return [];
    }

}