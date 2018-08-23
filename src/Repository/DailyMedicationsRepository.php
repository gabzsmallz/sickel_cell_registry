<?php

namespace App\Repository;

use App\Entity\DailyMedications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DailyMedications|null find($id, $lockMode = null, $lockVersion = null)
 * @method DailyMedications|null findOneBy(array $criteria, array $orderBy = null)
 * @method DailyMedications[]    findAll()
 * @method DailyMedications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DailyMedicationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DailyMedications::class);
    }

//    /**
//     * @return DailyMedications[] Returns an array of DailyMedications objects
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
    public function findOneBySomeField($value): ?DailyMedications
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
