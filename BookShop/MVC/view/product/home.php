<main class="main">
  <!-- ==================== HOME SECTION ==================== -->
  <section class="home section" id="home">
    <div class="home-main">
      <!-- Home Content -->

      <div class="home-content">
        <small class="tagline">Back to School</small>
        <h2 class="home-headline">Special 50% Off</h2>
        <div class="home-content">

          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0" nonce="KA16eTDC"></script>
          <div class="fb-page" data-href="https://www.facebook.com/booksmart" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
          </div>
        </div>

        <br><br>
        <h5 class="home-subheadline">For Our Student Community</h5>
        <p class="home-description">
          Find the best books from your favorite writers, explore hundreds of books with all possible categories,
          take advantage of the 50% discount, and much more.
        </p>

        <!-- Buttons -->
        <div class="home-buttons">
          <button class="primary-btn">
            Get The Deal <i class="fa-solid fa-arrow-right"></i>
          </button>
          <button class="secondary-btn">See Other Promos</button>
        </div>
      </div>

      <!-- Home Swiper Images -->
      <div class="home__images">
        <div class="home__swiper swiper">
          <div class="swiper-wrapper">

            <article class="home__article swiper-slide">
              <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1719004398i/213034913.jpg" alt="Book 1" class="home__img" />
            </article>

            <article class="home__article swiper-slide">
              <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1721685025i/213870083.jpg" alt="Book 2" class="home__img" />
            </article>

            <article class="home__article swiper-slide">
              <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1602190253i/52578297.jpg" alt="Book 3" class="home__img" />
            </article>

            <article class="home__article swiper-slide">
              <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1706204822i/205064698.jpg" alt="Book 4" class="home__img" />
            </article>

            <article class="home__article swiper-slide">
              <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1730395034i/112975658.jpg" alt="Book 5" class="home__img" />
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--==================== SERVICES ====================-->
  <section class="services section">
    <div class="services__container container grid">

      <article class="services__card">
        <i class="ri-truck-line"></i>
        <h3 class="services__title">Free Shipping</h3>
        <p class="services__description">Order More Than $100</p>
      </article>

      <article class="services__card">
        <i class="ri-lock-line"></i>
        <h3 class="services__title">Secure Payment</h3>
        <p class="services__description">100% Secure Payment</p>
      </article>

      <article class="services__card">
        <i class="ri-customer-service-2-line"></i>
        <h3 class="services__title">24/7 Support</h3>
        <p class="services__description">Call us anytime</p>
      </article>

      <article class="services__card">
        <i class="ri-exchange-line"></i>
        <h3 class="services__title">Easy Returns</h3>
        <p class="services__description">30-Day Hassle-Free Returns</p>
      </article>
      <article class="services__card">
        <i class="ri-gift-line"></i>
        <h3 class="services__title">Exclusive Offers</h3>
        <p class="services__description">Special deals for members</p>
      </article>

      <article class="services__card">
        <i class="ri-shield-check-line"></i>
        <h3 class="services__title">Quality Guarantee</h3>
        <p class="services__description">Premium products only</p>
      </article>
    </div>
    </div>
  </section>

  <!--==================== SUGGESTION BOOKS SECTION ====================-->
  <section class="suggestion section">
    <!-- Recommended For You -->

    <div class="suggestion__box">
      <h4>Recommended For You</h4>
      <p>Based on your reading preferences, we’ve selected books you might enjoy.</p>
      <div class="suggestion__book-container">
        <?php foreach ($listType['recommend'] as $item) { ?>
          <div class="suggestion__book">
            <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
              <img src="view/JS/img/<?= $item->getImage() ?>" alt="Book 1" />
            </a>
          </div>
        <?php } ?>

      </div>

    </div>

    <!-- Popular in 2020 -->
    <div class="suggestion__box suggestion__popular">
      <h4>Popular in 2025</h4>
      <p>Discover the most popular books of 2025, loved by readers worldwide.</p>
      <div class="suggestion__book-container">
        <?php foreach ($listType['popular'] as $item) { ?>

          <div class="suggestion__book">
            <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
              <img src="view/JS/img/<?= $item->getImage() ?>" alt="Book 5" />
            </a>
          </div>
        <?php } ?>
      </div>

    </div>
  </section>

  <!--==================== OFFERS SECTION ====================-->
  <section class="offers section" id="offers">
    <div class="offers__header">
      <h4>Special Offers</h4>
      <p>Get amazing discounts on our top books! Don't miss out.</p>
    </div>

    <div class="offers__container container">
      <!-- Book 1 -->
      <?php foreach ($listType['special'] as $item) { ?>
        <article class="offers__item">
          <div class="offers__image">
            <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
              <img src="view/JS/img/<?= $item->getImage() ?>" alt="Cover of The Giver" />
            </a>
          </div>
          <div class="offers__content">
            <h5 class="offers__title"><?= $item->getProductName() ?></h5>
            <di class="offers__bottom">
              <span class="offers__price">$<?= $item->getPrice() ?></span>

              <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form" >
                <input type="hidden" name="id" value="<?= $item->getId() ?>">
                <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                <input type="hidden" name="action" value="increase">
                <input type="hidden" name="quantity" value="1">

                <button type="submit" class="offers__cart-btn">
                  <i class="ri-shopping-cart-line"></i> Add to Cart
                </button>
              </form>
          </div>
        </article>
      <?php } ?>
    </div>



    </div>
  </section>

  <!--==================== TRENDING BOOKS SECTION ====================-->
  <section class="trending section" id="trending-books">
    <h2 class="trending__section-title">
      <span>Trending Books</span>
    </h2>
    <div class="trending__container container">
      <div class="trending__swiper swiper trending__wrapper">
        <div class="swiper-wrapper">

          <!-- Trending Book 1 -->
          <?php
          // dd($listType['trending']);
          foreach ($listType['trending'] as $item) { ?>
            <article class="trending__card swiper-slide" data-category="fantasy">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?= $item->getImage() ?>" alt="Fourth Wing" class="trending__img" />
              </a>
              <h2 class="trending__title"><?= $item->getProductName() ?></h2>
              <div class="trending__prices">
                <span class="trending__price">$<?= $item->getPrice() ?></span>
                <span class="trending__rating">⭐⭐⭐⭐⭐ (4.9)</span>
              </div>
              <div class="trending__actions">
                <button><i class="ri-search-line"></i></button>

                <form class="add-to-wishlist-form" action="<?= href('product', 'prefer') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <button><i class="ri-heart-3-line"></i></button>
                </form>


                <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                  <button><i class="ri-eye-line"></i></button>
                </a>

                <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <input type="hidden" name="action" value="increase">
                  <input type="hidden" name="quantity" value="1">

                  <button><i class="ri-shopping-cart-line"></i></button>

                </form>
              </div>
            </article>
          <?php } ?>
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="trending__container container">
      <div class="trending__swiper swiper trending__wrapper">
        <div class="swiper-wrapper">

          <!-- Trending Book 1 -->
          <?php
          // dd($listType['trending']);
          foreach ($listType['trending'] as $item) { ?>
            <article class="trending__card swiper-slide" data-category="fantasy">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?= $item->getImage() ?>" alt="Fourth Wing" class="trending__img" />
              </a>
              <h2 class="trending__title"><?= $item->getProductName() ?></h2>
              <div class="trending__prices">
                <span class="trending__price">$<?= $item->getPrice() ?></span>
                <span class="trending__rating">⭐⭐⭐⭐⭐ (4.9)</span>
              </div>
              <div class="trending__actions">
                <button><i class="ri-search-line"></i></button>
                <form class="add-to-wishlist-form" action="<?= href('product', 'prefer') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <button><i class="ri-heart-3-line"></i></button>
                </form>

                <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                  <button><i class="ri-eye-line"></i></button>
                </a>

                <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <input type="hidden" name="action" value="increase">
                  <input type="hidden" name="quantity" value="1">

                  <button><i class="ri-shopping-cart-line"></i></button>

                </form>
              </div>
            </article>
          <?php } ?>
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section>

  <!--==================== FEATURED BOOKS SECTION ====================-->
  <section class="featured section" id="featured-books">
    <h2 class="featured__section-title">
      <span>Featured Books</span>
    </h2>
    <div class="featured__container container">
      <div class="featured__swiper swiper featured__wrapper">
        <div class="swiper-wrapper">
          <?php
          //  dd($lists);
          foreach ($listType['feature'] as $item) {
          ?>
            <!-- Featured Book 1 -->
            <article class="featured__card swiper-slide" data-category="fantasy">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?php echo $item->getImage() ?>" alt="Fourth Wing" class="featured__img" /></a>
              <h2 class="featured__title"><?= $item->getProductName() ?></h2>
              <div class="featured__prices">
                <span class="featured__price"><?= $item->getPrice() ?></span>
                <span class="featured__rating">⭐⭐⭐⭐⭐ (4.9)</span>
              </div>
              <div class="featured__actions">
                <button><i class="ri-search-line"></i></button>

                <form class="add-to-wishlist-form" action="<?= href('product', 'prefer') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <button><i class="ri-heart-3-line"></i></button>
                </form>

                <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                  <button><i class="ri-eye-line"></i></button>
                </a>

                <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <input type="hidden" name="action" value="increase">
                  <input type="hidden" name="quantity" value="1">

                  <button><i class="ri-shopping-cart-line"></i></button>

                </form>


              </div>
            </article>
          <?php } ?>


        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!--==================== NEW ARRIVALS SECTION ====================-->
  <section class="new-arrivals section" id="new-arrivals">
    <h2 class="new-arrivals__section-title">
      <span>New Arrivals</span>
    </h2>
    <div class="new-arrivals__container container">
      <div class="new-arrivals__swiper swiper new-arrivals__wrapper">
        <div class="swiper-wrapper">

          <!-- New Arrival Book 1 -->
          <?php foreach ($listType['new'] as $item) { ?>
            <article class="new-arrivals__card swiper-slide" data-category="fiction">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?= $item->getImage() ?>" alt="The Heaven & Earth Grocery Store" class="new-arrivals__img" />
              </a>
              <h2 class="new-arrivals__title">The Heaven & Earth Grocery Store</h2>
              <div class="new-arrivals__prices">
                <span class="new-arrivals__price">$18.99</span>
                <span class="new-arrivals__rating">⭐⭐⭐⭐⭐ (4.8)</span>
              </div>
              <div class="new-arrivals__actions">
                <button><i class="ri-search-line"></i></button>

                <form class="add-to-wishlist-form" action="<?= href('product', 'prefer') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <button><i class="ri-heart-3-line"></i></button>
                </form>

                <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                  <button><i class="ri-eye-line"></i></button>
                </a>

                <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <input type="hidden" name="action" value="increase">
                  <input type="hidden" name="quantity" value="1">

                  <button><i class="ri-shopping-cart-line"></i></button>

                </form>
              </div>
            </article>

          <?php } ?>



        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!--==================== BEST SELLERS SECTION ====================-->
  <section class="best-sellers section" id="best-sellers">
    <div class="best-sellers__main">
      <div class="best-sellers__content">
        <h4>Best Sellers</h4>
        <p>
          Explore our top-selling books that have captivated readers worldwide.<br />
        </p>
        <?php foreach ($listType['best_seller_new'] as $item) { ?>
          <div class="best-sellers__card">
            <div class="best-sellers__img">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?= $item->getImage() ?>" alt="Best Seller Book" />
              </a>
            </div>
            <div class="best-sellers__card-description">
              <div class="best-sellers__card-header">
                <div class="best-sellers__card-icon">
                  <i class="fa-regular fa-bookmark"></i>
                </div>
                <div class="best-sellers__card-title">
                  <h5><?= $item->getProductName() ?></h5>
                </div>
              </div>
              <div class="best-sellers__card-body">
                <h6>Description</h6>
                <p>
                  Walter Isaacson's Elon Musk provides an in-depth and unfiltered biography of one
                  of the most influential and controversial figures of our time, Elon Musk, the visionary
                  entrepreneur behind Tesla, SpaceX, Neuralink, and Twitter (now X). Based on two years of
                  shadowing Musk and conducting extensive interviews with him, his family, friends, and adversaries,
                  the book delves into Musk's childhood in South Africa, his entrepreneurial journey, his relentless drive,
                  and his ambitious goals to revolutionize the electric car industry, space exploration,
                  artificial intelligence, and social media...
                </p>
              </div>
              <div class="best-sellers__author-year">
                <div class="best-sellers__author">
                  <small>Written by</small>
                  <strong>
                    Walter Isaacson</strong>
                </div>
                <div class="best-sellers__year">
                  <small>Year</small>
                  <strong>August 10th, 2019
                  </strong>
                </div>
              </div>
              <div class="best-sellers__footer">
                <div class="best-sellers__price">
                  <span><?= $item->getPrice() ?></span>
                  <strike>$84.78</strike>
                </div>
                <div class="best-sellers__cartbtn">
                  <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                    <input type="hidden" name="id" value="<?= $item->getId() ?>">
                    <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                    <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                    <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                    <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                    <input type="hidden" name="action" value="increase">
                    <input type="hidden" name="quantity" value="1">

                    <button><i class="ri-shopping-cart-line">Add</i></button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="best-sellers__book-section">
        <div class="best-sellers__book-container container">
          <?php foreach ($listType['best_seller'] as $item) { ?>
            <div class="best-sellers__book-img">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?= $item->getImage() ?>" alt="Book 1" />
              </a>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
    <div class="circle-1"></div>
    <div class="circle-2"></div>
  </section>

  <!--==================== BLOG/ARTICLES SECTION ====================-->
  <section class="blog section" id="blog">
    <h2 class="blog__section-title">
      <span>Latest Articles</span>
    </h2>

    <div class="blog__container container">
      <div class="blog__wrapper">

        <!-- Blog Post 1 -->
        <article class="blog__card">
          <img src="view/JS/img/banner-blog1.jpg" alt="How to Build a Reading Habit" class="blog__img">
          <div class="blog__content">
            <h3 class="blog__title">How to Build a Reading Habit</h3>
            <p class="blog__excerpt">Discover simple strategies to make reading a daily habit...</p>
            <a href="https://www.penguinrandomhouse.com/the-read-down/the-best-books-of-2024/" class="blog__read-more">Read More</a>
          </div>
        </article>

        <!-- Blog Post 2 -->
        <article class="blog__card">
          <img src="view/JS/img/banner-blog2.jpg" alt="Top 10 Must-Read Books of 2024" class="blog__img">
          <div class="blog__content">
            <h3 class="blog__title">Top 10 Must-Read Books of 2024</h3>
            <p class="blog__excerpt">Check out our top picks for this year’s best books...</p>
            <a href="https://www.penguinrandomhouse.com/the-read-down/the-best-books-of-2024/" class="blog__read-more">Read More</a>
          </div>
        </article>

        <!-- Blog Post 3 -->
        <article class="blog__card">
          <img src="view/JS/img/banner-blog3.jpg" alt="Why Reading Fiction Improves Your Mind" class="blog__img">
          <div class="blog__content">
            <h3 class="blog__title">Why Reading Fiction Improves Your Mind</h3>
            <p class="blog__excerpt">Studies show fiction readers develop better empathy and creativity...</p>
            <a href="https://www.psychologytoday.com/us/blog/the-athletes-way/201401/reading-fiction-improves-brain-connectivity-and-function" class="blog__read-more">Read More</a>
          </div>
        </article>

        <!-- Blog Post 4 -->
        <article class="blog__card">
          <img src="view/JS/img/banner-blog4.jpg" alt="The Science Behind Speed Reading" class="blog__img">
          <div class="blog__content">
            <h3 class="blog__title">The Science Behind Speed Reading</h3>
            <p class="blog__excerpt">Learn techniques to read faster without losing comprehension...</p>
            <a href="https://learnlever.com/the-science-behind-speed-reading/" class="blog__read-more">Read More</a>
          </div>
        </article>

        <!-- Blog Post 5 -->
        <article class="blog__card">
          <img src="view/JS/img/banner-blog5.jpg" alt="How Audiobooks Can Change Your Life" class="blog__img">
          <div class="blog__content">
            <h3 class="blog__title">How Audiobooks Can Change Your Life</h3>
            <p class="blog__excerpt">Audiobooks are a great way to enjoy books while on the go...</p>
            <a href="https://www.greatworklife.com/benefits-of-audiobooks/" class="blog__read-more">Read More</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!--==================== JOIN ====================-->
  <section class="join section">
    <div class="join__container">
      <img src="view/JS/img/join-bg.jpg" alt="Join Background" class="join__bg" />
      <div class="join__content container grid">
        <h2 class="join__title section__title">
          Subscribe To Receive <br />
          The Latest Updates
        </h2>

        <form action="#" class="join__form">
          <input type="email" placeholder="Enter your email" class="join__input" required />
          <button type="submit" class="join__button button">Subscribe</button>
        </form>
      </div>
    </div>
  </section>

  <!--==================== AUTHORS ====================-->
  <section class="author section" id="authors">
    <div class="author__container container">
      <div class="author__swiper swiper" role="region" aria-label="Authors slider">
        <div class="swiper-wrapper">
          <!-- Author Card 1 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-1.png"
                alt="Portrait of William Shakespeare"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">William Shakespeare</h2>
                <p class="author__bio">
                  English playwright, poet, and dramatist.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 2 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-2.png"
                alt="Portrait of Stephen King"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Stephen King</h2>
                <p class="author__bio">
                  Renowned author known for his horror fiction.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 3 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-3.png"
                alt="Portrait of Mark Twain"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Mark Twain</h2>
                <p class="author__bio">
                  American writer known for his wit.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 4 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-4.png"
                alt="Portrait of J.K. Rowling"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">J.K. Rowling</h2>
                <p class="author__bio">
                  British author of the Harry Potter series.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 5 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-5.png"
                alt="Portrait of Victor Hugo"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Victor Hugo</h2>
                <p class="author__bio">
                  French writer and key figure of the Romantic movement.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 6 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-6.png"
                alt="Portrait of Paulo Coelho"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Paulo Coelho</h2>
                <p class="author__bio">
                  Brazilian novelist best known for "The Alchemist".
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 7 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-7.png"
                alt="Portrait of Bill Gates"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Bill Gates</h2>
                <p class="author__bio">
                  Co-founder of Microsoft and philanthropist.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 8 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-8.png"
                alt="Portrait of Fyodor Dostoevsky"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Fyodor Dostoevsky</h2>
                <p class="author__bio">
                  Russian novelist known for his psychological insights.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 9 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-9.png"
                alt="Portrait of Leo Tolstoy"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">Leo Tolstoy</h2>
                <p class="author__bio">
                  Russian writer regarded as one of the greatest authors.
                </p>
              </figcaption>
            </figure>
          </article>

          <!-- Author Card 10 -->
          <article class="author__card swiper-slide">
            <figure>
              <img
                src="view/JS/img/author-10.png"
                alt="Portrait of George Orwell"
                class="author__img"
                loading="lazy" />
              <figcaption>
                <h2 class="author__name">George Orwell</h2>
                <p class="author__bio">
                  English novelist, essayist, and critic known for "1984".
                </p>
              </figcaption>
            </figure>
          </article>
        </div>
      </div>
    </div>
  </section>
</main>
