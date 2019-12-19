<?php

namespace App\Repository;

use App\Entity\Progres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Progres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Progres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Progres[]    findAll()
 * @method Progres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Progres::class);
    }

    /**
      * @return Progres[] Returns an array of Progres objects
     */
    public function findWorkoutsByDay($date, $day, $user, $currentdate)
    {

            return $this->createQueryBuilder('p')
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->andWhere('p.date >= :date AND p.date <= :currentdate')
            ->setParameter('date', $date)
            ->setParameter('currentdate', $currentdate)
            ->andWhere('p.day = :day')
            ->setParameter('day', $day)
            ->orderBy('p.date', 'ASC')
            ->getQuery()
            ->getResult();
        
    }

    public function findAllWorkoutsWithoutToday($date, $user, $currentdate)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->andWhere('p.date >= :date AND p.date < :currentdate')
            ->setParameter('date', $date)
            ->setParameter('currentdate', $currentdate)
            ->orderBy('p.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Progres[] Returns an array of Progres objects
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
    public function findOneBySomeField($value): ?Progres
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
