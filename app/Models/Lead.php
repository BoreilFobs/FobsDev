<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    // Status constants
    const STATUS_NOT_TOUCHED = 'not_touched';
    const STATUS_ANALYZED = 'analyzed';
    const STATUS_EMAIL_SENT = 'email_sent';
    const STATUS_RESPONSE_RECEIVED = 'response_received';
    const STATUS_RDV_BOOKED = 'rdv_booked';
    const STATUS_CONTRACT_SIGNED = 'contract_signed';
    const STATUS_WEBSITE_DELIVERED = 'website_delivered';

    // Priority constants
    const PRIORITY_LOW = 'low';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_HIGH = 'high';

    protected $fillable = [
        'maps_link',
        'company_name',
        'website_url',
        'category',
        'description',
        'status',
        'priority',
        'contact_person',
        'contact_email',
        'contact_phone',
        'estimated_value',
        'notes',
        'last_contact_date',
        'next_follow_up_date',
        'assigned_to',
    ];

    protected $casts = [
        'estimated_value' => 'decimal:2',
        'last_contact_date' => 'date',
        'next_follow_up_date' => 'date',
    ];

    /**
     * Get the user assigned to this lead
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Scope to filter by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to filter by category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope to filter by priority
     */
    public function scopeByPriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Scope for leads that need follow-up
     */
    public function scopeNeedsFollowUp($query)
    {
        return $query->whereNotNull('next_follow_up_date')
                     ->whereDate('next_follow_up_date', '<=', now());
    }

    /**
     * Scope for high priority leads
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', self::PRIORITY_HIGH);
    }

    /**
     * Scope for assigned to specific user
     */
    public function scopeAssignedTo($query, $userId)
    {
        return $query->where('assigned_to', $userId);
    }

    /**
     * Get human-readable status label
     */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            self::STATUS_NOT_TOUCHED => 'Non Touché',
            self::STATUS_ANALYZED => 'Analysé',
            self::STATUS_EMAIL_SENT => 'Email Envoyé',
            self::STATUS_RESPONSE_RECEIVED => 'Réponse Reçue',
            self::STATUS_RDV_BOOKED => 'RDV Réservé',
            self::STATUS_CONTRACT_SIGNED => 'Contrat Signé',
            self::STATUS_WEBSITE_DELIVERED => 'Site Livré',
            default => ucfirst(str_replace('_', ' ', $this->status)),
        };
    }

    /**
     * Get priority label
     */
    public function getPriorityLabelAttribute(): string
    {
        return match($this->priority) {
            self::PRIORITY_LOW => 'Basse',
            self::PRIORITY_MEDIUM => 'Moyenne',
            self::PRIORITY_HIGH => 'Haute',
            default => ucfirst($this->priority),
        };
    }

    /**
     * Check if follow-up is overdue
     */
    public function getIsOverdueAttribute(): bool
    {
        if (!$this->next_follow_up_date) {
            return false;
        }
        
        return $this->next_follow_up_date->isPast();
    }

    /**
     * Get status color for badges
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            self::STATUS_NOT_TOUCHED => 'secondary',
            self::STATUS_ANALYZED => 'info',
            self::STATUS_EMAIL_SENT => 'primary',
            self::STATUS_RESPONSE_RECEIVED => 'warning',
            self::STATUS_RDV_BOOKED => 'purple',
            self::STATUS_CONTRACT_SIGNED => 'success',
            self::STATUS_WEBSITE_DELIVERED => 'dark',
            default => 'secondary',
        };
    }

    /**
     * Get priority color for badges
     */
    public function getPriorityColorAttribute(): string
    {
        return match($this->priority) {
            self::PRIORITY_LOW => 'secondary',
            self::PRIORITY_MEDIUM => 'warning',
            self::PRIORITY_HIGH => 'danger',
            default => 'secondary',
        };
    }

    /**
     * Get all available statuses
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_NOT_TOUCHED => 'Non Touché',
            self::STATUS_ANALYZED => 'Analysé',
            self::STATUS_EMAIL_SENT => 'Email Envoyé',
            self::STATUS_RESPONSE_RECEIVED => 'Réponse Reçue',
            self::STATUS_RDV_BOOKED => 'RDV Réservé',
            self::STATUS_CONTRACT_SIGNED => 'Contrat Signé',
            self::STATUS_WEBSITE_DELIVERED => 'Site Livré',
        ];
    }

    /**
     * Get all available priorities
     */
    public static function getPriorities(): array
    {
        return [
            self::PRIORITY_LOW => 'Basse',
            self::PRIORITY_MEDIUM => 'Moyenne',
            self::PRIORITY_HIGH => 'Haute',
        ];
    }

    /**
     * Get common categories
     */
    public static function getCategories(): array
    {
        return [
            'restaurant' => 'Restaurant',
            'cafe' => 'Café',
            'hotel' => 'Hôtel',
            'bar' => 'Bar',
            'spa' => 'Spa',
            'retail' => 'Commerce',
            'service' => 'Service',
            'other' => 'Autre',
        ];
    }
}
