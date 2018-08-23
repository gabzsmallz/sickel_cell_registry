<?php

namespace App\Repository;

use App\Entity\InterimHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InterimHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method InterimHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method InterimHistory[]    findAll()
 * @method InterimHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InterimHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InterimHistory::class);
    }

//    /**
//     * @return InterimHistory[] Returns an array of InterimHistory objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InterimHistory
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
