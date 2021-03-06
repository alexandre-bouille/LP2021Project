<?php

namespace App\Repository;

use App\Entity\ContainerModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContainerModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContainerModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContainerModel[]    findAll()
 * @method ContainerModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContainerModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContainerModel::class);
    }

    public function getVolume($id){

        $qb = $this->createQueryBuilder('cm')
            ->select('cm')
            ->where('cm.id = :id')
            ->setParameter('id', $id);

        $result = $qb->getQuery()->execute(array(), AbstractQuery::HYDRATE_ARRAY);
        return ((int)$result[0]['height']*(int)$result[0]['length']*(int)$result[0]['width']);
    }

    // /**
    //  * @return ContainerModel[] Returns an array of ContainerModel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContainerModel
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
