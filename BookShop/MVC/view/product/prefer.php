<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<!-- <style>
        /* Base Styles */
      
        
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        
        body {
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            background-color: var(--body-color);
            color: var(--text-color);
            line-height: 1.6;
        }
        
        h1, h2, h3 {
            color: var(--secondary-color);
            font-weight: var(--font-semi-bold);
        }
        
        ul {
            list-style: none;
        }
        
        a {
            text-decoration: none;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        button {
            cursor: pointer;
            border: none;
            outline: none;
            background-color: transparent;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
        }
        
        /* Reusable CSS Classes */
        .section {
            padding: 5.5rem 0 1rem;
        }
        
        .section__title {
            font-size: var(--h2-font-size);
            margin-bottom: var(--mb-2);
            text-align: center;
            letter-spacing: 0.1px;
        }
        
        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 0 1.5rem;
        }
        
        .grid {
            display: grid;
        }
        
        .main {
            overflow: hidden;
        }
        
        .text-center {
            text-align: center;
        }
        
        /* Wishlist Styles */
        .wishlist__container {
            display: grid;
            gap: 2rem;
        }
        
        .wishlist__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .wishlist__title {
            font-size: var(--h2-font-size);
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .wishlist__title::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background-color: var(--primary-color);
            bottom: 0;
            left: 0;
        }
        
        .wishlist__count {
            background-color: var(--primary-color);
            color: #fff;
            font-size: var(--smaller-font-size);
            padding: 0.25rem 0.5rem;
            border-radius: 50px;
        }
        
        .wishlist__items {
            display: grid;
            gap: 1.5rem;
        }
        
        .wishlist__item {
            background-color: var(--container-color);
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .wishlist__item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }
        
        .wishlist__img {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .wishlist__details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .wishlist__title {
            font-size: var(--h3-font-size);
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
            font-weight: var(--font-semi-bold);
        }
        
        .wishlist__author {
            color: var(--text-color-light);
            font-size: var(--small-font-size);
            margin-bottom: 0.5rem;
        }
        
        .wishlist__price {
            font-size: var(--normal-font-size);
            margin-bottom: 0.5rem;
        }
        
        .price {
            font-weight: var(--font-semi-bold);
            color: var(--primary-color);
        }
        
        .price::before {
            content: '$';
        }
        
        .wishlist__rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .stars {
            display: flex;
            color: var(--star-color);
        }
        
        .stars i {
            font-size: 1rem;
        }
        
        .rating-text {
            font-size: var(--small-font-size);
            color: var(--text-color-light);
        }
        
        .wishlist__actions {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            justify-content: center;
        }
        
        .wishlist__actions button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .wishlist__actions button:nth-child(1) {
            background-color: #e9efff;
            color: var(--primary-color);
        }
        
        .wishlist__actions button:nth-child(1):hover {
            background-color: var(--primary-color);
            color: #fff;
        }
        
        .add-to-cart-btn {
            background-color: #e6f8ef !important;
            color: #38b000 !important;
        }
        
        .add-to-cart-btn:hover {
            background-color: #38b000 !important;
            color: #fff !important;
        }
        
        .remove-from-wishlist-btn {
            background-color: #ffebee !important;
            color: #d90429 !important;
        }
        
        .remove-from-wishlist-btn:hover {
            background-color: #d90429 !important;
            color: #fff !important;
        }
        
        .wishlist__empty {
            text-align: center;
            padding: 3rem 0;
            background-color: var(--container-color);
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .wishlist__empty-icon {
            font-size: 4rem;
            color: var(--text-color-light);
            margin-bottom: 1rem;
        }
        
        .wishlist__empty-text {
            font-size: var(--h3-font-size);
            color: var(--text-color-light);
            margin-bottom: 1.5rem;
        }
        
        .wishlist__empty-button {
            display: inline-flex;
            align-items: center;
            background-color: var(--primary-color);
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: var(--font-medium);
            transition: 0.3s;
        }
        
        .wishlist__empty-button:hover {
            background-color: var(--primary-color-alt);
        }
        
        .wishlist__empty-button i {
            font-size: 1.25rem;
            margin-right: 0.5rem;
        }
        
        .wishlist__remove-all {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }
        
        .remove-all-btn {
            display: inline-flex;
            align-items: center;
            background-color: #ffebee;
            color: #d90429;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: var(--font-medium);
            transition: 0.3s;
        }
        
        .remove-all-btn:hover {
            background-color: #d90429;
            color: #fff;
        }
        
        .remove-all-btn i {
            margin-right: 0.5rem;
        }
        
        /* Join Section */
        .join {
            margin-top: 4rem;
        }
        
        .join__container {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
        }
        
        .join__bg {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: -1;
        }
        
        .join__content {
            position: relative;
            padding: 4rem 0;
            text-align: center;
            color: #fff;
        }
        
        .join__title {
            font-size: var(--h1-font-size);
            margin-bottom: 2rem;
            color: #fff;
        }
        
        .join__form {
            display: flex;
            justify-content: center;
            column-gap: 0.5rem;
            background-color: #fff;
            padding: 0.5rem;
            border-radius: 0.75rem;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .join__input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: none;
            outline: none;
            font-size: var(--normal-font-size);
            font-family: var(--body-font);
        }
        
        .join__button {
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: #fff;
            font-weight: var(--font-medium);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .join__button:hover {
            background-color: var(--primary-color-alt);
        }
        
        /* Responsive */
        @media screen and (max-width: 992px) {
            .container {
                margin-left: var(--mb-1-5);
                margin-right: var(--mb-1-5);
            }
        }
        
        @media screen and (max-width: 768px) {
            .wishlist__item {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .wishlist__img {
                width: 180px;
                height: 240px;
                margin: 0 auto;
            }
            
            .wishlist__rating {
                justify-content: center;
            }
            
            .wishlist__actions {
                flex-direction: row;
                justify-content: center;
            }
            
            .join__form {
                flex-direction: column;
                row-gap: 0.75rem;
                padding: 1rem;
            }
            
            .join__button {
                width: 100%;
            }
        }
        
        @media screen and (max-width: 576px) {
            .wishlist__header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .wishlist__count {
                align-self: flex-start;
            }
            
            .join__title {
                font-size: var(--h2-font-size);
            }
        }
        
        @media screen and (max-width: 350px) {
            .wishlist__item {
                padding: 1rem;
            }
        }
    </style> -->

<body>
    <main class="main">

        <!--==================== WISH-LIST BANNERBANNER ====================-->
        <section class="book-wishlist__banner">
            <div class="book-wishlist__banner-container">
                <div class="book-wishlist-image__banner">
                    <img src="view/JS/img/banner-book--detail1.jpg" alt="Book Banner" />
                </div>
                <div class="book-wishlist-image__banner">
                    <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
                </div>
                <div class="book-wishlist-image__banner">
                    <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
                </div>
                <div class="book-wishlist-image__banner">
                    <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
                </div>
                <div class="book-wishlist-image__banner">
                    <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
                </div>
                <div class="book-wishlist-image__banner">
                    <img src="view/JS/img/banner-book--detail1.jpg" alt="Book Banner" />
                </div>
            </div>
        </section>

        <!--==================== WISH-LIST SECTION ====================-->
        <section class="wishlist section" id="wishlist">
            <div class="wishlist__container container">
                <div class="wishlist__header">
                    <h2 class="wishlist__title">My Wishlist</h2>
                    <?php if (isset($prefer) && count($prefer) > 0) : ?>
                        <span class="wishlist__count"><?= count($prefer) ?> items</span>
                    <?php endif; ?>
                </div>

                <!-- Wishlist Items -->
                <div class="wishlist__items">
                    <?php if (isset($prefer) && count($prefer) > 0) : ?>
                        <?php foreach ($prefer as $item) : ?>
                            <!-- Wishlist Item -->
                                <article class="wishlist__item">
                                <a href="<?= href('product', 'detail') ?>&id=<?= $item['id'] ?>">
                                <img src="view/JS/img/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="wishlist__img" loading="lazy">
                                </a>
                                    <div class="wishlist__details">
                                        <h3 class="wishlist__title"><?= $item['name'] ?></h3>
                                        <p class="wishlist__author">by F. Scott Fitzgerald</p>
                                        <p class="wishlist__price">Price: <span class="price"><?= $item['price'] ?></span></p>

                                        <!-- Customer Rating -->
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
                                        <a href="<?= href('product', 'detail') ?>&id=<?= $item['id'] ?>">
                                            <button title="View details">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                        </a>

                                        <form  action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="name" value="<?= $item['name'] ?>">
                                            <input type="hidden" name="price" value="<?= $item['price'] ?>">
                                            <input type="hidden" name="image" value="<?= $item['image'] ?>">
                                            <input type="hidden" name="description" value="<?= $item['description'] ?>">
                                            <input type="hidden" name="action" value="increase">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="add-to-cart-btn" title="Add to cart">
                                                <i class="ri-shopping-cart-line"></i>
                                            </button>
                                        </form>

                                        <button class="remove-from-wishlist-btn" data-id="<?= $item['id'] ?>" title="Remove from wishlist">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </article>
                            
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="wishlist__empty">
                            <i class="ri-heart-3-line wishlist__empty-icon"></i>
                            <p class="wishlist__empty-text">Your wishlist is empty</p>
                            <a href="<?= href('product', 'list') ?>" class="wishlist__empty-button">
                                <i class="ri-shopping-bag-line"></i> Browse Books
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (isset($prefer) && count($prefer) > 0) : ?>
                    <div class="wishlist__remove-all">
                        <a href="<?= href('product', 'removeAll') ?>" class="remove-all-btn">
                            <i class="ri-delete-bin-line"></i> Remove All
                        </a>
                    </div>
                <?php endif; ?>
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
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Delete item button click handler
            $(".remove-from-wishlist-btn").click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var wishlistItem = $(this).closest('.wishlist__item'); // Get the wishlist item

                $.ajax({
                    url: '<?= href('product', 'ajaxDeletePrefer') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: productId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the wishlist item from the DOM
                            wishlistItem.remove();

                            // *** START: Update Header Count ***
                            var newCount = response.wishlistCount; // Get count from response
                            $("#wishlist-count").text(newCount); // Target the header count element by its ID
                            // *** END: Update Header Count ***

                            // Update local count display on prefer page
                            $('.wishlist__count').text(newCount + ' items');

                            // Check if wishlist is empty
                            if (newCount === 0) {
                                $('.wishlist__items').html(`
                                        <div class="wishlist__empty">
                                            <i class="ri-heart-3-line wishlist__empty-icon"></i>
                                            <p class="wishlist__empty-text">Your wishlist is empty</p>
                                            <a href="<?= href('product', 'list') ?>" class="wishlist__empty-button">
                                                <i class="ri-shopping-bag-line"></i> Browse Books
                                            </a>
                                        </div>
                                    `);
                                $('.wishlist__remove-all').remove();
                                $('.wishlist__count').remove(); // Also remove the local count if zero
                                // No need to update header count again here, already done above
                            }
                        } else {
                            alert(response.message);
                            // Optionally update header count even on failure if response includes it
                            if (response.hasOwnProperty('wishlistCount')) {
                                $("#wishlist-count").text(response.wishlistCount);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", error);
                        alert("An error occurred while removing the item."); // User-friendly error
                    }
                });

            });
        });
    </script>