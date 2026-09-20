<?php

namespace App\Controllers;

class Competence extends BaseController
{
    public function competence(int $id): string
    {
        $data= [
            1 => [
                'code' => 'BIN51',
                'title' => 'Réaliser un développement d application C1 ',
                'description' => 'Développer des applications en réponse à un besoin métier identifié.',
                'ressources' => [
                    'Qualité algorithmique',
                    'Programmation avancée',
                    'Sensibilisation à la programmation multimédia',
                    'Automatisation de la chaîne de production',
                    'Qualité de développement',
                    'Virtualisation avancée',
                    'Nouveaux paradigmes de bases de données',
                    'Économie durable et numérique',
                    'Anglais',
                    'Développement avancé',
                ],
                'situation' =>'Dans cette compétence, je me situe plus dans la partie Programmation avancée et 
                               Qualité de développement. J’ai pu mettre en pratique mes connaissances en programmation 
                               pour développer des applications répondant à des besoins métiers spécifiques. 
                               J’ai également appris à structurer mon code de manière efficace et à utiliser des outils 
                               pour automatiser les processus de développement.'          
            ],
            2 => [
                'code' => 'BIN52',
                'title' => 'Optimiser des applications C2',
                'description' => 'Optimiser des applications informatiques et en garantir la qualité.',
                'ressources' => [
                    'Qualité algorithmique',
                    'Programmation avancée',
                    'Sensibilisation à la programmation multimédia',
                    'Automatisation de la chaîne de production',
                    'Qualité de développement',
                    'Virtualisation avancée',
                    'Nouveaux paradigmes de bases de données',
                    'Économie durable et numérique',
                    'Anglais',
                    'Développement avancé',
                ],
                'situation' =>'Dans cette compétence, je me situe plus dans la partie Programmation avancée 
                               et Qualité de développement. J’ai pu mettre en pratique mes connaissances en programmation 
                               pour améliorer la qualité et l’efficacité des applications que j’ai développées. 
                               J’ai également appris à identifier les points faibles du code et à les corriger pour 
                               optimiser les performances globales des applications.'
            ],
            3 => [
                'code' => 'BIN56',
                'title' => 'Collaborer au sein d une équipe informatique C3',
                'description' => 'Travailler en équipe, partager les tâches et participer à la  réussite d’un projet collectif.',
                'ressources' => [
                    'Initiation mangement equipe informatique',
                    'PPP',
                    'Politique de communication',
                    'Sensibilisation à la programmation multimédia',
                    'Automatisation de la chaîne de production',
                    'Economie durable et numérique',
                    'Anglais',
                    'Développement avancé',
                ],
                'situation' =>'Dans cette compétence, je me situe plus dans la partie Politique de communication
                               car j’ai pu mettre en pratique mes connaissances en communication pour collaborer 
                               efficacement avec les membres de mon équipe. J’ai également appris à partager les 
                               tâches de manière équitable et à participer activement à la réussite du projet 
                               collectif en apportant mes idées et en respectant les délais impartis.' 
            ],
        ];

        return view('layout/header') . view('competence', ['data' => $data[$id]]) . view('layout/footer');
    }
}
