<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\view\product\cart.php
$totalPrice = 0;
$cart = $_SESSION['cart'] ?? []; // Ensure cart is initialized as an empty array if not set
foreach ($cart as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}
?>

<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\view\product\cart.php
$totalPrice = 0;
$cart = $_SESSION['cart'] ?? []; // Ensure cart is initialized as an empty array if not set
foreach ($cart as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}
?>

<!-- <style>
    /* Cart Styles */
    .cart-items {
        padding: 6rem 0 2rem;
    }
    
    .container {
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    .cart__header {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .cart__title {
        font-size: 1.5rem;
        color: #2b2d42;
        position: relative;
        padding-bottom: 0.5rem;
        text-align: center;
    }
    
    .cart__title::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 2px;
        background-color: #4361ee;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    
    .cart__items-container {
        display: grid;
        gap: 2rem;
    }
    
    .cart__items {
        background-color: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .cart__empty {
        text-align: center;
        padding: 3rem 0;
    }
    
    .cart__empty-icon {
        font-size: 4rem;
        color: #707070;
        margin-bottom: 1rem;
    }
    
    .cart__empty-text {
        font-size: 1rem;
        color: #707070;
        margin-bottom: 1.5rem;
    }
    
    .cart__empty-button {
        display: inline-flex;
        align-items: center;
        background-color: #4361ee;
        color: #fff;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: 0.3s;
    }
    
    .cart__empty-button:hover {
        background-color: #3a56d4;
    }
    
    .cart__empty-button i {
        font-size: 1.25rem;
        margin-right: 0.5rem;
    }
    
    /* Cart Table */
    .cart__table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .cart__table th {
        padding: 1rem 0.5rem;
        text-align: left;
        font-weight: 600;
        color: #2b2d42;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .cart__table td {
        padding: 1.5rem 0.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .cart__header-select,
    .cart__cell-select {
        width: 5%;
        text-align: center;
    }
    
    .cart__header-image,
    .cart__cell-image {
        width: 10%;
    }
    
    .cart__header-name,
    .cart__cell-name {
        width: 30%;
    }
    
    .cart__header-price,
    .cart__cell-price {
        width: 15%;
    }
    
    .cart__header-quantity,
    .cart__cell-quantity {
        width: 15%;
    }
    
    .cart__header-total,
    .cart__cell-total {
        width: 15%;
        font-weight: 600;
    }
    
    .cart__header-actions,
    .cart__cell-actions {
        width: 10%;
        text-align: center;
    }
    
    /* Cart Item */
    .cart__item-image {
        width: 80px;
        height: 100px;
        object-fit: cover;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .cart__item-name {
        font-size: 0.938rem;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    
    .cart__cell-price {
        font-weight: 500;
    }
    
    .cart__cell-price::before {
        content: '$';
    }
    
    .cart__cell-total::before {
        content: '$';
    }
    
    /* Quantity Form */
    .cart-quantity-form {
        display: flex;
        align-items: center;
        max-width: 120px;
        border: 1px solid #e0e0e0;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .quantity-btn {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f8f8;
        border: none;
        font-size: 1.25rem;
        color: #333333;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .quantity-btn:hover {
        background-color: #e0e0e0;
    }
    
    .quantity-input {
        width: 48px;
        height: 36px;
        border: none;
        border-left: 1px solid #e0e0e0;
        border-right: 1px solid #e0e0e0;
        text-align: center;
        font-weight: 500;
        background-color: #ffffff;
    }
    
    /* Delete Button */
    .cart__item-button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.25rem;
        color: #707070;
        transition: 0.3s;
    }
    
    .cart__item-button:hover {
        color: #d90429;
    }
    
    /* Cart Summary */
    .cart__summary {
        background-color: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin: 0 auto;
        max-width: 500px;
    }
    
    .cart__total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #e0e0e0;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }
    
    .grand-total {
        font-weight: 700;
        color: #4361ee;
        font-size: 1.25rem;
    }
    
    .checkout-process__btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        background-color: #4361ee;
        color: #fff;
        padding: 1rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 0.938rem;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .checkout-process__btn:hover {
        background-color: #3a56d4;
    }
    
    .checkout-process__btn i {
        margin-left: 0.5rem;
        font-size: 1.25rem;
    }
    
    /* Checkbox styling */
    input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #4361ee;
        cursor: pointer;
    }
    
    /* Responsive */
    @media screen and (max-width: 992px) {
        .container {
            padding: 0 1rem;
        }
    }
    
    @media screen and (max-width: 768px) {
        .cart__table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .cart__header-select,
        .cart__cell-select {
            width: 40px;
        }
        
        .cart__header-image,
        .cart__cell-image {
            width: 80px;
        }
        
        .cart__item-image {
            width: 60px;
            height: 80px;
        }
    }
    
    @media screen and (max-width: 576px) {
        .cart__items-container {
            gap: 1rem;
        }
        
        .cart__items {
            padding: 1rem;
        }
        
        .cart__summary {
            padding: 1rem;
        }
        
        .cart__total {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .cart__table th,
        .cart__table td {
            padding: 0.75rem 0.25rem;
        }
        
        .cart__item-name {
            font-size: 0.813rem;
        }
    }
</style> -->

<!--==================== MAIN ====================-->
<main class="main">

    <!--==================== CART BANNER ====================-->
    <section class="cart-banner">
        <div class="cart-banner-container">
            <div class="cart-image-banner">
                <img src="view/JS/img/banner-book--detail1.jpg" alt="Book Banner" />
            </div>
            <div class="cart-image-banner">
                <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
            </div>
            <div class="cart-image-banner">
                <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
            </div>
            <div class="cart-image-banner">
                <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
            </div>
            <div class="cart-image-banner">
                <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
            </div>
            <div class="cart-image-banner">
                <img src="view/JS/img/banner-book--detail1.jpg" alt="Book Banner" />
            </div>
        </div>
    </section>

    <!--==================== CART-ITEMS ====================-->
    <section class="cart-items" id="cart-items">
        <div class="cart__container container">
            <div class="cart__items-container">
                <div class="cart__items">
                    <form action="<?= href('product', 'confirm') ?>" method="post" id="cart-form">
                        <?php if (count($cart) > 0) : ?>
                            <table class="cart__table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="cart__header-select">
                                        </th>
                                        <th scope="col" class="cart__header-image">Product</th>
                                        <th scope="col" class="cart__header-name">Name</th>
                                        <th scope="col" class="cart__header-price">Price</th>
                                        <th scope="col" class="cart__header-quantity">Quantity</th>
                                        <th scope="col" class="cart__header-total">Total</th>
                                        <th scope="col" class="cart__header-actions"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $item) : ?>
                                        <tr class="cart__item">
                                            <td class="cart__cell-select" data-label="Select">
                                                <input type="checkbox" name="selectedProducts[]" class="product-checkbox" value="<?= $item['id'] ?>">
                                            </td>
                                            <td class="cart__cell-image" data-label="Product">
                                                <img src="view/JS/img/<?= $item['image'] ?>" alt="Cover of '<?= $item['name'] ?>'" class="cart__item-image">
                                            </td>
                                            <td class="cart__cell-name" data-label="Name">
                                                <h3 class="cart__item-name"><?= $item['name'] ?></h3>
                                            </td>
                                            <td class="cart__cell-price" data-label="Price"><?= $item['price'] ?></td>

                                            <td class="cart__cell-quantity" data-label="Quantity">
                                                <div class="cart-quantity-form" data-product-id="<?= $item['id']; ?>">
                                                    <button type="button" name="action" value="decrease" class="quantity-btn decrease">-</button>
                                                    <input type="text" class="quantity-input" value="<?= isset($item['quantity']) ? $item['quantity'] : 1; ?>" readonly />
                                                    <button type="button" name="action" value="increase" class="quantity-btn increase">+</button>
                                                </div>
                                            </td>

                                            <td class="cart__cell-total item-total-price" data-label="Total" data-product-id="<?= $item['id']; ?>" aria-live="polite"><?= number_format($item['price'] * $item['quantity'], 2); ?></td>

                                            <td class="cart__cell-actions" data-label="Actions">
                                                <button type="button" class="cart__item-button cart__item-button--delete delete-btn" data-id="<?= $item['id'] ?>">
                                                    <i class="ri-delete-bin-line" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="cart__empty">
                                <i class="ri-shopping-cart-line cart__empty-icon"></i>
                                <p class="cart__empty-text">Your cart is empty</p>
                                <a href="<?= href('product', 'list') ?>" class="cart__empty-button">
                                    <i class="ri-shopping-bag-line"></i> Continue Shopping
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if (count($cart) > 0) : ?>
                            <div class="cart__summary">
                                <p class="cart__total">
                                    Selected Total: <span class="grand-total" aria-live="polite">$0.00</span>
                                </p>

                                <button type="submit" class="checkout-process__btn">
                                    Proceed to Checkout <i class="ri-arrow-right-line"></i>
                                </button>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
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

</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // --- Function to Calculate Selected Total ---
        function updateSelectedTotal() {
            let selectedTotal = 0;
            $('.product-checkbox:checked').each(function() {
                const cartItem = $(this).closest('.cart__item');
                const priceText = cartItem.find('.cart__cell-price').text().replace('$', '');
                const quantity = parseInt(cartItem.find('.quantity-input').val());
                const price = parseFloat(priceText);

                if (!isNaN(price) && !isNaN(quantity)) {
                    selectedTotal += price * quantity;
                }
            });
            $('.grand-total').text('$' + selectedTotal.toFixed(2));
        }
        // --- End Function ---


        // ===========================================================
        // === START: RESTORED QUANTITY UPDATE CODE ===
        // ===========================================================
        $('.cart-quantity-form .quantity-btn').click(function(e) {
            e.preventDefault(); // Prevent default button behavior

            const button = $(this);
            const form = button.closest('.cart-quantity-form');
            const productId = form.data('product-id');
            const action = button.val(); // 'increase' or 'decrease'
            const quantityInput = form.find('.quantity-input');
            const currentQuantity = parseInt(quantityInput.val());
            const cartItemRow = button.closest('.cart__item'); // Find the parent table row
            const itemTotalPriceElement = cartItemRow.find('.item-total-price'); // Find the total price cell for this item

            // Optimistic UI update (optional but good for UX)
            let newQuantity = currentQuantity;
            if (action === 'increase') {
                newQuantity++;
            } else if (action === 'decrease' && currentQuantity > 1) {
                newQuantity--;
            } else if (action === 'decrease' && currentQuantity <= 1) {
                return; // Don't decrease below 1
            }
            quantityInput.val(newQuantity); // Update input visually immediately

            // AJAX call to update server
            $.ajax({
                url: '<?= href('product', 'ajaxUpdateCart') ?>', // Make sure this points to your update action
                type: 'POST',
                dataType: 'json',
                data: {
                    id: productId,
                    action: action
                },
                success: function(response) {
                    if (response.success) {
                        // Update quantity input (might be redundant if optimistic update is done, but safe)
                        quantityInput.val(response.new_quantity);

                        // Update the item's total price display
                        itemTotalPriceElement.text(response.new_total.toFixed(2));

                        // Recalculate the grand total based on selected items
                        updateSelectedTotal();

                    } else {
                        alert(response.message);
                        // Revert optimistic update on failure
                        quantityInput.val(currentQuantity);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                    alert("An error occurred while updating the quantity.");
                    // Revert optimistic update on error
                    quantityInput.val(currentQuantity);
                }
            });
        });
        // ===========================================================
        // === END: RESTORED QUANTITY UPDATE CODE ===
        // ===========================================================


        // Delete item button click handler (Keep the updated version)
        $(".delete-btn").click(function(e) {
            e.preventDefault();
            var productId = $(this).data('id');
            var cartItem = $(this).closest('.cart__item'); // Get the cart item row

            if (confirm("Are you sure you want to remove this item from the cart?")) {
                $.ajax({
                    url: '<?= href('product', 'ajaxDeleteCart') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: productId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the cart item from the DOM
                            cartItem.remove();

                            // Recalculate total based on remaining selected items
                            updateSelectedTotal(); // This updates the total on the cart page

                            // *** START: Update Header Cart Count ***
                            var newCartCount = response.cartCount; // Get count from response
                            $("#cart-count").text(newCartCount); // Target the header count element by its ID
                            // *** END: Update Header Cart Count ***

                            //check cart is empty
                            if ($('.cart__item').length === 0) {
                                $('.cart__items').html(`
                                    <div class="cart__empty">
                                        <i class="ri-shopping-cart-line cart__empty-icon"></i>
                                        <p class="cart__empty-text">Your cart is empty</p>
                                        <a href="<?= href('product', 'list') ?>" class="cart__empty-button">
                                            <i class="ri-shopping-bag-line"></i> Continue Shopping
                                        </a>
                                    </div>
                                `);
                                // Also remove the summary if the cart is empty
                                $('.cart__summary').remove();
                                // Header count is already updated above
                            }
                        } else {
                            alert(response.message);
                            // Optionally update header count even on failure if response includes it
                            if (response.hasOwnProperty('cartCount')) {
                                 $("#cart-count").text(response.cartCount);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", error);
                        alert("An error occurred while removing the item.");
                    }
                });
            }
        });

        // Checkbox change handler
        $('.product-checkbox').change(function() {
            updateSelectedTotal(); // Recalculate total when any checkbox changes
        });

        // Initial calculation on page load
        updateSelectedTotal();

        // Prevent checkout if nothing selected
         $('#cart-form').submit(function(e) {
            if ($('.product-checkbox:checked').length === 0) {
                alert('Please select at least one item to proceed to checkout.');
                e.preventDefault(); // Stop the form submission
            }
        });

    });
</script>
