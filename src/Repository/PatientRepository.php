<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Patient::class);
    }

//    /**
//     * @return Patient[] Returns an array of Patient objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
	
	/**
	*	@param $age_r1 $age_r2
	*	@return Patient[]
	*/
	public function getPatientsAged($age_r1,$age_r2): array
	{
		/*$entityManager = $this->getEntityManager();

		$query = $entityManager->createQuery(
			'SELECT p
			FROM App\Entity\Product p
			WHERE p.price > :price
			ORDER BY p.price ASC'
		)->setParameter('price', 1000);

		// returns an array of Product objects
		return $query->execute();	*/

		/*$conn = $this->getEntityManager()->getConnection();

		$sql = '
			SELECT * FROM product p
			WHERE p.price > :price
			ORDER BY p.price ASC
			';
		$stmt = $conn->prepare($sql);
		$stmt->execute(['price' => 1000]);

		// returns an array of arrays (i.e. a raw data set)
		return $stmt->fetchAll();*/
		
		
		$q=$this->createQueryBuilder('p')
			->where('p.age >= :age_1 and p.age <= :age_2')
			->setParameter('age_1',$age_r1)
			->setParameter('age_2',$age_r2)
			->orderBy('p.age','ASC')
			->getQuery();
		return $q->execute();
		// $product = $qb->setMaxResults(1)->getOneOrNullResult();
	}
	
	
}
