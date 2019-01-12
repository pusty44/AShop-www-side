<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:29
 */

namespace App\Controller\admin;

use App\Entity\PaymentMethod;
use App\Form\admin\payment_methods\pmAddType_1s1k;
use App\Form\admin\payment_methods\pmAddType_cssetti;
use App\Form\admin\payment_methods\pmAddType_gosetti;
use App\Form\admin\payment_methods\pmAddType_hostplay;
use App\Form\admin\payment_methods\pmAddType_liveserver;
use App\Form\admin\payment_methods\pmAddType_microsms;
use App\Form\admin\payment_methods\pmAddType_p24psc;
use App\Form\admin\payment_methods\pmAddType_p24sms;
use App\Form\admin\payment_methods\pmAddType_p24transfer;
use App\Form\admin\payment_methods\pmAddType_pukawka;
use App\Form\admin\payment_methods\pmAddType_tpay;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class adminPaymentMethodsController extends AbstractController
{
    /**
     * @Route("/admin/payment_methods", name="admin_pm")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function paymentMethods(Request $request)
    {
        // === Create Forms ===
        $method = new PaymentMethod();
        $entityManager = $this->getDoctrine()->getManager();

        $form_add_1s1k = $this->createForm(pmAddType_1s1k::class, $method);
        $form_add_1s1k->handleRequest($request);

        if ($form_add_1s1k->isSubmitted() && $form_add_1s1k->isValid()) {
            $method->setMethodName('oneshotonekill');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_pukawka = $this->createForm(pmAddType_pukawka::class, $method);
        $form_add_pukawka->handleRequest($request);

        if ($form_add_pukawka->isSubmitted() && $form_add_pukawka->isValid()) {
            $method->setMethodName('pukawka');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_hostplay = $this->createForm(pmAddType_hostplay::class, $method);
        $form_add_hostplay->handleRequest($request);

        if ($form_add_hostplay->isSubmitted() && $form_add_hostplay->isValid()) {
            $method->setMethodName('hostplay');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_p24_sms = $this->createForm(pmAddType_p24sms::class, $method);
        $form_add_p24_sms->handleRequest($request);

        if ($form_add_p24_sms->isSubmitted() && $form_add_p24_sms->isValid()) {
            $method->setMethodName('przelewy24');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_cssetti = $this->createForm(pmAddType_cssetti::class, $method);
        $form_add_cssetti->handleRequest($request);

        if ($form_add_cssetti->isSubmitted() && $form_add_cssetti->isValid()) {
            $method->setMethodName('cssetti');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_gosetti = $this->createForm(pmAddType_gosetti::class, $method);
        $form_add_gosetti->handleRequest($request);

        if ($form_add_gosetti->isSubmitted() && $form_add_gosetti->isValid()) {
            $method->setMethodName('gosetti');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_microsms = $this->createForm(pmAddType_microsms::class, $method);
        $form_add_microsms->handleRequest($request);

        if ($form_add_microsms->isSubmitted() && $form_add_microsms->isValid()) {
            $method->setMethodName('microsms');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_tpay = $this->createForm(pmAddType_tpay::class, $method);
        $form_add_tpay->handleRequest($request);

        if ($form_add_tpay->isSubmitted() && $form_add_tpay->isValid()) {
            $method->setMethodName('tpay');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_liveserver = $this->createForm(pmAddType_liveserver::class, $method);
        $form_add_liveserver->handleRequest($request);

        if ($form_add_liveserver->isSubmitted() && $form_add_liveserver->isValid()) {
            $method->setMethodName('liveserver');
            $method->setType(1);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_p24_psc = $this->createForm(pmAddType_p24psc::class, $method);
        $form_add_p24_psc->handleRequest($request);

        if ($form_add_p24_psc->isSubmitted() && $form_add_p24_psc->isValid()) {
            $method->setMethodName('przelewy24');
            $method->setType(3);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        $form_add_p24_transfer = $this->createForm(pmAddType_p24transfer::class, $method);
        $form_add_p24_transfer->handleRequest($request);

        if ($form_add_p24_transfer->isSubmitted() && $form_add_p24_transfer->isValid()) {
            $method->setMethodName('przelewy24');
            $method->setType(2);

            $entityManager->persist($method);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pm');
        }

        return $this->render('admin/paymentmethods.html.twig', [
            'form_1s1k' => $form_add_1s1k->createView(),
            'form_pukawka' => $form_add_pukawka->createView(),
            'form_hostplay' => $form_add_hostplay->createView(),
            'form_p24_sms' => $form_add_p24_sms->createView(),
            'form_cssetti' => $form_add_cssetti->createView(),
            'form_gosetti' => $form_add_gosetti->createView(),
            'form_microsms' => $form_add_microsms->createView(),
            'form_tpay' => $form_add_tpay->createView(),
            'form_liveserver' => $form_add_liveserver->createView(),
            'form_p24_psc' => $form_add_p24_psc->createView(),
            'form_p24_transfer' => $form_add_p24_transfer->createView()
        ]);
    }



}