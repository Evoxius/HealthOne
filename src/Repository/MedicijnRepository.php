<?php

namespace App\Repository;

use App\Entity\Medicijn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Medicijn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicijn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicijn[]    findAll()
 * @method Medicijn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicijnRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Medicijn::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
