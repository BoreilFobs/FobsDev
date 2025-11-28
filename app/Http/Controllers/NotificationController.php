<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    /**
     * Register a device token for push notifications
     */
    public function registerDevice(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required|string',
            'device_name' => 'nullable|string|max:255',
            'device_type' => 'nullable|string|in:web,ios,android'
        ]);

        $device = $this->firebase->registerDevice(
            Auth::id(),
            $validated['token'],
            $validated['device_name'] ?? null,
            $validated['device_type'] ?? 'web'
        );

        return response()->json([
            'success' => true,
            'message' => 'Device registered successfully',
            'device_id' => $device->id
        ]);
    }

    /**
     * Unregister a device token
     */
    public function unregisterDevice(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required|string'
        ]);

        $this->firebase->unregisterDevice($validated['token']);

        return response()->json([
            'success' => true,
            'message' => 'Device unregistered successfully'
        ]);
    }

    /**
     * Test notification
     */
    public function testNotification(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $result = $this->firebase->sendToAllAdmins(
            'Test Notification',
            'This is a test notification from FobsDev Dashboard',
            ['type' => 'test']
        );

        return response()->json([
            'success' => $result,
            'message' => $result ? 'Test notification sent' : 'No devices registered or notification failed'
        ]);
    }
}
