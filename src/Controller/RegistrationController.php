
<?php
use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    private $entityManager;

  
      #[Route('/register', name:'registration_register', methods:['POST'])]
      public function register(Request $request): Response
      {
          // Récupérer les données du formulaire
          $formData = $request->request->all();
      
          // Créer une nouvelle instance de l'entité Registration
          $registration = new Registration();
          $registration->setEmail($formData['email']);
          $registration->setFirstName($formData['first_name']);
          $registration->setLastName($formData['last_name']);
          // etc. Ajoutez les autres propriétés de l'entité Registration
      
          // Persister l'entité
          $this->entityManager->persist($registration);
      
          // Enregistrer les changements en base de données
          $this->entityManager->flush();
      
          // Rediriger l'utilisateur vers une autre page, ou répondre avec un JSON, etc.
          return $this->redirectToRoute('registration_success');
      }
      public function __construct(EntityManagerInterface $entityManager)
      {
          $this->entityManager = $entityManager;
      }
      
}
