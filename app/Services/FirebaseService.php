<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use App\Models\AdminDevice;
use Illuminate\Support\Facades\Log;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'));
        $this->messaging = $factory->createMessaging();
    }

    /**
     * Send notification to all admin devices
     */
    public function sendToAllAdmins(string $title, string $body, array $data = [])
    {
        $devices = AdminDevice::whereNotNull('device_token')->get();
        
        if ($devices->isEmpty()) {
            Log::info('No admin devices found for notification');
            return false;
        }

        $tokens = $devices->pluck('device_token')->toArray();
        
        return $this->sendMulticast($tokens, $title, $body, $data);
    }

    /**
     * Send notification to specific device token
     */
    public function sendToDevice(string $token, string $title, string $body, array $data = [])
    {
        try {
            $notification = Notification::create($title, $body);
            
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification($notification)
                ->withData($data);

            $this->messaging->send($message);
            
            Log::info('Notification sent successfully', ['token' => substr($token, 0, 20) . '...']);
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send notification: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send notification to multiple devices
     */
    public function sendMulticast(array $tokens, string $title, string $body, array $data = [])
    {
        if (empty($tokens)) {
            return false;
        }

        try {
            $notification = Notification::create($title, $body);
            
            $message = CloudMessage::new()
                ->withNotification($notification)
                ->withData($data);

            $result = $this->messaging->sendMulticast($message, $tokens);
            
            Log::info('Multicast notification sent', [
                'success_count' => $result->successes()->count(),
                'failure_count' => $result->failures()->count()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send multicast notification: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Register a new admin device
     */
    public function registerDevice(int $userId, string $token, string $deviceName = null, string $deviceType = 'web')
    {
        return AdminDevice::updateOrCreate(
            ['device_token' => $token],
            [
                'user_id' => $userId,
                'device_name' => $deviceName,
                'device_type' => $deviceType,
                'last_used_at' => now()
            ]
        );
    }

    /**
     * Unregister a device
     */
    public function unregisterDevice(string $token)
    {
        return AdminDevice::where('device_token', $token)->delete();
    }

    /**
     * Send notification about new quote request
     */
    public function notifyNewQuote($quote)
    {
        $title = '📋 Nouvelle Demande de Devis';
        $body = "De: {$quote->name} - {$quote->company}";
        $data = [
            'type' => 'new_quote',
            'quote_id' => (string)$quote->id,
            'url' => route('dashboard.quotes.show', $quote->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about new contact message
     */
    public function notifyNewContact($contact)
    {
        $title = '✉️ Nouveau Message de Contact';
        $body = "De: {$contact->name} - {$contact->subject}";
        $data = [
            'type' => 'new_contact',
            'contact_id' => (string)$contact->id,
            'url' => route('dashboard.contacts.show', $contact->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }
}
