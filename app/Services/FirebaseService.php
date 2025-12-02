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

    /**
     * Send notification about new lead
     */
    public function notifyNewLead($lead)
    {
        $title = '🎯 Nouveau Lead Créé';
        $body = "{$lead->company_name} - {$lead->status_label}";
        $data = [
            'type' => 'new_lead',
            'lead_id' => (string)$lead->id,
            'url' => route('dashboard.leads.show', $lead->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about lead status update
     */
    public function notifyLeadStatusUpdate($lead, $oldStatus, $newStatus)
    {
        $statusLabels = \App\Models\Lead::getStatuses();
        $title = '📊 Statut Lead Mis à Jour';
        $body = "{$lead->company_name}: {$statusLabels[$oldStatus]} → {$statusLabels[$newStatus]}";
        $data = [
            'type' => 'lead_status_update',
            'lead_id' => (string)$lead->id,
            'url' => route('dashboard.leads.show', $lead->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about lead deletion
     */
    public function notifyLeadDeleted($lead)
    {
        $title = '🗑️ Lead Supprimé';
        $body = "{$lead->company_name} a été supprimé";
        $data = [
            'type' => 'lead_deleted',
            'url' => route('dashboard.leads.index')
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about quote status update
     */
    public function notifyQuoteStatusUpdate($quote, $oldStatus, $newStatus)
    {
        $statusLabels = [
            'nouveau' => 'Nouveau',
            'en_cours' => 'En Cours',
            'traite' => 'Traité',
            'archive' => 'Archivé'
        ];
        $title = '📋 Statut Devis Mis à Jour';
        $body = "{$quote->name}: {$statusLabels[$oldStatus]} → {$statusLabels[$newStatus]}";
        $data = [
            'type' => 'quote_status_update',
            'quote_id' => (string)$quote->id,
            'url' => route('dashboard.quotes.show', $quote->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about contact status update
     */
    public function notifyContactStatusUpdate($contact, $oldStatus, $newStatus)
    {
        $statusLabels = [
            'nouveau' => 'Nouveau',
            'lu' => 'Lu',
            'traite' => 'Traité'
        ];
        $title = '✉️ Statut Message Mis à Jour';
        $body = "{$contact->name}: {$statusLabels[$oldStatus]} → {$statusLabels[$newStatus]}";
        $data = [
            'type' => 'contact_status_update',
            'contact_id' => (string)$contact->id,
            'url' => route('dashboard.contacts.show', $contact->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about new portfolio item
     */
    public function notifyNewPortfolio($portfolio)
    {
        $title = '💼 Nouveau Projet Portfolio';
        $body = "{$portfolio->title} a été ajouté au portfolio";
        $data = [
            'type' => 'new_portfolio',
            'portfolio_id' => (string)$portfolio->id,
            'url' => route('dashboard.portfolio.edit', $portfolio->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about portfolio item update
     */
    public function notifyPortfolioUpdated($portfolio)
    {
        $title = '📝 Projet Portfolio Modifié';
        $body = "{$portfolio->title} a été mis à jour";
        $data = [
            'type' => 'portfolio_updated',
            'portfolio_id' => (string)$portfolio->id,
            'url' => route('dashboard.portfolio.edit', $portfolio->id)
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }

    /**
     * Send notification about portfolio item deletion
     */
    public function notifyPortfolioDeleted($portfolio)
    {
        $title = '🗑️ Projet Portfolio Supprimé';
        $body = "{$portfolio->title} a été supprimé du portfolio";
        $data = [
            'type' => 'portfolio_deleted',
            'url' => route('dashboard.portfolio.index')
        ];

        return $this->sendToAllAdmins($title, $body, $data);
    }
}
