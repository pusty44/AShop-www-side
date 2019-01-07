<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 00:48
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_temporary_payments")
 * @UniqueEntity(fields="chcksum")
 */
class TemporaryPayments
{
    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    private $chcksum;

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
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $authData;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
}