# Firebase Push Notifications Setup Guide

## 🔔 Overview
The notification system sends real-time push notifications to admin devices when:
- A new quote request is submitted
- A new contact message is received

## 📋 Prerequisites
You already have Firebase credentials in: `storage/app/firebase/firebase_credentials.json`

## 🛠️ Configuration Steps

### ⚠️ CRITICAL - Get VAPID Key (Required for Web Push)

**The error "Invalid applicationServerKey" means you need to generate a VAPID key.**

#### Quick Steps:
1. Go to [Firebase Console](https://console.firebase.google.com/)
2. Select project: **glow-and-chic**
3. Click ⚙️ (Settings) > Project Settings
4. Go to **"Cloud Messaging"** tab
5. Scroll to **"Web Push certificates"**
6. Click **"Generate key pair"** button
7. Copy the key (starts with "B...")

#### Update the Code:
Open `public/assets/js/firebase-messaging.js` and find this line (around line 25):
```javascript
messaging.getToken()
```

Replace it with:
```javascript
messaging.getToken({
    vapidKey: 'YOUR_COPIED_VAPID_KEY_HERE'  // Paste the key from Firebase Console
})
```

### Alternative: View Instructions
Open in browser: `http://your-domain/get-vapid-key.html`

---

### 1. Get Firebase Web Configuration ✅ DONE
The Firebase config is already set up with:
- API Key: AIzaSyBw_0MnK82NiYCwIphSzFShoMVFDNwfgEI
- Project ID: glow-and-chic
- Sender ID: 1364631713
- App ID: 1:1364631713:web:f8bd3db73cec67b76b50e0

## 🚀 How It Works

### Backend (Laravel)
1. **FirebaseService** (`app/Services/FirebaseService.php`):
   - Sends push notifications using Firebase Cloud Messaging
   - Manages device registration/unregistration
   - Handles multicast notifications to all admin devices

2. **Controllers**:
   - `QuoteController` - Sends notification on new quote
   - `ContactController` - Sends notification on new contact
   - `NotificationController` - Manages device tokens

3. **Database**:
   - `admin_devices` table stores device tokens
   - Links devices to admin users

### Frontend (JavaScript)
1. **firebase-messaging.js**:
   - Requests notification permission
   - Gets FCM token from browser
   - Registers token with backend
   - Handles foreground notifications

2. **firebase-messaging-sw.js**:
   - Service worker for background notifications
   - Shows notifications when app is not active

## 📱 Usage

### For Administrators:
1. Login to dashboard
2. Browser will prompt for notification permission
3. Click "Allow" to enable notifications
4. Go to Dashboard > Notifications to:
   - View notification status
   - Send test notification
   - Manage registered devices

### Automatic Notifications:
- When someone submits a quote → All admins get notified
- When someone sends contact message → All admins get notified

## 🔧 Testing

### Test Notification:
1. Go to Dashboard > Notifications
2. Click "Send Test Notification"
3. You should receive a notification

### Test Real Notifications:
1. Submit a quote from the public form
2. All logged-in admin devices will receive notification
3. Click notification to jump to the quote details

## 📊 Notification Flow

```
User submits form
    ↓
Controller creates record
    ↓
FirebaseService sends notification
    ↓
Firebase Cloud Messaging
    ↓
All registered admin devices receive push notification
```

## 🔐 Security
- Only authenticated admins can register devices
- Device tokens are stored securely in database
- Notifications only sent to verified admin devices
- CSRF protection on all endpoints

## 🐛 Troubleshooting

### Notifications not working?
1. Check browser console for errors
2. Ensure notification permission is granted
3. Verify Firebase config is correct
4. Check VAPID key is set
5. Test with "Send Test Notification" button

### Token registration failing?
1. Clear browser cache
2. Check CSRF token is present
3. Verify route is protected by auth middleware
4. Check Laravel logs in `storage/logs`

## 📝 Routes

```php
// Register device
POST /dashboard/notifications/register-device

// Unregister device
POST /dashboard/notifications/unregister-device

// Send test notification
POST /dashboard/notifications/test

// View notification settings
GET /dashboard/notifications
```

## 🗄️ Database Structure

### admin_devices table:
- `id` - Primary key
- `user_id` - Foreign key to users
- `device_token` - FCM token (unique)
- `device_name` - User agent string
- `device_type` - web/ios/android
- `last_used_at` - Last notification timestamp
- `created_at` / `updated_at`

## 📚 Dependencies

```json
{
  "kreait/firebase-php": "^7.24"
}
```

Already installed via Composer.

## ✅ Checklist

- [x] Firebase PHP SDK installed
- [x] Database migration created
- [x] Models created (AdminDevice)
- [x] Service class created (FirebaseService)
- [x] Controllers updated (Quote, Contact)
- [x] Notification controller created
- [x] Routes configured
- [x] Frontend scripts created
- [x] Service worker created
- [x] Dashboard UI created
- [x] Firebase web config added (API key, project ID, etc.)
- [ ] **TODO: Generate and add VAPID key** ⚠️ REQUIRED - See instructions above!

## 🎯 Next Steps

1. **Generate VAPID key** from Firebase Console (see instructions above) ⚠️
2. Update `public/assets/js/firebase-messaging.js` with the VAPID key
3. Clear browser cache (Ctrl+Shift+Delete)
4. Reload dashboard and allow notification permission
5. Test notifications from Dashboard → Notifications → "Send Test Notification"

## 🔗 Helpful Links

- **Get VAPID Key Instructions:** Open `http://your-domain/get-vapid-key.html` in browser
- **Firebase Console:** https://console.firebase.google.com/
- **Project:** glow-and-chic
- **Testing Page:** Dashboard → Notifications
