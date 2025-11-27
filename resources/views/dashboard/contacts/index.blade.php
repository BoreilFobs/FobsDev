@extends('dashboard.layout')

@section('title', 'Messages de Contact')

@section('page-title', 'Messages de Contact')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="bi bi-envelope me-2"></i>Tous les Messages
                @if($contacts->where('status', 'nouveau')->count() > 0)
                    <span class="badge bg-danger ms-2">{{ $contacts->where('status', 'nouveau')->count() }} nouveau(x)</span>
                @endif
            </h5>
        </div>
        <div class="card-body p-0">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr class="{{ $contact->status === 'nouveau' ? 'table-warning' : '' }}">
                                <td data-label="ID">{{ $contact->id }}</td>
                                <td data-label="Nom"><strong>{{ $contact->name }}</strong></td>
                                <td data-label="Email">{{ $contact->email }}</td>
                                <td data-label="Sujet">{{ Str::limit($contact->subject, 30) }}</td>
                                <td data-label="Message">{{ Str::limit($contact->message, 50) }}</td>
                                <td data-label="Statut">
                                    @if($contact->status === 'nouveau')
                                        <span class="badge bg-danger">Nouveau</span>
                                    @elseif($contact->status === 'lu')
                                        <span class="badge" style="background: var(--accent-color);">Lu</span>
                                    @else
                                        <span class="badge bg-success">Répondu</span>
                                    @endif
                                </td>
                                <td data-label="Date">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                <td data-label="Actions">
                                    <div class="btn-group">
                                        <a href="{{ route('dashboard.contacts.show', $contact) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Voir
                                        </a>
                                        <form action="{{ route('dashboard.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i> Supprimer
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
                    <p class="mb-0">Aucun message reçu pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
