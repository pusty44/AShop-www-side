<?php
/**
 * Created by PhpStorm.
 * User: n.o.x
 * Date: 07/01/2019
 * Time: 19:39
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PricesRepository extends EntityRepository
{
    /**
     * Retrieves servers id string like 'id-id-id-id'
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function GetAvaibleServersForService($id){
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.server')
            ->where('p.service = :service')
            ->setParameter('service', $id);
        $query = $qb->getQuery();
        return $query->getArrayResult();
    }

    /**
     * Retrieves servers id string like 'id-id-id-id'
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function GetPricesFor($serviceid, $paymentType){
        $qb = $this->createQueryBuilder('p');
        $qb->join('p.tariff', 't', 'WITH', 'p.tariff = t.id')
            ->join('t.paymentMethodId', 'm', 'WITH', 't.paymentMethodId = m.id')
            ->where('p.service = :service')
            ->andWhere('m.type = :type')
            ->setParameter('service', $serviceid)
            ->setParameter('type', $paymentType);
        $query = $qb->getQuery();
        return $query->getArrayResult();
    }
}