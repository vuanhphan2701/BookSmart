<main class="main">
  <!--==================== BANNER ====================-->

  <section class="book-catalog">
        <div class="book-catalog-main">
          <!-- Book Catalog Info -->
          <div class="book-catalog-info">
            <small class="catalog-tagline">Explore Our Library</small>
            <h2 class="book-catalog-headline"><?= $_GET['type']?></h2>

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

  
  <!--==================== BOOK CATEGORY SECTION ====================-->
  <section class="book-category section" id="book-category">
    <div class="book-category__container container">
      <!-- Book Category Items -->
      <div class="book-category__items">
        <!-- Book 1 -->
        <?php foreach ($category as $item) { ?>

          <article class="book-category__item">
          <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">

            <img
              src="view/JS/img/<?= $item->getImage() ?>"
              alt="The Great Gatsby"
              class="book-category__img"
              loading="lazy" />
              </a>
            <div class="book-category__details">
              <h3 class="book-category__title"><?= $item->getProductName() ?></h3>
              <p class="book-category__author">by F. Scott Fitzgerald</p>
              <p class="book-category__price">
                <span class="price"><?= $item->getPrice() ?></span>
              </p>
              <div class="book-category__rating">
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
            <div class="book-category__actions">
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
    </div>
  </section>
</main>