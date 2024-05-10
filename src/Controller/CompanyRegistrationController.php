<?php

namespace App\Controller;

use App\Entity\CompanyRegistration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyRegistrationController extends AbstractController
{
    #[Route('/companyregister', name: 'company_registration_register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $em): Response
    {
        // Récupérer les données du formulaire
        $formData = $request->request->all();

        // Créer une nouvelle instance de l'entité Registration
        $registration = new CompanyRegistration();
        $registration->setEmail($formData['email']);
        $registration->setFirstName($formData['manager_first_name']);
        $registration->setLastName($formData['manager_last_name']);
        $registration->setPhoneNumber($formData['phone_number']);
        $registration->setMotDePasse($formData['password']);
        $registration->setCity($formData['city']);
        $registration->setcompanyname($formData['full_name']);

        // Gérer l'upload de l'image de la CIN
        $cinImageFile = $request->files->get('man_cin');
        if ($cinImageFile) {
            $originalFilename = pathinfo($cinImageFile->getClientOriginalName(), PATHINFO_FILENAME);
            // Sécuriser le nom du fichier
            $safeFilename = $originalFilename.'-'.uniqid().'.'.$cinImageFile->guessExtension();
            try {
                // Déplacer le fichier dans le dossier approprié
                $cinImageFile->move(
                    $this->getParameter('cin_manager_image_directory'),
                    $safeFilename
                );
                // Stocker le chemin d'accès relatif dans la base de données
                $registration->setmanagercinimage($safeFilename);
            } catch (FileException $e) {
                // Gérer l'erreur si le déplacement du fichier échoue
                // ...
            }
        }
        
        
        // Persister l'entité
        $em->persist($registration);

        // Enregistrer les changements en base de données
        $em->flush();

        // Rediriger l'utilisateur vers une autre page, ou répondre avec un JSON, etc.
        return $this->redirectToRoute('home');
    }
}
