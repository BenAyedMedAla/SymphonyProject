<?php

namespace App\Controller;

use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

class LoginController1 extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/login1', name: 'app_log',methods: ['POST'])]
    public function login(Request $request): Response
    {
        $formData = $request->request->all();
        $email =$formData['email'];
        $password = $request->request->get('password');
      
        // Fetch user from database
        $userRepository = $this->entityManager->getRepository(Registration::class);
        $user = $userRepository->findOneBy(['email' => $email,'motDePasse'=>$password]);
    
        if (!$user) {
            // Authentication failed
            return $this->render('404.html.twig', [
                'error' => 'Invalid email or password'
            ]);
        }

        // Authentication succeeded, store user information in session
        $session = $request->getSession();
        $session->set('user', $user);

        // Render dashboard template with user data
        return $this->render('default/index.html.twig', [
            'registrations' => $user,
            'email'=>$email,
            'asba'=>$password
        ]);
    }
}
