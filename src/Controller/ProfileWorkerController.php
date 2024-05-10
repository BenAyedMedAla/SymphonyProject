<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileWorkersController extends AbstractController
{
    
    #[Route('/profile', name: 'profile')]
 function index():Response{
    return $this->render('index-job-seeker.html.twig') ;

}}

