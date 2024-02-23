<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harry Potter - Book Detail Page</title>

    @include('part.link-landing')

    <link rel="stylesheet" href="{{ asset('') }}assets/css/book-filter.css" />
  </head>
  <body>
    @include('layout.nav')
    <div class="breadcrumb-container">
      <ul class="breadcrumb">
        <li><a href="{{ url('/') }}">Beranda</a></li>
        <li><a href="#" style="color: #6c5dd4">Books</a></li>
        <li><a href="#">Harry Potter</a></li>
      </ul>
    </div>

    <section class="book-overview">
      <div class="img">
        <img src="{{asset('')}}assets/img/book-6.jpg" alt="" />
      </div>
      <div class="book-content">
        <h4>Harry Potter</h4>
        <div class="meta">
          <div class="review">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <span>4.0</span>
            </div>
            <div class="comment-like">
              <small
                ><img src="{{asset('')}}assets/img/comment.png" alt="" /> <span>256 Reviews</span></small
              >
              <small><img src="{{asset('')}}assets/img/like.png" alt="" /> <span>456k Likes</span></small>
            </div>
          </div>
        </div>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis
          aperiam ipsam nemo, excepturi atque nam recusandae obcaecati cum eius
          harum dolorum, maiores quasi repellat officiis debitis, possimus
          impedit doloremque id?
        </p>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident,
          nihil delectus est laborum, aliquid facere aliquam necessitatibus
          nobis consectetur error expedita? Atque unde consequuntur voluptate
          consectetur fugit cupiditate quam excepturi!
        </p>
        <div class="footer">
          <div class="author-detail">
            <div class="author">
              <small>Written by</small>
              <strong>Kevin Smiley</strong>
            </div>
            <div class="publisher">
              <small>Publisher</small>
              <strong>Printarea Studios</strong>
            </div>
            <div class="year">
              <small>Year</small>
              <strong>2019</strong>
            </div>
          </div>
          <div class="badge">
            <span><i class="fa-solid fa-shield"></i>in stocks</span>
          </div>
        </div>
        <div class="book-price">
          <div class="input-group">
            <div class="quantity">
            </div>
            <button class="cartbtn"><i class="fa-solid fa-cart-shopping"></i>Tambahkan ke Wishlist</button>
            <button class="cartbtn"><i class="fa-solid "></i>Pinjam Buku</button>
            <button class="like"><i class="fa-regular fa-heart"></i></button>
          </div>
        </div>
      </div>
    </section>
    <section class="book-info">
      <div class="detail-customer">
        <div class="tabbtns">
          <button class="tablink" data-btn="detail">Details Product</button>
          <button class="tablink" data-btn="customer">Customer Reviews</button>
        </div>
        <div class="book-detail tabcontent" id="detail">
          <div class="detail-line">
            <strong>Book Title</strong><span>Harry Potter</span>
          </div>
          <div class="detail-line">
            <strong>Author</strong><span>Kevin Smiley</span>
          </div>
          <div class="detail-line">
            <strong>ISBN</strong><span>121341381648(ISBN13: 121341381648)</span>
          </div>
          <div class="detail-line">
            <strong>Edition Language</strong><span>English</span>
          </div>
          <div class="detail-line">
            <strong>Book Format</strong><span>Paperback, 450 Pages</span>
          </div>
          <div class="detail-line">
            <strong>Date Published</strong><span>August 10th 2019</span>
          </div>
          <div class="detail-line">
            <strong>Publisher</strong><span>Webpress Inc.</span>
          </div>
          <div class="detail-line tag-line">
            <strong>Tags</strong>
            <div class="tags">
              <span>Drama</span>
              <span>Adventure</span>
              <span>Survival</span>
              <span>Biography</span>
              <span>Bestseller</span>
            </div>
          </div>
        </div>
        <div class="customer-review tabcontent" id="customer">
          <div class="rating">
            <div class="rating-info">
              <h5>Rating Information</h5>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dolore, repudiandae sint omnis ipsum quae doloribus reprehenderit saepe veniam repellat.</p>
            </div>
            <div class="star">
              <small><span>4.7</span>out of 5</small>
              <div class="stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </div>
          </div>
          <strong>Showing 4 of 20 reviews</strong>
          <div class="reviewer-container">
            <div class="review">
              <div class="img-detail">
                <img src="{{asset('')}}assets/img/man1.png" alt="">
                <div class="name">
                  <h5>David Here</h5>
                  <small>Jan 4th, 2020</small>
                </div>
              </div>
              <div class="review-footer">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem porro similique et expedita atque. Rerum facilis nobis voluptates dolore. Tenetur, corporis consequatur veniam obcaecati illo quibusdam! Eveniet in iure quis?</p>
                <div class="rating-star">
                  <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <span>4.0</span>
                </div>
              </div>
            </div>
            <div class="review">
              <div class="img-detail">
                <img src="{{asset('')}}assets/img/man1.png" alt="">
                <div class="name">
                  <h5>David Here</h5>
                  <small>Jan 4th, 2020</small>
                </div>
              </div>
              <div class="review-footer">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem porro similique et expedita atque. Rerum facilis nobis voluptates dolore. Tenetur, corporis consequatur veniam obcaecati illo quibusdam! Eveniet in iure quis?</p>
                <div class="rating-star">
                  <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <span>4.0</span>
                </div>
              </div>
            </div>
            <div class="review">
              <div class="img-detail">
                <img src="{{asset('')}}assets/img/man1.png" alt="">
                <div class="name">
                  <h5>David Here</h5>
                  <small>Jan 4th, 2020</small>
                </div>
              </div>
              <div class="review-footer">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem porro similique et expedita atque. Rerum facilis nobis voluptates dolore. Tenetur, corporis consequatur veniam obcaecati illo quibusdam! Eveniet in iure quis?</p>
                <div class="rating-star">
                  <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <span>4.0</span>
                </div>
              </div>
            </div>
            <div class="review">
              <div class="img-detail">
                <img src="{{asset('')}}assets/img/man1.png" alt="">
                <div class="name">
                  <h5>David Here</h5>
                  <small>Jan 4th, 2020</small>
                </div>
              </div>
              <div class="review-footer">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem porro similique et expedita atque. Rerum facilis nobis voluptates dolore. Tenetur, corporis consequatur veniam obcaecati illo quibusdam! Eveniet in iure quis?</p>
                <div class="rating-star">
                  <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <span>4.0</span>
                </div>
              </div>
            </div>
            <button>View More</button>
          </div>
        </div>
      </div>
    </section>
    @include('layout.rekomendasi')
    @include('layout.service')
    @include('layout.subs')
    <script>
      const tabbtn = document.querySelectorAll(".tablink");
      for (let i = 0; i < tabbtn.length; i++) {
        tabbtn[i].addEventListener('click',() => {
          let tabName = tabbtn[i].dataset.btn;
          let tabContent = document.getElementById(tabName);
          let AllTabContent = document.querySelectorAll(".tabcontent");
          let tabbtns = document.querySelectorAll(".tablink");
          for (let j = 0; j < AllTabContent.length; j++) {
            AllTabContent[j].style.display = "none";
          }
          tabContent.style.display = "block";
          
        })
        
      }
    </script>

    @include('layout.footer-lp')
  <script src="js/repeat-js.js"></script>
    <script src="../js/increment-decrement.js"></script>
    <script src="../js/back-to-top.js"></script>
  </body>
</html>
