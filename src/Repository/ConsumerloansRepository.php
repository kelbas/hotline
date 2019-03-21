<?php

namespace App\Repository;

use App\Entity\Consumerloans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Consumerloans|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consumerloans|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consumerloans[]    findAll()
 * @method Consumerloans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsumerloansRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Consumerloans::class);
    }

    // /**
    //  * @return Consumerloans[] Returns an array of Consumerloans objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Consumerloans
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
