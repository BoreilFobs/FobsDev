<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FobsDev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --accent-color: #a86d37;
            --background-color: #b1a9a2;
            --surface-color: #c8b9aa;
            --heading-color: #2d2320;
            --text-muted: #6c6660;
        }
        
        body {
            background: linear-gradient(135deg, #b1a9a2 0%, #8d7a6b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(168, 109, 55, 0.1) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }
        
        body::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(200, 185, 170, 0.15) 0%, transparent 70%);
            animation: float 15s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-20px, 20px); }
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 
                0 20px 60px rgba(45, 35, 32, 0.15),
                0 10px 30px rgba(168, 109, 55, 0.1);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(168, 109, 55, 0.1);
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--accent-color) 0%, #8d6037 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .login-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
            letter-spacing: 0.5px;
        }
        
        .login-header p {
            margin: 0;
            opacity: 0.95;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
            font-weight: 500;
        }
        
        .login-body {
            padding: 45px 35px;
            background: white;
        }
        
        .form-label {
            color: var(--heading-color);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }
        
        .input-group {
            margin-bottom: 0;
        }
        
        .input-group-text {
            background: var(--surface-color);
            border: 2px solid var(--surface-color);
            color: var(--accent-color);
            border-radius: 10px 0 0 10px;
            padding: 12px 15px;
            border-right: none;
        }
        
        .form-control {
            border: 2px solid var(--surface-color);
            border-radius: 0 10px 10px 0;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border-left: none;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(168, 109, 55, 0.1);
            outline: none;
        }
        
        .form-control:focus + .input-group-text,
        .input-group:focus-within .input-group-text {
            border-color: var(--accent-color);
            background: rgba(168, 109, 55, 0.1);
        }
        
        .form-check {
            padding-left: 1.8rem;
        }
        
        .form-check-input {
            width: 1.3rem;
            height: 1.3rem;
            border: 2px solid var(--surface-color);
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(168, 109, 55, 0.2);
            border-color: var(--accent-color);
        }
        
        .form-check-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            cursor: pointer;
            user-select: none;
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--accent-color) 0%, #8d6037 100%);
            border: none;
            padding: 14px 20px;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(168, 109, 55, 0.3);
            letter-spacing: 0.3px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(168, 109, 55, 0.4);
            background: linear-gradient(135deg, #8d6037 0%, var(--accent-color) 100%);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert-danger {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            color: #991b1b;
            padding: 12px 16px;
            margin-bottom: 20px;
        }
        
        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 20px;
        }
        
        .back-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .back-link:hover {
            color: var(--accent-color);
            transform: translateX(-3px);
        }
        
        .back-link i {
            transition: transform 0.3s ease;
        }
        
        .back-link:hover i {
            transform: translateX(-3px);
        }
        
        @media (max-width: 480px) {
            .login-body {
                padding: 35px 25px;
            }
            
            .login-header {
                padding: 35px 20px;
            }
            
            .login-header h2 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
        <div class="login-header">
            <h2>FobsDev</h2>
            <p class="mb-0">Admin Dashboard</p>
        </div>
        <div class="login-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.authenticate') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember" checked>
                        <label class="form-check-label" for="remember">
                            Keep me logged in
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="/" class="back-link">
                    <i class="bi bi-arrow-left"></i> Back to Portfolio
                </a>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Check if user has permanent login token
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.querySelector('form');
            const rememberCheckbox = document.getElementById('remember');
            
            loginForm.addEventListener('submit', function(e) {
                if (rememberCheckbox.checked) {
                    localStorage.setItem('fobsdev_remember_login', 'true');
                } else {
                    localStorage.removeItem('fobsdev_remember_login');
                }
            });
            
            // Pre-check remember me if previously set
            if (localStorage.getItem('fobsdev_remember_login') === 'true') {
                rememberCheckbox.checked = true;
            }
        });
    </script>
</body>
</html>
