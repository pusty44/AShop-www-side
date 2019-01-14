<?php
namespace App\Controller\shop;

use App\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Controller for common.
 *
 * Class HomePageController
 * @package App\Controller
 */
class homePageController extends AbstractController
{
    /**
     * Get common of AShop
     *
     * @Route("/", name="homePage")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function homePage()
    {
        $servicesRepo = $this->getDoctrine()->getRepository(Services::class);
        $services = $servicesRepo->findAll();
        $breadcrumbs = [];

        return $this->render('frontend/homepage/index.html.twig', [
            'services' => $services,
            'title' => 'Strona główna',
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}