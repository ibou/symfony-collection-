<?php

namespace App\Repository;

use App\Entity\Qux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Qux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Qux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Qux[]    findAll()
 * @method Qux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Qux::class);
    }
}
