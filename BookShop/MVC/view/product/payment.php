<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_TmnCode = "PTILUBQG"; //Website ID in VNPAY System
$vnp_HashSecret = "SL2PBRN0K583UCYVG5UYDVG934UJFNVU"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/BookSmart/BookShop/MVC/?controller=product&action=return";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

// Get payment info from session
$paymentInfo = isset($_SESSION['payment_info']) ? $_SESSION['payment_info'] : null;
if ($paymentInfo) {
    $userInfo = $paymentInfo['user_info'];
    $amount = $paymentInfo['amount'];
    $product_id = $paymentInfo['product_id'];
}
?>
</head>
<body>
   
    <!-- Payment Section -->
    <section class="payment-section section">
        <div class="container">
            <div class="payment__container grid">
                <div class="payment__card">
                    <div class="payment__header">
                        <h2 class="payment__title">Order Payment</h2>
                        <p class="payment__subtitle">Please check the information and select a payment method</p>
                    </div>

                    <div class="payment__form">
                        <form action="<?= href('product', 'paymentSave') ?>" id="create_form" method="post">
                            <!-- User Information Section -->
                            <?php if ($paymentInfo) : ?>
                                <h3 class="payment__section-title">
                                    <i class="ri-user-3-line"></i> Customer Information
                                </h3>

                                <div class="payment__group">
                                    <label for="name" class="payment__label">Full Name</label>
                                    <input class="payment__input" id="name" name="name" type="text" value="<?= $userInfo['name'] ?>" readonly />
                                </div>

                                <div class="payment__group">
                                    <label for="address" class="payment__label">Delivery Address</label>
                                    <input class="payment__input" id="address" name="address" type="text" value="<?= $userInfo['address'] ?>" />
                                </div>

                                <div class="payment__group">
                                    <label for="phone" class="payment__label">Phone Number</label>
                                    <input class="payment__input" id="phone" name="phone" type="text" value="<?= $userInfo['phone'] ?>" readonly />
                                </div>
                                <input type="hidden" id="txt_bill_state" name="txt_bill_state" value="1">
                            <?php endif; ?>

                            <div class="payment__divider"></div>

                            <!-- Order Information Section -->
                            <h3 class="payment__section-title">
                                <i class="ri-shopping-bag-3-line"></i> Order Information
                            </h3>

                            <div class="payment__group">
                                <label for="order_type" class="payment__label">Goods Type</label>
                                <select name="order_type" id="order_type" class="payment__select">
                                    <option value="other">Product</option>
                                </select>
                            </div>

                            <div class="payment__group">
                                <label for="order_id" class="payment__label">Invoice Code</label>
                                <div class="payment__input-with-icon">
                                    <input class="payment__input" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" readonly />
                                </div>
                            </div>

                            <div class="payment__group">
                                <label for="amount" class="payment__label">Payment Amount</label>
                                <div class="payment__input-with-icon">
                                    <input class="payment__input" id="amount" name="amount" type="number" value="<?= isset($amount) ? $amount : '10000' ?>" readonly />
                                </div>
                            </div>

                            <div class="payment__group">
                                <label for="order_desc" class="payment__label">Payment Content</label>
                                <textarea class="payment__textarea" id="order_desc" name="order_desc" rows="3" readonly><?= isset($userInfo['order_desc']) ? $userInfo['order_desc'] : 'Order Payment' ?></textarea>
                            </div>

                            <div class="payment__divider"></div>

                            <!-- Payment Method Section -->
                            <h3 class="payment__section-title">
                                <i class="ri-bank-card-line"></i> Payment Method
                            </h3>

                            <div class="payment__group">
                                <label for="bank_code" class="payment__label">Select Bank</label>
                                <select name="bank_code" id="bank_code" class="payment__select">
                                    <option value="">Not selected</option>
                                    <option value="NCB">NCB Bank</option>
                                    <option value="AGRIBANK">Agribank Bank</option>
                                    <option value="SCB">SCB Bank</option>
                                    <option value="SACOMBANK">SacomBank Bank</option>
                                    <option value="EXIMBANK">EximBank Bank</option>
                                    <option value="MSBANK">MSBANK Bank</option>
                                    <option value="NAMABANK">NamABank Bank</option>
                                    <option value="VNMART">VnMart E-wallet</option>
                                    <option value="VIETINBANK">Vietinbank Bank</option>
                                    <option value="VIETCOMBANK">VCB Bank</option>
                                    <option value="HDBANK">HDBank Bank</option>
                                    <option value="DONGABANK">Dong A Bank</option>
                                    <option value="TPBANK">TPBank Bank</option>
                                    <option value="OJB">OceanBank Bank</option>
                                    <option value="BIDV">BIDV Bank</option>
                                    <option value="TECHCOMBANK">Techcombank Bank</option>
                                    <option value="VPBANK">VPBank Bank</option>
                                    <option value="MBBANK">MBBank Bank</option>
                                    <option value="ACB">ACB Bank</option>
                                    <option value="OCB">OCB Bank</option>
                                    <option value="IVB">IVB Bank</option>
                                    <option value="VISA">Payment via VISA/MASTER</option>
                                </select>
                            </div>

                            <div class="payment__group">
                                <label for="language" class="payment__label">Language</label>
                                <select name="language" id="language" class="payment__select">
                                    <option value="vn">Vietnamese</option>
                                    <option value="en">English</option>
                                </select>
                            </div>

                            <div class="payment__group">
                                <label for="txtexpire" class="payment__label">Payment Deadline</label>
                                <input class="payment__input" id="txtexpire" name="txtexpire" type="text" value="<?php echo $expire; ?>" readonly />
                            </div>

                            <!-- Hidden product IDs -->
                            <?php if ($paymentInfo) : ?>
                                <?php foreach ($product_id as $item) : ?>
                                    <input type="hidden" name="product_id[]" value="<?php echo $item ?>">
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <div class="payment__buttons">
                                <button type="submit" name="redirect" id="redirect" class="button button--primary button--flex">
                                    <i class="ri-bank-card-line"></i> Pay with VNPAY
                                </button>

                                <button type="button" id="cash-payment-btn" class="button button--secondary button--flex">
                                    <i class="ri-money-dollar-circle-line"></i> Pay on Delivery
                                </button>
                            </div>
                        </form>

                        <!-- Cash payment form -->
                        <form action="<?= href('product', 'order') ?>" method="post" id="cash-payment-form" style="display: none;">
                            <?php if ($paymentInfo) : ?>
                                <?php foreach ($product_id as $item) : ?>
                                    <input type="hidden" name="selectedProducts[]" value="<?php echo $item ?>">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script>
        // Handle cash payment button click
        document.getElementById('cash-payment-btn').addEventListener('click', function() {
            document.getElementById('cash-payment-form').submit();
        });
        
        // Optional: Add bank selection visual feedback
        document.getElementById('bank_code').addEventListener('change', function() {
            // You could add visual feedback when a bank is selected
            if (this.value) {
                this.classList.add('selected-bank');
            } else {
                this.classList.remove('selected-bank');
            }
        });
    </script>
</body>
</html>