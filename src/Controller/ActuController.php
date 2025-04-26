<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActuController extends AbstractController
{
    #[Route('/actu', name: 'actu')]
    public function fetchPosts(Request $request): Response
    {
        $nbActu = $request->query->getInt('var', 0);

        $posts = [
            ["nom_ue" => "Mathématiques", "content" => "Cours sur les équations différentielles", "type" => "Cours"],
            ["nom_ue" => "Physique", "content" => "Introduction à la mécanique quantique", "type" => "Cours"],
            ["nom_ue" => "Informatique", "content" => "Programmation en C avancée", "type" => "TP"],
            ["nom_ue" => "Électronique", "content" => "Circuits logiques et transistors", "type" => "Cours"],
            ["nom_ue" => "Management", "content" => "Stratégies d'entreprise", "type" => "Séminaire"],
            ["nom_ue" => "Chimie", "content" => "Réactions acido-basiques", "type" => "Cours"],
            ["nom_ue" => "Anglais", "content" => "Techniques de communication", "type" => "TD"],
            ["nom_ue" => "Économie", "content" => "Microéconomie et marché", "type" => "Cours"],
            ["nom_ue" => "Mathématiques", "content" => "Algèbre linéaire", "type" => "Cours"],
            ["nom_ue" => "Physique", "content" => "Optique géométrique", "type" => "TP"]
        ];

        $limit = 3;
        $selectedPosts = array_slice($posts, $nbActu, $limit);

        $html = '';

        foreach ($selectedPosts as $post) {
            $html .= "<div class='post'>";
            $html .= "<h3>{$post['nom_ue']} ({$post['type']})</h3>";
            $html .= "<p>{$post['content']}</p>";
            $html .= "</div>";
        }

        if ($nbActu + $limit < count($posts)) {
            $html .= "<div id='plusActu' class='center'>";
            $html .= "<button type='button' onclick='chargerActu(" . ($nbActu + $limit) . ")'>Charger plus de Posts</button>";
            $html .= "</div>";
        }

        return new Response($html);
    }
}
