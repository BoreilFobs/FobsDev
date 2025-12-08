@extends('layout')
@section('content')

<style>
    /* Modal d'introduction */
    .intro-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s ease;
    }

    .intro-content {
        background: var(--surface-color);
        padding: 50px 40px;
        border-radius: 20px;
        max-width: 600px;
        text-align: center;
        animation: slideUp 0.5s ease;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }

    .intro-icon {
        font-size: 4rem;
        color: var(--accent-color);
        margin-bottom: 20px;
        animation: bounce 1s infinite;
    }

    .intro-content h2 {
        color: var(--heading-color);
        font-size: 2rem;
        margin-bottom: 20px;
        font-family: var(--heading-font);
    }

    .intro-content p {
        color: var(--default-color);
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .btn-start {
        background: var(--accent-color);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-start:hover {
        background: color-mix(in srgb, var(--accent-color), black 10%);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(168, 109, 55, 0.3);
    }

    /* Modal de confirmation */
    .success-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s ease;
    }

    .success-content {
        background: var(--surface-color);
        padding: 50px 40px;
        border-radius: 20px;
        max-width: 600px;
        text-align: center;
        animation: scaleIn 0.5s ease;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }

    .success-icon {
        font-size: 5rem;
        color: #28a745;
        margin-bottom: 20px;
        animation: checkmark 0.8s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes scaleIn {
        0% {
            opacity: 0;
            transform: scale(0.5);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes checkmark {
        0% {
            opacity: 0;
            transform: rotate(-45deg) scale(0);
        }
        50% {
            transform: rotate(-45deg) scale(1.2);
        }
        100% {
            opacity: 1;
            transform: rotate(0) scale(1);
        }
    }

    .quote-section {
        min-height: 100vh;
        padding: 100px 0 80px;
        background-color: var(--background-color);
        position: relative;
        overflow: hidden;
    }

    .quote-container {
        max-width: 1000px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .quote-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .quote-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--heading-color);
        font-family: var(--heading-font);
    }

    .quote-header p {
        font-size: 1.2rem;
        color: var(--default-color);
        opacity: 0.85;
    }

    .form-section {
        background: var(--surface-color);
        border-radius: 15px;
        padding: 40px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .form-section:hover {
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .section-title {
        color: var(--accent-color);
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: var(--heading-font);
        border-bottom: 3px solid var(--accent-color);
        padding-bottom: 15px;
    }

    .section-title i {
        font-size: 2rem;
        color: var(--accent-color);
    }

    .form-label {
        font-weight: 600;
        color: var(--heading-color);
        margin-bottom: 8px;
        font-size: 1rem;
    }

    .form-control, .form-select {
        border: 2px solid color-mix(in srgb, var(--accent-color), transparent 70%);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: var(--surface-color);
        color: var(--default-color);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.25rem color-mix(in srgb, var(--accent-color), transparent 85%);
        outline: none;
        background-color: var(--surface-color);
    }

    .form-check {
        padding: 12px 16px;
        background: var(--surface-color);
        border: 2px solid color-mix(in srgb, var(--accent-color), transparent 80%);
        border-radius: 8px;
        margin-bottom: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .form-check:hover {
        background: color-mix(in srgb, var(--accent-color), transparent 95%);
        border-color: var(--accent-color);
    }

    .form-check-input {
        width: 22px;
        height: 22px;
        margin-top: 0;
        cursor: pointer;
        border: 2px solid var(--accent-color);
        flex-shrink: 0;
    }

    .form-check-input:checked {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem color-mix(in srgb, var(--accent-color), transparent 85%);
        border-color: var(--accent-color);
    }

    .form-check-label {
        margin-left: 12px;
        cursor: pointer;
        font-weight: 500;
        color: var(--default-color);
        user-select: none;
    }

    .btn-submit {
        background: var(--accent-color);
        color: white;
        border: none;
        padding: 18px 60px;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 700;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px color-mix(in srgb, var(--accent-color), transparent 60%);
        font-family: var(--heading-font);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px color-mix(in srgb, var(--accent-color), transparent 50%);
        background: color-mix(in srgb, var(--accent-color), black 10%);
        color: white;
    }

    .required-indicator {
        color: #dc3545;
        font-weight: bold;
    }

    .info-text {
        font-size: 0.875rem;
        color: color-mix(in srgb, var(--default-color), transparent 30%);
        margin-top: 6px;
        font-style: italic;
    }

    .submit-section {
        background: var(--surface-color);
        border-radius: 15px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    @media (max-width: 768px) {
        .quote-section {
            padding: 80px 0 60px;
        }

        .quote-header h1 {
            font-size: 2.2rem;
        }

        .quote-header p {
            font-size: 1rem;
        }

        .form-section {
            padding: 25px;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .btn-submit {
            font-size: 1rem;
            padding: 15px 40px;
        }
    }
</style>

<section class="quote-section">
    <div class="container">
        <div class="quote-container">
            
            <div class="quote-header" data-aos="fade-down">
                <h1>Demande de Devis</h1>
                <p>Remplissez ce formulaire détaillé pour que nous puissions comprendre parfaitement votre projet</p>
            </div>

            <form action="{{ route('quote.store') }}" method="POST">
                @csrf

                <!-- Section 1: Informations de Contact -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="section-title">
                        <i class="bi bi-person-circle"></i>
                        Vos Informations de Contact
                    </h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom Complet <span class="required-indicator">*</span></label>
                            <input type="text" class="form-control" name="full_name" required value="{{ old('full_name') }}" placeholder="Jean Dupont">
                            @error('full_name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="required-indicator">*</span></label>
                            <input type="email" class="form-control" name="email" required value="{{ old('email') }}" placeholder="jean.dupont@example.com">
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Téléphone <span class="required-indicator">*</span></label>
                            <input type="tel" class="form-control" name="phone" required value="{{ old('phone') }}" placeholder="+39 351 769 9065">
                            @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Entreprise</label>
                            <input type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="Nom de votre entreprise">
                            @error('company')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ville <span class="required-indicator">*</span></label>
                            <input type="text" class="form-control" name="city" required value="{{ old('city') }}" placeholder="Rome">
                            @error('city')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pays <span class="required-indicator">*</span></label>
                            <input type="text" class="form-control" name="country" required value="{{ old('country', 'France') }}" placeholder="France">
                            @error('country')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>

                <!-- Section 2: Type de Projet -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="150">
                    <h3 class="section-title">
                        <i class="bi bi-laptop"></i>
                        Votre Projet
                    </h3>
                    <div class="mb-3">
                        <label class="form-label">Type de Projet <span class="required-indicator">*</span></label>
                        <select class="form-select" name="project_type" required>
                            <option value="">Sélectionnez un type</option>
                            <option value="site_web" {{ old('project_type') == 'site_web' ? 'selected' : '' }}>Site Web</option>
                            <option value="e_commerce" {{ old('project_type') == 'e_commerce' ? 'selected' : '' }}>Site E-commerce</option>
                            <option value="application_web" {{ old('project_type') == 'application_web' ? 'selected' : '' }}>Application Web</option>
                            <option value="application_mobile" {{ old('project_type') == 'application_mobile' ? 'selected' : '' }}>Application Mobile</option>
                            <option value="refonte" {{ old('project_type') == 'refonte' ? 'selected' : '' }}>Refonte de Site Existant</option>
                            <option value="autre" {{ old('project_type') == 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('project_type')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description du Projet <span class="required-indicator">*</span></label>
                        <textarea class="form-control" name="project_description" rows="5" required placeholder="Décrivez votre projet en détail : objectifs, public cible, fonctionnalités souhaitées...">{{ old('project_description') }}</textarea>
                        <small class="info-text">Plus vous êtes précis, mieux nous pourrons vous aider !</small>
                        @error('project_description')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre de Pages Estimé</label>
                        <input type="number" class="form-control" name="number_of_pages" min="1" value="{{ old('number_of_pages', 5) }}" placeholder="Ex: 5 pages">
                        <small class="info-text">Accueil, À propos, Services, Contact, etc.</small>
                        @error('number_of_pages')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <!-- Section 3: Fonctionnalités -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="section-title">
                        <i class="bi bi-gear"></i>
                        Fonctionnalités Souhaitées
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="formulaire_contact" id="feat1" {{ is_array(old('features')) && in_array('formulaire_contact', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat1">Formulaire de Contact</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="galerie_photos" id="feat2" {{ is_array(old('features')) && in_array('galerie_photos', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat2">Galerie Photos/Portfolio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="blog" id="feat3" {{ is_array(old('features')) && in_array('blog', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat3">Blog/Actualités</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="reservation_en_ligne" id="feat4" {{ is_array(old('features')) && in_array('reservation_en_ligne', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat4">Réservation en Ligne</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="espace_client" id="feat5" {{ is_array(old('features')) && in_array('espace_client', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat5">Espace Client/Membre</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="paiement_en_ligne" id="feat6" {{ is_array(old('features')) && in_array('paiement_en_ligne', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat6">Paiement en Ligne</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="multilingue" id="feat7" {{ is_array(old('features')) && in_array('multilingue', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat7">Site Multilingue</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="chat_en_ligne" id="feat8" {{ is_array(old('features')) && in_array('chat_en_ligne', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat8">Chat en Direct</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="seo_optimisation" id="feat9" {{ is_array(old('features')) && in_array('seo_optimisation', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat9">Optimisation SEO</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="integration_reseaux_sociaux" id="feat10" {{ is_array(old('features')) && in_array('integration_reseaux_sociaux', old('features')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat10">Intégration Réseaux Sociaux</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Site Existant -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="250">
                    <h3 class="section-title">
                        <i class="bi bi-globe"></i>
                        Site Web Actuel
                    </h3>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="has_existing_site" value="1" id="hasExistingSite" {{ old('has_existing_site') ? 'checked' : '' }}>
                            <label class="form-check-label" for="hasExistingSite">J'ai déjà un site web</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">URL du Site Existant</label>
                        <input type="url" class="form-control" name="existing_site_url" value="{{ old('existing_site_url') }}" placeholder="https://www.monsite.com">
                        @error('existing_site_url')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <!-- Section 5: Services Additionnels -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="section-title">
                        <i class="bi bi-plus-circle"></i>
                        Services Additionnels
                    </h3>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="need_content_writing" value="1" id="needContent" {{ old('need_content_writing') ? 'checked' : '' }}>
                        <label class="form-check-label" for="needContent">
                            <strong>Rédaction de Contenu</strong> - Besoin d'aide pour rédiger les textes du site
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="need_logo_design" value="1" id="needLogo" {{ old('need_logo_design') ? 'checked' : '' }}>
                        <label class="form-check-label" for="needLogo">
                            <strong>Création de Logo</strong> - Création ou refonte du logo de l'entreprise
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="need_hosting" value="1" id="needHosting" {{ old('need_hosting') ? 'checked' : '' }}>
                        <label class="form-check-label" for="needHosting">
                            <strong>Hébergement Web</strong> - Besoin d'un service d'hébergement et nom de domaine
                        </label>
                    </div>
                </div>

                <!-- Section 6: Budget et Délai -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="350">
                    <h3 class="section-title">
                        <i class="bi bi-cash-stack"></i>
                        Budget et Délai
                    </h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Budget Estimé (€) <span class="required-indicator">*</span></label>
                            <input type="number" class="form-control" name="budget_range" required min="100" step="100" value="{{ old('budget_range') }}" placeholder="Ex: 2500">
                            <small class="info-text">Indiquez votre budget approximatif en euros</small>
                            @error('budget_range')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Délai Souhaité <span class="required-indicator">*</span></label>
                            <select class="form-select" name="deadline" required>
                                <option value="">Sélectionnez un délai</option>
                                <option value="2_semaines" {{ old('deadline') == '2_semaines' ? 'selected' : '' }}>2 semaines</option>
                                <option value="1_mois" {{ old('deadline') == '1_mois' ? 'selected' : '' }}>1 mois</option>
                                <option value="2_mois" {{ old('deadline') == '2_mois' ? 'selected' : '' }}>2 mois</option>
                                <option value="3_mois_plus" {{ old('deadline') == '3_mois_plus' ? 'selected' : '' }}>3 mois ou plus</option>
                                <option value="flexible" {{ old('deadline') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                            </select>
                            @error('deadline')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>

                <!-- Section 7: Préférences Design -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="section-title">
                        <i class="bi bi-palette"></i>
                        Préférences de Design
                    </h3>
                    <div class="mb-3">
                        <label class="form-label">Style et Ambiance Souhaités</label>
                        <textarea class="form-control" name="design_preferences" rows="3" placeholder="Ex: Moderne, minimaliste, coloré, professionnel, élégant...">{{ old('design_preferences') }}</textarea>
                        @error('design_preferences')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Préférences de Couleurs</label>
                        <input type="text" class="form-control" name="color_preferences" value="{{ old('color_preferences') }}" placeholder="Ex: Bleu et blanc, couleurs de mon logo, tons neutres...">
                        @error('color_preferences')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sites de Référence</label>
                        <textarea class="form-control" name="reference_sites" rows="3" placeholder="Listez les URLs de sites que vous aimez et qui pourraient inspirer votre projet">{{ old('reference_sites') }}</textarea>
                        <small class="info-text">Cela nous aide à comprendre vos goûts visuels</small>
                        @error('reference_sites')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <!-- Section 8: Technologies -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="450">
                    <h3 class="section-title">
                        <i class="bi bi-code-slash"></i>
                        Technologies Préférées (Optionnel)
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preferred_technologies[]" value="WordPress" id="tech1" {{ is_array(old('preferred_technologies')) && in_array('WordPress', old('preferred_technologies')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tech1">WordPress</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preferred_technologies[]" value="Laravel" id="tech2" {{ is_array(old('preferred_technologies')) && in_array('Laravel', old('preferred_technologies')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tech2">Laravel</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preferred_technologies[]" value="React" id="tech3" {{ is_array(old('preferred_technologies')) && in_array('React', old('preferred_technologies')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tech3">React</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preferred_technologies[]" value="Vue.js" id="tech4" {{ is_array(old('preferred_technologies')) && in_array('Vue.js', old('preferred_technologies')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tech4">Vue.js</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preferred_technologies[]" value="Flutter" id="tech5" {{ is_array(old('preferred_technologies')) && in_array('Flutter', old('preferred_technologies')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tech5">Flutter (Mobile)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preferred_technologies[]" value="Shopify" id="tech6" {{ is_array(old('preferred_technologies')) && in_array('Shopify', old('preferred_technologies')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tech6">Shopify</label>
                            </div>
                        </div>
                    </div>
                    <small class="info-text">Laissez vide si vous n'avez pas de préférence technique</small>
                </div>

                <!-- Section 9: Public Cible et Concurrence -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="500">
                    <h3 class="section-title">
                        <i class="bi bi-people"></i>
                        Public Cible et Marché
                    </h3>
                    <div class="mb-3">
                        <label class="form-label">Public Cible</label>
                        <textarea class="form-control" name="target_audience" rows="3" placeholder="Décrivez votre clientèle cible : âge, localisation, centres d'intérêt...">{{ old('target_audience') }}</textarea>
                        @error('target_audience')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sites Concurrents</label>
                        <textarea class="form-control" name="competitors[]" rows="3" placeholder="Listez les URLs de vos principaux concurrents (optionnel)"></textarea>
                        <small class="info-text">Cela nous aide à analyser votre marché et à vous démarquer</small>
                    </div>
                </div>

                <!-- Section 10: Informations Supplémentaires -->
                <div class="form-section" data-aos="fade-up" data-aos-delay="550">
                    <h3 class="section-title">
                        <i class="bi bi-chat-dots"></i>
                        Informations Supplémentaires
                    </h3>
                    <div class="mb-3">
                        <label class="form-label">Autres Informations ou Questions</label>
                        <textarea class="form-control" name="additional_info" rows="5" placeholder="Toute autre information qui pourrait nous aider à mieux comprendre votre projet...">{{ old('additional_info') }}</textarea>
                        @error('additional_info')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="submit-section" data-aos="zoom-in" data-aos-delay="600">
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="bi bi-send-fill me-2"></i>
                        Envoyer Ma Demande de Devis
                    </button>
                    <p class="mt-3" style="color: var(--default-color); opacity: 0.7;">
                        <small><i class="bi bi-shield-check"></i> Vos informations sont sécurisées et confidentielles</small>
                    </p>
                </div>

            </form>
        </div>
    </div>
</section>

<!-- Modal d'Introduction -->
<div class="intro-modal" id="introModal">
    <div class="intro-content">
        <div class="intro-icon">
            <i class="bi bi-clock-history"></i>
        </div>
        <h2>Bienvenue !</h2>
        <p>Nous sommes ravis de votre intérêt pour nos services.</p>
        <p>Ce formulaire détaillé nous permettra de bien comprendre votre projet et vos besoins spécifiques.</p>
        <p><strong>Temps estimé :</strong> environ 5 minutes</p>
        <p style="font-size: 0.95rem; opacity: 0.8;">Prenez le temps de remplir les informations avec précision pour recevoir un devis personnalisé et adapté à vos attentes.</p>
        <button class="btn-start" onclick="closeIntroModal()">
            <i class="bi bi-arrow-right me-2"></i>Commencer
        </button>
    </div>
</div>

<!-- Modal de Confirmation -->
<div class="success-modal" id="successModal">
    <div class="success-content">
        <div class="success-icon">
            <i class="bi bi-check-circle-fill"></i>
        </div>
        <h2>Demande Envoyée avec Succès !</h2>
        <p>Nous vous remercions pour la confiance que vous nous accordez.</p>
        <p>Votre demande de devis a été reçue et est en cours de traitement par notre équipe.</p>
        <p><strong>Prochaines étapes :</strong></p>
        <ul style="text-align: left; display: inline-block; margin: 20px auto;">
            <li style="margin-bottom: 10px;">✓ Analyse détaillée de votre projet</li>
            <li style="margin-bottom: 10px;">✓ Préparation d'un devis personnalisé</li>
            <li style="margin-bottom: 10px;">✓ Contact sous 24-48 heures maximum</li>
        </ul>
        <p style="margin-top: 20px;">Un membre de notre équipe vous contactera dans les plus brefs délais pour discuter de votre projet en détail.</p>
        <div style="margin-top: 30px;">
            <p style="font-weight: 600; color: var(--accent-color);">Redirection automatique dans <span id="countdown">5</span> secondes...</p>
        </div>
    </div>
</div>

<script>
    // Fermer le modal d'introduction
    function closeIntroModal() {
        document.getElementById('introModal').style.display = 'none';
    }

    // Gestion de la soumission du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Afficher le modal de succès
        document.getElementById('successModal').style.display = 'flex';
        
        // Countdown et redirection
        let seconds = 5;
        const countdownElement = document.getElementById('countdown');
        
        const interval = setInterval(function() {
            seconds--;
            countdownElement.textContent = seconds;
            
            if (seconds <= 0) {
                clearInterval(interval);
                // Soumettre le formulaire
                e.target.submit();
            }
        }, 1000);
    });
</script>

@endsection
