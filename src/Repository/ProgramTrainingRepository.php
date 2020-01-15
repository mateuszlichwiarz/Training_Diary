<?php

namespace App\Repository;

use App\Entity\ProgramTraining;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProgramTraining|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgramTraining|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgramTraining[]    findAll()
 * @method ProgramTraining[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgramTrainingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgramTraining::class);
    }

    // /**
    //  * @return ProgramTraining[] Returns an array of ProgramTraining objects
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
    public function findOneBySomeField($value): ?ProgramTraining
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
