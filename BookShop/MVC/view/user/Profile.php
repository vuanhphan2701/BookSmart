<main class="main">
  <!--==================== PROFILE ====================-->
  <section class="profile section" id="profile">
    <div class="profile__container container">
      <!-- User Profile Header -->
      <header class="profile__header">
        <img
          src="view/JS/img/<?= $_SESSION['avata'] ?>"
          alt="User Profile Picture"
          class="profile__image" />
        <div class="profile__info">
          <h2 class="profile__name"><?= $_SESSION['name'] ?></h2>
          <p class="profile__email"><?= $_SESSION['email'] ?></p>
        </div>
      </header>

      <!-- Profile Details -->
      <div class="profile__details">
        <!-- Shipping Address -->
        <a href="<?php echo href('user', 'edit') ?>&id= <?= $_SESSION['login_id'] ?>" class="profile__link">
          <article class="profile__section">
            <h3>Shipping & Billing Address</h3>
            <p>Manage your shipping and billing addresses for faster checkout.</p>
            <button type='submit' class="profile__button">Edit Address</button>
          </article>
        </a>

        <!-- Payment Methods -->
        <a href="manage-payment.html" class="profile__link">
          <article class="profile__section">
            <h3>Payment Method</h3>
            <div class="payment__method">
              <p>View and manage your saved payment methods.</p>
            </div>
            <button class="profile__button">Manage Payment</button>
          </article>
        </a>
        <!-- Account Security -->
        <a href="<?= href('user', 'changePassword') ?>" class="profile__link">
          <article class="profile__section">
            <h3>Account Security</h3>
            <p>Update your password and manage account security settings.</p>
            <button class="profile__button">Change Password</button>
          </article>
        </a>

        <!-- 🆕 New Section (Not Wishlist / Order History) -->
        <a href="<?= href('user', 'preferences') ?>" class="profile__link">
          <article class="profile__section">
            <h3>Preferences</h3>
            <p>Customize your profile settings and notifications.</p>
            <button class="profile__button">Update Preferences</button>
          </article>
        </a>
      </div>
    </div>
  </section>
</main>