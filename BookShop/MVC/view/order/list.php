<style>
  /* Enhanced styles for Orders Management */
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

  /* Page Layout */
  .page-inner {
    padding: 1.5rem;
    animation: fadeIn 0.5s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .page-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
  }

  .page-title {
    margin-bottom: 0;
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--text-dark);
    position: relative;
  }

  .page-title::after {
    content: '';
    position: absolute;
    bottom: -0.5rem;
    left: 0;
    width: 50px;
    height: 3px;
    background-color: var(--primary);
    border-radius: 3px;
  }

  /* Breadcrumbs */
  .breadcrumbs {
    display: flex;
    align-items: center;
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    margin-left: auto;
    font-size: 0.875rem;
  }

  .breadcrumbs li {
    display: flex;
    align-items: center;
  }

  .breadcrumbs a {
    color: var(--text-muted);
    text-decoration: none;
    transition: var(--transition);
    padding: 0.25rem 0.5rem;
    border-radius: var(--border-radius);
  }

  .breadcrumbs a:hover {
    color: var(--primary);
    background-color: rgba(94, 114, 228, 0.1);
  }

  .separator {
    margin: 0 0.25rem;
    color: var(--text-muted);
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
    border-radius: 0.375rem;
    box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
    margin-bottom: 1.5rem;
  }

  .card:hover {
    box-shadow: 0 1rem 2rem rgba(18, 38, 63, 0.05);
    transform: translateY(-2px);
  }

  .card-header {
    padding: 1.25rem 1.5rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .card-title {
    margin-bottom: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #172b4d;
  }

  .card-body {
    flex: 1 1 auto;
    padding: 1.5rem;
  }

  /* Button Styles */
  .btn {
    display: inline-block;
    font-weight: 600;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: all 0.15s ease-in-out;
    cursor: pointer;
    gap: 0.5rem;
  }

  .btn-primary {
    color: #fff;
    background-color: #5e72e4;
    border-color: #5e72e4;
  }

  .btn-primary:hover {
    color: #fff;
    background-color: #485fe0;
    border-color: #3d55df;
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
  }

  .btn-info {
    color: #fff;
    background-color: #11cdef;
    border-color: #11cdef;
  }

  .btn-info:hover {
    color: #fff;
    background-color: #0fb5d4;
    border-color: #0fb5d4;
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
  }

  .btn-danger {
    color: #fff;
    background-color: #f5365c;
    border-color: #f5365c;
  }

  .btn-danger:hover {
    color: #fff;
    background-color: #f31a43;
    border-color: #ec0c38;
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
  }

  .btn-round {
    border-radius: 30px;
  }

  .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    line-height: 1.5;
    border-radius: 0.2rem;
  }

  .btn i {
    font-size: 0.875rem;
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
    transition: all 0.15s ease;
  }

  .badge.bg-success {
    background-color: #2dce89 !important;
    color: white;
  }

  .badge.bg-dark {
    background-color: #172b4d !important;
    color: white;
  }

  .badge.bg-warning {
    background-color: var(--warning) !important;
    color: white;
  }

  /* Table Styles */
  .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #525f7f;
    vertical-align: top;
    border-color: #e9ecef;
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

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.02);
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.03);
  }

  .table-bordered {
    border: 1px solid var(--border-color);
  }

  .table-bordered th,
  .table-bordered td {
    border: 1px solid var(--border-color);
  }

  /* Order Details Styles */
  .details-row {
    background-color: transparent !important;
  }

  .collapse {
    transition: height 0.35s ease;
  }

  .order-details-container {
    padding: 1.5rem;
    background-color: #f8f9fe;
    border-top: 1px solid #e9ecef;
    border-bottom: 1px solid #e9ecef;
    animation: fadeIn 0.3s ease;
  }

  .order-details-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #e9ecef;
  }

  .order-details-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #5e72e4;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  /* Product Image */
  .product-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 0.25rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: all 0.3s ease;
  }

  .product-image:hover {
    transform: scale(1.1);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
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
    transition: all 0.15s ease;
    background-color: #f8f9fe;
    color: #8898aa;
    border: 1px solid #e9ecef;
  }

  .status-filter:hover {
    background-color: rgba(94, 114, 228, 0.1);
    color: #5e72e4;
  }

  .status-filter.active {
    background-color: #5e72e4;
    color: white;
    border-color: #5e72e4;
  }

  /* DataTables Customization */
  .dataTables_wrapper .dataTables_length select {
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--text-primary);
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    appearance: none;
  }

  .dataTables_wrapper .dataTables_filter input {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--text-primary);
    background-color: #fff;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .dataTables_wrapper .dataTables_filter input:focus {
    border-color: var(--primary);
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.375rem 0.75rem;
    margin-left: 0.25rem;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    background-color: #fff;
    color: var(--text-primary) !important;
    transition: var(--transition);
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: var(--light-subtle);
    border-color: var(--border-color);
    color: var(--primary) !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: var(--primary);
    border-color: var(--primary);
    color: white !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
    color: white !important;
  }

  /* Utility Classes */
  .d-flex {
    display: flex !important;
  }

  .align-items-center {
    align-items: center !important;
  }

  .justify-content-between {
    justify-content: space-between !important;
  }

  .ml-auto {
    margin-left: auto !important;
  }

  .mr-2 {
    margin-right: 0.5rem !important;
  }

  .mb-3 {
    margin-bottom: 1rem !important;
  }

  .p-0 {
    padding: 0 !important;
  }

  .p-3 {
    padding: 1rem !important;
  }

  .text-end {
    text-align: right !important;
  }

  .text-primary {
    color: #5e72e4 !important;
  }

  .fw-bold {
    font-weight: 600 !important;
  }

  .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
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
    background-color: #2dce89;
    box-shadow: 0 0 0 2px rgba(45, 206, 137, 0.2);
  }

  .status-indicator.status-pending::before {
    background-color: #172b4d;
    box-shadow: 0 0 0 2px rgba(23, 43, 77, 0.2);
  }

  /* Animation for row expansion */
  @keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .animate-slide-down {
    animation: slideDown 0.3s ease forwards;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .page-header {
      flex-direction: column;
      align-items: flex-start;
    }

    .breadcrumbs {
      margin-left: 0;
      margin-top: 1rem;
    }

    .card-header {
      flex-direction: column;
      align-items: flex-start;
    }

    .card-header .btn {
      margin-left: 0;
      margin-top: 1rem;
    }

    .status-filters {
      justify-content: flex-start;
    }
    
    .order-summary {
      flex-direction: column;
    }
  }

  /* Tooltip styles */
  .tooltip {
    position: relative;
    display: inline-block;
  }

  .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: var(--dark);
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
    font-size: 0.75rem;
    font-weight: normal;
  }

  .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: var(--dark) transparent transparent transparent;
  }

  .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
  }

  /* Order summary card */
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
    border-radius: 0.375rem;
    padding: 1.25rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    position: relative;
    border-left: 4px solid #5e72e4;
  }

  .summary-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow);
  }

  .summary-card.total-orders {
    border-left-color: #5e72e4;
  }

  .summary-card.total-revenue {
    border-left-color: #2dce89;
  }

  .summary-card.pending-orders {
    border-left-color: #172b4d;
  }

  .summary-card.paid-orders {
    border-left-color: #11cdef;
  }

  .summary-title {
    font-size: 0.875rem;
    color: #8898aa;
    margin-bottom: 0.5rem;
  }

  .summary-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #32325d;
  }

  .summary-icon {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2rem;
    opacity: 0.1;
    color: #32325d;
  }

  /* Export button animation */
  .btn-export {
    position: relative;
    overflow: hidden;
  }

  .btn-export::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255, 255, 255, 0.5);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
  }

  @keyframes ripple {
    0% {
      transform: scale(0, 0);
      opacity: 0.5;
    }
    100% {
      transform: scale(20, 20);
      opacity: 0;
    }
  }

  .btn-export:focus:not(:active)::after {
    animation: ripple 1s ease-out;
  }
