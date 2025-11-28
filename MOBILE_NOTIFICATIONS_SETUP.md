# Mobile Push Notifications Setup Guide

## ✅ What's Been Implemented

### 1. Service Worker Registration
- **File**: `public/assets/js/firebase-messaging.js`
- Service worker is now registered BEFORE requesting notification permission
- Uses `messaging.useServiceWorker(registration)` to ensure Firebase uses the registered worker

### 2. PWA Manifest
- **File**: `public/manifest.json`
- Enables "Add to Home Screen" on mobile devices
- Configured with:
  - App name: "Glow and Chic Admin Dashboard"
  - Theme color: #a86d37 (brown)
  - Display mode: standalone (fullscreen app experience)
  - GCM Sender ID: 1364631713 (for Firebase)
  - Notification permissions

### 3. Mobile Meta Tags
- **File**: `resources/views/dashboard/layout.blade.php`
- Added mobile-specific meta tags:
  ```html
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#a86d37">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="manifest" href="/manifest.json">
  ```

### 4. App Icons
- **Files**: `public/assets/img/icon-192.svg`, `icon-512.svg`
- Created PWA icons for home screen installation
- Brown (#a86d37) background with white "G&C" text

## 📱 How to Test on Mobile

### Android (Chrome/Firefox)

1. **Open the dashboard on your mobile browser**
   ```
   https://fobs.dev/dashboard
   ```

2. **Login to the admin panel**

3. **Go to Notifications settings**
   - Click the "Notifications" menu item in the sidebar
   - Click "Enable Notifications"

4. **Accept permission prompt**
   - Browser will ask for notification permission
   - Click "Allow"

5. **Send a test notification**
   - Click "Send Test Notification" button on the notifications page
   - You should receive a notification on your mobile device

6. **Optional: Add to Home Screen**
   - Open browser menu (three dots)
   - Select "Add to Home Screen"
   - The app will install like a native app
   - Launch from home screen for better experience

### iOS (Safari) - Important Notes

⚠️ **iOS has specific requirements:**

1. **iOS Version**: Requires iOS 16.4 or later
2. **Browser**: MUST use Safari (Chrome/Firefox don't support notifications on iOS)
3. **Installation Required**: Must "Add to Home Screen" first
4. **Launch from Home Screen**: Notifications only work when app is launched from home screen icon, not from Safari browser

**Steps for iOS:**
1. Open https://fobs.dev/dashboard in **Safari**
2. Login to admin panel
3. Tap the Share button (square with arrow)
4. Select "Add to Home Screen"
5. Open the app from the home screen icon (NOT Safari)
6. Go to Notifications settings
7. Enable notifications
8. Accept permission when prompted

## 🔍 Troubleshooting

### Notifications not appearing on Android

1. **Check service worker registration**
   - Open browser DevTools on mobile (use Chrome Remote Debugging)
   - Go to Console tab
   - Look for "Service Worker registered successfully"

2. **Verify notification permission**
   - Go to browser Settings → Site Settings → Notifications
   - Ensure fobs.dev is "Allowed"

3. **Check if token was registered**
   - In DevTools Console, look for "Device token registered successfully"

4. **Test service worker**
   - In Chrome DevTools, go to Application tab → Service Workers
   - Verify `firebase-messaging-sw.js` is active

### Notifications not appearing on iOS

1. **Verify iOS version**
   - Settings → General → About → Software Version
   - Must be 16.4 or later

2. **Use Safari only**
   - Chrome and other browsers don't support notifications on iOS

3. **Must install to home screen**
   - Regular Safari browsing doesn't support background notifications
   - Must be installed as PWA

4. **Check notification settings**
   - Settings → Notifications → Safari
   - Ensure notifications are enabled

### Service Worker not registering

1. **Check HTTPS**
   - Service workers require HTTPS (except localhost)
   - Verify your domain is using HTTPS

2. **Check file path**
   - Service worker must be at `/firebase-messaging-sw.js`
   - Run: `curl https://fobs.dev/firebase-messaging-sw.js`
   - Should return JavaScript code, not 404

3. **Clear cache**
   - On mobile, go to browser settings
   - Clear site data for fobs.dev
   - Reload and try again

## 🎯 Testing Commands

### Test notification from backend
```bash
# Login to dashboard on desktop
# Go to Notifications page
# Click "Send Test Notification"
# Check mobile device for notification
```

### Verify service worker is running
```bash
# On mobile Chrome, enable USB debugging
# On desktop Chrome, go to chrome://inspect
# Select your mobile device
# Inspect the fobs.dev page
# Console tab should show: "Service Worker registered successfully"
```

### Check registered devices
```bash
# Go to /dashboard/notifications
# Scroll to "Registered Devices" section
# Your mobile device should appear in the list
```

## 🔔 How Notifications Work

### Foreground (App is open)
- Handled by `messaging.onMessage()` in firebase-messaging.js
- Shows in-app toast notification
- Plays notification sound

### Background (App is closed or in background)
- Handled by service worker (`firebase-messaging-sw.js`)
- Shows native system notification
- Clicking notification opens the dashboard

### Mobile Specifics
- **Android**: Works in background even without PWA installation
- **iOS**: Requires PWA installation, only works when launched from home screen
- **Both**: Require notification permission to be granted

## 📝 Key Files

| File | Purpose |
|------|---------|
| `public/firebase-messaging-sw.js` | Background notification handler |
| `public/assets/js/firebase-messaging.js` | Foreground notifications, service worker registration |
| `public/manifest.json` | PWA configuration for mobile installation |
| `public/assets/img/icon-192.svg` | App icon for home screen |
| `resources/views/dashboard/layout.blade.php` | Mobile meta tags and manifest link |

## ✨ Expected Behavior

After setup, notifications should work like WhatsApp:
- ✅ Appear on lock screen
- ✅ Show notification badge
- ✅ Play sound/vibration
- ✅ Work when app is closed
- ✅ Clickable to open dashboard
- ✅ Multiple notifications stack
- ✅ Persist until dismissed

## 🚀 Next Steps

1. **Clear your mobile browser cache** completely
2. **Reload the dashboard page**
3. **Enable notifications** from the Notifications page
4. **Send a test notification**
5. **If on Android**: Should work immediately
6. **If on iOS**: Add to home screen first, then enable notifications

The mobile notifications are now configured to work just like WhatsApp push notifications!
