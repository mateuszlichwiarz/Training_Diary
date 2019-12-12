<?php

namespace App\Repository;

use App\Entity\AllSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AllSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method AllSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method AllSettings[]    findAll()
 * @method AllSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AllSettings::class);
    }

    // /**
    //  * @return AllSettings[] Returns an array of AllSettings objects
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
    public function findOneBySomeField($value): ?AllSettings
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
