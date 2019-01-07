<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 01:11
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_user_services")
 * @UniqueEntity(fields="id")
 */
class UserServices
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
     * @ORM\Column(type="datetime")
     */
    private $boughtDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expires;
}