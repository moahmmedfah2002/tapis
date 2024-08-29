<?php

namespace App\Repository;

use App\Entity\TapisPersonaliser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TapisPersonaliser>
 *
 * @method TapisPersonaliser|null find($id, $lockMode = null, $lockVersion = null)
 * @method TapisPersonaliser|null findOneBy(array $criteria, array $orderBy = null)
 * @method TapisPersonaliser[]    findAll()
 * @method TapisPersonaliser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TapisPersonaliserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TapisPersonaliser::class);
    }

    public function add(TapisPersonaliser $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TapisPersonaliser $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TapisPersonaliser[] Returns an array of TapisPersonaliser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TapisPersonaliser
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
