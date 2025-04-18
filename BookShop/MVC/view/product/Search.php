<body>
    <main class="main">
        <section class="wishlist section" id="wishlist">
            <div class="wishlist__container container">

                <div class="wishlist__items">
                    <?php if (isset($lists) && count($lists) > 0) : ?>
                        <?php
                        //  / dd($lists);
                        foreach ($lists as $item) :  ?>
                            <article class="wishlist__item">
                              <a href="<?= href('product', 'detail') ?>&id=<?= $item->getId()?>"> 
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
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // ĐÃ XÓA KHỐI CODE JAVASCRIPT XỬ LÝ NÚT REMOVE TẠI ĐÂY
            /*
            // Delete item button click handler
            $(".remove-from-wishlist-btn").click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var wishlistItem = $(this).closest('.wishlist__item'); // Get the wishlist item

                if (confirm("Are you sure you want to remove this item from the wishlist?")) {
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

                                // Update count
                                var count = $('.wishlist__item').length;
                                $('.wishlist__count').text(count + ' items');

                                // Check if wishlist is empty
                                if (count === 0) {
                                    $('.wishlist__items').html(`
                                        <div class="wishlist__empty">
                                            <i class="ri-search-eye-line  ri-3x"></i>
                                            <p class="wishlist__empty-text">Your wishlist is empty</p>
                                            <a href="<?= href('product', 'list') ?>" class="wishlist__empty-button">
                                                <i class="ri-shopping-bag-line"></i> Browse Books
                                            </a>
                                        </div>
                                    `);
                                    $('.wishlist__remove-all').remove();
                                    $('.wishlist__count').remove();
                                }
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX request failed:", error);
                        }
                    });
                }
            });
            */
        });
    </script>
</body>