<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:30
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class servicesController extends AbstractController
{
    /**
     * @Route("/admin/services", name="admin_services")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function adminServices()
    {
        return $this->render('admin/services.html.twig');
    }
}