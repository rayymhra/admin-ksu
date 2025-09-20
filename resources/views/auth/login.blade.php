<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KSU Admin Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #CB423F;
            --primary-hover: #b03834;
            --primary-light: rgba(203, 66, 63, 0.1);
            --neutral-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: #e2e8f0;
            --accent-color: #edf2f7;
        }

        body {
            background: var(--neutral-bg);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 420px;
            width: 100%;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
            color: white;
            padding: 40px 30px 30px;
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
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            transform: rotate(30deg);
        }

        .login-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 28px;
            position: relative;
            z-index: 1;
        }

        .login-header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }

        .login-body {
            padding: 40px 30px 30px;
        }

        .form-floating {
            margin-bottom: 20px;
            position: relative;
        }

        .form-floating > .form-control {
            height: 58px;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            padding-left: 45px;
            background: var(--accent-color);
        }

        .form-floating > .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem var(--primary-light);
            background: #fff;
        }

        .form-floating > label {
            color: var(--text-secondary);
            font-weight: 500;
            left: 45px;
        }

        .form-floating .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            z-index: 5;
            transition: color 0.3s ease;
        }

        .form-control:focus + .input-icon {
            color: var(--primary-color);
        }

        .btn-login {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            height: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(203, 66, 63, 0.25);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert-session {
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #f0f9ff;
            color: #0369a1;
            border-left: 4px solid #38bdf8;
        }

        .invalid-feedback {
            font-size: 14px;
            margin-top: 5px;
            display: flex;
            align-items: center;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .admin-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 576px) {
            .login-card {
                margin: 10px;
                border-radius: 12px;
            }

            .login-header {
                padding: 30px 20px 25px;
            }

            .login-body {
                padding: 30px 20px 25px;
            }
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .btn-login.loading .loading-spinner {
            display: inline-block;
            margin-right: 8px;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            background: rgba(203, 66, 63, 0.03);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 70%;
            left: 80%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 40%;
            left: 90%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 120px;
            height: 120px;
            top: 80%;
            left: 5%;
            animation-delay: 1s;
        }

        .shape:nth-child(5) {
            width: 90px;
            height: 90px;
            top: 15%;
            left: 85%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: var(--text-secondary);
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-card">
        <div class="login-header">
            <div class="admin-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <h2>KSU Admin</h2>
            <p>Content Management System</p>
        </div>

        <div class="login-body">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-session" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Email Address -->
                <div class="form-floating">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           placeholder="Email Address"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           autocomplete="username">
                    <label for="email">Email Address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-floating">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password"
                           name="password"
                           placeholder="Password"
                           required
                           autocomplete="current-password">
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Login Button -->
                <div class="d-grid">
                    <button class="btn btn-primary btn-login" type="submit" id="loginBtn">
                        <div class="loading-spinner"></div>
                        <i class="fas fa-sign-in-alt me-2"></i>
                        <span class="btn-text">Access Dashboard</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 KSU Admin Portal
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add loading state to login button
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            const btnText = btn.querySelector('.btn-text');

            btn.classList.add('loading');
            btn.disabled = true;
            btnText.textContent = 'Signing In...';
        });

        // Add focus effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            }, 5000);
        });
    </script>
</body>
</html>
