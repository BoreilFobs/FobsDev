@extends('dashboard.layout')

@section('title', 'Notification Settings')

@section('page-title', 'Push Notifications')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="stat-card">
                <h4 class="mb-4">
                    <i class="bi bi-bell-fill me-2" style="color: var(--accent-color);"></i>
                    Notification Settings
                </h4>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Enable push notifications to receive real-time alerts when new quotes or contact messages are submitted.
                </div>

                <div class="card mb-4" style="border-color: var(--surface-color);">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-laptop me-2"></i>
                            Current Device
                        </h5>
                        <p class="text-muted mb-3">This browser will receive push notifications when logged in as admin.</p>
                        
                        <div id="notification-status" class="mb-3">
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="ms-2">Checking notification status...</span>
                        </div>

                        <button id="enable-notifications-btn" class="btn btn-gradient" style="display: none;">
                            <i class="bi bi-bell-fill me-2"></i>Enable Notifications
                        </button>

                        <button id="test-notification-btn" class="btn btn-outline-primary" style="display: none;">
                            <i class="bi bi-send me-2"></i>Send Test Notification
                        </button>
                    </div>
                </div>

                <div class="card" style="border-color: var(--surface-color);">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-phone me-2"></i>
                            Registered Devices
                        </h5>
                        <p class="text-muted mb-3">Devices that will receive notifications when you're logged in.</p>
                        
                        @if(auth()->user()->adminDevices->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Device</th>
                                            <th>Type</th>
                                            <th>Last Used</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(auth()->user()->adminDevices as $device)
                                            <tr>
                                                <td>
                                                    <small>{{ Str::limit($device->device_name, 50) }}</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary">{{ $device->device_type }}</span>
                                                </td>
                                                <td>
                                                    <small>{{ $device->last_used_at?->diffForHumans() ?? 'Never' }}</small>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-danger" onclick="removeDevice('{{ $device->device_token }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No devices registered yet.</p>
                        @endif
                    </div>
                </div>

                <div class="alert alert-warning mt-4">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Note:</strong> You need to allow notifications in your browser settings. Make sure to accept the permission prompt when it appears.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    checkNotificationStatus();

    document.getElementById('enable-notifications-btn')?.addEventListener('click', function() {
        requestNotificationPermission();
    });

    document.getElementById('test-notification-btn')?.addEventListener('click', function() {
        sendTestNotification();
    });
});

function checkNotificationStatus() {
    const statusDiv = document.getElementById('notification-status');
    const enableBtn = document.getElementById('enable-notifications-btn');
    const testBtn = document.getElementById('test-notification-btn');

    if (!('Notification' in window)) {
        statusDiv.innerHTML = '<span class="text-danger"><i class="bi bi-x-circle me-2"></i>Your browser does not support notifications</span>';
        return;
    }

    const permission = Notification.permission;

    if (permission === 'granted') {
        statusDiv.innerHTML = '<span class="text-success"><i class="bi bi-check-circle me-2"></i>Notifications enabled</span>';
        testBtn.style.display = 'inline-block';
    } else if (permission === 'denied') {
        statusDiv.innerHTML = '<span class="text-danger"><i class="bi bi-x-circle me-2"></i>Notifications blocked. Please enable in browser settings.</span>';
    } else {
        statusDiv.innerHTML = '<span class="text-warning"><i class="bi bi-exclamation-triangle me-2"></i>Notifications not enabled</span>';
        enableBtn.style.display = 'inline-block';
    }
}

function sendTestNotification() {
    fetch('{{ route("dashboard.notifications.test") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Test notification sent! Check your notifications.');
        } else {
            alert(data.message || 'Failed to send test notification');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error sending test notification');
    });
}

function removeDevice(token) {
    if (!confirm('Are you sure you want to remove this device?')) {
        return;
    }

    fetch('{{ route("dashboard.notifications.unregister") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ token: token })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Failed to remove device');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error removing device');
    });
}
</script>
@endsection
