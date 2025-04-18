<main class="main">
  <!--==================== BANNER ====================-->
  <section class="book-catalog">
    <div class="book-catalog-main">
      <!-- Book Catalog Info -->
      <div class="book-catalog-info">
        <small class="catalog-tagline">Explore Our Library</small>
        <h2 class="book-catalog-headline"><?= $_POST['gender'] ?></h2>

        <h5 class="book-catalog-subheadline">Browse. Discover. Enjoy.</h5>

        <p class="book-catalog-description">
          Explore a vast collection of books across all genres. From
          bestsellers to hidden gems, find stories that captivate you.
        </p>
      </div>

      <!-- Book Catalog Image -->
      <div class="book-catalog-image">
        <img src="view/JS/img/bg.png" alt="Books Collection" />
      </div>
    </div>
  </section>
  <!--==================== SEARCH BAR ====================-->
  <section class="search-bar section">
    <div class="search-bar__container container">
      <form action="<?php echo href('product', 'searchGender') ?>" method="POST">

        <button id="book-catalog-search-btn" aria-label="Search">
          <i class="ri-search-line"></i>
        </button>
        <input
          value="<?= htmlspecialchars($genreKeyWord ?? '') ?>"

          type="search"
          id="book-catalog-search"
          placeholder="Search Books or Genres..."
          aria-label="Search in catalog-bookstores" name="gender" />

      </form>

    </div>
  </section>

  <!--==================== BOOK CATEGORY SECTION ====================-->
  <section class="wishlist section" id="wishlist">
    <div class="wishlist__container container">

      <div class="wishlist__items">
        <?php if (isset($gender) && count($gender) > 0) : ?>
          <?php
          //  / dd($lists);
          foreach ($gender as $item) :  ?>
            <article class="wishlist__item">
              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                <img src="view/JS/img/<?= $item->getImage() ?>" alt="img" class="wishlist__img" loading="lazy">
              </a>
              <div class="wishlist__details">
                <h3 class="wishlist__title"><?= $item->getProductName() ?></h3>
                <p class="wishlist__author">by F. Scott Fitzgerald</p>
                <p class="wishlist__price">Price: <span class="price"><?= $item->getPrice() ?></span></p>

                <div class="wishlist__rating">
                  <div class="stars">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-fill"></i>
                    <i class="ri-star-line"></i>
                  </div>
                  <p class="rating-text">4.5/5</p>
                </div>
              </div>

              <div class="wishlist__actions">
                <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                  <button title="View details">
                    <i class="ri-eye-line"></i>
                  </button>
                </a>

                <form  action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <input type="hidden" name="action" value="increase">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" class="add-to-cart-btn" title="Add to cart">
                    <i class="ri-shopping-cart-line"></i>
                  </button>
                </form>

              </div>
            </article>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="wishlist__empty">
            <i class="ri-search-eye-line  ri-3x"></i>
            <p class="wishlist__empty-text">Your search doesn't have in BookSmart</p>
            <a href="<?= href('product', 'list') ?>" class="wishlist__empty-button">
              <i class="ri-shopping-bag-line"></i> Browse Books
            </a>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </section>
  <!--==================== LIMITED-TIME DEALS ====================-->
  <section class="limited-deals section" id="limited-deals">
    <h2 class="limitted-deals__section-title">🔥 Limited-Time Deals</h2>
    <p class="section-subtitle">
      Hurry! Sale ends in <span id="deal-countdown">00:00:00</span>
    </p>

    <div class="limited-deals__container container">
      <div class="limited-deals__swiper swiper">
        <div class="swiper-wrapper">
          <!-- Deal 1 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-1')">
            <span class="limited-deals__discount-badge">-30% OFF</span>
            <img
              src="view/JS/img/book-1.png"
              alt="The Great Adventure"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">The Great Adventure</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$19.99</del> $13.99</span>
            </div>
          </article>

          <!-- Deal 2 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-2')">
            <span class="limited-deals__discount-badge">-40% OFF</span>
            <img
              src="view/JS/img/book-2.png"
              alt="Mystery of the Night"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Mystery of the Night</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$24.99</del> $14.99</span>
            </div>
          </article>

          <!-- Deal 3 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-3')">
            <span class="limited-deals__discount-badge">-25% OFF</span>
            <img
              src="view/JS/img/book-3.png"
              alt="Science Wonders"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Science Wonders</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$29.99</del> $22.49</span>
            </div>
          </article>

          <!-- Deal 4 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-4')">
            <span class="limited-deals__discount-badge">-35% OFF</span>
            <img
              src="view/JS/img/book-4.png"
              alt="The Lost Kingdom"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">The Lost Kingdom</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$22.99</del> $14.94</span>
            </div>
          </article>

          <!-- Deal 5 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-5')">
            <span class="limited-deals__discount-badge">-50% OFF</span>
            <img
              src="view/JS/img/book-5.png"
              alt="Secrets of the Ocean"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Secrets of the Ocean</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$30.00</del> $15.00</span>
            </div>
          </article>

          <!-- Deal 6 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-6')">
            <span class="limited-deals__discount-badge">-20% OFF</span>
            <img
              src="view/JS/img/book-6.png"
              alt="The Art of Cooking"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">The Art of Cooking</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$18.99</del> $15.19</span>
            </div>
          </article>

          <!-- Deal 7 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-7')">
            <span class="limited-deals__discount-badge">-45% OFF</span>
            <img
              src="view/JS/img/book-7.png"
              alt="Journey Through Space"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Journey Through Space</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$27.99</del> $15.39</span>
            </div>
          </article>

          <!-- Deal 8 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-8')">
            <span class="limited-deals__discount-badge">-30% OFF</span>
            <img
              src="view/JS/img/book-8.png"
              alt="Legends of the Wild"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Legends of the Wild</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$20.99</del> $14.69</span>
            </div>
          </article>

          <!-- Deal 9 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-9')">
            <span class="limited-deals__discount-badge">-25% OFF</span>
            <img
              src="view/JS/img/book-9.png"
              alt="Ancient Civilizations"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Ancient Civilizations</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$25.50</del> $19.12</span>
            </div>
          </article>

          <!-- Deal 10 -->
          <article
            class="limited-deals__card swiper-slide"
            onclick="goToDetail('book-10')">
            <span class="limited-deals__discount-badge">-40% OFF</span>
            <img
              src="view/JS/img/book-10.png"
              alt="Mindful Living"
              class="limited-deals__img" />
            <h2 class="limited-deals__title">Mindful Living</h2>
            <div class="limited-deals__prices">
              <span class="limited-deals__price"><del>$32.00</del> $19.20</span>
            </div>
          </article>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

</main>