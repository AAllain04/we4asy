<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoodleController extends AbstractController
{
    #[Route('/moodle', name: 'moodle')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        
        // Redirection si non connecté
        if (!$session->has('userRole')) {
            return $this->redirectToRoute('app_login'); // tu peux adapter la route plus tard
        }

        $userRole = $session->get('userRole');

        $courses = [
            ['id' => 1, 'title' => 'Informatique', 'description' => 'Cours de programmation avancée', 'image' => 'assets/back1.png'],
            ['id' => 2, 'title' => 'Mathématiques', 'description' => 'Algèbre linéaire et calcul', 'image' => 'assets/back2.png'],
            ['id' => 3, 'title' => 'Design', 'description' => 'Principes de design graphique', 'image' => 'assets/back3.png'],
            ['id' => 4, 'title' => 'Marketing', 'description' => 'Stratégies de communication', 'image' => 'assets/back2.png'],
            ['id' => 5, 'title' => 'Langues', 'description' => 'Anglais professionnel', 'image' => 'assets/back3.png'],
            ['id' => 6, 'title' => 'Gestion', 'description' => 'Management et leadership', 'image' => 'assets/back1.png']
        ];

        return $this->render('moodle/index.html.twig', [
            'userRole' => $userRole,
            'courses' => $courses,
        ]);
    }
}
