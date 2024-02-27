<section class="book-sale">
    <div class="heading">
      <h4>Buku-buku baru yang tersedia</h4>
      <div class="arrowbtn">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>
    </div>
    <div class="book-container">
      <div class="wrapper">
        <ul class="carousel">
          @forelse ($model as $item)
          <li class="card">
            <div class="img">
              <a href='{{ route('login') }}'><img src="{{ Storage::url('public/buku/').$item->gambar }}" class="rounded" style="width: 150px"></a>
              <span class="badge">Baru</span>
            </div>
            <h5>{{ $item->judul }}</h5>
            <div class="genre">
              @foreach($item->kategori as $category)
                <span class="badge bg-primary">{{ $category->nm_kategori }} :</span>
              @endforeach
            </div>
            <div class="footer">
              <span class="star"><i class="fa fa-star"></i> 4.7</span>
              <div class="price">
              </div>
            </div>
          </li>
          @empty
          <li class="card">
            <p>Buku tidak tersedia</p>
          </li>
          @endforelse
        </ul>
      </div>
    </div>
  </section>