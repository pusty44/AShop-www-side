<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 00:32
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="ashop_groups_permissions")
 * @UniqueEntity(fields="id")
 */
class GroupPermissions
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
    private $groupId; // klucz obcy dla shop_groups.id

    /**
     * @ORM\Column(type="string", length=48)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $value;
}