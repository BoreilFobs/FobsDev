<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'client',
        'project_date',
        'project_url_external',
        'project_url_external_text',
        'description',
        'overview',
        'overview_additional',
        'main_image',
        'gallery_images',
        'url',
        'features',
        'technologies',
        'is_active',
        'order'
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'features' => 'array',
        'technologies' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolioItem) {
            if (empty($portfolioItem->slug)) {
                $portfolioItem->slug = Str::slug($portfolioItem->title);
            }
        });

        static::updating(function ($portfolioItem) {
            if ($portfolioItem->isDirty('title') && empty($portfolioItem->slug)) {
                $portfolioItem->slug = Str::slug($portfolioItem->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
