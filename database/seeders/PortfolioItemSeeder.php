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
                'title' => 'Ristorante La Dolce Vita',
                'slug' => 'ristorante-la-dolce-vita',
                'category' => 'Site Vitrine Restaurant',
                'client' => 'Marco Rossi',
                'project_date' => '15 Novembre, 2024',
                'project_url_external' => 'https://ladolcevita-example.it',
                'project_url_external_text' => 'Visiter le Site',
                'description' => 'Site vitrine élégant pour un restaurant italien de Rome, avec menu interactif, réservations en ligne et galerie photos. Livré en 7 jours.',
                'overview' => 'La Dolce Vita est un restaurant italien traditionnel situé au cœur de Rome. Le site vitrine créé met en valeur l\'authenticité et l\'élégance de l\'établissement avec un design moderne et responsive.',
                'overview_additional' => 'Le site inclut un système de réservation en ligne intégré, un menu interactif avec photos des plats, une galerie photo professionnelle et une section pour les avis clients. Optimisé pour le référencement local et les appareils mobiles.',
                'main_image' => 'assets/img/portfolio/FobsSMS/1.png',
                'gallery_images' => [
                    'assets/img/portfolio/FobsSMS/1.png',
                    'assets/img/portfolio/FobsSMS/2.png',
                    'assets/img/portfolio/FobsSMS/3.png'
                ],
                'url' => '/ristorante-la-dolce-vita',
                'features' => [
                    [
                        'icon' => 'bi-check-circle-fill',
                        'title' => 'Réservation en Ligne',
                        'description' => 'Système de réservation intégré permettant aux clients de réserver une table directement depuis le site web.'
                    ],
                    [
                        'icon' => 'bi-phone',
                        'title' => 'Design Responsive',
                        'description' => 'Site parfaitement adapté à tous les appareils (smartphone, tablette, ordinateur) pour une expérience optimale.'
                    ],
                    [
                        'icon' => 'bi-camera',
                        'title' => 'Galerie Photos',
                        'description' => 'Galerie professionnelle mettant en valeur l\'ambiance du restaurant et les plats signature.'
                    ],
                    [
                        'icon' => 'bi-search',
                        'title' => 'Optimisation SEO',
                        'description' => 'Référencement optimisé pour apparaître en première page de Google pour les recherches locales.'
                    ]
                ],
                'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'PHP', 'Bootstrap'],
                'is_active' => true,
                'order' => 1
            ],
            [
                'title' => 'Studio Foto Bianchi',
                'slug' => 'studio-foto-bianchi',
                'category' => 'Site Vitrine Photographe',
                'client' => 'Sophia Bianchi',
                'project_date' => '22 Octobre, 2024',
                'project_url_external' => 'https://studiobianchi-example.it',
                'project_url_external_text' => 'Découvrir le Portfolio',
                'description' => 'Portfolio en ligne pour photographe professionnel à Milan. Design minimaliste mettant en valeur les œuvres photographiques. Livraison express en 7 jours.',
                'overview' => 'Studio Foto Bianchi est un studio de photographie professionnelle spécialisé dans les mariages, portraits et événements. Le site vitrine créé reflète l\'élégance et le professionnalisme du photographe.',
                'overview_additional' => 'Le design minimaliste et épuré met l\'accent sur les photographies. Le site inclut un portfolio organisé par catégories, un formulaire de contact personnalisé, et une section témoignages clients. Temps de chargement ultra-rapide pour une expérience utilisateur optimale.',
                'main_image' => 'assets/img/portfolio/Educam/1.png',
                'gallery_images' => [
                    'assets/img/portfolio/Educam/1.png',
                    'assets/img/portfolio/Educam/2.png',
                    'assets/img/portfolio/Educam/3.png'
                ],
                'url' => '/studio-foto-bianchi',
                'features' => [
                    [
                        'icon' => 'bi-images',
                        'title' => 'Portfolio Dynamique',
                        'description' => 'Galerie photos organisée par catégories avec effets visuels élégants et navigation intuitive.'
                    ],
                    [
                        'icon' => 'bi-speedometer2',
                        'title' => 'Performance Optimale',
                        'description' => 'Images optimisées et chargement ultra-rapide pour une navigation fluide sur tous les appareils.'
                    ],
                    [
                        'icon' => 'bi-envelope',
                        'title' => 'Formulaire Contact',
                        'description' => 'Formulaire de demande de devis personnalisé avec champs adaptés aux besoins des photographes.'
                    ],
                    [
                        'icon' => 'bi-star',
                        'title' => 'Témoignages Clients',
                        'description' => 'Section dédiée aux avis et témoignages des clients satisfaits pour renforcer la crédibilité.'
                    ]
                ],
                'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'Lazy Loading', 'Responsive Design'],
                'is_active' => true,
                'order' => 2
            ],
            [
                'title' => 'Avvocato Ferrari & Associati',
                'slug' => 'avvocato-ferrari-associati',
                'category' => 'Site Vitrine Cabinet d\'Avocats',
                'client' => 'Alessandro Ferrari',
                'project_date' => '08 Septembre, 2024',
                'project_url_external' => 'https://ferrarilaw-example.it',
                'project_url_external_text' => 'Consulter le Site',
                'description' => 'Site web professionnel pour cabinet d\'avocats à Florence. Design sobre et élégant reflétant le sérieux et l\'expertise juridique. Réalisé en 7 jours.',
                'overview' => 'Ferrari & Associati est un cabinet d\'avocats renommé spécialisé en droit des affaires et droit civil. Le site vitrine créé transmet professionnalisme et confiance aux clients potentiels.',
                'overview_additional' => 'Le site présente les domaines d\'expertise, les profils des avocats, des articles juridiques et un formulaire de consultation confidentiel. Design professionnel avec codes couleurs sobres. Conformité RGPD et sécurité renforcée pour la protection des données clients.',
                'main_image' => 'assets/img/portfolio/Glow/1.png',
                'gallery_images' => [
                    'assets/img/portfolio/Glow/1.png',
                    'assets/img/portfolio/Glow/2.png',
                    'assets/img/portfolio/Glow/3.png'
                ],
                'url' => '/avvocato-ferrari-associati',
                'features' => [
                    [
                        'icon' => 'bi-briefcase',
                        'title' => 'Domaines d\'Expertise',
                        'description' => 'Présentation claire et détaillée des différents domaines de compétence juridique du cabinet.'
                    ],
                    [
                        'icon' => 'bi-shield-lock',
                        'title' => 'Sécurité & RGPD',
                        'description' => 'Conformité totale au RGPD avec formulaires sécurisés et protection des données clients.'
                    ],
                    [
                        'icon' => 'bi-journal-text',
                        'title' => 'Blog Juridique',
                        'description' => 'Section articles et actualités juridiques pour démontrer l\'expertise et améliorer le SEO.'
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Profils Avocats',
                        'description' => 'Présentation détaillée de chaque avocat avec parcours, spécialisations et coordonnées.'
                    ]
                ],
                'technologies' => ['HTML5', 'CSS3', 'PHP', 'SSL', 'RGPD Compliant'],
                'is_active' => true,
                'order' => 3
            ]
        ];

        foreach ($portfolioItems as $item) {
            PortfolioItem::create($item);
        }
    }
}
