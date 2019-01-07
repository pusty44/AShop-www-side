<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 01:08
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_tariffs")
 * @UniqueEntity(fields="id")
 */
class Tariffs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
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
    private $smsNumber;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $brutto;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $netto;
}