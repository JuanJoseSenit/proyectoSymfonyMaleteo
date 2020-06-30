<?php

namespace App\Repository;

use App\Entity\OpinionesForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OpinionesForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpinionesForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpinionesForm[]    findAll()
 * @method OpinionesForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpinionesFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpinionesForm::class);
    }

    // /**
    //  * @return OpinionesForm[] Returns an array of OpinionesForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpinionesForm
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
