<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipes', name: 'recipe.index')]
    public function index(): Response
    {
        return $this->render('recipe/index.html.twig');
    }
    #[Route('/recipes/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
public function show(Request $request,string $slug,int $id): Response   
    {
        return $this->render('recipe/show.html.twig',[
            'slug'=>$slug,
            'id'=>$id
        ]);
    }
}