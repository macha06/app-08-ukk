<section class="countdown">
    <div class="container">
      <div class="customer counter">
        <div class="icon">
          <i class="fa-solid fa-user-group"></i>
        </div>
        <div class="content">
          <h4 class="count">{{ $user->count() }}</h4>
          <small>Jumlah Peminjam</small>
        </div>
      </div>
      <div class="book counter">
        <div class="icon">
          <i class="fa-solid fa-book"></i>
        </div>
        <div class="content">
          <h4 class="count">{{ $buku->count() }}</h4>
          <small>Jumlah Buku</small>
        </div>
      </div>
      <div class="store counter">
        <div class="icon">
          <i class="fa-solid fa-hand-holding"></i>
        </div>
        <div class="content">
          <h4 class="count">0</h4>
          <small>Buku Yg terpinjam</small>
        </div>
      </div>
      <div class="writer counter">
        <div class="icon">
          <i class="fa-solid fa-bookmark"></i>
        </div>
        <div class="content">
          <h4 class="count">2</h4>
          <small>kategori</small>
        </div>
      </div>
    </div>
  </section>