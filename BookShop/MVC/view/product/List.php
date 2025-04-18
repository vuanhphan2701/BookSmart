 <!--==================== MAIN ====================-->
 <style>

 </style>
 <main class="main">
   <!--==================== BANNER ====================-->
   <section class="book-catalog">
     <div class="book-catalog-main">
       <!-- Book Catalog Info -->
       <div class="book-catalog-info">
         <small class="catalog-tagline">Explore Our Library</small>
         <h2 class="book-catalog-headline">Find Your Next Great Read</h2>

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
   <!--==================== CATEGORIES ====================-->
   <section class="categories section">
     <div class="categories__container container">
       <div class="category-icons">
         <div class="category" data-category="mystery">
           <a href="<?= href('product', 'category') ?>&type=Mystery">
             <i class="ri-search-eye-fill"></i>
             <span>Mystery</span>
           </a>
         </div>

         <div class="category" data-category="horror">
           <a href="<?= href('product', 'category') ?>&type=Horror">
             <i class="ri-ghost-fill"></i>
             <span>Horror</span>
           </a>
         </div>



         <div class="category" data-category="fantasy">
           <a href="<?= href('product', 'category') ?>&type=Fantasy">
             <i class="ri-magic-fill"></i>
             <span>Fantasy</span>
           </a>
         </div>


         <div class="category" data-category="biography">
           <a href="<?= href('product', 'category') ?>&type=Biography">
             <i class="ri-user-3-fill"></i>
             <span>Biography</span>
           </a>
         </div>

         <div class="category" data-category="academic">
           <a href="<?= href('product', 'category') ?>&type=Academic">
             <i class="ri-school-fill"></i>
             <span>Academic</span>
           </a>
         </div>

         <div class="category" data-category="self-help">
           <a href="<?= href('product', 'category') ?>&type=Self-help">
             <i class="ri-mental-health-fill"></i>
             <span>Self-Help</span>
           </a>
         </div>

         <div class="category" data-category="fiction">
           <a href="<?= href('product', 'category') ?>&type=Fiction">
             <i class="ri-book-2-fill"></i>
             <span>Fiction</span>
           </a>
         </div>

         <div class="category" data-category="children">
           <a href="<?= href('product', 'category') ?>&type=Children">
             <i class="ri-emotion-laugh-fill"></i>
             <span>Children</span>
           </a>
         </div>

         <div class="category" data-category="health">
           <a href="<?= href('product', 'category') ?>&type=Health">
             <i class="ri-heart-pulse-fill"></i>
             <span>Health</span>
           </a>
         </div>

         <div class="category" data-category="business">
           <a href="<?= href('product', 'category') ?>&type=Business">
             <i class="ri-briefcase-4-fill"></i>
             <span>Business</span>
           </a>
         </div>


         <div class="category" data-category="travel">
           <a href="<?= href('product', 'category') ?>&type=Travel">
             <i class="ri-earth-fill"></i>
             <span>Travel</span>
           </a>
         </div>

         <div class="category" data-category="history">
           <a href="<?= href('product', 'category') ?>&type=History">
             <i class="ri-landscape-fill"></i>
             <span>History</span>
           </a>
         </div>






         <div class="category" data-category="cooking">
           <a href="<?= href('product', 'category') ?>&type=Cooking">
             <i class="ri-restaurant-fill"></i>
             <span>Cooking</span>
           </a>
         </div>

         <div class="category" data-category="romance">
           <a href="<?= href('product', 'category') ?>&type=Romance">
             <i class="ri-heart-fill"></i>
             <span>Romance</span>
           </a>
         </div>
       </div>
     </div>
   </section>
   <!--==================== BOOKS CONTAINER ====================-->

   <section class="books section" id="books-catalog">
     <h2 class="books__section-title">📚 Our Books List</h2>

     <div class="books__container container">
       <div class="books__swiper swiper books__wrapper">
         <div class="swiper-wrapper">
           <!-- Fiction -->
           <?php
            foreach ($lists as $item) {
            ?>
             <article class="books__card swiper-slide" data-category="fiction">
               <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">
                 <img
                   src="view/JS/img/<?php echo $item->getImage() ?>"
                   alt="image"
                   class="books__img" />
               </a>
               <h2 class="books__title"><?= $item->getProductName() ?></h2>
               <div class="books__prices">
                 <span class="books__price"><?= $item->getPrice() ?></span>
                 <span class="books__rating">⭐⭐⭐⭐⭐ (4.8)</span>
               </div>
               <div class="books__actions">
                 <a href="<?= href('product', 'read') ?>&id=<?= $item->getId() ?>">
                   <button><i class="ri-search-line"></i></button>
                 </a>

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
         <div class="swiper-pagination"></div>
       </div>
     </div>
   </section>
   <!--==================== BOOKS - ROW 2 ====================-->
   <section class="books section" id="books-catalog">
     <div class="books__container container">
       <div class="books__swiper swiper books__wrapper">
         <div class="swiper-wrapper">
           <!-- Fiction -->
           <?php
            foreach ($lists as $item) {
            ?>
             <article class="books__card swiper-slide" data-category="fiction">
               <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId() ?>">

                 <img
                   src="view/JS/img/<?php echo $item->getImage() ?>"
                   alt="image"
                   class="books__img" />
               </a>
               <h2 class="books__title"><?= $item->getProductName() ?></h2>
               <div class="books__prices">
                 <span class="books__price"><?= $item->getPrice() ?></span>
                 <span class="books__rating">⭐⭐⭐⭐⭐ (4.8)</span>
               </div>
               <div class="books__actions">
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
         <div class="swiper-pagination"></div>
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1348601837i/76253.jpg"
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1626787181i/57517908.jpg"
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1474199092i/28954042.jpg"
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1486405840i/31371284.jpg"
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1718985769i/199674196.jpg"
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1333577773i/129650.jpg"
               alt="Mastering the Art of French Cooking"
               class="limited-deals__img" />
             <h2 class="limited-deals__title">Mastering the Art of French Cooking</h2>
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1440420017i/22892322.jpg"
               alt="The Universe in Your Hand: A Journey Through Space, Time, and Beyond"
               class="limited-deals__img" />
             <h2 class="limited-deals__title">The Universe in Your Hand: A Journey Through Space, Time, and Beyond</h2>
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1348575350i/5495650.jpg"
               alt="George's Cosmic Treasure Hunt"
               class="limited-deals__img" />
             <h2 class="limited-deals__title">George's Cosmic Treasure Hunt</h2>
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1453584110i/25658494.jpg"
               alt="George and the Blue Moon"
               class="limited-deals__img" />
             <h2 class="limited-deals__title">George and the Blue Moon</h2>
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
               src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1437483648i/25716688.jpg"
               alt="Pilfer Academy: A School So Bad It's Criminal"
               class="limited-deals__img" />
             <h2 class="limited-deals__title">Pilfer Academy: A School So Bad It's Criminal</h2>
             <div class="limited-deals__prices">
               <span class="limited-deals__price"><del>$32.00</del> $19.20</span>
             </div>
           </article>
         </div>
         <div class="swiper-pagination"></div>
       </div>
     </div>
   </section>
   <!--==================== GENRE SPOTLIGHT ====================-->
   <section class="genre-spotlight section" id="genre-spotlight">
     <header class="genre-spotlight__header">
       <h2 class="genre-spotlight__section-title">🌟 Genre Spotlight</h2>
       <p class="genre-spotlight__subtitle">
         This Month's Genre: <strong>Science Fiction</strong>
       </p>
       <p class="genre-spotlight__description">
         Explore mind-bending narratives and futuristic concepts that
         challenge our understanding of reality.
       </p>
     </header>

     <div class="genre-spotlight__container container">
       <div class="genre-spotlight__swiper swiper">
         <div class="swiper-wrapper">
           <!-- Featured Book 1 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-1">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1555447414i/44767458.jpg"
                 alt="Cover of Dune by Frank Herbert"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Dune</h3>
                 <p class="genre-spotlight__author">by Frank Herbert</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 2 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-2">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1554437249i/6088007.jpg"
                 alt="Cover of Neuromancer by William Gibson"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Neuromancer</h3>
                 <p class="genre-spotlight__author">by William Gibson</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 3 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-3">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1417900846i/29579.jpg"
                 alt="Cover of Foundation by Isaac Asimov"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Foundation</h3>
                 <p class="genre-spotlight__author">by Isaac Asimov</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 4 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-4">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1488213612i/18423.jpg"
                 alt="Cover of The Left Hand of Darkness by Ursula K. Le Guin"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">
                   The Left Hand of Darkness
                 </h3>
                 <p class="genre-spotlight__author">by Ursula K. Le Guin</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 5 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-5">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1408303130i/375802.jpg"
                 alt="Cover of Ender's Game by Orson Scott Card"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Ender's Game</h3>
                 <p class="genre-spotlight__author">by Orson Scott Card</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 6 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-6">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1656932283i/61240297.jpg"
                 alt="Cover of Snow Crash by Neal Stephenson"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Snow Crash</h3>
                 <p class="genre-spotlight__author">by Neal Stephenson</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 7 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-7">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1405546838i/77566.jpg"
                 alt="Cover of Hyperion by Dan Simmons"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Hyperion</h3>
                 <p class="genre-spotlight__author">by Dan Simmons</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 8 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-8">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1531891848i/11.jpg"
                 alt="Cover of The Hitchhiker's Guide to the Galaxy by Douglas Adams"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">
                   The Hitchhiker's Guide to the Galaxy
                 </h3>
                 <p class="genre-spotlight__author">by Douglas Adams</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 9 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-9">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1500930947i/9969571.jpg"
                 alt="Cover of Ready Player One by Ernest Cline"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Ready Player One</h3>
                 <p class="genre-spotlight__author">by Ernest Cline</p>
               </figcaption>
             </figure>
           </article>

           <!-- Featured Book 10 -->
           <article
             class="genre-spotlight__card swiper-slide"
             data-book="book-10">
             <figure>
               <img
                 src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1531415180i/40792913.jpg"
                 alt="Cover of Altered Carbon by Richard K. Morgan"
                 class="genre-spotlight__img"
                 loading="lazy" />
               <figcaption>
                 <h3 class="genre-spotlight__title">Altered Carbon</h3>
                 <p class="genre-spotlight__author">by Richard K. Morgan</p>
               </figcaption>
             </figure>
           </article>
         </div>
         <div class="swiper-pagination"></div>
       </div>
     </div>
   </section>
 </main>