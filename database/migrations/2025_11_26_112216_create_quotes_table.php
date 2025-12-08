<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            
            // Informations de contact
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('city');
            $table->string('country')->default('France');
            
            // Type de projet
            $table->enum('project_type', [
                'site_web',
                'e_commerce',
                'application_web',
                'application_mobile',
                'refonte',
                'autre'
            ]);
            $table->text('project_description');
            
            // Détails du projet
            $table->integer('number_of_pages')->nullable();
            $table->json('features')->nullable(); // Fonctionnalités souhaitées
            $table->boolean('has_existing_site')->default(false);
            $table->string('existing_site_url')->nullable();
            $table->boolean('need_content_writing')->default(false);
            $table->boolean('need_logo_design')->default(false);
            $table->boolean('need_hosting')->default(false);
            
            // Budget et délai
            $table->decimal('budget_range', 10, 2); // Budget en euros
            $table->enum('deadline', [
                '2_semaines',
                '1_mois',
                '2_mois',
                '3_mois_plus',
                'flexible'
            ]);
            
            // Préférences design
            $table->text('design_preferences')->nullable();
            $table->text('color_preferences')->nullable();
            $table->text('reference_sites')->nullable(); // Sites de référence
            
            // Technologies préférées
            $table->json('preferred_technologies')->nullable();
            
            // Informations supplémentaires
            $table->text('additional_info')->nullable();
            $table->text('target_audience')->nullable(); // Public cible
            $table->json('competitors')->nullable(); // Sites concurrents
            
            // Statut et suivi
            $table->enum('status', [
                'nouveau',
                'en_cours',
                'devis_envoye',
                'accepte',
                'refuse',
                'termine'
            ])->default('nouveau');
            $table->text('admin_notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
