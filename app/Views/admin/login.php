
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Nayantar Memorial Charitable Trust</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-light: #a5b4fc;
            --primary-dark: #4338ca;
            --secondary-color: #ec4899;
            --accent-color: #06b6d4;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --border-light: #e5e7eb;
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --gradient-soft: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        body {
            background: var(--gradient-soft);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="0.5" fill="%236366f1" opacity="0.05"><animate attributeName="opacity" values="0.05;0.1;0.05" dur="4s" repeatCount="indefinite"/></circle></svg>') repeat;
            animation: float 25s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .login-container {
            max-width: 450px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: var(--bg-primary);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            border: 1px solid var(--border-light);
        }

        .login-header {
            background: var(--gradient-primary);
            color: white;
            text-align: center;
            padding: 3rem 2rem 2rem;
            position: relative;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
        }

        .login-header i {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .login-header h3 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            opacity: 0.9;
            font-weight: 400;
        }

        .login-body {
            padding: 3rem 2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.8rem;
        }

        .form-control {
            border-radius: 12px;
            border: 2px solid var(--border-light);
            padding: 0.9rem 1.2rem;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.15);
        }

        .input-group-text {
            background: var(--bg-secondary);
            border: 2px solid var(--border-light);
            border-radius: 12px 0 0 12px;
            border-right: none;
            color: var(--text-secondary);
        }

        .input-group .form-control {
            border-radius: 0 12px 12px 0;
            border-left: none;
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--primary-color);
            background: rgba(99, 102, 241, 0.05);
        }

        .btn-login {
            background: var(--gradient-primary);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #5b5bd6 0%, #7c3aed 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border-left: 4px solid #dc2626;
        }

        .back-link {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .back-link:hover {
            color: var(--secondary-color);
            transform: translateX(-3px);
        }

        .demo-credentials {
            background: var(--bg-secondary);
            border-radius: 12px;
            border-left: 4px solid var(--primary-color);
        }

        .demo-credentials strong {
            color: var(--primary-color);
        }

        .demo-credentials code {
            background: var(--primary-color);
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <i class="fas fa-user-shield"></i>
                    <h3 class="mb-1">Admin Login</h3>
                    <p class="mb-0">Nayantar Memorial Charitable Trust</p>
                </div>
                <div class="login-body">
                    <?php if (session('error')): ?>
                        <div class="alert alert-danger mb-4">
                            <i class="fas fa-exclamation-circle me-2"></i> <?= session('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/authenticate') ?>" method="post">
                        <div class="mb-4">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login mb-4">
                            <i class="fas fa-sign-in-alt me-2"></i> Login to Dashboard
                        </button>
                    </form>

                    <div class="text-center mb-4">
                        <a href="<?= base_url() ?>" class="back-link">
                            <i class="fas fa-arrow-left me-2"></i> Back to Website
                        </a>
                    </div>

                    <div class="demo-credentials p-3">
                        <small class="text-muted">
                            <strong>Demo Credentials:</strong><br>
                            Username: <code>admin</code><br>
                            Password: <code>admin123</code>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
