<?php

namespace App\Repository;

use App\Entity\SickleCellHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SickleCellHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SickleCellHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SickleCellHistory[]    findAll()
 * @method SickleCellHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SickleCellHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SickleCellHistory::class);
    }

//    /**
//     * @return SickleCellHistory[] Returns an array of SickleCellHistory objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SickleCellHistory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
