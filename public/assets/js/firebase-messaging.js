// Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyBw_0MnK82NiYCwIphSzFShoMVFDNwfgEI",
    authDomain: "glow-and-chic.firebaseapp.com",
    projectId: "glow-and-chic",
    storageBucket: "glow-and-chic.firebasestorage.app",
    messagingSenderId: "1364631713",
    appId: "1:1364631713:web:f8bd3db73cec67b76b50e0",
    measurementId: "G-3B6N2DS03Y"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Get messaging instance
const messaging = firebase.messaging();

// Register Service Worker for mobile support
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/firebase-messaging-sw.js')
        .then((registration) => {
            console.log('✅ Service Worker registered successfully for mobile push notifications');
            return navigator.serviceWorker.ready;
        })
        .then(() => {
            console.log('✅ Service Worker is ready and active');
        })
        .catch((err) => {
            console.error('❌ Service Worker registration failed:', err);
        });
}

// Request permission and get token
function requestNotificationPermission() {
    console.log('Requesting notification permission...');
    
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
            
            // Get FCM token - Try without VAPID key first (Firebase will use default)
            messaging.getToken()
            .then((currentToken) => {
                if (currentToken) {
                    console.log('FCM Token:', currentToken);
                    registerDeviceToken(currentToken);
                } else {
                    console.log('No registration token available. Request permission to generate one.');
                }
            })
            .catch((err) => {
                console.error('An error occurred while retrieving token: ', err);
                // If default method fails, show helpful error
                if (err.code === 'messaging/invalid-vapid-key' || err.message.includes('applicationServerKey')) {
                    console.error('%c ⚠️ VAPID KEY REQUIRED! ', 'background: #dc3545; color: white; font-size: 16px; padding: 10px;');
                    console.error('%c Follow these steps to fix: ', 'font-size: 14px; font-weight: bold;');
                    console.error('1. Go to: https://console.firebase.google.com/');
                    console.error('2. Select project: glow-and-chic');
                    console.error('3. Settings ⚙️ > Cloud Messaging > Web Push certificates');
                    console.error('4. Click "Generate key pair" and copy the key');
                    console.error('5. Update line 25 in firebase-messaging.js with:');
                    console.error('   messaging.getToken({ vapidKey: "YOUR_KEY_HERE" })');
                    console.error('%c OR visit: /get-vapid-key.html for detailed instructions', 'color: #a86d37; font-weight: bold;');
                }
            });
        } else {
            console.log('Unable to get permission to notify.');
        }
    });
}

// Register device token with backend
function registerDeviceToken(token) {
    fetch('/dashboard/notifications/register-device', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            token: token,
            device_name: navigator.userAgent,
            device_type: 'web'
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Device registered:', data);
        localStorage.setItem('fcm_token', token);
    })
    .catch((error) => {
        console.error('Error registering device:', error);
    });
}

// Handle foreground messages
messaging.onMessage((payload) => {
    console.log('Message received in foreground:', payload);
    
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: '/assets/img/profile/Proile-main.png',
        badge: '/assets/img/profile/Proile-main.png',
        data: payload.data
    };

    // Show browser notification
    if (Notification.permission === 'granted') {
        const notification = new Notification(notificationTitle, notificationOptions);
        
        notification.onclick = function(event) {
            event.preventDefault();
            if (payload.data && payload.data.url) {
                window.open(payload.data.url, '_blank');
            }
            notification.close();
        };
    }

    // Show in-app toast notification
    showInAppNotification(notificationTitle, payload.notification.body, payload.data);
});

// Show in-app notification
function showInAppNotification(title, body, data) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        max-width: 350px;
        background: white;
        border-left: 4px solid #a86d37;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        padding: 20px;
        z-index: 10000;
        animation: slideIn 0.3s ease-out;
        cursor: pointer;
    `;
    
    notification.innerHTML = `
        <div style="display: flex; gap: 12px; align-items: start;">
            <i class="bi bi-bell-fill" style="font-size: 1.5rem; color: #a86d37;"></i>
            <div style="flex: 1;">
                <h6 style="margin: 0 0 8px 0; font-weight: 600; color: #2d2320;">${title}</h6>
                <p style="margin: 0; font-size: 0.9rem; color: #6c6660;">${body}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" 
                    style="border: none; background: none; font-size: 1.2rem; color: #999; cursor: pointer; padding: 0;">
                <i class="bi bi-x"></i>
            </button>
        </div>
    `;
    
    if (data && data.url) {
        notification.onclick = function() {
            window.location.href = data.url;
        };
    }
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// Auto-request permission when page loads
document.addEventListener('DOMContentLoaded', function() {
    if ('Notification' in window && 'serviceWorker' in navigator) {
        // Check if already have permission
        if (Notification.permission === 'granted') {
            requestNotificationPermission();
        } else if (Notification.permission !== 'denied') {
            // Show a prompt to user
            setTimeout(() => {
                if (confirm('Enable notifications to receive updates about new quotes and messages?')) {
                    requestNotificationPermission();
                }
            }, 2000);
        }
    }
});
