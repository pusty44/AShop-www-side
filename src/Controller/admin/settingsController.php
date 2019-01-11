<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:26
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Controller for settings.
 *
 * Class settingsController
 * @package App\Controller
 */
class settingsController extends AbstractController
{
    /**
     * Get settings
     *
     * @Route("/admin/settings", name="admin_settings")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function settings()
    {
        return $this->render('admin/settings.html.twig');
    }
}