<?php

namespace App\Repository;

use App\Entity\Auto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Auto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Auto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Auto[]    findAll()
 * @method Auto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Auto::class);
    }

    public function testic()
    {
        $entityManager = $this->getEntityManager();
      /* $sql = $entityManager->createQuery('SELECT auto.title, auto.slug, auto.bank, auto.monthly_commission,
         consumerloans.title, consumerloans.slug, consumerloans.bank, consumerloans.monthly_commission,
         mortgages.title, mortgages.slug, mortgages.bank, mortgages.monthly_commission
         FROM Auto
         WHERE auto.title IS NULL 
         ');

        return $sql->execute();*/
        $query = $entityManager->createQuery('SELECT auto.title, auto.slug, auto.bank, auto.monthly_commission,
         consumerloans.title, consumerloans.slug, consumerloans.bank, consumerloans.monthly_commission, 
         mortgages.title, mortgages.slug, mortgages.bank, mortgages.monthly_commission
          FROM App\Entity\Auto auto, App\Entity\Consumerloans consumerloans, App\Entity\Mortgages mortgages');
        $users = $query->getResult();

        return $users;
    }

    // /**
    //  * @return Auto[] Returns an array of Auto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Auto
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
