<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('main-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('main-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('main-assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="main-assets/dist/css/regist.css">
</head>

<body class="hold-transition login-page">
    <section class="content">
        <div class="container">
            <form class="form" action="{{ url('register') }}" method="post">
                @csrf
                <h2>REGISTER</h2>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input value="{{ old('nama') }}" type="text" id="nama" name="nama"
                        placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="username">NIM</label>
                    <input value="{{ old('username') }}" type="text" id="username" name="username"
                        placeholder="Masukkan NIM user" required maxlength="9"
                        @error('username') style="border: solid; border-color: rgba(255,0,0,.3)" @enderror>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input value="{{ old('email') }}" type="email" id="email" name="email"
                        placeholder="Masukkan email user" required
                        @error('email') style="border: solid; border-color: rgba(255,0,0,.3)" @enderror>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password user" required>
                </div>
                <div class="form-actions">
                    <button type="submit">Submit</button>
                    <button type="button" onclick="window.location.href='/login'">Kembali</button>
                </div>
            </form>
        </div>
    </section>

    <!-- jQuery -->
    <script src="{{ asset('main-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('main-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('main-assets/dist/js/adminlte.js') }}"></script>
</body>
