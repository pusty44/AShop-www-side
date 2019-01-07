<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 00:13
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_bought_services_logs")
 * @UniqueEntity(fields="id")
 */
class BoughtServicesLogs
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $paymentMethodId; // klucz obcy dla ashop_payment_methods.id

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $userId; // klucz obcy dla ashop_users.id

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $serverId; // klucz obcy dla ashop_servers.id

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $serviceId; // klucz obcy dla ashop_services.id

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $value;

    /**
 * @ORM\Column(type="string", nullable=true)
 */
    private $authData;

    /**
     * @ORM\Column(type="string", nullable=true, options={"default": NULL})
     */
    private $userIp;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
}