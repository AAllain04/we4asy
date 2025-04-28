<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class StudentCourseController extends AbstractController
{
    #[Route('/student_course', name: 'student_course')]
    public function index(Request $request, Connection $connection): Response
    {
        // Récupération de la session
        $session = $request->getSession();
        $role = $session->get('userRole', null);

        if ($role !== 'student') {
            return $this->redirectToRoute('login');
        }

        // Récupération du titre du cours
        $courseTitle = $request->query->get('title', 'Cours inconnu');

        // Requête SQL pour récupérer les posts des profs
        $posts = $connection->fetchAllAssociative(
            "SELECT * FROM post 
             WHERE author_role = 'prof' 
             AND status = 'published' 
             AND (type = 'message' OR type = 'partage de fichier') 
             ORDER BY created_at DESC"
        );

        return $this->render('student_course/index.html.twig', [
            'courseTitle' => $courseTitle,
            'posts' => $posts,
        ]);
    }
}