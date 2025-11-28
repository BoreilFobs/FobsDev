@extends('dashboard.layout')

@section('title', 'Portfolio Items')

@section('page-title', 'Portfolio Items')

@section('content')
<style>
    /* Style épuré pour portfolio */
    .portfolio-table tbody tr {
        background: white;
        border-bottom: 1px solid rgba(45, 35, 32, 0.1);
        transition: all 0.2s ease;
    }

    .portfolio-table tbody tr:hover {
        background: rgba(168, 109, 55, 0.05);
    }

    .portfolio-table td {
        padding: 18px 12px !important;
        vertical-align: middle;
    }

    .portfolio-table th {
        padding: 15px 12px !important;
        background: var(--accent-color);
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .portfolio-table img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid rgba(168, 109, 55, 0.2);
    }

    .badge {
        padding: 6px 12px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    /* Mobile responsive - design épuré */
    @media (max-width: 768px) {
        .portfolio-header {
            margin-bottom: 20px !important;
        }

        .portfolio-header h4 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .btn-add-project {
            width: 100%;
            padding: 14px 20px;
            font-size: 1rem;
        }

        .stat-card {
            padding: 0;
            box-shadow: none;
            background: transparent;
        }

        /* Container avec scroll horizontal léger */
        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
            margin: 0 -15px;
            padding: 0 15px;
            display: block !important;
        }

        .portfolio-table {
            min-width: 600px; /* Force un léger scroll horizontal si nécessaire */
            display: table !important;
        }

        .portfolio-table thead {
            display: table-header-group;
        }

        .portfolio-table th {
            white-space: nowrap;
            font-size: 0.85rem;
            padding: 12px 8px !important;
        }

        .portfolio-table tbody tr {
            display: table-row;
            border-bottom: 1px solid rgba(168, 109, 55, 0.15);
        }

        .portfolio-table tbody td {
            display: table-cell;
            padding: 12px 8px !important;
            white-space: nowrap;
            border: none;
            vertical-align: middle;
        }

        .portfolio-table tbody td::before {
            display: none;
        }

        /* Image optimisée pour scroll horizontal */
        .portfolio-table tbody td[data-label="Image"] img {
            width: 50px;
            height: 50px;
            border-radius: 6px;
        }

        /* Titre avec ellipsis si trop long */
        .portfolio-table tbody td[data-label="Titre"] {
            max-width: 150px;
            white-space: normal;
            line-height: 1.3;
        }

        .portfolio-table tbody td[data-label="Titre"] strong {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Boutons d'action compacts */
        .portfolio-table .btn-group {
            display: flex;
            flex-direction: row;
            gap: 5px;
            white-space: nowrap;
        }

        .portfolio-table .btn-group .btn,
        .portfolio-table .btn-group form {
            width: auto;
        }

        .portfolio-table .btn-group .btn {
            padding: 6px 10px;
            font-size: 0.85rem;
        }

        .portfolio-table .btn-group .btn i {
            margin: 0;
        }

        .portfolio-table .btn-group .btn-outline-primary,
        .portfolio-table .btn-group .btn-outline-danger {
            border: 1px solid;
        }

        .badge {
            padding: 5px 10px;
            font-size: 0.8rem;
            white-space: nowrap;
        }

        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
    }
</style>

<div class="container-fluid">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3 portfolio-header">
        <h4 class="mb-0" style="color: var(--heading-color);">Portfolio</h4>
        <a href="{{ route('dashboard.portfolio.create') }}" class="btn btn-gradient btn-add-project">
            <i class="bi bi-plus-circle me-2"></i>Ajouter un Projet
        </a>
    </div>

    <div class="stat-card">
        <div class="table-responsive">
            <table class="table portfolio-table mb-0">
                <thead>
                    <tr>
                        <th width="80">Image</th>
                        <th>Titre</th>
                        <th width="130">Catégorie</th>
                        <th width="100">Statut</th>
                        <th width="80">Ordre</th>
                        <th width="120">Date</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolioItems as $item)
                        <tr>
                            <td data-label="Image">
                                <img src="{{ asset($item->main_image) }}" alt="{{ $item->title }}">
                            </td>
                            <td data-label="Titre">
                                <strong>{{ $item->title }}</strong>
                            </td>
                            <td data-label="Catégorie">
                                <span class="badge" style="background: var(--accent-color);">{{ $item->category }}</span>
                            </td>
                            <td data-label="Statut">
                                @if($item->is_active)
                                    <span class="badge bg-success">Actif</span>
                                @else
                                    <span class="badge bg-secondary">Inactif</span>
                                @endif
                            </td>
                            <td data-label="Ordre">{{ $item->order }}</td>
                            <td data-label="Date">{{ $item->created_at->format('d/m/Y') }}</td>
                            <td data-label="Actions">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('dashboard.portfolio.edit', $item->id) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Modifier
                                    </a>
                                    <form action="{{ route('dashboard.portfolio.destroy', $item->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Supprimer ce projet ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <p class="text-muted mt-3">Aucun projet dans le portfolio.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($portfolioItems->hasPages())
            <div class="mt-3 p-3">
                {{ $portfolioItems->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
