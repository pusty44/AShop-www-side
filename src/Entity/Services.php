<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 01:02
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_services")
 * @UniqueEntity(fields="id")
 */
class Services
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $webDescription;

    /**
     * @ORM\Column(type="string")
     */
    private $serverDescription;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $imageUrl;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $sufix;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $flags;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderNumber;
}