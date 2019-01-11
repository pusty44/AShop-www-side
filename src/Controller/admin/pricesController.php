<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:37
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class pricesController extends AbstractController
{
    /**
     * @Route("/admin/prices", name="admin_prices")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function prices()
    {
        return $this->render('admin/prices.html.twig');
    }
}