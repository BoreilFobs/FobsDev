@extends('dashboard.layout')

@section('title', 'Détails du Message')

@section('page-title', 'Détails du Message')

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <a href="{{ route('dashboard.contacts.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Retour à la liste
        </a>
    </div>

    <div class="row g-3">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                    <h5 class="mb-0">Message de {{ $contact->name }}</h5>
                    <div>
                        @if($contact->status === 'nouveau')
                            <span class="badge bg-danger">Nouveau</span>
                        @elseif($contact->status === 'lu')
                            <span class="badge" style="background: var(--accent-color);">Lu</span>
                        @else
                            <span class="badge bg-success">Répondu</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Sujet :</h6>
                        <h4>{{ $contact->subject }}</h4>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Message :</h6>
                        <p class="lead">{{ $contact->message }}</p>
                    </div>

                    <hr>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <h6 class="text-muted mb-2">De :</h6>
                            <p><strong>{{ $contact->name }}</strong></p>
                            <p class="mb-0">
                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                    <i class="bi bi-envelope me-2"></i>{{ $contact->email }}
                                </a>
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6 class="text-muted mb-2">Date de réception :</h6>
                            <p>{{ $contact->created_at->format('d/m/Y à H:i') }}</p>
                            <p class="text-muted mb-0">{{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    @if($contact->read_at)
                    <div class="mt-3">
                        <p class="text-muted mb-0">
                            <i class="bi bi-check-circle me-2"></i>Lu le {{ $contact->read_at->format('d/m/Y à H:i') }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">Répondre</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Pour répondre à ce message, vous pouvez envoyer un email directement à :
                    </p>
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-gradient w-100 w-md-auto">
                        <i class="bi bi-reply me-2"></i>Répondre par Email
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="mailto:{{ $contact->email }}" class="btn btn-outline-primary">
                            <i class="bi bi-envelope me-2"></i>Envoyer un Email
                        </a>
                        
                        <form action="{{ route('dashboard.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash me-2"></i>Supprimer le Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">Informations</h6>
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        <p class="mb-2"><strong>ID:</strong> {{ $contact->id }}</p>
                        <p class="mb-2"><strong>Statut:</strong> {{ ucfirst($contact->status) }}</p>
                        <p class="mb-0"><strong>Reçu:</strong> {{ $contact->created_at->diffForHumans() }}</p>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
