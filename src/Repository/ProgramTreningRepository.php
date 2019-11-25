<?php

namespace App\Repository;

use App\Entity\ProgramTrening;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProgramTrening|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgramTrening|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgramTrening[]    findAll()
 * @method ProgramTrening[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgramTreningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgramTrening::class);
    }

    // /**
    //  * @return ProgramTrening[] Returns an array of ProgramTrening objects
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
    public function findOneBySomeField($value): ?ProgramTrening
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
