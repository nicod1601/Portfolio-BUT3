<?php

namespace App\Controllers;

class Projet extends BaseController
{
    public function index(): string
    {
        $data = [
            1 => [
                'title' => 'Développer un site Web e-commerce',
                'description' => 'Ce site est réalisé pour le cadre d\'un stage en entreprise. Il s\'agit d\'un site e-commerce permettant de vendre des produits en ligne. 
                                  Le site est développé en PHP avec le framework Laravel et utilise une base de données PostgreSQL. 
                                  Le site est responsive et s\'adapte à tous les types d\'écrans. Il est également sécurisé avec un système d\'authentification et de gestion 
                                  des utilisateurs.',
                'technique' => [
                    'Laravel',
                    'PHP',
                    'PostgreSQL',
                    'HTML',
                    'CSS',
                    'JavaScript',
                ],
                'images' => [
                    'assets/images/projet1/projet1.png',
                    'assets/images/projet1/projet2.png',
                    'assets/images/projet1/projet3.png',
                ],
            ],
            2 => [
                'title' => 'Développer une application Graphe',
                'description' => 'Cette application est développée en Java. Elle permet de créer et de manipuler des graphes. 
                                  L\'application permet de créer des graphes orientés ou non orientés, pondérés ou non pondérés. 
                                  Elle permet également de visualiser les graphes et d\'effectuer des algorithmes sur ceux-ci (parcours en profondeur, parcours en largeur, Dijkstra, etc.).',
                'technique' => [
                    'Java',
                    'Graphes',
                    'Méthode optimisation',
                ],
                'images' => [
                    'assets/images/projet2/projet1.png',
                    'assets/images/projet2/projet2.png',
                    'assets/images/projet2/projet3.png',
                ],
            ],
        ];

        return view('layout/header') . view('projet', ['data' => $data]) . view('layout/footer');
    }
}