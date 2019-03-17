<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 15:32
 */

namespace App\Controller\install;

use App\DataFixtures\AppFixtures;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Controller for installation process.
 *
 * Class dashboardController
 * @package App\Controller
 */
class installationController extends AbstractController
{
    private $appFixtures;

    public function __construct(AppFixtures $appFixtures)
    {
        $this->appFixtures = $appFixtures;
    }

    /**
     * Get admin dashboard
     *
     * @Route("/install/{step}", name="install")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function install(int $step = 1)
    {
        $entityManager = $this->getDoctrine()->getManager();
        //$this->appFixtures->load($entityManager);
        return $this->render('install/install.html.twig', [
            'step' => $step
        ]);
    }
}