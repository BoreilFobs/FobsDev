@extends('dashboard.layout')

@section('title', 'Détails du Devis #' . $quote->id)

@section('content')
<div class="container-fluid">
    
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">Devis #{{ $quote->id }}</h1>
                    <p class="text-muted mb-0">Reçu le {{ $quote->created_at->format('d/m/Y à H:i') }}</p>
                </div>
                <a href="{{ route('dashboard.quotes.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Informations principales -->
        <div class="col-lg-8">
            
            <!-- Informations Client -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-person-circle text-primary me-2"></i>Informations Client</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Nom Complet</label>
                            <p class="mb-0 fw-bold">{{ $quote->full_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Entreprise</label>
                            <p class="mb-0">{{ $quote->company ?? 'Particulier' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Email</label>
                            <p class="mb-0"><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Téléphone</label>
                            <p class="mb-0"><a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Ville</label>
                            <p class="mb-0">{{ $quote->city }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Pays</label>
                            <p class="mb-0">{{ $quote->country }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Détails du Projet -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-laptop text-success me-2"></i>Détails du Projet</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="text-muted small">Type de Projet</label>
                        <p class="mb-0">
                            <span class="badge bg-info fs-6">{{ str_replace('_', ' ', ucfirst($quote->project_type)) }}</span>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small">Description</label>
                        <p class="mb-0" style="white-space: pre-line;">{{ $quote->project_description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Nombre de Pages</label>
                            <p class="mb-0 fw-bold">{{ $quote->number_of_pages ?? 'Non spécifié' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Budget</label>
                            <p class="mb-0 fw-bold text-success">{{ number_format($quote->budget_range, 0, ',', ' ') }}€</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Délai Souhaité</label>
                            <p class="mb-0 fw-bold text-warning">{{ str_replace('_', ' ', $quote->deadline) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fonctionnalités Souhaitées -->
            @if($quote->features && count($quote->features) > 0)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-gear text-warning me-2"></i>Fonctionnalités Souhaitées</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($quote->features as $feature)
                            <div class="col-md-6 mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>{{ str_replace('_', ' ', ucfirst($feature)) }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Site Existant -->
            @if($quote->has_existing_site)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-globe text-info me-2"></i>Site Existant</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Le client a déjà un site web</strong></p>
                    @if($quote->existing_site_url)
                        <p class="mb-0">
                            <a href="{{ $quote->existing_site_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-box-arrow-up-right me-1"></i>Visiter le site
                            </a>
                        </p>
                    @endif
                </div>
            </div>
            @endif

            <!-- Services Additionnels -->
            @if($quote->need_content_writing || $quote->need_logo_design || $quote->need_hosting)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-plus-circle text-danger me-2"></i>Services Additionnels</h5>
                </div>
                <div class="card-body">
                    @if($quote->need_content_writing)
                        <p class="mb-2"><i class="bi bi-pencil-square text-primary me-2"></i>Rédaction de contenu requise</p>
                    @endif
                    @if($quote->need_logo_design)
                        <p class="mb-2"><i class="bi bi-palette text-primary me-2"></i>Création de logo requise</p>
                    @endif
                    @if($quote->need_hosting)
                        <p class="mb-0"><i class="bi bi-server text-primary me-2"></i>Hébergement web requis</p>
                    @endif
                </div>
            </div>
            @endif

            <!-- Préférences Design -->
            @if($quote->design_preferences || $quote->color_preferences || $quote->reference_sites)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-palette text-purple me-2"></i>Préférences Design</h5>
                </div>
                <div class="card-body">
                    @if($quote->design_preferences)
                        <div class="mb-3">
                            <label class="text-muted small">Style Souhaité</label>
                            <p class="mb-0">{{ $quote->design_preferences }}</p>
                        </div>
                    @endif
                    @if($quote->color_preferences)
                        <div class="mb-3">
                            <label class="text-muted small">Couleurs Préférées</label>
                            <p class="mb-0">{{ $quote->color_preferences }}</p>
                        </div>
                    @endif
                    @if($quote->reference_sites)
                        <div class="mb-0">
                            <label class="text-muted small">Sites de Référence</label>
                            <p class="mb-0" style="white-space: pre-line;">{{ $quote->reference_sites }}</p>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Technologies -->
            @if($quote->preferred_technologies && count($quote->preferred_technologies) > 0)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-code-slash text-dark me-2"></i>Technologies Préférées</h5>
                </div>
                <div class="card-body">
                    @foreach($quote->preferred_technologies as $tech)
                        <span class="badge bg-secondary me-2 mb-2">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Public Cible -->
            @if($quote->target_audience)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-people text-info me-2"></i>Public Cible</h5>
                </div>
                <div class="card-body">
                    <p class="mb-0" style="white-space: pre-line;">{{ $quote->target_audience }}</p>
                </div>
            </div>
            @endif

            <!-- Informations Supplémentaires -->
            @if($quote->additional_info)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-chat-dots text-secondary me-2"></i>Informations Supplémentaires</h5>
                </div>
                <div class="card-body">
                    <p class="mb-0" style="white-space: pre-line;">{{ $quote->additional_info }}</p>
                </div>
            </div>
            @endif

        </div>

        <!-- Sidebar - Actions et Statut -->
        <div class="col-lg-4">
            
            <!-- Mise à jour du Statut -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-flag me-2"></i>Statut et Notes</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.quotes.updateStatus', $quote) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-3">
                            <label class="form-label">Statut Actuel</label>
                            <select class="form-select" name="status">
                                <option value="nouveau" {{ $quote->status == 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                                <option value="en_cours" {{ $quote->status == 'en_cours' ? 'selected' : '' }}>En Cours</option>
                                <option value="devis_envoye" {{ $quote->status == 'devis_envoye' ? 'selected' : '' }}>Devis Envoyé</option>
                                <option value="accepte" {{ $quote->status == 'accepte' ? 'selected' : '' }}>Accepté</option>
                                <option value="refuse" {{ $quote->status == 'refuse' ? 'selected' : '' }}>Refusé</option>
                                <option value="termine" {{ $quote->status == 'termine' ? 'selected' : '' }}>Terminé</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes Admin</label>
                            <textarea class="form-control" name="admin_notes" rows="5" placeholder="Vos notes privées sur ce devis...">{{ $quote->admin_notes }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save me-2"></i>Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            <!-- Actions Rapides -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-lightning me-2"></i>Actions Rapides</h5>
                </div>
                <div class="card-body">
                    <a href="mailto:{{ $quote->email }}" class="btn btn-outline-primary w-100 mb-2">
                        <i class="bi bi-envelope me-2"></i>Envoyer un Email
                    </a>
                    <a href="tel:{{ $quote->phone }}" class="btn btn-outline-success w-100 mb-2">
                        <i class="bi bi-telephone me-2"></i>Appeler
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $quote->phone) }}" target="_blank" class="btn btn-outline-success w-100">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                </div>
            </div>

            <!-- Informations système -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Informations</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <small class="text-muted">Créé le:</small><br>
                        <strong>{{ $quote->created_at->format('d/m/Y à H:i') }}</strong>
                    </p>
                    <p class="mb-0">
                        <small class="text-muted">Dernière mise à jour:</small><br>
                        <strong>{{ $quote->updated_at->format('d/m/Y à H:i') }}</strong>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .text-purple {
        color: #764ba2;
    }
</style>
@endsection
