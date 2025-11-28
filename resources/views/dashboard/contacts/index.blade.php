@extends('dashboard.layout')

@section('title', 'Messages de Contact')

@section('page-title', 'Messages de Contact')

@section('content')
<style>
    /* Style épuré et simple */
    .contacts-table tbody tr {
        background: white;
        border-bottom: 1px solid rgba(45, 35, 32, 0.1);
        transition: all 0.2s ease;
    }

    .contacts-table tbody tr:hover {
        background: rgba(168, 109, 55, 0.05);
    }

    /* Messages non lus - juste un badge visible */
    .message-nouveau td:first-child::before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        background: #dc3545;
        border-radius: 50%;
        margin-right: 8px;
        vertical-align: middle;
    }

    .contacts-table td {
        padding: 20px 15px !important;
        vertical-align: middle;
    }

    .contacts-table th {
        padding: 15px !important;
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

    /* Mobile responsive */
    @media (max-width: 768px) {
        .contacts-table thead {
            display: none;
        }

        .contacts-table tbody tr {
            display: block;
            margin-bottom: 20px;
            border: 1px solid rgba(168, 109, 55, 0.2);
            border-radius: 8px;
            padding: 20px;
            background: white;
        }

        .message-nouveau {
            border-left: 4px solid #dc3545;
        }

        .contacts-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 12px 0 !important;
            border: none;
            border-bottom: 1px solid rgba(45, 35, 32, 0.08);
        }

        .contacts-table tbody td:last-child {
            border-bottom: none;
            padding-top: 15px !important;
        }

        .contacts-table tbody td::before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--accent-color);
            margin-right: 10px;
            min-width: 90px;
            font-size: 0.9rem;
        }

        .contacts-table tbody td .btn-group {
            width: 100%;
            flex-direction: column;
            gap: 10px;
            margin-top: 5px;
        }

        .contacts-table tbody td .btn-group .btn,
        .contacts-table tbody td .btn-group form {
            width: 100%;
        }

        .contacts-table tbody td .btn-group .btn {
            padding: 10px 15px;
        }
    }
</style>

<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 15px; margin-bottom: 20px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header" style="padding: 20px; background: var(--accent-color); color: white;">
            <h5 class="mb-0">
                <i class="bi bi-envelope me-2"></i>Messages de Contact
                @if($contacts->where('status', 'nouveau')->count() > 0)
                    <span class="badge bg-danger ms-2">
                        {{ $contacts->where('status', 'nouveau')->count() }}
                    </span>
                @endif
            </h5>
        </div>
        <div class="card-body p-0">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table contacts-table mb-0">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th width="100">Statut</th>
                                <th width="140">Date</th>
                                <th width="180">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr class="{{ $contact->status === 'nouveau' ? 'message-nouveau' : '' }}">
                                <td data-label="ID">#{{ $contact->id }}</td>
                                <td data-label="Nom">{{ $contact->name }}</td>
                                <td data-label="Email">{{ $contact->email }}</td>
                                <td data-label="Sujet">{{ Str::limit($contact->subject, 40) }}</td>
                                <td data-label="Message">{{ Str::limit($contact->message, 50) }}</td>
                                <td data-label="Statut">
                                    @if($contact->status === 'nouveau')
                                        <span class="badge bg-danger">Nouveau</span>
                                    @elseif($contact->status === 'lu')
                                        <span class="badge bg-secondary">Lu</span>
                                    @else
                                        <span class="badge bg-success">Répondu</span>
                                    @endif
                                </td>
                                <td data-label="Date">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                <td data-label="Actions">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('dashboard.contacts.show', $contact) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Voir
                                        </a>
                                        <form action="{{ route('dashboard.contacts.destroy', $contact) }}" 
                                              method="POST" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Supprimer ce message ?');">
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
                <div class="p-3">
                    {{ $contacts->links() }}
                </div>
            @else
                <div class="p-5 text-center text-muted">
                    <i class="bi bi-envelope display-1 mb-3"></i>
                    <p class="mb-0">Aucun message reçu.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
