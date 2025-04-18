  <!--==================== MAIN ====================-->
  <?php
  //dd($orders);
  ?>
  <main class="main">
  <?= $this->getError('alertOrder') ?>
    <!--==================== ORDERS LIST ====================-->
    <section
      class="orders section"
      aria-labelledby="orders-heading"
      id="orders">
      <div class="orders__container container">
        <!-- Order Filters & Search -->
        <div class="orders__filter">
          <!-- Search by Order ID -->
          <form action="#" class="orders__search-form" role="search">
            <!-- Using a visually hidden label for better accessibility -->
            <input
              id="order-search"
              type="text"
              placeholder="Search Order ID..."
              class="orders__search-input"
              aria-label="Search Order ID" />
            <button
              type="submit"
              class="orders__search-button"
              aria-label="Search">
              <i class="ri-search-line" aria-hidden="true"></i>
            </button>
          </form>
          <!-- Filter Options -->
          <div class="orders__filters">
            <select id="status-filter" class="orders__select">
              <option value="<?= href('order', 'orderCancel') ?>">Orders Cancel</option>
              <option value="<?= href('order', 'orderHistory') ?>">Your Orders</option>
            </select>


          
          </div>
        </div>

        <!-- Orders List -->
        <div class="orders__list">
          <!-- Order Card Example -->
          <?php
          // /  dd($orders);
          foreach ($orders as $order) { ?>

            <article
              class="order-card"
              tabindex="0"
              aria-labelledby="order-12345678-heading">
              <header class="order-card__header">
                <h3 id="order-12345678-heading">Order #<?= $order->getId() ?></h3>
              </header>
              <div class="order-card__content">
                <p><strong>Total Amount:</strong> $<?= $order->getTotalPrice() ?></p>
                <p>
                  <strong>Status:</strong>
                  <span class="status delivered" aria-label="Delivered">
                    <?php if ($order->getOrderStatus() == '1'): ?>
                      <span class="badge bg-success status-indicator status-paid">Paid</span>
                    <?php else: ?>
                      <span class="badge bg-dark status-indicator status-pending">Unpaid</span>
                    <?php endif; ?>


                  </span>
                </p>
              </div>
              <footer class="order-card__actions">
                <a
                  href="<?= href('order', 'detailOrder') ?>&id=<?= $order->getId() ?>"
                  class="order__details-button"
                  aria-label="View Details for Order 12345678">
                  View Details
                </a>
                <a
                  href="<?= href('order', 'deletePermanently')?>&id=<?= $order->getId() ?>"
                  class="cancel__order-button"
                  aria-label="Cancel Order 98765431">
                  Delete </a>
              </footer>
            </article>
          <?php } ?>
          <!-- Another Order Card Example -->

        </div>
      </div>
    </section>
  </main>
 

  <script>
    document.getElementById('status-filter').addEventListener('change', function() {
      const url = this.value;
      if (url !== 'all') {
        window.location.href = url;
      }
    });
  </script>