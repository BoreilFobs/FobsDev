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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            
            // Company Information
            $table->string('maps_link')->unique()->comment('Google Maps link to business location');
            $table->string('company_name');
            $table->string('website_url')->nullable();
            $table->string('category')->comment('e.g., restaurant, cafe, hotel, bar, spa, retail');
            $table->text('description');
            
            // Lead Status & Priority
            $table->enum('status', [
                'not_touched',
                'analyzed',
                'email_sent',
                'response_received',
                'rdv_booked',
                'contract_signed',
                'website_delivered'
            ])->default('not_touched');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            
            // Contact Information
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            
            // Business Details
            $table->decimal('estimated_value', 10, 2)->nullable()->comment('Estimated project value in EUR');
            $table->text('notes')->nullable()->comment('Internal notes');
            
            // Follow-up Management
            $table->date('last_contact_date')->nullable();
            $table->date('next_follow_up_date')->nullable();
            
            // Assignment
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for performance
            $table->index('status');
            $table->index('category');
            $table->index('priority');
            $table->index('next_follow_up_date');
            $table->index('assigned_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
