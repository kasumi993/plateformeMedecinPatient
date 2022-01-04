<?php

namespace App\Repository;

use App\Entity\Pharmacien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pharmacien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pharmacien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pharmacien[]    findAll()
 * @method Pharmacien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PharmacienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pharmacien::class);
    }

    // /**
    //  * @return Pharmacien[] Returns an array of Pharmacien objects
    //  */
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
    public function findOneBySomeField($value): ?Pharmacien
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
