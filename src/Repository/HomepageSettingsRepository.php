<?php

namespace App\Repository;

use App\Entity\HomepageSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HomepageSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomepageSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomepageSettings[]    findAll()
 * @method HomepageSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomepageSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HomepageSettings::class);
    }

    // /**
    //  * @return HomepageSettings[] Returns an array of HomepageSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HomepageSettings
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
