
<main class="main">
    <!--==================== ORDER SUMMARY ====================-->
    <section class="order-summary-section section">
        <div class="order-summary__container container">
            <!-- Order Success Message -->
            <div class="order-success">
                <i class="ri-checkbox-circle-line success-icon"></i>
                <h2 class="checkout__title">Thank You for Your Order!</h2>
                <h4 class="checkout__subtitle">Your order has been successfully placed. We're now processing it.</h4>
            </div>

            <!-- Order Progress -->
            <div class="order-steps">
                <div class="step completed">
                    <div class="step-icon">
                        <i class="ri-shopping-cart-2-line"></i>
                    </div>
                    <div class="step-text">Cart</div>
                </div>
                <div class="step completed">
                    <div class="step-icon">
                        <i class="ri-file-list-3-line"></i>
                    </div>
                    <div class="step-text">Confirmation</div>
                </div>
                <div class="step completed">
                    <div class="step-icon">
                        <i class="ri-bank-card-line"></i>
                    </div>
                    <div class="step-text">Payment</div>
                </div>
                <div class="step active">
                    <div class="step-icon">
                        <i class="ri-check-double-line"></i>
                    </div>
                    <div class="step-text">Completed</div>
                </div>
            </div>

            <!-- Summary Table -->
            <div class="order-summary__table-container">
                <table class="order-summary__table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0;
                        if (isset($data['order'])) {
                            foreach ($data['order'] as $item) {
                                $total = $item['price'] * $item['quantity'];
                                $subtotal += $total;
                        ?>
                                <tr>
                                    <td>
                                        <img src="view/JS/img/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="order-summary__image" />
                                    </td>
                                    <td class="product-name"><?= $item['name'] ?></td>
                                    <td>$<?= number_format($item['price'], 2) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td>$<?= number_format($total, 2) ?></td>
                                </tr>
                        <?php }
                        } else {
                            echo '<tr><td colspan="5" style="text-align: center;">No items available</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Price Breakdown -->
            <div class="order-summary__details">
                <p class="order-summary__total">Total: <span id="total">$<?= number_format($subtotal, 2) ?></span></p>
            </div>

            <!-- Actions -->
            <div class="actions">
                <a href="<?= href('product', 'home') ?>" class="button btn-back-home">
                    <i class="ri-home-smile-line"></i> Back to Home Page
                </a>
            </div>
            <form action="<?= href('product', 'order') ?>" method="post" id="cash-payment-form" style="display: none;">
                <?php if ($paymentInfo) : ?>
                    <?php foreach ($product_id as $item) : ?>
                        <input type="hidden" name="selectedProducts[]" value="<?php echo $item ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </form>
        </div>
    </section>
</main>
