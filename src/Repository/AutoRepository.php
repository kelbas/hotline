<?php

namespace App\Repository;

use App\Entity\Auto;
use App\Entity\Rates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

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

    /**
     * * @return Auto[]
     */
    public function findAllAuto()
    {
        $limit = $_GET['limit'];
        $offset = $_GET['offset'];

        $em = $this->createQueryBuilder('a')
            ->innerJoin(Rates::class, 'r', 'with', 'r.credit_id=a.credit_id' )
            ->setFirstResult( $offset )
            ->setMaxResults($limit)
            ->getQuery()
            ->getArrayResult();




        return $em;

    }

    public function testic()
    {
        $limit = $_GET['limit'];
        $offset = $_GET['offset'];
        $sum = $_GET['sum'];


        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery('SELECT auto.id, auto.title, auto.slug, auto.bank, auto.monthly_commission,
        consumerloans.id, consumerloans.title, consumerloans.slug, consumerloans.bank, consumerloans.monthly_commission, 
         mortgages.id, mortgages.title, mortgages.slug, mortgages.bank, mortgages.monthly_commission,
          rates.credit_id, rates.usd, rates.uah, rates.eur, rates.period
          FROM App\Entity\Auto auto, App\Entity\Consumerloans consumerloans, App\Entity\Mortgages mortgages, App\Entity\Rates rates
          WHERE consumerloans.credit_id = rates.credit_id
          ')->setFirstResult( $offset )
            ->setMaxResults($limit)
        ;

        $users = $query->getResult();

        foreach ($users as $t){
            if ($rate = $_GET['rate'] == NULL){
               // echo 1;
                $rate =  $t['uah'];
            }
            else {
               // echo 2;
                $rate = $_GET['rate'];
            }
            if ($period = $_GET['period'] == NULL){
                $period = $t['period'];
            } else {
                $period = $_GET['period'];
            }
            $rates = ($sum + ($sum / 100 * $rate * $period)) - ($sum);
            array_push($t, $rates);
            // var_dump($t['uah']);
        }

        return $t;
    }

    /*public function ter()
    {
      // echo '<pre>';

        $limit = $_GET['limit'];
        $sum = $_GET['sum'];
        $rate = $_GET['rate'];

        $entityManager = $this->getEntityManager();

        /*
        SELECT consumerloans.title, consumerloans.slug, consumerloans.bank, consumerloans.monthly_commission,
                        rates.credit_id, rates.usd, rates.uah, rates.eur, rates.period
                FROM App\Entity\Consumerloans consumerloans, App\Entity\Rates rates
                WHERE consumerloans.credit_id = rates.credit_id

        ->setMaxResults($limit);
        */

       /* $query = $entityManager->createQueryBuilder()
        ->select('id')
        ->from('Auto', 'a')
        ->getQuery()
        ->execute();

        foreach ($query->getQuery()->execute() as $t){
            $rates = ($sum + ($sum / 100 * $rate * $t['period'])) - ($sum);
            array_push($t, $rates);
           // var_dump($t);
        }



        return $t;
    }*/

    // /**
   //  * @return Auto[] Returns an array of Auto objects
    //  */

   /* public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }*/


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
