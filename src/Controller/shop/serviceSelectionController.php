<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 08/01/2019
 * Time: 19:24
 */

namespace App\Controller\shop;

use App\Entity\BoughtServicesLogs;
use App\Entity\Prices;
use App\Entity\Servers;
use App\Entity\Services;
use App\Service\steamAuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;


/**
 * Controller for service selection.
 *
 * Class HomePageController
 * @package App\Controller
 */
class serviceSelectionController extends AbstractController
{
    private $steamAuth;
    public function __construct(steamAuthService $steamAuthService)
    {
        $this->steamAuth = $steamAuthService;
    }

    /**
     * Select service
     *
     * @Route("/buy/{name}", name="service_selection")
     * @Entity("name", expr="repository.findByName(name)")
     */
    public function serviceSelect(Services $service)
    {
        // Get Bought services logs repository
        $bsRepo = $this->getDoctrine()->getRepository(BoughtServicesLogs::class);

        // get bought services count
        $bought = $bsRepo->countEmByService($service->GetId());

        // get last buyer name
        $lastBuyerName = "Brak"; // Set default value
        if($bought)
        {
            $lastBuyer = $bsRepo->getLastRecordByService($service->GetId());
            $request = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=52A66B13219F645834149F1A1180770A&steamids='.$this->steamAuth->toCommunityID($lastBuyer[0]['authData']).'');
            $result = json_decode($request);

            foreach($result->response->players as $player)
                $lastBuyerName = $player->personaname;
        }

        // get service's avaible servers
        $avaibleServers = array();
        $pricesRepo = $this->getDoctrine()->getRepository(Prices::class);
        $serversRepo = $this->getDoctrine()->getRepository(Servers::class);
        $avaibleServersString = $pricesRepo->GetAvaibleServersForService($service->GetId());

        // loop query results
        for($i = 0; $i < count($avaibleServersString); $i++){
            $output = explode("-", $avaibleServersString[$i]['server']); // explode servers string from 'id-id-id-id' to get id ^^
            foreach($output as $opt)
                if(!in_array($opt, $avaibleServers)) // add server to array if he isn't inside
                    array_push($avaibleServers, $serversRepo->find($opt)->GetName());
        }


        // render this
        return $this->render('pages/serviceSelection.html.twig', [
            'service' => $service,
            'bought' => $bought,
            'last_buyer' => $lastBuyerName,
            'avaibleServers' => $avaibleServers
            ]);
    }

    /**
     * Select server
     *
     * @Route("/buy/{name}/servery", name="server_selection")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function serverSelection(Services $service)
    {
        // get service's avaible servers
        $avaibleServers = array();
        $pricesRepo = $this->getDoctrine()->getRepository(Prices::class);
        $serversRepo = $this->getDoctrine()->getRepository(Servers::class);
        $avaibleServersString = $pricesRepo->GetAvaibleServersForService($service->GetId());

        // loop query results
        for($i = 0; $i < count($avaibleServersString); $i++){
            $output = explode("-", $avaibleServersString[$i]['server']); // explode servers string from 'id-id-id-id' to get id ^^

            foreach($output as $opt)
                if(!in_array($opt, $avaibleServers)) // add server to array if he isn't inside
                    array_push($avaibleServers, $serversRepo->find($opt)->GetName());
        }




        // render this
        return $this->render('pages/serverSelection.html.twig', ['avaibleServers' => $avaibleServers]);
    }
}