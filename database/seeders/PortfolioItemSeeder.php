<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortfolioItem;

class PortfolioItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolioItems = [
            [
                'title' => 'FobsSMS',
                'slug' => 'fobssms',
                'category' => 'Développement Web et Mobile',
                'client' => 'Personnel',
                'project_date' => '01 juin, 2025',
                'project_url_external' => 'https://sms.fobs.dev',
                'project_url_external_text' => 'Visiter la Plateforme FobsSMS',
                'description' => 'Un système complet de gestion scolaire conçu pour rationaliser les tâches administratives, la gestion des élèves et les opérations académiques.',
                'overview' => 'FobsSMS est un système complet de gestion scolaire conçu pour les plateformes web et mobile. Il rationalise les processus administratifs, académiques et de communication pour les écoles, offrant des expériences adaptées en fonction des rôles d\'utilisateur tels que les administrateurs, les enseignants, les élèves et les parents.',
                'overview_additional' => 'Le système permet une gestion efficace des dossiers des élèves, de la présence, des notes, de la planification et de la communication, garantissant que toutes les parties prenantes ont un accès sécurisé et facile aux informations pertinentes à tout moment, n\'importe où.',
                'main_image' => 'assets/img/portfolio/FobsSMS/1.png',
                'gallery_images' => [
                    'assets/img/portfolio/FobsSMS/1.png',
                    'assets/img/portfolio/FobsSMS/2.png',
                    'assets/img/portfolio/FobsSMS/3.png'
                ],
                'url' => '/FobsSMS',
                'features' => [
                    [
                        'icon' => 'bi-check-circle-fill',
                        'title' => 'Accès Basé sur les Rôles',
                        'description' => 'Tableaux de bord personnalisés et permissions pour les administrateurs, les enseignants, les élèves et les parents, garantissant que chaque utilisateur ne voit que les informations pertinentes à son rôle.'
                    ],
                    [
                        'icon' => 'bi-shield-check',
                        'title' => 'Gestion Sécurisée des Données',
                        'description' => 'Des protocoles de sécurité avancés protègent les données sensibles des élèves et de l\'école, avec des sauvegardes régulières et des communications cryptées sur toutes les plateformes.'
                    ],
                    [
                        'icon' => 'bi-graph-up',
                        'title' => 'Outils Académiques et Administratifs',
                        'description' => 'Des outils automatisés de présence, de notation, de gestion des emplois du temps et de reporting aident le personnel à gagner du temps et à réduire les erreurs.'
                    ],
                    [
                        'icon' => 'bi-phone',
                        'title' => 'Accessibilité Multi-Plateformes',
                        'description' => 'Accès transparent via des applications web et mobiles, permettant aux utilisateurs de rester connectés et informés que ce soit à l\'école, à la maison ou en déplacement.'
                    ]
                ],
                'technologies' => ['Laravel', 'Flutter', 'MySQL', 'RESTful API', 'Firebase'],
                'is_active' => true,
                'order' => 1
            ],
            [
                'title' => 'EDUCAM',
                'slug' => 'educam',
                'category' => 'Développement Web et Mobile',
                'client' => 'Atoh Francis',
                'project_date' => '24 Mai, 2025',
                'project_url_external' => 'https://educam.helonyxe.com',
                'project_url_external_text' => 'Lancer la Plateforme EDUCAM',
                'description' => 'Une plateforme de révision GCE avec des applications web et Android conçues pour améliorer les expériences d\'apprentissage des élèves avec un design réactif et une navigation fluide.',
                'overview' => 'Educam est une application web et mobile complète conçue spécifiquement pour les élèves du GCE camerounais. La plateforme fournit un large éventail de matériels de révision, de questions passées, de quiz interactifs et de ressources d\'étude pour aider les élèves à se préparer efficacement à leurs examens.',
                'overview_additional' => 'L\'application vise à simplifier le processus de révision en offrant un contenu organisé, des retours instantanés et un suivi des progrès. Avec des versions web et mobile, les élèves peuvent accéder à leurs matériels d\'étude à tout moment, n\'importe où, garantissant flexibilité et commodité.',
                'main_image' => 'assets/img/portfolio/Educam/1.png',
                'gallery_images' => [
                    'assets/img/portfolio/Educam/1.png',
                    'assets/img/portfolio/Educam/2.png',
                    'assets/img/portfolio/Educam/3.png'
                ],
                'url' => '/Educam',
                'features' => [
                    [
                        'icon' => 'bi-check-circle-fill',
                        'title' => 'Design Réactif',
                        'description' => 'La plateforme est optimisée pour les appareils web et mobiles, offrant une expérience transparente aux élèves sur n\'importe quel appareil.'
                    ],
                    [
                        'icon' => 'bi-book',
                        'title' => 'Matériels de Révision Étendus',
                        'description' => 'Accès à une vaste base de données de questions passées du GCE, de réponses et d\'explications détaillées pour une révision complète.'
                    ],
                    [
                        'icon' => 'bi-bar-chart',
                        'title' => 'Suivi des Progrès',
                        'description' => 'Les élèves peuvent suivre leurs progrès de révision, identifier leurs forces et faiblesses, et se concentrer sur les domaines nécessitant une amélioration.'
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Quiz Interactifs',
                        'description' => 'Participez à des quiz interactifs et des retours instantanés pour renforcer l\'apprentissage et booster la confiance aux examens.'
                    ]
                ],
                'technologies' => ['Laravel', 'Flutter', 'MySQL', 'Bootstrap', 'Android SDK'],
                'is_active' => true,
                'order' => 2
            ],
            [
                'title' => 'Glow & Chic',
                'slug' => 'glowandchic',
                'category' => 'Développement Web et Mobile',
                'client' => 'Mme Susie',
                'project_date' => '25 juin, 2025',
                'project_url_external' => 'https://glowandchicgarden.fobs.dev',
                'project_url_external_text' => 'Visiter Glow & Chic Garden',
                'description' => 'Une plateforme e-commerce moderne pour les produits de beauté et de mode avec une interface intuitive et une expérience d\'achat fluide.',
                'overview' => 'L\'application Glow & Chic Garden est une solution complète conçue pour révolutionner les opérations des salons de beauté. Elle intègre de manière transparente la réservation en ligne pour les clients avec des outils de gestion interne robustes pour le salon, rationalisant les rendez-vous, les horaires du personnel et la gestion critique des stocks.',
                'overview_additional' => 'Cette plateforme intuitive offre une expérience sur mesure pour les propriétaires de salon, le personnel et les clients. Elle garantit une prestation de services efficace, optimise l\'allocation des ressources et améliore la satisfaction client en offrant un accès facile aux services, à l\'historique des rendez-vous et aux offres personnalisées.',
                'main_image' => 'assets/img/portfolio/glowandchic/1.png',
                'gallery_images' => [
                    'assets/img/portfolio/glowandchic/1.png',
                    'assets/img/portfolio/glowandchic/2.png',
                    'assets/img/portfolio/glowandchic/3.png'
                ],
                'url' => '/glowandchic',
                'features' => [
                    [
                        'icon' => 'bi-calendar-check',
                        'title' => 'Réservation en Ligne Sans Effort',
                        'description' => 'Les clients peuvent facilement parcourir les services, consulter la disponibilité du personnel et réserver des rendez-vous 24h/24 et 7j/7 via une interface conviviale, réduisant les absences et les appels administratifs.'
                    ],
                    [
                        'icon' => 'bi-box-seam',
                        'title' => 'Gestion Intelligente des Stocks',
                        'description' => 'Suivez l\'inventaire des produits en temps réel, recevez des alertes de stock faible, gérez les commandes fournisseurs et analysez la consommation des produits pour optimiser les niveaux de stock et minimiser le gaspillage.'
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Gestion des Clients et du Personnel',
                        'description' => 'Maintenez des profils clients détaillés, l\'historique des services et les préférences. Gérez efficacement les horaires du personnel, les commissions et les performances, garantissant des opérations fluides du salon.'
                    ],
                    [
                        'icon' => 'bi-bar-chart',
                        'title' => 'Analyses de Performance et Rapports',
                        'description' => 'Obtenez des informations sur les services populaires, les heures de pointe de réservation, les performances du personnel et le chiffre d\'affaires des stocks avec des rapports et tableaux de bord complets pour stimuler la croissance de l\'entreprise.'
                    ]
                ],
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Bootstrap', 'RESTful API', 'Stripe'],
                'is_active' => true,
                'order' => 3
            ]
        ];

        foreach ($portfolioItems as $item) {
            PortfolioItem::create($item);
        }
    }
}
