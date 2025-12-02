<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'admin_response',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function markAsRead()
    {
        $oldStatus = $this->status;
        
        $this->update([
            'status' => 'lu',
            'read_at' => now()
        ]);

        // Send notification if status changed
        if ($oldStatus !== 'lu') {
            try {
                $firebase = app(\App\Services\FirebaseService::class);
                $firebase->notifyContactStatusUpdate($this, $oldStatus, 'lu');
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send contact status notification: ' . $e->getMessage());
            }
        }
    }
}
