<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 00:10
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_payment_methods")
 * @ORM\Entity(repositoryClass="App\Repository\PaymentMethodRepository")
 * @UniqueEntity(fields="id")
 */
class PaymentMethod
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $smskey;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $apikey;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $apisecret;

    /**
     * @ORM\Column(type="integer")
     */
    private $serviceId;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $methodName;
}