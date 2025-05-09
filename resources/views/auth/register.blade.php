<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | iTECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/tech-background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row justify-content-center align-items-center min-vh-100 m-0">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 rounded-4" style="background: #0275d8; box-shadow: 0 0 30px rgba(0,255,255,0.2);">
                <div class="card-body p-4 text-white">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <div class="rounded-circle mx-auto" style="background: #006040; width: 200px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <h2 class="mb-0" style="font-family: 'Orbitron', sans-serif; color: #00ffff; text-shadow: 0 0 5px #00ffff;">
                                <i class="fas fa-microchip me-2"></i>iTECH
                                <span style="font-size: 0.5em; display: block; text-transform: uppercase;">EDUCATION</span>
                            </h2>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama Lengkap">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan E-mail">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Masukkan Password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                        </div>

                        <!-- Login Link -->
                        <div class="mb-3 text-white">
                            Sudah punya akun? <a href="{{ route('login') }}" class="text-warning fw-bold text-decoration-none">Login</a> disini
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-success" style="background-color: #4CD964; border: none;">
                                Daftar
                            </button>
                        </div>

                        <!-- Google Register/Login -->
                        <div class="d-grid gap-2">
                            <a href="{{ route('auth.google') }}" class="btn btn-light d-flex align-items-center justify-content-center gap-2" style="background-color: #fff; color: #333;">
                                <img src="{{ asset('images/google.webp') }}" alt="Google" style="height: 24px;">
                                Lanjutkan dengan Google
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
