<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookoe - Online Book Store website</title>
    @include('part.link-landing')
    <link rel="stylesheet" href="{{ asset('') }}assets/css/book-filter.css" />
  </head>
  <body>
    @include('layout.nav')
    <div class="breadcrumb-container">
      <ul class="breadcrumb">
        <li><a href="{{ url('/') }}" style="color: #6c5dd4">Beranda</a></li>
        <li><a href="#">Registration</a></li>
      </ul>
    </div>

    <section class="registration">
      <h3>Registration</h3>
      <div class="registration-form">
        <h4>Buat Akun Baru</h4>
        <p>Jika anda belum mempunyai akun silahkan Daftar</p>
        <form method="POST" action="{{ route('register') }}">
          @csrf
        <div class="input-form">
          <div class="input-field">
            <label for="name">Nama Lengkap</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="input-field">
            <label for="name">Username</label>
            <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="input-field">
            <label for="email">Email *</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="input-field">
            <label for="password">Password *</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="input-field">
            <label for="password-confirm">Confirm Password *</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
          <button type="submit" >Create Account</button>
          <p>Already Have an Account ? <a href="{{ url('login') }}">Login Now</a></p>
        </div>
      </form> 
      </div>
    </section>
    @include('layout.footer-lp')
    <button class="back-to-top"><i class="fa-solid fa-chevron-up"></i></button>
    <script src="{{ asset('') }}assets/js/back-to-top.js"></script>
  </body>
</html>
