<!--==================== MAIN CONTENT ====================-->

<style>
  .alert {
    padding: 1rem 2rem;
    margin: 1rem auto 2rem;
    /* Adjust margin as needed */
    border-radius: 8px;
    text-align: center;
    font-weight: 500;
    max-width: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    /* Make the alert take up the full width of its container */
    box-sizing: border-box;
    /* Include padding and border in the element's total width and height */
  }

  .alert i {
    font-size: 1.2rem;
  }

  .alert.success {
    color: #155724;
    background-color: #d4edda;
  }

  .alert.error {
    color: #721c24;
    background-color: #f8d7da;
  }
</style>
<main class="main">
  <!--==================== LOGIN SECTION ====================-->
  <section class="login-section">
  
        <?php echo $this->getError('alert1'); ?>

  
    <div class="login__container container">


      <form action="<?= href('user', 'authenticate') ?>" method="POST" class="login__form">

        <h2 class="login__title">Login</h2>

        <div class="login__group">
          <label for="email" class="login__label">Email</label>
          <div class="login__input-group">
            <i class="fas fa-envelope login__icon"></i>
            <input type="email" id="email" name="email" class="login__input" placeholder="Enter Email" required>
          </div>
        </div>

        <div class="login__group">
          <label for="password" class="login__label">Password</label>
          <div class="login__input-group">
            <i class="fas fa-lock login__icon"></i>
            <input type="password" id="password" name="pass" class="login__input" placeholder="Enter Password" required>
          </div>
        </div>
        <div class="login__group">
          <input type="checkbox" id="save" name="save" value="true">
          <label for="save" class="login__label">Remember me</label>
        </div>
        <button type="submit" class="login__button button">Login</button>

        <p class="login__register">
          Don't have an account? <a href="<?= href('user', 'addNewUser') ?>">Register</a>
        </p>
        <!-- Social Login Options -->
        <div class=" login__social">
          <p>Or login with</p>
          <div class="login__social-icons">
            <a href="#" class="login__social-icon google">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="login__social-icon facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="login__social-icon instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="login__social-icon twitter">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        </div>
      </form>
    </div>
  </section>
</main>