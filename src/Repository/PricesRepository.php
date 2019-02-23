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
     * Retrieves best price for service'
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getBestPriceForService($service){
        $qb = $this->createQueryBuilder('p');
        $qb->select('t.brutto')
            ->join('p.tariff', 't', 'WITH', 'p.tariff = t.id')
            ->where('p.service = :service')
            ->orderBy('t.brutto', 'ASC')
            ->setParameter('service', $service)
            ->setMaxResults(1);
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result[0]['brutto'];
    }

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
     * Retrieves values for given data
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function GetValuesFor($serviceid, $paymentType){
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.value', 's.sufix')
            ->join('p.service', 's', 'WITH', 'p.service = s.id')
            ->join('p.tariff', 't', 'WITH', 'p.tariff = t.id')
            ->join('t.paymentMethodId', 'm', 'WITH', 't.paymentMethodId = m.id')
            ->where('p.service = :service')
            ->andWhere('m.type = :type')
            ->setParameter('service', $serviceid)
            ->setParameter('type', $paymentType);
        $query = $qb->getQuery();
        return $query->getArrayResult();
    }

    /**
     * Retrieves price info for given data
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function GetPriceInfo($serviceid, $paymentType, $value){
        $qb = $this->createQueryBuilder('p');
        $qb->select('m.smskey', 't.brutto', 't.smsNumber', 'm.type', 'm.name')
            ->join('p.tariff', 't', 'WITH', 'p.tariff = t.id')
            ->join('t.paymentMethodId', 'm', 'WITH', 't.paymentMethodId = m.id')
            ->where('p.service = :service')
            ->andWhere('m.type = :type')
            ->andWhere('p.value = :value')
            ->setParameter('service', $serviceid)
            ->setParameter('type', $paymentType)
            ->setParameter('value', $value);
        $query = $qb->getQuery();
        return $query->getArrayResult();
    }
}