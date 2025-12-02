@extends('dashboard.layout')

@section('title', $lead->company_name)

@section('page-title', $lead->company_name)

@section('content')
<style>
    .info-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid rgba(45, 35, 32, 0.1);
    }

    .info-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid rgba(45, 35, 32, 0.05);
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: var(--accent-color);
        min-width: 180px;
        flex-shrink: 0;
    }

    .info-value {
        color: var(--default-color);
    }

    .maps-embed {
        width: 100%;
        height: 400px;
        border: none;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .info-card {
            padding: 15px;
        }

        .info-row {
            flex-direction: column;
            padding: 15px 0;
        }

        .info-label {
            min-width: auto;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .info-value {
            font-size: 1rem;
        }

        .maps-embed {
            height: 300px;
        }

        .btn-actions {
            width: 100%;
            margin-bottom: 10px;
        }

        .action-buttons .btn {
            padding: 12px 20px;
            font-size: 1rem;
        }
    }
</style>

<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-2">
                <h4 class="mb-0" style="color: var(--heading-color);">
                    {{ $lead->company_name }}
                </h4>
                @if($lead->is_overdue)
                    <span class="badge bg-danger">En retard</span>
                @endif
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <span class="badge bg-{{ $lead->status_color }}">{{ $lead->status_label }}</span>
                <span class="badge bg-{{ $lead->priority_color }}">{{ $lead->priority_label }}</span>
                <span class="badge" style="background: var(--accent-color);">
                    {{ App\Models\Lead::getCategories()[$lead->category] ?? $lead->category }}
                </span>
            </div>
        </div>
        <a href="{{ route('dashboard.leads.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Retour
        </a>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex flex-column flex-md-row gap-2 mb-4 action-buttons">
        <a href="{{ route('dashboard.leads.edit', $lead) }}" class="btn btn-gradient btn-actions">
            <i class="bi bi-pencil me-2"></i>Modifier
        </a>
        <button type="button" class="btn btn-outline-primary btn-actions" onclick="window.open('{{ $lead->maps_link }}', '_blank')">
            <i class="bi bi-geo-alt me-2"></i>Ouvrir dans Maps
        </button>
        @if($lead->website_url)
            <button type="button" class="btn btn-outline-secondary btn-actions" onclick="window.open('{{ $lead->website_url }}', '_blank')">
                <i class="bi bi-globe me-2"></i>Visiter le Site
            </button>
        @endif
        <form action="{{ route('dashboard.leads.destroy', $lead) }}" 
              method="POST" 
              class="d-inline flex-fill"
              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce lead ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-actions w-100">
                <i class="bi bi-trash me-2"></i>Supprimer
            </button>
        </form>
    </div>

    <div class="row">
        <!-- Left Column -->
        <div class="col-12 col-lg-8">
            <!-- Company Info -->
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-building me-2"></i>Informations de l'Entreprise
                </h5>
                <div class="info-row">
                    <div class="info-label">Nom:</div>
                    <div class="info-value">{{ $lead->company_name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Catégorie:</div>
                    <div class="info-value">{{ App\Models\Lead::getCategories()[$lead->category] ?? $lead->category }}</div>
                </div>
                @if($lead->website_url)
                <div class="info-row">
                    <div class="info-label">Site Web:</div>
                    <div class="info-value">
                        <a href="{{ $lead->website_url }}" target="_blank">{{ $lead->website_url }}</a>
                    </div>
                </div>
                @endif
                <div class="info-row">
                    <div class="info-label">Lien Google Maps:</div>
                    <div class="info-value">
                        <a href="{{ $lead->maps_link }}" target="_blank">Voir sur Google Maps</a>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-file-text me-2"></i>Description
                </h5>
                <p style="white-space: pre-wrap;">{{ $lead->description }}</p>
            </div>

            <!-- Notes -->
            @if($lead->notes)
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-sticky me-2"></i>Notes Internes
                </h5>
                <p style="white-space: pre-wrap;">{{ $lead->notes }}</p>
            </div>
            @endif

            <!-- Google Maps Embed -->
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-map me-2"></i>Localisation
                </h5>
                <iframe src="{{ str_replace('/maps/', '/maps/embed/', $lead->maps_link) }}" 
                        class="maps-embed"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <small class="text-muted d-block mt-2">
                    <i class="bi bi-info-circle me-1"></i>Si la carte ne s'affiche pas, 
                    <a href="{{ $lead->maps_link }}" target="_blank">cliquez ici pour ouvrir Google Maps</a>
                </small>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-12 col-lg-4">
            <!-- Contact Info -->
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-person me-2"></i>Contact
                </h5>
                @if($lead->contact_person)
                <div class="info-row">
                    <div class="info-label">Nom:</div>
                    <div class="info-value">{{ $lead->contact_person }}</div>
                </div>
                @endif
                @if($lead->contact_email)
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">
                        <a href="mailto:{{ $lead->contact_email }}">{{ $lead->contact_email }}</a>
                    </div>
                </div>
                @endif
                @if($lead->contact_phone)
                <div class="info-row">
                    <div class="info-label">Téléphone:</div>
                    <div class="info-value">
                        <a href="tel:{{ $lead->contact_phone }}">{{ $lead->contact_phone }}</a>
                    </div>
                </div>
                @endif
                @if(!$lead->contact_person && !$lead->contact_email && !$lead->contact_phone)
                <p class="text-muted mb-0">Aucune information de contact disponible</p>
                @endif
            </div>

            <!-- Lead Details -->
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-gear me-2"></i>Détails
                </h5>
                <div class="info-row">
                    <div class="info-label">Statut:</div>
                    <div class="info-value">
                        <span class="badge bg-{{ $lead->status_color }}">{{ $lead->status_label }}</span>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Priorité:</div>
                    <div class="info-value">
                        <span class="badge bg-{{ $lead->priority_color }}">{{ $lead->priority_label }}</span>
                    </div>
                </div>
                @if($lead->estimated_value)
                <div class="info-row">
                    <div class="info-label">Valeur Estimée:</div>
                    <div class="info-value">{{ number_format($lead->estimated_value, 2) }} €</div>
                </div>
                @endif
                @if($lead->last_contact_date)
                <div class="info-row">
                    <div class="info-label">Dernier Contact:</div>
                    <div class="info-value">{{ $lead->last_contact_date->format('d/m/Y') }}</div>
                </div>
                @endif
                @if($lead->next_follow_up_date)
                <div class="info-row">
                    <div class="info-label">Prochain Suivi:</div>
                    <div class="info-value">
                        {{ $lead->next_follow_up_date->format('d/m/Y') }}
                        @if($lead->is_overdue)
                            <span class="badge bg-danger ms-2">En retard</span>
                        @endif
                    </div>
                </div>
                @endif
                <div class="info-row">
                    <div class="info-label">Créé le:</div>
                    <div class="info-value">{{ $lead->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Modifié le:</div>
                    <div class="info-value">{{ $lead->updated_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>

            <!-- Quick Status Update -->
            <div class="info-card">
                <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    <i class="bi bi-lightning me-2"></i>Action Rapide
                </h5>
                <form id="statusUpdateForm">
                    @csrf
                    <div class="mb-3">
                        <label for="quick_status" class="form-label">Changer le statut:</label>
                        <select class="form-select" id="quick_status" name="status">
                            @foreach(App\Models\Lead::getStatuses() as $value => $label)
                                <option value="{{ $value }}" {{ $lead->status == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle me-2"></i>Mettre à Jour
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('statusUpdateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const status = formData.get('status');
    
    fetch('{{ route('dashboard.leads.updateStatus', $lead) }}', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Reload page to show updated status
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Erreur lors de la mise à jour du statut');
    });
});
</script>
@endsection
