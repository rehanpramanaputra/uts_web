<?php
session_start();

// Data user dummy (tanpa database)
$users = [
    'admin' => [
        'password' => 'admin123',
        'role' => 'admin',
        'name' => 'Administrator'
    ],
    'staff' => [
        'password' => 'staff123',
        'role' => 'staff',
        'name' => 'Staff Booking'
    ],
    'member' => [
        'password' => 'member123',
        'role' => 'member',
        'name' => 'Pelanggan'
    ]
];

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user'] = [
            'username' => $username,
            'name' => $users[$username]['name'],
            'role' => $users[$username]['role']
        ];

        // Redirect berdasarkan role
        switch ($users[$username]['role']) {
            case 'admin':
                header('Location: admin.php');
                break;
            case 'staff':
                header('Location: staff.php');
                break;
            case 'member':
                header('Location: member.php');
                break;
            default:
                header('Location: index.php');
        }
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dugong Tours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .login-hero {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .login-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/login-bg-pattern.png') center/cover no-repeat;
            opacity: 0.05;
        }
        
        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        .login-box {
            background-color: var(--white);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-logo i {
            font-size: 3rem;
            color: var(--accent-orange);
            margin-bottom: 15px;
        }
        
        .login-logo h2 {
            color: var(--primary-blue);
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .login-logo p {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(26, 115, 232, 0.25);
        }
        
        .btn-login {
            background-color: var(--primary-blue);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background-color: var(--dark-blue);
            transform: translateY(-2px);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 20px;
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .login-footer a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .login-footer a:hover {
            color: var(--dark-blue);
            text-decoration: underline;
        }
        
        .input-group-text {
            background-color: var(--light-blue);
            border: 1px solid #e0e0e0;
            color: var(--primary-blue);
        }
        
        .floating {
            position: absolute;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-1 {
            top: 20%;
            left: 10%;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            bottom: 15%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation-delay: 2s;
        }
        
        @media (max-width: 576px) {
            .login-box {
                padding: 30px 20px;
            }
            
            .login-hero {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="login-hero">
    <!-- Floating background shapes -->
    <div class="floating shape-1"></div>
    <div class="floating shape-2"></div>
    
    <div class="container">
        <div class="login-container">
            <div class="login-box">
                <div class="login-logo">
                    <i class="fas fa-plane"></i>
                    <h2>Dugong Tours</h2>
                    <p>Masuk ke akun Anda</p>
                </div>
                
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="mb-4">
                        <label for="username" class="form-label fw-medium">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-login btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>
                    <div class="text-center mb-3">
                        <a href="#" class="text-decoration-none">Lupa password?</a>
                    </div>
                </form>
                
                <div class="login-footer">
                    Belum punya akun? <a href="register.php">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>