@extends('dashboard.layout')

@section('title', 'Gestion des Devis')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">📋 Demandes de Devis</h1>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Nouveaux</h6>
                            <h3 class="mb-0">{{ $quotes->where('status', 'nouveau')->count() }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="bi bi-envelope-fill text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">En Cours</h6>
                            <h3 class="mb-0">{{ $quotes->where('status', 'en_cours')->count() }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="bi bi-hourglass-split text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Acceptés</h6>
                            <h3 class="mb-0">{{ $quotes->where('status', 'accepte')->count() }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="bi bi-check-circle-fill text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total</h6>
                            <h3 class="mb-0">{{ $quotes->total() }}</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="bi bi-bar-chart-fill text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Type de Projet</th>
                            <th>Budget</th>
                            <th>Délai</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotes as $quote)
                            <tr>
                                <td><strong>#{{ $quote->id }}</strong></td>
                                <td>
                                    <strong>{{ $quote->full_name }}</strong><br>
                                    <small class="text-muted">{{ $quote->company ?? 'Particulier' }}</small>
                                </td>
                                <td>
                                    <small>
                                        <i class="bi bi-envelope"></i> {{ $quote->email }}<br>
                                        <i class="bi bi-telephone"></i> {{ $quote->phone }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ str_replace('_', ' ', ucfirst($quote->project_type)) }}
                                    </span>
                                </td>
                                <td>{{ number_format($quote->budget_range, 0, ',', ' ') }}€</td>
                                <td>{{ str_replace('_', ' ', $quote->deadline) }}</td>
                                <td>
                                    @php
                                        $statusColors = [
                                            'nouveau' => 'primary',
                                            'en_cours' => 'warning',
                                            'devis_envoye' => 'info',
                                            'accepte' => 'success',
                                            'refuse' => 'danger',
                                            'termine' => 'secondary'
                                        ];
                                        $color = $statusColors[$quote->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $color }}">
                                        {{ ucfirst(str_replace('_', ' ', $quote->status)) }}
                                    </span>
                                </td>
                                <td>
                                    <small>{{ $quote->created_at->format('d/m/Y') }}</small><br>
                                    <small class="text-muted">{{ $quote->created_at->diffForHumans() }}</small>
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.quotes.show', $quote) }}" class="btn btn-sm btn-outline-primary" title="Voir détails">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('dashboard.quotes.destroy', $quote) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce devis ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                                    <p class="text-muted">Aucune demande de devis pour le moment</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($quotes->hasPages())
                <div class="mt-4">
                    {{ $quotes->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
