<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddprofileController extends AbstractController
{
    #[Route('/addprofile', name: 'app_addprofile')]
    public function index(): Response
    {
        return $this->render('dashboard1/add-profile.html.twig', [
            'controller_name' => 'AddprofileController',
        ]);
    }
}
