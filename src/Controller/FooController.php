<?php

namespace App\Controller;

use App\Form\FooType;
use App\Repository\FooRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooController extends AbstractController
{
    #[Route('/', name: 'foo_list')]
    public function index(FooRepository $fooRepository): Response
    {
        
        return $this->render('foo/index.html.twig', [
            "foos" => $fooRepository->findAll()
        ]);
    }
    
    #[Route('/create', name: 'foo_create')]
    public function create(): Response
    {
        
        $form = $this->createForm(FooType::class);
        return $this->render('foo/create.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
    
}
