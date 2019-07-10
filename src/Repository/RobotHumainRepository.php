<?php

namespace App\Repository;

use App\Entity\RobotHumain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RobotHumain|null find($id, $lockMode = null, $lockVersion = null)
 * @method RobotHumain|null findOneBy(array $criteria, array $orderBy = null)
 * @method RobotHumain[]    findAll()
 * @method RobotHumain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RobotHumainRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RobotHumain::class);
    }

    // /**
    //  * @return RobotHumain[] Returns an array of RobotHumain objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RobotHumain
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
