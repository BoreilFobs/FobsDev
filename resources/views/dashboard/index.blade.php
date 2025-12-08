@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard Overview')

@section('content')
<div class="container-fluid">
    <div class="row g-4">
        <!-- Portfolio Stats -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
                <h3>{{ $portfolioCount }}</h3>
                <p>Total Projets</p>
            </div>
        </div>

        <!-- Nouvelles demandes de devis -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <h3>{{ $newQuotesCount }}</h3>
                <p>Nouveaux Devis</p>
                @if($newQuotesCount > 0)
                    <span class="badge bg-danger">Nouveau</span>
                @endif
            </div>
        </div>

        <!-- Nouveaux messages -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <h3>{{ $newContactsCount }}</h3>
                <p>Nouveaux Messages</p>
                @if($newContactsCount > 0)
                    <span class="badge bg-danger">Nouveau</span>
                @endif
            </div>
        </div>

        <!-- Projets actifs -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <h3>{{ $activePortfolioCount }}</h3>
                <p>Projets Actifs</p>
            </div>
        </div>
    </div>

    <!-- Récentes demandes de devis -->
    @if($recentQuotes->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-file-earmark-text me-2"></i>Demandes de Devis Récentes</h5>
                    <a href="{{ route('dashboard.quotes.index') }}" class="btn btn-sm btn-gradient">Voir tout</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th>Type de Projet</th>
                                    <th>Budget</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentQuotes as $quote)
                                <tr>
                                    <td data-label="Client"><strong>{{ $quote->full_name }}</strong></td>
                                    <td data-label="Email">{{ $quote->email }}</td>
                                    <td data-label="Type">
                                        @switch($quote->project_type)
                                            @case('site_web') Site Web @break
                                            @case('e_commerce') E-commerce @break
                                            @case('application_web') Application Web @break
                                            @case('application_mobile') Application Mobile @break
                                            @case('refonte') Refonte @break
                                            @default Autre
                                        @endswitch
                                    </td>
                                    <td data-label="Budget">{{ number_format($quote->budget_range, 0, ',', ' ') }} €</td>
                                    <td data-label="Statut">
                                        @if($quote->status === 'nouveau')
                                            <span class="badge bg-danger">Nouveau</span>
                                        @elseif($quote->status === 'en_cours')
                                            <span class="badge" style="background: var(--accent-color);">En cours</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($quote->status) }}</span>
                                        @endif
                                    </td>
                                    <td data-label="Date">{{ $quote->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Récents messages de contact -->
    @if($recentContacts->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-envelope me-2"></i>Messages Récents</h5>
                    <a href="{{ route('dashboard.contacts.index') }}" class="btn btn-sm btn-gradient">Voir tout</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Sujet</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentContacts as $contact)
                                <tr>
                                    <td data-label="Nom"><strong>{{ $contact->name }}</strong></td>
                                    <td data-label="Email">{{ $contact->email }}</td>
                                    <td data-label="Sujet">{{ Str::limit($contact->subject, 50) }}</td>
                                    <td data-label="Statut">
                                        @if($contact->status === 'nouveau')
                                            <span class="badge bg-danger">Nouveau</span>
                                        @elseif($contact->status === 'lu')
                                            <span class="badge" style="background: var(--accent-color);">Lu</span>
                                        @else
                                            <span class="badge bg-success">Répondu</span>
                                        @endif
                                    </td>
                                    <td data-label="Date">{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-lightning-fill me-2"></i>Actions Rapides</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('dashboard.portfolio.create') }}" class="btn btn-gradient">
                            <i class="bi bi-plus-circle me-2"></i>Nouveau Projet
                        </a>
                        <a href="{{ route('dashboard.quotes.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-file-earmark-text me-2"></i>Gérer les Devis
                        </a>
                        <a href="{{ route('dashboard.contacts.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-envelope me-2"></i>Voir les Messages
                        </a>
                        <a href="/" target="_blank" class="btn btn-outline-secondary">
                            <i class="bi bi-eye me-2"></i>Voir le Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