</style>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Orders Management</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?= href('admin', 'dashboard') ?>">
          <i class="fas fa-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="fas fa-angle-right"></i>
      </li>
      <li class="nav-item">
        <a href="#">Orders</a>
      </li>
      <li class="separator">
        <i class="fas fa-angle-right"></i>
      </li>
      <li class="nav-item">
        <a href="#">List Orders</a>
      </li>
    </ul>
  </div>

  <!-- Order Summary Cards -->
  <div class="order-summary">
    <div class="summary-card total-orders">
      <div class="summary-title">Total Orders</div>
      <div class="summary-value"><?= count($orders) ?></div>
      <i class="fas fa-shopping-cart summary-icon"></i>
    </div>
    
    <div class="summary-card total-revenue">
      <div class="summary-title">Total Revenue</div>
      <div class="summary-value">$<?= number_format(array_sum(array_map(function($order) { return $order->getTotalPrice(); }, $orders)), 2) ?></div>
      <i class="fas fa-dollar-sign summary-icon"></i>
    </div>
    
    <div class="summary-card pending-orders">
      <div class="summary-title">Pending Orders</div>
      <div class="summary-value"><?= count(array_filter($orders, function($order) { return $order->getOrderStatus() != '1'; })) ?></div>
      <i class="fas fa-clock summary-icon"></i>
    </div>
    
    <div class="summary-card paid-orders">
      <div class="summary-title">Paid Orders</div>
      <div class="summary-value"><?= count(array_filter($orders, function($order) { return $order->getOrderStatus() == '1'; })) ?></div>
      <i class="fas fa-check-circle summary-icon"></i>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <?php
      // $alert = new userController;
      // echo $alert->getError('alert');
      ?>
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Orders List</h4>
            <button class="btn btn-primary btn-round ml-auto" id="exportOrdersBtn">
              <i class="fas fa-file-export"></i>
              Export Orders
            </button>
          </div>
        </div>
        <div class="card-body">
          <!-- Status Filters -->
          <div class="status-filters">
            <div class="status-filter active" data-status="all">All Orders</div>
            <div class="status-filter" data-status="paid">Paid Orders</div>
            <div class="status-filter" data-status="pending">Pending Orders</div>
          </div>
          
          <div class="table-responsive">
            <table id="orders-table" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>User ID</th>
                  <th>Total Price</th>
                  <th>Order Status</th>
                  <th>Created At</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($orders as $order) {
                  $userId = $order->getUserId();
                  $user = isset($users[$userId]) ? $users[$userId] : null;
                  $orderStatus = $order->getOrderStatus() == '1' ? 'paid' : 'pending';
                ?>
                  <tr data-status="<?= $orderStatus ?>">
                    <td><?= $order->getId() ?></td>
                    <td>
                      <a href="<?= href('user', 'checkProfile') ?>&id=<?php echo $userId ?>" class="text-primary fw-bold">
                        <?php echo $userId ?>
                      </a>
                    </td>
                    <td>
                      <span class="fw-bold">$<?= number_format($order->getTotalPrice(), 2) ?></span>
                    </td>
                    <td>
                      <?php if ($order->getOrderStatus() == '1'): ?>
                        <span class="badge bg-success status-indicator status-paid">Paid</span>
                      <?php else: ?>
                        <span class="badge bg-dark status-indicator status-pending">Pending</span>
                      <?php endif; ?>
                    </td>
                    <td><?= date('M d, Y H:i', strtotime($order->getCreatedAt())) ?></td>
                    <td>
                      <div class="d-flex">
                        <button class="btn btn-info btn-sm mr-2 view-details-btn" type="button" data-bs-toggle="collapse" data-bs-target="#order-details-<?= $order->getId() ?>" aria-expanded="false" aria-controls="order-details-<?= $order->getId() ?>">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="<?php echo href('order', 'deletePermanently') ?>&id=<?php echo $order->getId() ?>" class="btn btn-danger btn-sm delete-order-btn" onclick="return confirm('Are you sure you want to delete this order?')">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr class="details-row">
                    <td colspan="6" class="p-0">
                      <div class="collapse" id="order-details-<?= $order->getId() ?>">
                        <div class="order-details-container">
                          <div class="order-details-header">
                            <h5 class="order-details-title">
                              <i class="fas fa-info-circle"></i> Order Details #<?= $order->getId() ?>
                            </h5>
                            <button type="button" class="btn btn-sm btn-primary print-order" data-order-id="<?= $order->getId() ?>">
                              <i class="fas fa-print"></i> Print Order
                            </button>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                              <thead>
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
                                           alt="<?= $detail['productName'] ?>" 
                                           class="product-image" />
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
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Initialize DataTable
    const ordersTable = $('#orders-table').DataTable({
      "pageLength": 10,
      "responsive": true,
      "order": [[ 0, "desc" ]],
      "language": {
        "searchPlaceholder": "Search orders...",
        "sSearch": "",
        "lengthMenu": "Show _MENU_ orders per page",
      }
    });
    
    // Enhance DataTable styling
    $('.dataTables_length select').addClass('form-select form-select-sm');
    $('.dataTables_filter input').addClass('form-control form-control-sm');
    
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
      } else {
        // Hide all rows first
        $('tr[data-status]').hide();
        // Show only rows with matching status
        $(`tr[data-status="${status}"]`).show();
      }
      
      // Hide all expanded details when filtering
      $('.collapse').collapse('hide');
    });
    
    // View order details button functionality
    $('.view-details-btn').on('click', function() {
      const targetId = $(this).data('bs-target');
      
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
    
    // Export orders functionality
    $('#exportOrdersBtn').on('click', function() {
      // Create CSV content
      let csvContent = "data:text/csv;charset=utf-8,";
      csvContent += "Order ID,User ID,Total Price,Status,Created At\n";
      
      // Add visible rows to CSV
      $('#orders-table tbody tr:visible:not(.details-row)').each(function() {
        const cells = $(this).find('td');
        if (cells.length > 0) {
          const orderId = $(cells[0]).text().trim();
          const userId = $(cells[1]).text().trim();
          const totalPrice = $(cells[2]).text().trim();
          const status = $(cells[3]).text().trim();
          const createdAt = $(cells[4]).text().trim();
          
          csvContent += `${orderId},${userId},${totalPrice},${status},${createdAt}\n`;
        }
      });
      
      // Create download link
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", `orders_export_${new Date().toISOString().slice(0,10)}.csv`);
      document.body.appendChild(link);
      
      // Trigger download
      link.click();
      document.body.removeChild(link);
      
      // Show success message
      alert('Orders exported successfully!');
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
  });
</script>