
<section class="confirm section">
    <div class="confirm__container container grid">
        <div class="confirm__form">
            <form action="<?= href('product', 'payment') ?>" method="post">
                <div class="confirm__layout">
                    <!-- User Information -->
                    <div class="confirm__user-info">
                        <h3 class="confirm__section-title">Customer Information</h3>
                        
                        <div class="payment__group">
                            <label for="name" class="payment__label">Full Name</label>
                            <input type="text" class="payment__input" id="name" name="name" value="<?= $user->getName() ?>" required>
                        </div>

                        <div class="payment__group">
                            <label for="address" class="payment__label">Delivery Address</label>
                            <input type="text" class="payment__input" id="address" name="address" value="<?= $user->getAddress() ?>" required>
                        </div>

                        <div class="payment__group">
                            <label for="phone" class="payment__label">Phone Number</label>
                            <input type="text" class="payment__input" id="phone" name="phone" value="<?= $user->getPhone() ?>"  required>
                        </div>
                        
                        <div class="payment__group">
                            <label for="order_desc" class="payment__label">Order Description</label>
                            <input class="payment__input" id="order_desc" name="order_desc" type="text" value=""  />
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="confirm__order-details">
                        <h3 class="confirm__section-title">Order Summary</h3>
                        <div class="order-summary">
                            <div class="table-responsive">
                                <table class="summary-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cartDetails as $item) : ?>
                                            <tr>
                                                <td class="product-name"><?= $item['product']->getProductName() ?></td>
                                                <td class="price-value"><?= $item['product']->getPrice() ?></td>
                                                <td><?= $item['quantity'] ?></td>
                                                <td class="total-value"><?= $item['product']->getPrice() * $item['quantity'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">Subtotal</td>
                                            <td class="total-value"><?= $subtotal ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Shipping</td>
                                            <td class="total-value"><?= $shippingCost ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <td class="total-value"><?= $total ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hidden input for total -->
                <input type="hidden" name="amount" value="<?= $total ?>">
                
                <!-- Transfer order id -->
                <?php foreach ($cartDetails as $item) : ?>
                    <input type="hidden" name="product_id[]" value="<?= $item['product']->getId() ?>">
                <?php endforeach; ?>
                
                <!-- Submit to Payment -->
                <div style="text-align: center;">
                    <button type="submit" class="button checkout-confirm__button">
                        <i class="ri-secure-payment-line"></i> Proceed to Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>