<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
    public function index(Request $request, SessionInterface $session): Response
    {
        $error = '';

        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            if ($email === 'professor@example.com' && $password === 'password123') {
                $session->set('userRole', 'professor');
                return $this->redirectToRoute('moodle');
            } elseif ($email === 'student@example.com' && $password === 'password123') {
                $session->set('userRole', 'student');
                return $this->redirectToRoute('moodle');
            } else {
                $error = 'Email ou mot de passe incorrect.';
            }
        }

        return $this->render('login/index.html.twig', [
            'error' => $error
        ]);
    }
}
