<?php

namespace App\Repository;

use App\Entity\Mortgages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mortgages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mortgages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mortgages[]    findAll()
 * @method Mortgages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MortgagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mortgages::class);
    }

    // /**
    //  * @return Mortgages[] Returns an array of Mortgages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mortgages
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
