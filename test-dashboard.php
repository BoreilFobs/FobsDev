<?php
/**
 * Quick Test Script for Portfolio Dashboard
 * 
 * Run this from terminal to verify everything is working:
 * php test-dashboard.php
 */

// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "\n" . str_repeat("=", 60) . "\n";
echo "   PORTFOLIO DASHBOARD - SYSTEM CHECK\n";
echo str_repeat("=", 60) . "\n\n";

// Test 1: Database Connection
echo "✓ Testing database connection...\n";
try {
    \DB::connection()->getPdo();
    echo "  ✅ Database connected successfully\n\n";
} catch (\Exception $e) {
    echo "  ❌ Database connection failed: " . $e->getMessage() . "\n\n";
    exit(1);
}

// Test 2: Portfolio Items Table
echo "✓ Checking portfolio_items table...\n";
try {
    $count = \App\Models\PortfolioItem::count();
    echo "  ✅ Table exists with {$count} portfolio items\n\n";
} catch (\Exception $e) {
    echo "  ❌ Table check failed: " . $e->getMessage() . "\n\n";
    exit(1);
}

// Test 3: List Portfolio Items
echo "✓ Listing portfolio items:\n";
$items = \App\Models\PortfolioItem::orderBy('order')->get();
if ($items->count() > 0) {
    foreach ($items as $item) {
        $status = $item->is_active ? '✅ Active' : '❌ Inactive';
        echo "  {$item->order}. {$item->title} ({$item->category}) - {$status}\n";
    }
    echo "\n";
} else {
    echo "  ⚠️  No portfolio items found. Run: php artisan db:seed --class=PortfolioItemSeeder\n\n";
}

// Test 4: Admin User
echo "✓ Checking admin user...\n";
try {
    $adminUser = \App\Models\User::where('email', 'admin@fobsdev.com')->first();
    if ($adminUser) {
        echo "  ✅ Admin user exists: {$adminUser->name} ({$adminUser->email})\n\n";
    } else {
        echo "  ⚠️  Admin user not found. Create one with:\n";
        echo "     php artisan tinker --execute=\"App\\Models\\User::create(['name' => 'Admin', 'email' => 'admin@fobsdev.com', 'password' => bcrypt('password123')]);\"\n\n";
    }
} catch (\Exception $e) {
    echo "  ❌ User check failed: " . $e->getMessage() . "\n\n";
}

// Test 5: Routes
echo "✓ Checking key routes...\n";
$routes = [
    'home' => '/',
    'admin.login' => '/admin/login',
    'dashboard.index' => '/dashboard',
    'dashboard.portfolio.index' => '/dashboard/portfolio',
];

foreach ($routes as $name => $path) {
    try {
        if (\Route::has($name)) {
            echo "  ✅ {$name} → {$path}\n";
        } else {
            echo "  ❌ {$name} not found\n";
        }
    } catch (\Exception $e) {
        echo "  ❌ Route check failed: " . $e->getMessage() . "\n";
    }
}
echo "\n";

// Test 6: Views
echo "✓ Checking views...\n";
$views = [
    'dashboard.login',
    'dashboard.layout',
    'dashboard.index',
    'dashboard.portfolio.index',
    'dashboard.portfolio.create',
    'dashboard.portfolio.edit',
];

foreach ($views as $view) {
    if (view()->exists($view)) {
        echo "  ✅ {$view}\n";
    } else {
        echo "  ❌ {$view} not found\n";
    }
}
echo "\n";

// Test 7: Upload Directory
echo "✓ Checking upload directory...\n";
$uploadPath = public_path('assets/img/portfolio');
if (is_dir($uploadPath)) {
    if (is_writable($uploadPath)) {
        echo "  ✅ Upload directory exists and is writable\n";
    } else {
        echo "  ⚠️  Upload directory exists but is not writable\n";
        echo "     Run: chmod -R 775 public/assets/img/portfolio\n";
    }
} else {
    echo "  ⚠️  Upload directory doesn't exist\n";
    echo "     It will be created automatically when uploading images\n";
}
echo "\n";

// Summary
echo str_repeat("=", 60) . "\n";
echo "   SYSTEM STATUS\n";
echo str_repeat("=", 60) . "\n\n";

if ($count > 0 && $adminUser) {
    echo "✅ System is READY!\n\n";
    echo "🚀 Next Steps:\n";
    echo "   1. Visit: http://localhost/admin/login\n";
    echo "   2. Login with:\n";
    echo "      Email: admin@fobsdev.com\n";
    echo "      Password: password123\n";
    echo "   3. Start managing your portfolio!\n\n";
    echo "⚠️  IMPORTANT: Change the default admin password immediately!\n\n";
} else {
    echo "⚠️  System needs attention. Review messages above.\n\n";
}

echo str_repeat("=", 60) . "\n\n";
