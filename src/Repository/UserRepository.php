<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Users>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    // Récupérer un utilisateur par email
    public function findByEmail($email): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Récupérer tous les utilisateurs par rôle
    public function findByRole($role): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.role = :role')
            ->setParameter('role', $role)
            ->getQuery()
            ->getResult();
    }

    // Récupérer tous les utilisateurs triés par nom
    public function findAllUsersSortedByName(): array
    {
        return $this->findBy([], ['lastName' => 'ASC']); // Tri par nom de famille (lastName)
    }

    // Récupère toutes les unités d'enseignement d'un utilisateur par son ID
    public function findUesByUserId(int $userId)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('ue')
            ->innerJoin('u.ues', 'ue')  // Liaison avec les unités d'enseignement
            ->where('u.id = :userId')
            ->setParameter('userId', $userId);

        return $qb->getQuery()->getResult();  // Retourne les unités d'enseignement de l'utilisateur
    }
}