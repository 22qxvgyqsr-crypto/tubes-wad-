<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventaris Kosan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2 class="judul">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label style="font-weight:normal;">
                    <input type="checkbox" name="remember" style="width:auto;"> Ingat saya
                </label>
            </div>

            <button type="submit">Login</button>
        </form>

        <p class="link-auth">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>
</body>
</html>