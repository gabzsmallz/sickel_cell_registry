<?php

namespace App\Repository;

use App\Entity\HealthMaintenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HealthMaintenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method HealthMaintenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method HealthMaintenance[]    findAll()
 * @method HealthMaintenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HealthMaintenanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HealthMaintenance::class);
    }

//    /**
//     * @return HealthMaintenance[] Returns an array of HealthMaintenance objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HealthMaintenance
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
