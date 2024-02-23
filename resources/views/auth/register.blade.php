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
        <h4>Create New Account</h4>
        <p>If you don't have an account with us, Please Create new account.</p>
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
            <label for="email">Email *</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="input-field">
            <label for="alamat">Alamat</label>
            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
              @error('alamat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="input-field">
            <label for="telepon">telepon</label>
            <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>
              @error('telepon')
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
          <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="">privacy policy</a></p>
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
