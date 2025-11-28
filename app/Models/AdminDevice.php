<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminDevice extends Model
{
    protected $fillable = [
        'user_id',
        'device_token',
        'device_name',
        'device_type',
        'last_used_at'
    ];

    protected $casts = [
        'last_used_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updateLastUsed()
    {
        $this->update(['last_used_at' => now()]);
    }
}
