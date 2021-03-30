<?php

namespace App\Repository;

use App\Entity\Signalization;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Signalization|null find($id, $lockMode = null, $lockVersion = null)
 * @method Signalization|null findOneBy(array $criteria, array $orderBy = null)
 * @method Signalization[]    findAll()
 * @method Signalization[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignalizationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Signalization::class);
    }

    // /**
    //  * @return Signalization[] Returns an array of Signalization objects
    //  */
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
    public function findOneBySomeField($value): ?Signalization
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
