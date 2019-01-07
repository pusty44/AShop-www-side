<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 00:36
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ashop_noffications")
 * @UniqueEntity(fields="id")
 */
class Noffications
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
     * @ORM\Column(type="string", length=48)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $viited;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
}