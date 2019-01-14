<?php
namespace App\Controller\shop;


use App\Entity\Servers;
use App\Entity\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class serverSelectController extends AbstractController
{
    /**
     * Select server
     *
     * @Route("/info/{service}/{server}", name="server_selection")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function serverSelect($service, $server)
    {
        $servicesRepo = $this->getDoctrine()->getRepository(Services::class);
        $serversRepo = $this->getDoctrine()->getRepository(Servers::class);

        // if there is no service or server with this names - throw exception
        if(!$servicesRepo->findOneBy(['name' => $service]) || !$serversRepo->findOneBy(['name' => $server]))
            throw $this->createNotFoundException('Bad credentials');

        // render this
        return $this->render('pages/serverSelection.html.twig', [
            'service' => $service,
            'server' => $server
        ]);
    }
}