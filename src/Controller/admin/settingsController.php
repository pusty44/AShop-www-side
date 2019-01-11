<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 11/01/2019
 * Time: 07:26
 */

namespace App\Controller\admin;

use App\Entity\Settings;
use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * Function to get/change settings
     *
     * @Route("/admin/settings", name="admin_settings")
     * @return \Symfony\Component\HttpFoundation\Response
     * @var Request $request
     * @throws \Exception
     */
    public function changeSettings(Request $request)
    {
        // declare settingsArray
        $definedSettings = [
            'shop_title',
            'shop_address',
            'shop_commands',
            'payment_url_livetime',
            'steam_bot_login',
            'steam_bot_password',
            'stats_target_income',
            'stats_target_sold_services',
            'stats_target_send_sms'
        ];

        // Get settings
        $settingsRepo = $this->getDoctrine()->getRepository(Settings::class);
        $settings = $settingsRepo->findAll();
        $settings_temp = json_decode($this->container->get('serializer')->serialize($settings, 'json'), true);

        // reset
        $settings = array();

        for($i = 0; $i < count($settings_temp); $i++)
            $settings[$settings_temp[$i]['name']] = $settings_temp[$i]['value'];

        // form
        $task = new Task();

        for($i = 0; $i < count($definedSettings); $i++) {
            $setting = new Settings();
            $setting->setName($definedSettings[$i]);
            $task->getSettings()->add($setting);
        }

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $data = $request->request->all();

            for($i = 0; $i < count($definedSettings); $i++)
            {
                $setting_update = $settingsRepo->findByName($definedSettings[$i]);
                $setting_update->setValue($data['task']['settings'][$i]['name']);
                $entityManager->flush();
            }
            return $this->redirectToRoute('admin_settings');
        }

        return $this->render(
            'admin/settings.html.twig', [
                'form' => $form->createView(),
                'settings' => $settings
            ]
        );
    }
}