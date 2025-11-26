<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'company',
        'city',
        'country',
        'project_type',
        'project_description',
        'number_of_pages',
        'features',
        'has_existing_site',
        'existing_site_url',
        'need_content_writing',
        'need_logo_design',
        'need_hosting',
        'budget_range',
        'deadline',
        'design_preferences',
        'color_preferences',
        'reference_sites',
        'preferred_technologies',
        'additional_info',
        'target_audience',
        'competitors',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'features' => 'array',
        'preferred_technologies' => 'array',
        'competitors' => 'array',
        'has_existing_site' => 'boolean',
        'need_content_writing' => 'boolean',
        'need_logo_design' => 'boolean',
        'need_hosting' => 'boolean',
    ];

    // Scope pour les nouveaux devis
    public function scopeNew($query)
    {
        return $query->where('status', 'nouveau');
    }

    // Scope pour les devis en cours
    public function scopeInProgress($query)
    {
        return $query->where('status', 'en_cours');
    }

    // Scope pour trier par date
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
