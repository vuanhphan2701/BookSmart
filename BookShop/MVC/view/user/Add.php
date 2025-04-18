<main class="main">
  <!--==================== REGISTER SECTION ====================-->
  <section class="register-section">
    <div class="register__container container">
      <div class="alert">
        <div class="error">
          <?php echo $this->getError('alert1'); ?>

        </div>
      </div>
      <form action="<?= href('user', 'addNewUser') ?>" method="POST" class="register__form" id="registerForm" enctype="multipart/form-data">
        <h2 class="register__title">Create an Account</h2>
        <!-- avt Field -->
        <div class="register__group">
          <label for="avt" class="register__label">Avata</label>
          <div class="register__input-group">
            <input type="file" id="avt" name="avt" class="register__input" />
          </div>

        </div>
        <!-- Full Name Field -->
        <div class="register__group">
          <label for="fullname" class="register__label">Full Name</label>
          <div class="register__input-group">
            <i class="fas fa-user register__icon"></i>
            <input type="text" id="fullname" name="name" class="register__input" placeholder="Enter Full Name" required />
          </div>

        </div>

        <!-- Email Field -->
        <div class="register__group">
          <label for="email" class="register__label">Email</label>
          <div class="register__input-group">
            <i class="fas fa-envelope register__icon"></i>
            <input type="email" id="email" name="email" class="register__input" placeholder="Enter Email" required />
          </div>

        </div>
        <!-- user_name Field -->


        <!-- Password Field -->
        <div class="register__group">
          <label for="password" class="register__label">Password</label>
          <div class="register__input-group">
            <i class="fas fa-lock register__icon"></i>
            <input type="password" id="password" name="password" class="register__input" placeholder="Enter Password" required />
          </div>

        </div>

        <!-- Confirm Password Field -->
        <div class="register__group">
          <label for="confirm-password" class="register__label">Confirm Password</label>
          <div class="register__input-group">
            <i class="fas fa-lock register__icon"></i>
            <input type="password" id="confirm-password" name="confirm-password" class="register__input" placeholder="Confirm Password" required />
          </div>

        </div>


        <!-- Terms and Conditions Checkbox -->
        <div class="register__group register__checkbox">
          <input type="checkbox" id="terms" required />
          <label for="terms">I agree to the <a href="#">Terms & Conditions</a></label>
        </div>

        <!-- Register Button -->
        <button type="submit" class="register__button button">Sign Up</button>

        <!-- Social Registration -->
        <div class="register__social">
          <p>Or sign up with</p>
          <div class="register__social-icons">
            <a href="#" class="register__social-icon google">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="register__social-icon facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="register__social-icon instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="register__social-icon twitter">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        </div>

        <!-- Already have an account? -->
        <p class="register__login">
          Already have an account? <a href="<?= href('user', 'authenticate') ?>">Sign In</a>
        </p>
      </form>
    </div>
  </section>
</main>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", function(event) {
      if (password.value !== confirmPassword.value) {
        event.preventDefault(); // Ngăn form submit
        alert("Passwords do not match. Please try again.");
        confirmPassword.focus();
      }
    });
  });
</script>