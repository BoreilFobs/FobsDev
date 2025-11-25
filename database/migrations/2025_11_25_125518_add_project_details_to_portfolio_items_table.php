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
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->text('overview')->nullable()->after('description');
            $table->text('overview_additional')->nullable()->after('overview');
            $table->string('client')->nullable()->after('category');
            $table->string('project_date')->nullable()->after('client');
            $table->string('project_url_external')->nullable()->after('project_date');
            $table->json('features')->nullable()->after('overview_additional');
            $table->json('technologies')->nullable()->after('features');
            $table->string('slug')->nullable()->unique()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn([
                'overview',
                'overview_additional',
                'client',
                'project_date',
                'project_url_external',
                'features',
                'technologies',
                'slug'
            ]);
        });
    }
};
