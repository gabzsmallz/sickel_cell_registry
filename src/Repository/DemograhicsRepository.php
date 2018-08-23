<?php

namespace App\Repository;

use App\Entity\Demograhics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Demograhics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demograhics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demograhics[]    findAll()
 * @method Demograhics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemograhicsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Demograhics::class);
    }

//    /**
//     * @return Demograhics[] Returns an array of Demograhics objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Demograhics
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
