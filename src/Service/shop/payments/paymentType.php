<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 09/01/2019
 * Time: 10:53
 */

namespace App\Service\shop\payments;


class paymentType
{
    /**
     * @param $name
     * @return int
     */
    function getPaymentTypeByName($name)
    {
        switch($name)
        {
            case 'sms': return 1;
            case 'paysafecard': return 2;
            case 'transfer': return 3;
        }
    }
}