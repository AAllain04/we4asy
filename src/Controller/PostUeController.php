<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostUeController extends AbstractController
{
    #[Route('/post-ue', name: 'post_ue')]
    public function index(): Response
    {
        return $this->render('post_ue/index.html.twig', [
            'post' => null // ou une entité si tu fais la version édition
        ]);
    }
}
