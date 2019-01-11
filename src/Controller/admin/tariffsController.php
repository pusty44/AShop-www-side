<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:39
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class tariffsController extends AbstractController
{
    /**
     * @Route("/admin/tariffs", name="admin_tariffs")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function tariffs()
    {
        return $this->render('admin/tariffs.html.twig');
    }
}