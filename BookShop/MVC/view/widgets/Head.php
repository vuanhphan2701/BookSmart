<?php
// Assuming counts are stored in session, default to 0 if not set
$wishlistCount = isset($_SESSION['wishlist_count']) ? $_SESSION['wishlist_count'] : 0;
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>

<!-- ==================== HEADER ==================== -->
<header class="header" id="header">
    <nav class="nav container" aria-label="Main Navigation">
        <!-- Logo -->
        <a href="index.php" class="nav__logo">
            <i class="ri-book-2-fill" aria-hidden="true"></i>
            <span>BOOKSMART</span>
        </a>

        <!-- Search Bar -->
        <form action="<?= href('product', 'search') ?>" method="POST" class="nav__search" role="search">
            <button type="submit" class="nav__search-btn" aria-label="Search">
                <i class="ri-search-line" aria-hidden="true"></i>
            </button>
            <input value="<?= htmlspecialchars($searchedKeyword ?? '') ?>" type="text" name="product_name" class="nav__search-input" placeholder="Search books..." aria-label="Search Books" />
        </form>

        <!-- Navigation Menu -->
        <ul class="nav__list">
            <li><a href="<?= href('product', 'home') ?>" class="nav__link"><i class="ri-home-smile-line"></i> Home</a></li>
            <li><a href="<?= href('product', 'list') ?>" class="nav__link"><i class="ri-book-3-line"></i> Books</a></li>
            <li><a href="<?= href('product', 'about') ?>" class="nav__link"><i class="ri-team-line"></i> About</a></li>
            <li><a href="<?= href('product', 'contact') ?>" class="nav__link"><i class="ri-message-3-line"></i> Contact</a></li>
        </ul>

        <!-- Navigation Actions -->
        <div class="nav__actions">
            <a href="<?= href('product', 'prefer') ?>" class="nav__action-icon" id="wishlist-icon" aria-label="Favorites">
                <i class="ri-heart-3-line"></i>
                <span id="wishlist-count" class="count-badge"><?= $wishlistCount ?></span>
            </a>
            <a href="<?= href('product', 'cart') ?>" class="nav__action-icon" id="cart-icon" aria-label="Cart">
                <i class="ri-shopping-cart-line"></i>
                <span id="cart-count" class="count-badge"><?= $cartCount ?></span>
            </a>
            <!-- User Section -->
            <div id="user-section">
                <?php if (isset($_SESSION['avata'])): ?>
                    <!-- Hide user icon when logged in -->
                    <a href="<?= href('user', 'authenticate') ?>" class="user-icon" style="display: none;">
                        <i class="ri-user-line"></i>
                    </a>

                    <!-- Show dropdown when logged in -->
                    <div class="dropdown" style="display: block;">
                        <div class="dropdown__profile">
                            <img src="view/JS/img/<?= $_SESSION['avata'] ?>" alt="User Image" id="user-image" />
                        </div>

                        <script>
                            function updateCartCount(count) {
                                const cartCountElement = document.getElementById("cart-count");
                                if (cartCountElement) {
                                    cartCountElement.textContent = count;
                                } else {
                                    console.warn("Cart count element (#cart-count) not found.");
                                }
                            }

                            function updateWishlistCount(count) {
                                const wishlistCountElement = document.getElementById("wishlist-count");
                                if (wishlistCountElement) {
                                    wishlistCountElement.textContent = count;
                                } else {
                                    console.warn("Wishlist count element (#wishlist-count) not found.");
                                }
                            }

                            function getCounts() {
                                fetch('<?= href("product", "ajaxGetCounts") ?>')
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            updateCartCount(data.cartCount);
                                            updateWishlistCount(data.wishlistCount);
                                        }
                                    })
                                    .catch(error => console.error("Error fetching counts:", error));
                            }

                            // Call getCounts when the page loads
                            window.addEventListener('load', getCounts);
                        </script>
                        <ul class="dropdown__list">
                            <li>
                                <a href="<?= href('user', 'checkProfile') ?>" class="dropdown__link <?php echo (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : ''; ?>">
                                    <i class="ri-user-line"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?= href('order', 'orderHistory') ?>" class="dropdown__link <?php echo (basename($_SERVER['PHP_SELF']) == 'orders.php') ? 'active' : ''; ?>">
                                    <i class="ri-time-line"></i> Order History
                                </a>
                            </li>
                            <li>
                                <a href="<?= href('user', 'logOut') ?>" class="dropdown__link logout">
                                    <i class="ri-logout-box-r-line"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Show user icon when not logged in -->
                    <a href="<?= href('user', 'authenticate') ?>" class="user-icon">
                        <i class="ri-user-line"></i>
                    </a>

                    <!-- Hide dropdown when not logged in -->
                    <div class="dropdown" style="display: none;">
                        <!-- ... dropdown content ... -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>