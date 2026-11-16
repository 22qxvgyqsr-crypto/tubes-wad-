<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inventaris Kosan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2 class="judul">Daftar Akun</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Password (min. 8 karakter):</label>
                <input type="password" name="password" required>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <p class="link-auth">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>