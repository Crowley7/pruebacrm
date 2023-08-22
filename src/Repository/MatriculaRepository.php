<?php

namespace App\Repository;

use App\Entity\Matricula;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Matricula>
 *
 * @method Matricula|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matricula|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matricula[]    findAll()
 * @method Matricula[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatriculaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matricula::class);
    }

//    /**
//     * @return Matricula[] Returns an array of Matricula objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Matricula
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
