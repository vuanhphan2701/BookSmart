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
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
$isSuccess = ($secureHash == $vnp_SecureHash) && ($_GET['vnp_ResponseCode'] == '00');
?>


    <style>
        /* Payment Section Styles */
        .payment-section {
            padding: 8rem 0 4rem;
        }

        .paymen-container{
            margin-top: 1rem;
        }

        .payment__card {
            background-color: var(--container-color);
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            padding: 2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .payment__status {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .payment__icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .payment__icon.success {
            color: var(--success-color);
        }

        .payment__icon.error {
            color: var(--error-color);
        }

        .payment__status-text {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .payment__status-text.success {
            color: var(--success-color);
        }

        .payment__status-text.error {
            color: var(--error-color);
        }

        .payment__details {
            display: grid;
            row-gap: 1rem;
        }

        .payment__detail {
            display: flex;
            justify-content: space-between;
            padding-bottom: 0.75rem;
            border-bottom: 1px dashed var(--border-color);
        }

        .payment__label {
            font-weight: 500;
            color: var(--text-color-light);
        }

        .payment__value {
            font-weight: 600;
            text-align: right;
        }

        .payment__actions {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: var(--secondary-color);
        }

        .button i {
            margin-right: 0.5rem;
            font-size: 1.25rem;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .nav__list {
                display: none;
            }

            .payment__card {
                padding: 1.5rem;
            }
        }

        @media screen and (max-width: 576px) {
            .payment__detail {
                flex-direction: column;
                row-gap: 0.25rem;
            }

            .payment__value {
                text-align: left;
            }
        }
    </style>

<body>
    <!-- Header (Matching the provided header) -->
   

    <!-- Payment Confirmation Section -->
    <section class="payment-section">
        <div class="paymen-container container">            
            <div class="payment__card">
                <!-- Payment Status -->
                <div class="payment__status">
                    <?php if ($secureHash == $vnp_SecureHash): ?>
                        <?php if ($_GET['vnp_ResponseCode'] == '00'): ?>
                            <i class="ri-checkbox-circle-fill payment__icon success"></i>
                            <h3 class="payment__status-text success">Payment Successful</h3>
                        <?php else: ?>
                            <i class="ri-close-circle-fill payment__icon error"></i>
                            <h3 class="payment__status-text error">Payment Failed</h3>
                        <?php endif; ?>
                    <?php else: ?>
                        <i class="ri-error-warning-fill payment__icon error"></i>
                        <h3 class="payment__status-text error">Invalid Signature</h3>
                    <?php endif; ?>
                </div>
                
                <!-- Payment Details -->
                <div class="payment__details">
                    <div class="payment__detail">
                        <span class="payment__label">Order ID:</span>
                        <span class="payment__value"><?php echo $_GET['vnp_TxnRef'] ?></span>
                    </div>
                    
                    <div class="payment__detail">
                        <span class="payment__label">Amount:</span>
                        <span class="payment__value"><?php echo number_format($_GET['vnp_Amount']/100, 0, ',', '.') ?> VND</span>
                    </div>
                    
                    <div class="payment__detail">
                        <span class="payment__label">Order Info:</span>
                        <span class="payment__value"><?php echo $_GET['vnp_OrderInfo'] ?></span>
                    </div>
                    
                    <div class="payment__detail">
                        <span class="payment__label">Response Code:</span>
                        <span class="payment__value"><?php echo $_GET['vnp_ResponseCode'] ?></span>
                    </div>
                    
                    <div class="payment__detail">
                        <span class="payment__label">Transaction ID:</span>
                        <span class="payment__value"><?php echo $_GET['vnp_TransactionNo'] ?></span>
                    </div>
                    
                    <div class="payment__detail">
                        <span class="payment__label">Bank Code:</span>
                        <span class="payment__value"><?php echo $_GET['vnp_BankCode'] ?></span>
                    </div>
                    
                    <div class="payment__detail">
                        <span class="payment__label">Payment Time:</span>
                        <span class="payment__value"><?php 
                            $payDate = $_GET['vnp_PayDate'];
                            $formattedDate = date('d/m/Y H:i:s', strtotime(
                                substr($payDate, 0, 4) . '-' . 
                                substr($payDate, 4, 2) . '-' . 
                                substr($payDate, 6, 2) . ' ' . 
                                substr($payDate, 8, 2) . ':' . 
                                substr($payDate, 10, 2) . ':' . 
                                substr($payDate, 12, 2)
                            ));
                            echo $formattedDate;
                        ?></span>
                    </div>
                </div>
                
                <!-- Action Button -->
                <div class="payment__actions">
                    <a href="<?= href('product', 'home') ?>" class="button">
                        <i class="ri-home-smile-line"></i> Back to Home
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <script>
        // Optional JavaScript for any additional functionality
        document.addEventListener('DOMContentLoaded', function() {
            // You can add any JavaScript functionality here if needed
        });
    </script>
</body>
