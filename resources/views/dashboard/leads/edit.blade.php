@extends('dashboard.layout')

@section('title', 'Modifier Lead')

@section('page-title', 'Modifier Lead')

@section('content')
<style>
    @media (max-width: 768px) {
        .form-label {
            margin-bottom: 10px;
            font-size: 1rem;
            font-weight: 600;
        }

        .form-control, .form-select, textarea {
            padding: 14px 16px;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .mb-3 {
            margin-bottom: 1.5rem !important;
        }

        .btn {
            padding: 14px 20px;
            font-size: 1rem;
        }
    }
</style>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 style="color: var(--heading-color);">
            <i class="bi bi-pencil me-2"></i>Modifier Lead
        </h4>
        <a href="{{ route('dashboard.leads.show', $lead) }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Retour
        </a>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 25px;">
            <form action="{{ route('dashboard.leads.update', $lead) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Company Information -->
                    <div class="col-12">
                        <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                            <i class="bi bi-building me-2"></i>Informations de l'Entreprise
                        </h5>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="company_name" class="form-label">Nom de l'Entreprise <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('company_name') is-invalid @enderror" 
                               id="company_name" 
                               name="company_name" 
                               value="{{ old('company_name', $lead->company_name) }}" 
                               required>
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="maps_link" class="form-label">Lien Google Maps <span class="text-danger">*</span></label>
                        <input type="url" 
                               class="form-control @error('maps_link') is-invalid @enderror" 
                               id="maps_link" 
                               name="maps_link" 
                               value="{{ old('maps_link', $lead->maps_link) }}" 
                               placeholder="https://maps.google.com/..."
                               required>
                        @error('maps_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="website_url" class="form-label">Site Web</label>
                        <input type="url" 
                               class="form-control @error('website_url') is-invalid @enderror" 
                               id="website_url" 
                               name="website_url" 
                               value="{{ old('website_url', $lead->website_url) }}" 
                               placeholder="https://...">
                        @error('website_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="category" class="form-label">Catégorie <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" 
                                id="category" 
                                name="category" 
                                required>
                            @foreach(App\Models\Lead::getCategories() as $value => $label)
                                <option value="{{ $value }}" {{ old('category', $lead->category) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4" 
                                  required>{{ old('description', $lead->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contact Information -->
                    <div class="col-12 mt-4">
                        <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                            <i class="bi bi-person me-2"></i>Informations de Contact
                        </h5>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="contact_person" class="form-label">Personne de Contact</label>
                        <input type="text" 
                               class="form-control @error('contact_person') is-invalid @enderror" 
                               id="contact_person" 
                               name="contact_person" 
                               value="{{ old('contact_person', $lead->contact_person) }}">
                        @error('contact_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="contact_email" class="form-label">Email de Contact</label>
                        <input type="email" 
                               class="form-control @error('contact_email') is-invalid @enderror" 
                               id="contact_email" 
                               name="contact_email" 
                               value="{{ old('contact_email', $lead->contact_email) }}">
                        @error('contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label for="contact_phone" class="form-label">Téléphone de Contact</label>
                        <input type="tel" 
                               class="form-control @error('contact_phone') is-invalid @enderror" 
                               id="contact_phone" 
                               name="contact_phone" 
                               value="{{ old('contact_phone', $lead->contact_phone) }}">
                        @error('contact_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Lead Details -->
                    <div class="col-12 mt-4">
                        <h5 class="mb-3" style="color: var(--accent-color); border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                            <i class="bi bi-gear me-2"></i>Détails du Lead
                        </h5>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <label for="status" class="form-label">Statut <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            @foreach(App\Models\Lead::getStatuses() as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $lead->status) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <label for="priority" class="form-label">Priorité</label>
                        <select class="form-select @error('priority') is-invalid @enderror" 
                                id="priority" 
                                name="priority">
                            @foreach(App\Models\Lead::getPriorities() as $value => $label)
                                <option value="{{ $value }}" {{ old('priority', $lead->priority) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <label for="estimated_value" class="form-label">Valeur Estimée (€)</label>
                        <input type="number" 
                               class="form-control @error('estimated_value') is-invalid @enderror" 
                               id="estimated_value" 
                               name="estimated_value" 
                               value="{{ old('estimated_value', $lead->estimated_value) }}" 
                               step="0.01" 
                               min="0">
                        @error('estimated_value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <label for="next_follow_up_date" class="form-label">Prochain Suivi</label>
                        <input type="date" 
                               class="form-control @error('next_follow_up_date') is-invalid @enderror" 
                               id="next_follow_up_date" 
                               name="next_follow_up_date" 
                               value="{{ old('next_follow_up_date', $lead->next_follow_up_date?->format('Y-m-d')) }}">
                        @error('next_follow_up_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="notes" class="form-label">Notes Internes</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" 
                                  id="notes" 
                                  name="notes" 
                                  rows="3">{{ old('notes', $lead->notes) }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-gradient flex-fill">
                        <i class="bi bi-save me-2"></i>Mettre à Jour
                    </button>
                    <a href="{{ route('dashboard.leads.show', $lead) }}" class="btn btn-outline-secondary" style="width: auto;">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
