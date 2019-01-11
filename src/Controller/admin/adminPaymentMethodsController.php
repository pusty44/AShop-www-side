<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:29
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class adminPaymentMethodsController extends AbstractController
{
    /**
     * @Route("/admin/payment_methods", name="admin_pm")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function paymentMethods()
    {
        return $this->render('admin/paymentmethods.html.twig');
    }
}