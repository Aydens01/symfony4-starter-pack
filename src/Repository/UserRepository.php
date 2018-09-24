<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getByPattern($pattern)
    {
        $qb = $this
            ->createQueryBuilder('u')
            ->where('u.username LIKE :pattern')
            ->setParameter('pattern', $pattern)
            ->getQuery()
        ;

        return $qb->execute();
    }
}