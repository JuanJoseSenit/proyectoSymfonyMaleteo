<?php

namespace App\Repository;

use App\Entity\MaleteoForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaleteoForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaleteoForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaleteoForm[]    findAll()
 * @method MaleteoForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaleteoFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaleteoForm::class);
    }

    // /**
    //  * @return MaleteoForm[] Returns an array of MaleteoForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaleteoForm
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
