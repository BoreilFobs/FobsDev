@extends('dashboard.layout')

@section('title', 'Gestion des Leads')

@section('page-title', 'Leads')

@section('content')
<style>
    /* Lead cards - épuré et mobile-friendly */
    .lead-table tbody tr {
        background: white;
        border-bottom: 1px solid rgba(45, 35, 32, 0.1);
        transition: all 0.2s ease;
    }

    .lead-table tbody tr:hover {
        background: rgba(168, 109, 55, 0.05);
    }

    .lead-table td {
        padding: 18px 12px !important;
        vertical-align: middle;
    }

    .lead-table th {
        padding: 15px 12px !important;
        background: var(--accent-color);
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .badge {
        padding: 6px 12px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .stat-card {
        cursor: default;
    }

    .stat-card:hover {
        transform: none;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .filters-mobile {
            margin-bottom: 20px;
        }

        .btn-add-lead {
            width: 100%;
            margin-bottom: 15px;
        }

        .stats-grid {
            gap: 15px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-card h3 {
            font-size: 1.8rem;
        }

        /* Scroll horizontal */
        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
            margin: 0 -15px;
            padding: 0 15px;
            display: block !important;
        }

        .lead-table {
            min-width: 800px;
            display: table !important;
        }

        .lead-table th {
            white-space: nowrap;
            font-size: 0.85rem;
            padding: 12px 8px !important;
        }

        .lead-table tbody tr {
            display: table-row;
        }

        .lead-table tbody td {
            display: table-cell;
            padding: 12px 8px !important;
            white-space: nowrap;
        }

        .lead-table .btn-group {
            display: flex;
            flex-direction: row;
            gap: 5px;
        }

        .lead-table .btn-sm {
            padding: 6px 10px;
            font-size: 0.85rem;
        }

        .badge {
            padding: 5px 10px;
            font-size: 0.8rem;
        }
    }
</style>

<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 15px; margin-bottom: 20px;">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h4 class="mb-0" style="color: var(--heading-color);">
            <i class="bi bi-briefcase me-2"></i>Gestion des Leads
        </h4>
        <a href="{{ route('dashboard.leads.create') }}" class="btn btn-gradient btn-add-lead">
            <i class="bi bi-plus-circle me-2"></i>Nouveau Lead
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4 stats-grid">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="bi bi-collection"></i>
                </div>
                <div>
                    <h3>{{ $stats['total'] }}</h3>
                    <p>Total Leads</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div>
                    <h3>{{ $stats['not_touched'] }}</h3>
                    <p>Non Touchés</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div>
                    <h3>{{ $stats['in_progress'] }}</h3>
                    <p>En Cours</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <h3>{{ $stats['completed'] }}</h3>
                    <p>Complétés</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('dashboard.leads.index') }}" method="GET" class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher..." value="{{ request('search') }}">
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <select name="status" class="form-select">
                        <option value="">Tous les statuts</option>
                        @foreach(App\Models\Lead::getStatuses() as $value => $label)
                            <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <select name="category" class="form-select">
                        <option value="">Toutes catégories</option>
                        @foreach(App\Models\Lead::getCategories() as $value => $label)
                            <option value="{{ $value }}" {{ request('category') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <select name="priority" class="form-select">
                        <option value="">Toutes priorités</option>
                        @foreach(App\Models\Lead::getPriorities() as $value => $label)
                            <option value="{{ $value }}" {{ request('priority') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="bi bi-search"></i> Filtrer
                        </button>
                        <a href="{{ route('dashboard.leads.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Leads Table -->
    <div class="card">
        <div class="card-body p-0">
            @if($leads->count() > 0)
                <div class="table-responsive">
                    <table class="table lead-table mb-0">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Entreprise</th>
                                <th width="120">Catégorie</th>
                                <th width="130">Statut</th>
                                <th width="100">Priorité</th>
                                <th>Contact</th>
                                <th width="120">Prochain RDV</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>#{{ $lead->id }}</td>
                                <td>
                                    <strong>{{ $lead->company_name }}</strong>
                                    @if($lead->is_overdue)
                                        <span class="badge bg-danger ms-1" style="font-size: 0.7rem;">En retard</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge" style="background: var(--accent-color);">
                                        {{ App\Models\Lead::getCategories()[$lead->category] ?? $lead->category }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $lead->status_color }}">
                                        {{ $lead->status_label }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $lead->priority_color }}">
                                        {{ $lead->priority_label }}
                                    </span>
                                </td>
                                <td>
                                    @if($lead->contact_person)
                                        <div>{{ $lead->contact_person }}</div>
                                    @endif
                                    @if($lead->contact_email)
                                        <small class="text-muted">{{ $lead->contact_email }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($lead->next_follow_up_date)
                                        <small>{{ $lead->next_follow_up_date->format('d/m/Y') }}</small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('dashboard.leads.show', $lead) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('dashboard.leads.edit', $lead) }}" 
                                           class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('dashboard.leads.destroy', $lead) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Supprimer ce lead ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if($leads->hasPages())
                    <div class="p-3">
                        {{ $leads->links() }}
                    </div>
                @endif
            @else
                <div class="p-5 text-center text-muted">
                    <i class="bi bi-briefcase display-1 mb-3"></i>
                    <p class="mb-0">Aucun lead trouvé.</p>
                    <a href="{{ route('dashboard.leads.create') }}" class="btn btn-gradient mt-3">
                        <i class="bi bi-plus-circle me-2"></i>Créer votre premier lead
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
