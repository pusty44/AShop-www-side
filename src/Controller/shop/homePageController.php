<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 07/01/2019
 * Time: 11:25
 */

namespace App\Controller\shop;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Controller for homepage.
 *
 * Class HomePageController
 * @package App\Controller
 */
class homePageController extends AbstractController
{
    /**
     * Get homepage of NITShop
     *
     * @Route("/", name="homePage")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function homePage()
    {
        return $this->render('pages/homepage.html.twig');
    }
}