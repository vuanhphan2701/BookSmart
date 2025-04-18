 <!--==================== MAIN ====================-->
<style>
    .alert {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    width: 100%;
    margin: 20px 0;
}

.error {
    /* background:rgb(163, 217, 136); */
    color: black;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    max-width: 400px; /* Giới hạn chiều rộng để không bị quá dài */
}

</style>
 <main class="main">
     <!--==================== CHANGE PASSWORD ====================-->
     <section class="change-password section" id="change-password">
         <div class="alert">
             <div class="error">
                 <?php echo $this->getError('alert1') ?>

             </div>
         </div>

         <div class="change-password__container container">
             <!-- Change Password Header -->

             <header class="change-password__header">
                 <h2 class="change-password__title">Change Password</h2>
                 <p class="change-password__subtitle">
                     Update your password for better security.
                 </p>
             </header>
             <!-- Change Password Form -->
             <form class="" action="<?= href('user', 'updatePassword') ?>" id="change-password-form" method="post">

                 <div class="form-group">
                     <label for="current-password">Current Password</label>
                     <input
                         type="password"
                         id="current-password"
                         name="currentPassword"
                         placeholder="Enter your current password"
                         required />
                 </div>
                 <div class="form-group">
                     <label for="newPassword">New Password</label>
                     <input
                         type="password"
                         id="newPassword"
                         name="newPassword"
                         placeholder="Enter your new password"
                         required />
                 </div>
                 <div class="form-group">
                     <label for="confirm-password">Confirm New Password</label>
                     <input
                         type="password"
                         id="confirm-password"
                         name="confirmPassword"
                         placeholder="Confirm your new password"
                         required />
                 </div>
                 <div class="form-group">
                     <button type="submit" class="change-password__button">
                         Change Password
                     </button>
                     <a href="<?= href('user', 'checkProfile') ?>">
                         <button
                             type="button"
                             class="change-password__button cancel-button">
                             Cancel
                         </button>
                     </a>
                 </div>
             </form>
         </div>
     </section>
 </main>
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const password = document.getElementById("newPassword");
         const confirmPassword = document.getElementById("confirmPassword");
         const registerForm = document.getElementById("change-password-form");

         registerForm.addEventListener("submit", function(event) {
             if (password.value !== confirmPassword.value) {
                 event.preventDefault(); // Prevent form submission
                 alert("Passwords do not match. Please try again.");
                 confirmPassword.focus();
             }
         });
     });
 </script>