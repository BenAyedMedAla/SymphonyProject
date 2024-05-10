<?php

namespace App\Repository;

use App\Entity\CompanyRegistration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CompanyRegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyRegistration::class);
    }

    // Ajoutez ici vos propres méthodes de requête personnalisées
}
