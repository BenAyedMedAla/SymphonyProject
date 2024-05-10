<?php

namespace App\Controller;

use App\ResumeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Routing\Annotation\Route;


use Dompdf\Dompdf;
use Dompdf\Options;





class ResumeController extends AbstractController
{
    #[Route('/form', name: 'form')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ResumeFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            // Generate HTML template
            $html = $this->renderView('/template.html.twig', [
                'data' => $formData,
            ]);

            // Save HTML template to file or return it as response
            // Example code to save or return HTML goes here

            // For testing, return generated HTML
            // Create an instance of Dompdf
        $dompdf = new Dompdf();

        // Render the HTML content to PDF
        
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save to file or stream to browser)
        $dompdf->render();

        // Stream the PDF to the browser
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
        ]);




            // return new Response($html);
            
        }

        return $this->render('/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
