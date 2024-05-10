<?php

namespace App\Controller;

use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'registration_register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $em): Response
    {
        // Récupérer les données du formulaire
        $formData = $request->request->all();

        // Créer une nouvelle instance de l'entité Registration
        $registration = new Registration();
        $registration->setEmail($formData['email']);
        $registration->setFirstName($formData['first_name']);
        $registration->setLastName($formData['last_name']);
        $registration->setPhoneNumber($formData['phone_number']);
        $registration->setMotDePasse($formData['password']);
        $registration->setCity($formData['city']);

        // Gérer l'upload de l'image de la CIN
        $cinImageFile = $request->files->get('cin');
        if ($cinImageFile) {
            $originalFilename = pathinfo($cinImageFile->getClientOriginalName(), PATHINFO_FILENAME);
            // Sécuriser le nom du fichier
            $safeFilename = $originalFilename.'-'.uniqid().'.'.$cinImageFile->guessExtension();
            try {
                // Déplacer le fichier dans le dossier approprié
                $cinImageFile->move(
                    $this->getParameter('cin_image_directory'),
                    $safeFilename
                );
                // Stocker le chemin d'accès relatif dans la base de données
                $registration->setCinImage($safeFilename);
            } catch (FileException $e) {
                // Gérer l'erreur si le déplacement du fichier échoue
                // ...
            }
        }
        
        // Gérer l'upload de  de la cv
        $cvFile = $request->files->get('cv');
        if ($cvFile) {
            $originalFilename1 = pathinfo($cvFile->getClientOriginalName(), PATHINFO_FILENAME);
            // Sécuriser le nom du fichier
            $safeFilename1 = $originalFilename1.'-'.uniqid().'.'.$cvFile->guessExtension();
            try {
                // Déplacer le fichier dans le dossier approprié
                $cvFile->move(
                    $this->getParameter('cv_image_directory'),
                    $safeFilename1
                );
                // Stocker le chemin d'accès relatif dans la base de données
                $registration->setCv($safeFilename1);
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
