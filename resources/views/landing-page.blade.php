<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M-PUSS</title>
    @include('part.link-landing')
  </head>
  <body>
    @include('layout.navbar-lp')
    <section class="hero">
      <div class="main">
        <div class="content">
          <small>Ready for Reading a book</small>
          <h2>Tanpa Harus Ngantri</h2>
          <h5>Untuk Umum</h5>
          <p>
            menyediakan layanan perpustakaan online untuk meminjam buku tanpa harus Mengantri
          </p>
          <div class="btns">
            <button>Masuk<i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
        <div class="img">
          <img
            src="{{asset('')}}assets/img/teenager-student-girl-yellow-pointing-finger-side-copy.png"
            alt=""
          />
        </div>
      </div>
      @include('part.dot')
      <div class="orange-circle"></div>
      <div class="blue-circle"></div>
    </section>

    @include('layout.service')

    @include('layout.rekomendasi')
    @include('layout.countdown')
    @include('layout.subs')
    @include('layout.footer-lp')
    <button class="back-to-top"><i class="fa-solid fa-chevron-up"></i></button>
    @include('part.footer-lp')
  </body>
</html>
