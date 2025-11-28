<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - FobsDev Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 280px;
            /* Couleurs UNIFORMES du site principal */
            --background-color: #b1a9a2;
            --accent-color: #a86d37;
            --surface-color: #c8b9aa;
            --heading-color: #2d2320;
            --default-color: #2d2320;
            --contrast-color: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--background-color);
            color: var(--default-color);
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar - Marron uniforme */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: #2d2320;
            color: white;
            padding: 0;
            z-index: 1000;
            box-shadow: 4px 0 15px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }

        .sidebar.mobile-hidden {
            transform: translateX(-100%);
        }

        .sidebar .brand {
            padding: 28px 20px;
            font-size: 1.7rem;
            font-weight: bold;
            text-align: center;
            background: var(--accent-color);
            color: white;
            border-bottom: 3px solid #8a5a2d;
            margin-bottom: 0;
        }

        .sidebar .brand i {
            color: white;
            font-size: 1.9rem;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 16px 25px;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            display: flex;
            align-items: center;
            font-size: 1.05rem;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            color: white;
            background: rgba(168, 109, 55, 0.2);
            border-left-color: var(--accent-color);
        }

        .sidebar .nav-link.active {
            color: white;
            background: rgba(168, 109, 55, 0.3);
            border-left-color: var(--accent-color);
            font-weight: bold;
        }

        .sidebar .nav-link i {
            font-size: 1.3rem;
            min-width: 28px;
        }

        .sidebar hr {
            border-color: rgba(255,255,255,0.2);
            margin: 12px 0;
        }

        /* Mobile Toggle Button - Marron uniforme */
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--accent-color);
            color: white;
            border: none;
            width: 52px;
            height: 52px;
            border-radius: 12px;
            font-size: 1.6rem;
            box-shadow: 0 4px 15px rgba(168, 109, 55, 0.4);
            cursor: pointer;
            transition: all 0.3s;
        }

        .mobile-toggle:hover {
            background: #8a5a2d;
            transform: scale(1.05);
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(45, 35, 32, 0.6);
            z-index: 999;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* Main Content - Fond beige clair */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .top-bar {
            background: white;
            padding: 22px 32px;
            box-shadow: 0 3px 15px rgba(45, 35, 32, 0.1);
            border-radius: 15px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid var(--accent-color);
        }

        .top-bar h4 {
            color: var(--heading-color);
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .top-bar .text-muted {
            color: var(--default-color) !important;
            opacity: 0.7;
        }

        /* Stat Cards - Fond blanc uniforme */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(45, 35, 32, 0.1);
            transition: all 0.3s;
            border: 2px solid transparent;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(168, 109, 55, 0.2);
            border-color: var(--accent-color);
        }

        .stat-icon {
            width: 65px;
            height: 65px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            background: var(--accent-color);
            color: white;
            margin-bottom: 16px;
            box-shadow: 0 6px 18px rgba(168, 109, 55, 0.3);
        }

        .stat-card h3 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--heading-color);
            margin: 12px 0;
        }

        .stat-card p {
            color: var(--default-color);
            font-weight: 600;
            opacity: 0.85;
            margin: 0;
        }

        /* Buttons - Marron uniforme */
        .btn-gradient {
            background: var(--accent-color);
            border: none;
            color: white;
            padding: 13px 32px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(168, 109, 55, 0.3);
        }

        .btn-gradient:hover {
            background: #8a5a2d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(168, 109, 55, 0.4);
        }

        /* Alerts - Fond clair */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 22px;
            font-weight: 600;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        /* Tables - Fond blanc uniforme */
        .table {
            color: var(--default-color);
            background: white;
        }

        .table thead th {
            background: #2d2320;
            color: white;
            border: none;
            font-weight: 700;
            white-space: nowrap;
            padding: 16px 12px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table thead th:first-child {
            border-top-left-radius: 12px;
        }

        .table thead th:last-child {
            border-top-right-radius: 12px;
        }

        .table tbody tr {
            background: white;
            border-bottom: 1px solid rgba(45, 35, 32, 0.08);
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background: rgba(168, 109, 55, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            vertical-align: middle;
            padding: 16px 12px;
            font-weight: 500;
        }

        .table img {
            box-shadow: 0 3px 10px rgba(45, 35, 32, 0.15);
        }

        .table .btn-group {
            gap: 6px;
        }

        .table .btn-sm {
            padding: 7px 14px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Cards - Fond blanc */
        .card {
            background: white;
            border: none;
            color: var(--default-color);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(45, 35, 32, 0.1);
        }

        .card-header {
            background: rgba(168, 109, 55, 0.08);
            border-bottom: 2px solid var(--accent-color);
            color: var(--heading-color);
            font-weight: 700;
            padding: 18px 22px;
            border-radius: 15px 15px 0 0 !important;
        }

        .card-body {
            padding: 22px;
        }

        /* Forms - Fond clair */
        .form-label {
            color: var(--heading-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            background: rgba(177, 169, 162, 0.08);
            border: 2px solid rgba(168, 109, 55, 0.2);
            color: var(--default-color);
            padding: 13px 16px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            background: white;
            border-color: var(--accent-color);
            color: var(--default-color);
            box-shadow: 0 0 0 0.3rem rgba(168, 109, 55, 0.15);
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: rgba(45, 35, 32, 0.4);
        }

        /* Badge - Marron */
        .badge {
            padding: 7px 14px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .badge.bg-success {
            background: var(--accent-color) !important;
        }

        .badge.bg-warning {
            background: #e0a800 !important;
        }

        /* Boutons outline */
        .btn-outline-primary {
            border: 2px solid var(--accent-color);
            color: var(--accent-color);
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }

        .btn-outline-danger {
            border: 2px solid #dc3545;
            color: #dc3545;
            font-weight: 600;
        }

        .btn-outline-danger:hover {
            background: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .mobile-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-visible {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 20px 15px;
                padding-top: 80px;
            }

            .top-bar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
                padding: 20px;
            }

            .top-bar .user-info {
                flex-direction: column;
            }

            .stat-card {
                margin-bottom: 20px;
            }

            /* Cartes responsive */
            .row.g-4 {
                gap: 1rem !important;
            }

            /* Boutons en pleine largeur */
            .d-flex.gap-2 {
                flex-direction: column;
            }

            .d-flex.gap-2 .btn {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            :root {
                --sidebar-width: 280px;
            }

            .top-bar h4 {
                font-size: 1.3rem;
            }

            .btn-gradient {
                padding: 11px 22px;
                font-size: 0.9rem;
                width: 100%;
            }

            /* Tous les boutons en pleine largeur sur mobile */
            .btn:not(.btn-close) {
                width: 100%;
                margin-bottom: 8px;
            }

            .btn-group {
                flex-direction: column;
                width: 100%;
                gap: 8px;
            }

            .btn-group .btn {
                width: 100%;
            }

            /* Tables responsive - Format carte */
            .table {
                font-size: 0.9rem;
            }

            .table-responsive {
                overflow-x: visible !important;
            }

            .table thead {
                display: none;
            }

            .table tbody tr {
                display: block;
                margin-bottom: 22px;
                border: 2px solid rgba(168, 109, 55, 0.2);
                border-radius: 12px;
                padding: 18px;
                box-shadow: 0 3px 12px rgba(45, 35, 32, 0.08);
                background: white;
            }

            .table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 11px 0;
                border: none;
                border-bottom: 1px solid rgba(45, 35, 32, 0.08);
            }

            .table tbody td:last-child {
                border-bottom: none;
            }

            .table tbody td::before {
                content: attr(data-label);
                font-weight: 700;
                color: var(--accent-color);
                margin-right: 12px;
                min-width: 100px;
            }

            .table tbody td img {
                width: 55px !important;
                height: 55px !important;
            }

            .table .btn-group {
                flex-direction: column;
                width: 100%;
                gap: 8px;
            }

            .table .btn-sm {
                width: 100%;
            }

            .stat-icon {
                width: 55px;
                height: 55px;
                font-size: 1.7rem;
            }

            .stat-card h3 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px 10px;
                padding-top: 70px;
            }

            .top-bar {
                padding: 15px;
            }

            .stat-card {
                padding: 20px;
            }

            .sidebar .brand {
                font-size: 1.3rem;
                padding: 20px 15px;
            }

            .sidebar .nav-link {
                padding: 12px 20px;
                font-size: 0.95rem;
            }

            /* Cards responsive */
            .card-header {
                padding: 15px;
                flex-direction: column;
                text-align: center;
            }

            .card-body {
                padding: 15px;
            }

            /* Formulaires responsive */
            .form-control,
            .form-select {
                font-size: 16px; /* Évite le zoom sur iOS */
            }

            /* Actions responsive */
            .d-grid {
                gap: 10px !important;
            }

            /* Row/Col responsive */
            .row.g-4 {
                gap: 0.8rem !important;
            }

            .col-12,
            .col-md-6,
            .col-lg-3,
            .col-lg-4,
            .col-lg-8 {
                padding-left: 8px;
                padding-right: 8px;
            }

            /* Text plus petit */
            h3 {
                font-size: 1.4rem;
            }

            h5 {
                font-size: 1.1rem;
            }

            /* Badges plus petits */
            .badge {
                font-size: 0.75rem;
                padding: 5px 10px;
            }

            /* Images responsive */
            img {
                max-width: 100%;
                height: auto;
            }
        }

        /* Styles mobiles pour formulaires */
        @media (max-width: 480px) {
            .form-row .col-md-6 {
                margin-bottom: 15px;
            }

            .card-header h5 {
                font-size: 1rem;
            }

            .stat-card h3 {
                font-size: 1.6rem;
            }

            .stat-card p {
                font-size: 0.85rem;
            }

            /* Pagination responsive */
            .pagination {
                font-size: 0.85rem;
            }

            .page-link {
                padding: 6px 10px;
            }
        }

        /* Utilitaires mobiles */
        @media (max-width: 768px) {
            .d-md-flex {
                flex-direction: column !important;
                align-items: stretch !important;
            }

            .justify-content-between {
                justify-content: center !important;
            }

            .text-md-end {
                text-align: center !important;
            }

            .ms-auto,
            .me-auto {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }

            /* Espacements */
            .mt-4,
            .my-4 {
                margin-top: 1.5rem !important;
            }

            .mb-4,
            .my-4 {
                margin-bottom: 1.5rem !important;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <i class="bi bi-code-slash"></i> FobsDev
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.portfolio.*') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.index') }}">
                <i class="bi bi-briefcase me-2"></i> Portfolio
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.quotes.*') ? 'active' : '' }}" href="{{ route('dashboard.quotes.index') }}">
                <i class="bi bi-file-earmark-text me-2"></i> Demandes de Devis
                @php
                    $newQuotesCount = \App\Models\Quote::where('status', 'nouveau')->count();
                @endphp
                @if($newQuotesCount > 0)
                    <span class="badge bg-danger rounded-pill ms-2">{{ $newQuotesCount }}</span>
                @endif
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.contacts.*') ? 'active' : '' }}" href="{{ route('dashboard.contacts.index') }}">
                <i class="bi bi-envelope me-2"></i> Messages
                @php
                    $newContactsCount = \App\Models\Contact::where('status', 'nouveau')->count();
                @endphp
                @if($newContactsCount > 0)
                    <span class="badge bg-danger rounded-pill ms-2">{{ $newContactsCount }}</span>
                @endif
            </a>
            <hr style="border-color: rgba(255,255,255,0.2);">
            <a class="nav-link" href="{{ route('dashboard.notifications') }}" @if(request()->routeIs('dashboard.notifications')) class="nav-link active" @endif>
                <i class="bi bi-bell-fill me-2"></i> Notifications
            </a>
            <a class="nav-link" href="/" target="_blank">
                <i class="bi bi-globe me-2"></i> Voir le Site
            </a>
            <a class="nav-link" href="#" onclick="event.preventDefault(); handleLogout();">
                <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div>
                <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
            </div>
            <div>
                <span class="text-muted">Welcome, {{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </div>

        <!-- Content -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Firebase Scripts -->
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging-compat.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function handleLogout() {
            // Clear persistent login token from localStorage
            localStorage.removeItem('fobsdev_remember_login');
            // Submit the logout form
            document.getElementById('logout-form').submit();
        }
        
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            sidebar.classList.toggle('mobile-visible');
            overlay.classList.toggle('active');
        }

        // Close sidebar when clicking on a link (mobile)
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 992) {
                    toggleSidebar();
                }
            });
        });

        // Handle resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 992) {
                document.getElementById('sidebar').classList.remove('mobile-visible');
                document.querySelector('.sidebar-overlay').classList.remove('active');
            }
        });
    </script>
    
    <!-- Firebase Messaging -->
    <script src="{{ asset('assets/js/firebase-messaging.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
