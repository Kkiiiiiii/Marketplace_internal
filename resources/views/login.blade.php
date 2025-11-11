<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Page</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-box {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-box h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        .login-box .form-control {
            margin-bottom: 20px;
        }
        .btn-login {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-box">
            <div class="logo text-center">
                <i class="bi bi-basket" style="font-size: 50px"></i>
            </div>
            <h2>Login</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-login">Login</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
