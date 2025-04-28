<?php

namespace App\Repository;

use App\Entity\UE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UE>
 */
class UERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UE::class);
    }

    // Récupérer toutes les unités d'enseignement par code
    public function findByCode($code): ?UE
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.code = :code')
            ->setParameter('code', $code)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Récupérer toutes les unités d'enseignement
    public function findAllUes(): array
    {
        return $this->findBy([], ['id' => 'ASC']); // Tri par ID ascendant
    }
}
