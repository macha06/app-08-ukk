<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M-PUSS</title>
    <link rel="stylesheet" href="{{ asset('') }}assets/css/book-filter.css" />
    @include('part.link-landing')
  </head>
  <body>
    @include('layout.nav')
    <div class="breadcrumb-container">
      <ul class="breadcrumb">
        <li><a href="{{ url('/') }}" style="color: #6c5dd4">Beranda</a></li>
        <li><a href="#">Login</a></li>
      </ul>
    </div>

    <section class="login">
      <h3>Login</h3>
      <div class="login-form">
        <h4>Login</h4>
        <p>If you have an account with us, please log in.</p>
        <form method="POST" action="{{ route('login') }}">
          @csrf
        <div class="input-form">
          <div class="input-field">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email" placeholder="Your Email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="input-field">
            <label for="email">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your Password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary" >Login Account</button>
          <p>Don't Have an Account ? <a href="{{ route('register') }}">Create Account</a></p>
        </div>
      </form>
      </div>
    </section>
    @include('layout.footer-lp')
    <button class="back-to-top"><i class="fa-solid fa-chevron-up"></i></button>
    <script src="{{ asset('') }}assets/js/back-to-top.js"></script>
  </body>
</html>
