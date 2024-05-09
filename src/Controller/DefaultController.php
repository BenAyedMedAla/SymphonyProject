<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends AbstractController
{
    private $entityManager;

    #[Route('/asba', name: 'asba')]
    public function index(): Response
    {
        $registrations = $this->entityManager->getRepository(Registration::class)->findAll();

        return $this->render('default/index.html.twig', [
            'registrations' => $registrations,
        ]);
    }

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

  
}
