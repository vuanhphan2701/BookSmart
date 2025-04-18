<style>
    /* Enhanced styles for user profile */
    :root {
        --primary: #5e72e4;
        --primary-dark: #4a5cd0;
        --success: #2dce89;
        --info: #11cdef;
        --warning: #fb6340;
        --danger: #f5365c;
        --dark: #172b4d;
        --light: #f8f9fe;
        --light-subtle: #f6f9fc;
        --border-color: #e9ecef;
        --text-muted: #8898aa;
        --text-primary: #525f7f;
        --text-dark: #32325d;
        --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        --transition: all 0.2s ease;
        --border-radius: 0.375rem;
        --border-radius-lg: 0.5rem;
        --border-radius-xl: 1rem;
    }

    /* Card Styles */
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0;
        border-radius: var(--border-radius-lg);
        box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        margin-bottom: 1.5rem;
        transition: var(--transition);
        overflow: hidden;
    }

    .card:hover {
        box-shadow: 0 1rem 2rem rgba(18, 38, 63, 0.05);
        transform: translateY(-2px);
    }

    .card-header {
        padding: 1.25rem 1.5rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid var(--border-color);
    }

    .card-title {
        margin-bottom: 0;
        font-weight: 600;
        color: var(--text-dark);
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.5rem;
    }

    /* Profile Section */
    .profile-section {
        position: relative;
        padding-top: 2rem;
        padding-bottom: 2rem;
        background: linear-gradient(150deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--border-radius) var(--border-radius) 0 0;
        margin-bottom: 2rem;
    }

    .profile-image-container {
        position: relative;
        margin-bottom: 1rem;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: var(--shadow);
        border-radius: 50%;
        transition: var(--transition);
    }

    .profile-image:hover {
        transform: scale(1.05);
        box-shadow: var(--shadow-lg);
    }

    .profile-name {
        color: #fff;
        font-weight: 700;
        margin-bottom: 0.25rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-email {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1rem;
        margin-bottom: 0;
    }

    /* User Details */
    .user-details-card {
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .user-details-card:hover {
        box-shadow: var(--shadow);
    }

    .user-details-title {
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--border-color);
        position: relative;
    }

    .user-details-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 50px;
        height: 2px;
        background-color: var(--primary);
    }

    .list-group-item {
        padding: 1rem 1.25rem;
        border-color: var(--border-color);
        transition: var(--transition);
    }

    .list-group-item:hover {
        background-color: var(--light-subtle);
    }

    .list-group-label {
        color: var(--primary);
        font-weight: 600;
        margin-right: 0.5rem;
    }

    .list-group-value {
        color: var(--text-dark);
        font-weight: 500;
        font-size: 1rem;
    }

    /* Badge Styles */
    .badge {
        display: inline-block;
        padding: 0.5em 0.75em;
        font-size: 0.75rem;
        font-weight: 600;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 30px;
        transition: var(--transition);
    }

    .badge.bg-success {
        background-color: var(--success) !important;
        color: white;
    }

    .badge.bg-dark {
        background-color: var(--dark) !important;
        color: white;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: var(--border-radius);
        transition: all 0.15s ease;
        cursor: pointer;
        gap: 0.5rem;
    }

    .btn-info {
        color: #fff;
        background-color: var(--info);
        border-color: var(--info);
    }

    .btn-info:hover {
        background-color: #0fb5d4;
        border-color: #0fb5d4;
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        transform: translateY(-1px);
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.75rem;
        border-radius: 0.2rem;
    }

    /* Table Styles */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: var(--text-primary);
        vertical-align: middle;
        border-color: var(--border-color);
    }

    .table th, 
    .table td {
        padding: 1rem;
        vertical-align: middle;
        border-top: 1px solid var(--border-color);
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid var(--border-color);
        background-color: var(--light-subtle);
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }

    .table-hover tbody tr {
        transition: var(--transition);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(94, 114, 228, 0.05);
    }

    .table-dark {
        --bs-table-bg: var(--dark);
        --bs-table-striped-bg: #2c3c5d;
        --bs-table-striped-color: #fff;
        --bs-table-active-bg: #3b4d71;
        --bs-table-active-color: #fff;
        --bs-table-hover-bg: #334466;
        --bs-table-hover-color: #fff;
        color: #fff;
        border-color: #3b4d71;
    }

    .table-light {
        --bs-table-bg: var(--light);
        --bs-table-striped-bg: #ecedee;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #dfe0e1;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #e5e6e7;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #dfe0e1;
    }

    /* Order Details */
    .collapse-details {
        background-color: var(--light-subtle);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-top: 0.5rem;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Product Image */
    .product-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .product-image:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow);
    }

    /* Order Status Indicator */
    .status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-indicator::before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .status-indicator.status-paid::before {
        background-color: var(--success);
        box-shadow: 0 0 0 2px rgba(45, 206, 137, 0.2);
    }

    .status-indicator.status-pending::before {
        background-color: var(--dark);
        box-shadow: 0 0 0 2px rgba(23, 43, 77, 0.2);
    }

    /* Status Filters */
    .status-filters {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
        flex-wrap: wrap;
    }

    .status-filter {
        padding: 0.5rem 1rem;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        background-color: var(--light);
        color: var(--text-muted);
        border: 1px solid var(--border-color);
    }

    .status-filter:hover {
        background-color: rgba(94, 114, 228, 0.1);
        color: var(--primary);
    }

    .status-filter.active {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    /* Orders Section */
    .orders-section {
        margin-top: 2rem;
    }

    .orders-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        text-align: center;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .orders-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background-color: var(--primary);
        border-radius: 3px;
    }

    /* Order Summary Cards */
    .order-summary {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .summary-card {
        flex: 1;
        min-width: 200px;
        background-color: #fff;
        border-radius: var(--border-radius);
        padding: 1.25rem;
        box-shadow: var(--shadow-sm);
        position: relative;
        border-left: 4px solid var(--primary);
    }

    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
    }

    .summary-card.total-orders {
        border-left-color: var(--primary);
    }

    .summary-card.total-spent {
        border-left-color: var(--success);
    }

    .summary-card.pending-orders {
        border-left-color: var(--dark);
    }

    .summary-card.paid-orders {
        border-left-color: var(--info);
    }

    .summary-title {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
    }

    .summary-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
    }

    .summary-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 2rem;
        opacity: 0.1;
        color: var(--text-dark);
    }

    /* Alert Styles */
    .alert {
        position: relative;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: var(--border-radius);
    }

    .alert-info {
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-section {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .profile-image {
            width: 120px;
            height: 120px;
        }

        .order-summary {
            flex-direction: column;
        }
    }
</style>

<?php
defined('BASE') or exit('access deny');
//dd($user);

$alert = new userController;
echo $alert->getError('alert');

// Calculate order statistics
$totalOrders = count($orders);
$totalSpent = array_sum(array_map(function($order) { return $order->getTotalPrice(); }, $orders));
$pendingOrders = count(array_filter($orders, function($order) { return $order->getOrderStatus() != '1'; }));
$paidOrders = count(array_filter($orders, function($order) { return $order->getOrderStatus() == '1'; }));
?>

<div class="col-md-12">
    <div class="card">
        <!-- Profile Header Section -->
        <div class="profile-section text-center">
            <div class="profile-image-container">
                <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $user->getImage() ? $user->getImage() : 'BookShop/MVC/public/images/noimg.jpg' ?>'
                    class="profile-image"
                    alt="User Profile Image">
            </div>
            <h2 class="profile-name"><?= $user->getName() ?></h2>
            <p class="profile-email"><?= $user->getEmail() ?></p>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- User Details -->
                <div class="col-md-12">
                    <div class="user-details-card">
                        <div class="card-body">
                            <h4 class="user-details-title">User Information</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="list-group-label">Username:</span>
                                    <span class="list-group-value"><?php echo $user->getName() ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="list-group-label">Gender:</span>
                                    <span class="list-group-value">
                                        <img src="/BOOKSMART/BookShop/MVC/view/JS/img/<?= $user->getGender()?>.jpg"
                                            width="40px"
                                            class='img-fluid rounded-circle'>
                                        </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="list-group-label">Phone:</span>
                                    <span class="list-group-value"><?= $user->getPhone() ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="list-group-label">Email:</span>
                                    <span class="list-group-value"><?= $user->getEmail() ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="list-group-label">Address:</span>
                                    <span class="list-group-value"><?= $user->getAddress() ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Orders Section -->
            <div class="orders-section">
                <h3 class="orders-title">Order History</h3>
                
                <?php if (!empty($orders)) : ?>
                    <!-- Order Summary Cards -->
                    <div class="order-summary">
                        <div class="summary-card total-orders">
                            <div class="summary-title">Total Orders</div>
                            <div class="summary-value"><?= $totalOrders ?></div>
                            <i class="fas fa-shopping-cart summary-icon"></i>
                        </div>
                        
                        <div class="summary-card total-spent">
                            <div class="summary-title">Total Spent</div>
                            <div class="summary-value">$<?= number_format($totalSpent, 2) ?></div>
                            <i class="fas fa-dollar-sign summary-icon"></i>
                        </div>
                        
                        <div class="summary-card pending-orders">
                            <div class="summary-title">Pending Orders</div>
                            <div class="summary-value"><?= $pendingOrders ?></div>
                            <i class="fas fa-clock summary-icon"></i>
                        </div>
                        
                        <div class="summary-card paid-orders">
                            <div class="summary-title">Paid Orders</div>
                            <div class="summary-value"><?= $paidOrders ?></div>
                            <i class="fas fa-check-circle summary-icon"></i>
                        </div>
                    </div>
                    
                    <!-- Status Filters -->
                    <div class="status-filters">
                        <div class="status-filter active" data-status="all">All Orders</div>
                        <div class="status-filter" data-status="paid">Paid Orders</div>
                        <div class="status-filter" data-status="pending">Pending Orders</div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="orders-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total Price</th>
                                    <th>Order Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : 
                                    $orderStatus = $order->getOrderStatus() == '1' ? 'paid' : 'pending';
                                ?>
                                    <tr data-status="<?= $orderStatus ?>">
                                        <td><?= $order->getId() ?></td>
                                        <td>$<?= number_format($order->getTotalPrice(), 2) ?></td>
                                        <td>
                                            <?php if ($order->getOrderStatus() == '1'): ?>
                                                <span class="badge bg-success status-indicator status-paid">Paid</span>
                                            <?php else: ?>
                                                <span class="badge bg-dark status-indicator status-pending">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= date('M d, Y H:i', strtotime($order->getCreatedAt())) ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm view-details-btn" 
                                                data-bs-toggle="collapse"
                                                data-bs-target="#order-details-<?= $order->getId() ?>"
                                                aria-expanded="false"
                                                aria-controls="order-details-<?= $order->getId() ?>">
                                                <i class="fas fa-eye"></i> View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="details-row">
                                        <td colspan="5" class="p-0">
                                            <div class="collapse" id="order-details-<?= $order->getId() ?>">
                                                <div class="collapse-details">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h5 class="text-primary mb-0">
                                                            <i class="fas fa-info-circle"></i> Order Details #<?= $order->getId() ?>
                                                        </h5>
                                                        <button class="btn btn-sm btn-primary print-order" data-order-id="<?= $order->getId() ?>">
                                                            <i class="fas fa-print"></i> Print Order
                                                        </button>
                                                    </div>
                                                    <table class="table table-bordered">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Detail ID</th>
                                                                <th>Product ID</th>
                                                                <th>Product Image</th>
                                                                <th>Product Name</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($order->orderDetails as $detail) : ?>
                                                                <tr>
                                                                    <td><?= $detail['detailId'] ?></td>
                                                                    <td><?= $detail['productId'] ?></td>
                                                                    <td>
                                                                        <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $detail['productImage'] ? $detail['productImage'] : 'noimg.jpg' ?>'
                                                                            class="product-image"
                                                                            alt="<?= $detail['productName'] ?>" />
                                                                    </td>
                                                                    <td class="fw-bold"><?= $detail['productName'] ?></td>
                                                                    <td>$<?= number_format($detail['price'], 2) ?></td>
                                                                    <td><?= $detail['quantity'] ?></td>
                                                                    <td class="fw-bold text-primary">$<?= number_format($detail['price'] * $detail['quantity'], 2) ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="6" class="text-end fw-bold">Order Total:</td>
                                                                <td class="fw-bold text-primary">$<?= number_format($order->getTotalPrice(), 2) ?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This user has no orders yet.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Status filter functionality
        $('.status-filter').on('click', function() {
            const status = $(this).data('status');
            
            // Update active state
            $('.status-filter').removeClass('active');
            $(this).addClass('active');
            
            // Filter the table rows based on the status
            if (status === 'all') {
                // Show all rows
                $('tr[data-status]').show();
                $('.details-row').hide(); // Hide all detail rows initially
            } else {
                // Hide all rows first
                $('tr[data-status]').hide();
                $('.details-row').hide(); // Hide all detail rows
                
                // Show only rows with matching status
                $(`tr[data-status="${status}"]`).show();
            }
            
            // Hide all expanded details when filtering
            $('.collapse').collapse('hide');
        });
        
        // View order details button functionality
        $('.view-details-btn').on('click', function() {
            const targetId = $(this).data('bs-target');
            const detailsRow = $(this).closest('tr').next('.details-row');
            
            // Toggle visibility of the details row
            if ($(targetId).hasClass('show')) {
                detailsRow.hide();
            } else {
                detailsRow.show();
            }
            
            // Toggle the collapse state
            $(targetId).collapse('toggle');
        });
        
        // Print order functionality
        $('.print-order').on('click', function() {
            const orderId = $(this).data('order-id');
            const printContents = document.getElementById(`order-details-${orderId}`).innerHTML;
            const originalContents = document.body.innerHTML;
            
            document.body.innerHTML = `
                <div style="padding: 20px;">
                    <h1 style="text-align: center; margin-bottom: 20px;">Order #${orderId} Details</h1>
                    ${printContents}
                </div>
            `;
            
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        });
        
        // Add hover effect to product images
        $('.product-image').hover(
            function() {
                $(this).css('transform', 'scale(1.2)');
            },
            function() {
                $(this).css('transform', 'scale(1)');
            }
        );
        
        // Hide all details rows initially
        $('.details-row').hide();
    });
</script>