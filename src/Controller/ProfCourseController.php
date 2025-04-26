<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfCourseController extends AbstractController
{
    #[Route('/prof_course', name: 'prof_course')]
    public function index(Request $request): Response
    {
        // Simule une session (dans une vraie app, tu utiliseras le système de sécurité Symfony)
        $session = $request->getSession();
        $role = $session->get('userRole', null);

        if ($role !== 'professor') {
            return $this->redirectToRoute('login'); // ou la page d'accueil
        }

        // Récupération du titre du cours via paramètre GET
        $courseTitle = $request->query->get('title', 'Cours inconnu');

        // Simulation des posts (à remplacer par une récupération via Doctrine plus tard)
        $posts = [
            [
                'id' => 1,
                'title' => 'Introduction au cours',
                'content' => 'Bienvenue dans le cours !',
                'type' => 'message',
                'file_name' => null,
                'file_path' => null,
            ],
            [
                'id' => 2,
                'title' => 'Fichier PDF du chapitre 1',
                'content' => 'Voici le chapitre 1.',
                'type' => 'partage de fichier',
                'file_name' => 'chapitre1.pdf',
                'file_path' => '/uploads/chapitre1.pdf',
            ],
        ];

        return $this->render('prof_course/index.html.twig', [
            'courseTitle' => $courseTitle,
            'posts' => $posts,
        ]);
    }
}
