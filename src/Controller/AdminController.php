<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $users = [
            ['id' => 1, 'nom' => 'Doe', 'prenom' => 'John' ,'email' => 'john@example.com', 'role' => 'Etudiant', 'ues' => [1,2,3]],
            ['id' => 2, 'nom' => 'Smith', 'prenom' => 'Jane', 'email' => 'jane@example.com', 'role' => 'Professeur', 'ues' => [3,5]],
            ['id' => 3, 'nom' => 'Newton', 'prenom' => 'Albert' , 'email' => 'albert@example.com', 'role' => 'Administrateur', 'ues' => [5,6]],
            ['id' => 4, 'nom' => 'Doe', 'prenom' => 'Jone', 'email' => 'john@example.com', 'role' => 'Etudiant', 'ues' => [1, 4,6]],
            ['id' => 5, 'nom' => 'Smith', 'prenom' => 'Jane', 'email' => 'jane@example.com', 'role' => 'Professeur', 'ues' => [2, 3,5]],
            ['id' => 6, 'nom' => 'Newton', 'prenom' => 'Albert', 'email' => 'albert@example.com', 'role' => 'Administrateur', 'ues' => [2, 5]],
        ];

        $ues = [
            ['id' => 1, 'code' => 'MT3E', 'description' => 'Mathématiques avancés', 'image' => 'png'],
            ['id' => 2, 'code' => 'PS2', 'description' => 'Physique générale', 'image' => 'png'],
            ['id' => 3, 'code' => 'WE4A', 'description' => 'Programmation web', 'image' => 'png'],
            ['id' => 4, 'code' => 'IT4A', 'description' => 'Théorie des graphes', 'image' => 'png'],
            ['id' => 5, 'code' => 'LC00', 'description' => 'Chinois débutant', 'image' => 'png'],
            ['id' => 6, 'code' => 'PC40', 'description' => 'Parallel computing', 'image' => 'png'],
        ];

        return $this->render('admin/admin.html.twig', [
            'users' => $users,
            'ues' => $ues,
        ]);
    }
}