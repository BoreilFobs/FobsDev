@extends('layout')
@section('content')

<style>
    .success-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--background-color);
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .success-card {
        background: var(--surface-color);
        border-radius: 20px;
        padding: 60px 40px;
        max-width: 700px;
        margin: 0 auto;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        position: relative;
        z-index: 1;
    }

    .success-icon {
        width: 120px;
        height: 120px;
        background: var(--accent-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        animation: scaleIn 0.6s ease-out;
        box-shadow: 0 10px 30px color-mix(in srgb, var(--accent-color), transparent 50%);
    }

    .success-icon i {
        font-size: 3.5rem;
        color: white;
    }

    @keyframes scaleIn {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    .success-card h1 {
        color: var(--heading-color);
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 20px;
        font-family: var(--heading-font);
    }

    .success-card p {
        color: var(--default-color);
        font-size: 1.15rem;
        line-height: 1.8;
        margin-bottom: 15px;
    }

    .contact-info {
        background: color-mix(in srgb, var(--accent-color), white 95%);
        border-radius: 15px;
        padding: 30px;
        margin: 35px 0;
        border: 2px solid color-mix(in srgb, var(--accent-color), transparent 70%);
    }

    .contact-info h3 {
        color: var(--accent-color);
        font-size: 1.3rem;
        margin-bottom: 20px;
        font-family: var(--heading-font);
        font-weight: 700;
    }

    .contact-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin: 12px 0;
        color: var(--default-color);
        font-weight: 500;
    }

    .contact-item i {
        color: var(--accent-color);
        font-size: 1.3rem;
    }

    .steps-container {
        margin-top: 25px;
        text-align: left;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .step-item {
        display: flex;
        align-items: start;
        gap: 15px;
        margin-bottom: 20px;
    }

    .step-number {
        background: var(--accent-color);
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
        font-size: 1.1rem;
    }

    .step-content {
        flex: 1;
    }

    .step-title {
        color: var(--heading-color);
        display: block;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .step-description {
        color: var(--default-color);
        font-size: 0.95rem;
    }

    .btn-home {
        background: var(--accent-color);
        color: white;
        border: none;
        padding: 18px 50px;
        border-radius: 50px;
        font-size: 1.15rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        margin-top: 25px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px color-mix(in srgb, var(--accent-color), transparent 60%);
        font-family: var(--heading-font);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-home:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px color-mix(in srgb, var(--accent-color), transparent 50%);
        background: color-mix(in srgb, var(--accent-color), black 10%);
        color: white;
    }

    @media (max-width: 768px) {
        .success-card {
            padding: 40px 25px;
        }

        .success-card h1 {
            font-size: 2.2rem;
        }

        .success-card p {
            font-size: 1rem;
        }

        .success-icon {
            width: 100px;
            height: 100px;
        }

        .success-icon i {
            font-size: 3rem;
        }

        .contact-info {
            padding: 20px 15px;
        }

        .contact-info h3 {
            font-size: 1.1rem;
        }

        .contact-item {
            font-size: 0.95rem;
            flex-wrap: wrap;
        }

        .btn-home {
            padding: 15px 35px;
            font-size: 1rem;
            width: 100%;
        }

        .step-item {
            gap: 12px;
        }

        .step-number {
            width: 32px;
            height: 32px;
            font-size: 1rem;
        }

        .step-title {
            font-size: 0.95rem;
        }

        .step-description {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .success-section {
            padding: 20px 10px;
        }

        .success-card {
            padding: 30px 20px;
            border-radius: 15px;
        }

        .success-card h1 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .success-card p {
            font-size: 0.95rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .success-icon i {
            font-size: 2.5rem;
        }

        .contact-info {
            padding: 20px 15px;
            margin: 25px 0;
        }

        .contact-info h3 {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .contact-item {
            font-size: 0.9rem;
            gap: 10px;
        }

        .contact-item i {
            font-size: 1.1rem;
        }

        .btn-home {
            padding: 14px 30px;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .steps-container {
            margin-top: 20px;
        }

        .step-item {
            gap: 10px;
            margin-bottom: 15px;
        }

        .step-number {
            width: 28px;
            height: 28px;
            font-size: 0.9rem;
        }

        .step-title {
            font-size: 0.9rem;
            margin-bottom: 3px;
        }

        .step-description {
            font-size: 0.85rem;
            line-height: 1.4;
        }
    }
</style>

<section class="success-section">
    <div class="container">
        <div class="success-card" data-aos="zoom-in">
            
            <div class="success-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <h1>Demande Envoyée !</h1>
            
            <p>Merci pour votre confiance ! Votre demande de devis a été reçue avec succès.</p>
            
            <p>Nous analysons attentivement toutes les informations que vous nous avez fournies et nous vous répondrons dans les <strong>24 heures</strong>.</p>

            <div class="contact-info">
                <h3><i class="bi bi-clock-history"></i> Que se passe-t-il maintenant ?</h3>
                
                <div class="steps-container">
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <strong class="step-title">Analyse de votre projet</strong>
                            <span class="step-description">Nous étudions en détail tous les aspects de votre demande</span>
                        </div>
                    </div>
                    
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <strong class="step-title">Préparation du devis personnalisé</strong>
                            <span class="step-description">Nous créons une offre adaptée à vos besoins spécifiques</span>
                        </div>
                    </div>
                    
                    <div class="step-item">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <strong class="step-title">Prise de contact sous 24h</strong>
                            <span class="step-description">Nous vous contactons pour discuter de votre projet</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-info">
                <h3>Besoin de nous joindre rapidement ?</h3>
                <div class="contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>contact@fobs.dev</span>
                </div>
                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+39 351 769 9065</span>
                </div>
                <div class="contact-item">
                    <i class="bi bi-whatsapp"></i>
                    <span>WhatsApp disponible</span>
                </div>
            </div>

            <a href="/" class="btn-home">
                <i class="bi bi-house-fill me-2"></i>
                Retour à l'Accueil
            </a>

        </div>
    </div>
</section>

@endsection
