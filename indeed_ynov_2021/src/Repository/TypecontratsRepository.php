<?php

namespace App\Repository;

use App\Entity\Typecontrats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typecontrats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typecontrats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typecontrats[]    findAll()
 * @method Typecontrats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypecontratsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typecontrats::class);
    }

    // /**
    //  * @return Typecontrats[] Returns an array of Typecontrats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typecontrats
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
