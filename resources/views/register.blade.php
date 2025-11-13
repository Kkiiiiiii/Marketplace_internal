<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Page</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-box {
            background-color: #fff;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            width: 100%;
        }
        .login-box h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            font-size: 1.8rem;
        }
        .login-box .form-control {
            margin-bottom: 15px; /* Mengurangi margin antara form field */
        }
        .btn-login {
            width: 100%;
            padding: 10px;
        }
        .logo {
            background-color: #1b3b6f;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-box">
            <h2>Registrasi</h2>
            <div class="logo text-center rounded mx-auto">
                <i class="bi bi-person-fill" style="font-size: 30px;"></i>
            </div>

            <form action="{{ route('register-post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama" required>
                </div>


                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" name="kontak" id="kontak" class="form-control" placeholder="Masukkan kontak" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-login mb-2">Register</button>

                <div class="text-center">
                    <a href="{{ route('indexLog') }}" class="text-decoration-none text-black">Sudah Punya Akun? Login Disini!</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>

