<?php
namespace App\Controller\shop;

use App\Entity\Prices;
use App\Entity\Servers;
use App\Entity\Services;

use App\Service\shop\payments\csSetiService;
use App\Service\shop\payments\GoSettiService;
use App\Service\shop\payments\hostPlayService;
use App\Service\shop\payments\liveserverService;
use App\Service\shop\payments\microSmsService;
use App\Service\shop\payments\oneShotOneKillService;
use App\Service\shop\payments\paymentType;
use App\Service\shop\payments\przelewy24Service;
use App\Service\shop\payments\pukawkaService;
use App\Service\shop\payments\tPayService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default route for payments
 *
 * Class paymentsController
 * @package App\Controller
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
    private $paymentType;

    public function __construct(
        csSetiService $csSetiService,
        GoSettiService $goSettiService,
        hostPlayService $hostPlayService,
        microSmsService $microSmsService,
        oneShotOneKillService $oneShotOneKillService,
        przelewy24Service $przelewy24Service,
        pukawkaService $pukawkaService,
        tPayService $tPayService,
        liveserverService $liveserver,
        paymentType $paymentType)
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
        $this->paymentType      = $paymentType;
    }

    /**
     * get payments list
     * @Route("/list", name="paymentList")
     * @return array
     */
    public function paymentList(){
        return [];
    }

    /**
     * get payments via type
     * @Route("/sms/{type}", name="paymentType")
     * @param string $type
     * @return csSetiService|GoSettiService|hostPlayService|microSmsService|oneShotOneKillService|przelewy24Service|pukawkaService
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
        return $pay;
    }


    /**
     * Default route for payments
     * @Route("/buy/{service}/{server}/{payment}/", name="payment_selection")
     */
    public function paymentTypeSelect($service, $server, $payment)
    {
        $servicesRepo = $this->getDoctrine()->getRepository(Services::class);
        $serversRepo = $this->getDoctrine()->getRepository(Servers::class);
        $pricesRepo = $this->getDoctrine()->getRepository(Prices::class);

        // if there is no service or server with this names or wrong payment type - throw exception
        if(!$servicesRepo->findOneBy(['name' => $service])
            || !$serversRepo->findOneBy(['name' => $server])
            || !($payment == 'sms' || $payment == 'paysafecard' || $payment == 'transfer'))
            throw $this->createNotFoundException('Bad credentials');

        // Get prices for specified payment types
        $prices = $pricesRepo->GetPricesFor($servicesRepo->findOneBy(['name' => $service])->GetId(), $this->paymentType->GetPaymentTypeByName($payment));
        
        if(count($prices))
            print_r($prices);
        else echo 'test - jebac';
        
        return $this->render('pages/valueSelection.html.twig');
    }
}