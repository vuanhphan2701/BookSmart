<!-- c:\xampp\htdocs\BookSmart\BookShop\MVC\view\product\detailOrder.php -->
<style>
/* --- Base Container --- */
.order-detail-container {
    max-width: 1350px;
    margin: 130px auto 20px; 
    padding: 2rem; 
    background-color: #fff; 
    border-radius: 0.5rem; 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); 
    border: 1px solid #e0e0e0; 
}

/* --- Headings --- */
.order-detail-container h2,
.order-detail-container h3 {
    color: #2b2d42; 
    margin-bottom: 1rem; 
    font-weight: 600; 
}

.order-detail-container h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    border-bottom: 2px solid #e0e0e0; 
    padding-bottom: 0.75rem;
    font-size: 1.5rem; 
}

.order-detail-container h3 {
    border-bottom: 1px solid #e0e0e0; 
    padding-bottom: 0.5rem;
    font-size: 1.25rem; 
    margin-top: 1.5rem;
}

/* --- Text & Paragraphs --- */
.order-detail-container p {
    margin-bottom: 0.75rem;
    line-height: 1.6;
    color: #333; 
}

.order-detail-container strong {
    font-weight: 600; 
    color: #2b2d42;
}

/* --- Information Sections --- */
.order-detail-container .order-info,
.order-detail-container .user-info {
    margin-bottom: 1.5rem;
    padding: 1rem 1.5rem;
    border: 1px solid #e0e0e0; 
    border-radius: 0.5rem; 
    background-color: #f8f9fa;
}

/* --- Order Items Table --- */
.order-detail-container table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1.5rem;
    font-size: 0.938rem; /* Consider --normal-font-size */
}

.order-detail-container th,
.order-detail-container td {
    padding: 0.75rem 1rem; /* Adjusted padding */
    text-align: left;
    border-bottom: 1px solid #e0e0e0; /* Consider --border-color */
    vertical-align: middle; /* Ensure vertical alignment */
}

.order-detail-container th {
    background-color: #f5f7ff; /* Lighter, bluish background */
    font-weight: 600; /* Consider --font-semi-bold */
    color: #2b2d42; /* Consider --secondary-color */
}

.order-detail-container td img {
    max-width: 100px; /* Slightly smaller image */
    height: auto;
    border-radius: 0.25rem; /* Smaller radius for image */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* Softer shadow */
    display: block; /* Prevent extra space below image */
}

/* --- Status Indicators --- */
.order-detail-container .status-paid,
.order-detail-container .status-unpaid {
    font-weight: 600; /* Consider --font-semi-bold */
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.813rem; /* Consider --small-font-size */
    display: inline-block; /* Make it behave like a badge */
}

.order-detail-container .status-paid {
    color: #38b000; /* Consider --success-color */
    background-color: #f0fff4; /* Consider --success-color-light */
}

.order-detail-container .status-unpaid {
    color: #d90429;  
    background-color: #ffebee; 
}

/* --- Total Price --- */
.order-detail-container .total-price {
    margin-top: 1.5rem;
    text-align: right;
    font-size: 1.1rem; 
    font-weight: 700; 
    color: #e4405f; 
}

.order-detail-container .total-price strong {
    color: #2b2d42; /* Consider --secondary-color */
    font-weight: 600; /* Consider --font-semi-bold */
    margin-right: 0.5rem;
}

/* --- Back Button --- */
.order-detail-container .back-button {
    margin-top: 2rem; /* More space before the button */
    text-align: left; /* Keep alignment */
}

/* Reusing button styles if defined globally is better */
.order-detail-container .back-button .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500; 
    transition: background-color 0.3s ease, transform 0.2s ease; 
    cursor: pointer;
    text-decoration: none;
    background-color: #1e272c; 
    color: #fff;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
}

.order-detail-container .back-button .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
}

.order-detail-container .back-button .btn:active {
    transform: translateY(0); 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}


.order-detail-container .back-button .btn i {
    margin-right: 0.5rem;
    font-size: 1.2rem; 
    line-height: 1; 
}

</style>

<div class="order-detail-container">
    <h2>Order Details</h2>

    <?php if (isset($order)) : ?>
        <div class="order-info">
            <h3>Order Information</h3>
            <p><strong>Order ID:</strong> <?= $order->getId() ?></p>
            <p><strong>Order Date:</strong> <?= $order->getCreatedAt() ?></p>
            <p>
                <strong>Order Status:</strong>
                <?php if ($order->getOrderStatus() == 1) : ?>
                    <span class="status-paid">Paid</span>
                <?php else : ?>
                    <span class="status-unpaid">Unpaid</span>
                <?php endif; ?>
            </p>
        </div>

        <div class="user-info">
            <h3>User Information</h3>
            <p><strong>Name:</strong> <?= $user->getName() ?></p>
            <p><strong>Email:</strong> <?= $user->getEmail() ?></p>
            <p><strong>Phone:</strong> <?= $user->getPhone() ?></p>
            <p><strong>Address:</strong> <?= $user->getAddress() ?></p>
        </div>

        <h3>Order Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order->orderDetails as $item) : ?>
                    <tr>
                        <td><img src="view/JS/img/<?= $item['productImage'] ?>" alt="<?= $item['productName'] ?>"></td>
                        <td><?= $item['productName'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-price">
            <strong>Total Price:</strong> $<?= number_format($order->getTotalPrice(), 2) ?>

        </div>
  <!-- Back Button -->
        <div class="back-button">
            <a href="<?= href('order', 'orderHistory') ?>" class="btn">
                <i class="ri-arrow-left-line"></i> Back to Order History
            </a>
        </div>
    <?php else : ?>
        <p>Order not found.</p>
    <?php endif; ?>
</div>
