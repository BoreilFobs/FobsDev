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
                'category' => 'Web and Mobile Development',
                'client' => 'Personal',
                'project_date' => '01 june, 2025',
                'project_url_external' => 'https://sms.fobs.dev',
                'project_url_external_text' => 'Visit FobsSMS Platform',
                'description' => 'A comprehensive school management system designed to streamline administrative tasks, student management, and academic operations.',
                'overview' => 'FobsSMS is a comprehensive School Management System designed making use of both web and mobile platforms. It streamlines administrative, academic, and communication processes for schools, providing tailored experiences based on user roles such as administrators, teachers, students, and parents.',
                'overview_additional' => 'The system enables efficient management of student records, attendance, grading, scheduling, and communication, ensuring all stakeholders have secure and easy access to relevant information anytime, anywhere.',
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
                        'title' => 'Role-Based Access',
                        'description' => 'Custom dashboards and permissions for administrators, teachers, students, and parents, ensuring each user sees only the information relevant to their role.'
                    ],
                    [
                        'icon' => 'bi-shield-check',
                        'title' => 'Secure Data Management',
                        'description' => 'Advanced security protocols protect sensitive student and school data, with regular backups and encrypted communications across all platforms.'
                    ],
                    [
                        'icon' => 'bi-graph-up',
                        'title' => 'Academic & Administrative Tools',
                        'description' => 'Automated attendance, grading, timetable management, and reporting tools help staff save time and reduce errors.'
                    ],
                    [
                        'icon' => 'bi-phone',
                        'title' => 'Multi-Platform Accessibility',
                        'description' => 'Seamless access via web and mobile apps, allowing users to stay connected and informed whether at school, home, or on the go.'
                    ]
                ],
                'technologies' => ['Laravel', 'Flutter', 'MySQL', 'RESTful API', 'Firebase'],
                'is_active' => true,
                'order' => 1
            ],
            [
                'title' => 'EDUCAM',
                'slug' => 'educam',
                'category' => 'Web and Mobile Development',
                'client' => 'Atoh Francis',
                'project_date' => '24 Mai, 2025',
                'project_url_external' => 'https://educam.helonyxe.com',
                'project_url_external_text' => 'Launch EDUCAM Platform',
                'description' => 'A GCE revision platform with web and Android applications designed to enhance student learning experiences with responsive design and smooth navigation.',
                'overview' => 'Educam is a comprehensive web and mobile application designed specifically for Cameroon GCE students. The platform provides a wide range of revision materials, past questions, interactive quizzes, and study resources to help students prepare effectively for their exams.',
                'overview_additional' => 'The application aims to simplify the revision process by offering organized content, instant feedback, and progress tracking. With both web and mobile versions, students can access their study materials anytime, anywhere, ensuring flexibility and convenience.',
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
                        'title' => 'Responsive Design',
                        'description' => 'The platform is optimized for both web and mobile devices, providing a seamless experience for students on any device.'
                    ],
                    [
                        'icon' => 'bi-book',
                        'title' => 'Extensive Revision Materials',
                        'description' => 'Access to a large database of GCE past questions, answers, and detailed explanations for comprehensive revision.'
                    ],
                    [
                        'icon' => 'bi-bar-chart',
                        'title' => 'Progress Tracking',
                        'description' => 'Students can monitor their revision progress, identify strengths and weaknesses, and focus on areas that need improvement.'
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Interactive Quizzes',
                        'description' => 'Engage with interactive quizzes and instant feedback to reinforce learning and boost exam confidence.'
                    ]
                ],
                'technologies' => ['Laravel', 'Flutter', 'MySQL', 'Bootstrap', 'Android SDK'],
                'is_active' => true,
                'order' => 2
            ],
            [
                'title' => 'Glow & Chic',
                'slug' => 'glowandchic',
                'category' => 'Web and Mobile Development',
                'client' => 'Mme Susie',
                'project_date' => '25 june, 2025',
                'project_url_external' => 'https://glowandchicgarden.fobs.dev',
                'project_url_external_text' => 'Visit Glow & Chic Garden',
                'description' => 'A modern e-commerce platform for beauty and fashion products with an intuitive interface and seamless shopping experience.',
                'overview' => 'The Glow & Chic Garden App is a comprehensive solution designed to revolutionize beauty salon operations. It seamlessly integrates online booking for clients with robust internal management tools for the salon, streamlining appointments, staff schedules, and critical stock management.',
                'overview_additional' => 'This intuitive platform provides a tailored experience for salon owners, staff, and clients. It ensures efficient service delivery, optimizes resource allocation, and enhances customer satisfaction by providing easy access to services, appointment history, and personalized offers.',
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
                        'title' => 'Effortless Online Booking',
                        'description' => 'Clients can easily browse services, view staff availability, and book appointments 24/7 through a user-friendly interface, reducing no-shows and administrative calls.'
                    ],
                    [
                        'icon' => 'bi-box-seam',
                        'title' => 'Intelligent Stock Management',
                        'description' => 'Track product inventory in real-time, receive low-stock alerts, manage supplier orders, and analyze product consumption to optimize stock levels and minimize waste.'
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Client & Staff Management',
                        'description' => 'Maintain detailed client profiles, service history, and preferences. Efficiently manage staff schedules, commissions, and performance, ensuring smooth salon operations.'
                    ],
                    [
                        'icon' => 'bi-bar-chart',
                        'title' => 'Performance Analytics & Reporting',
                        'description' => 'Gain insights into popular services, peak booking times, staff performance, and stock turnover with comprehensive reports and dashboards to drive business growth.'
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
