<?php

namespace App\Repository;

use App\Entity\BaselineData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BaselineData|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaselineData|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaselineData[]    findAll()
 * @method BaselineData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaselineDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BaselineData::class);
    }

//    /**
//     * @return BaselineData[] Returns an array of BaselineData objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BaselineData
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
