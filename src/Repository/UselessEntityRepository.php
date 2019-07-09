<?php

namespace App\Repository;

use App\Entity\UselessEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UselessEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method UselessEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method UselessEntity[]    findAll()
 * @method UselessEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UselessEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UselessEntity::class);
    }

    // /**
    //  * @return UselessEntity[] Returns an array of UselessEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UselessEntity
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
