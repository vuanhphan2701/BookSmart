<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--=============== FAVICON ===============-->
  <link
    rel="shortcut icon"
    href="view/JS/img/favicon.png"
    type="image/x-icon" />

  <!--=============== REMIXICONS ===============-->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" />

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="view/JS/css/swiper-bundle.min.css" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="view/JS/css/styles.css" />

  <link
    href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
    rel="stylesheet" />

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!--=============== FONTAWESOME ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <title>BOOKSMART</title>


</head>


<body
  data-add-to-cart-url="<?= href('product', 'ajaxAddToCart') ?>"
  data-add-to-wishlist-url="<?= href('product', 'ajaxAddToWishlist') ?>">
  <?php
  include('widgets/Head.php');
  include($view . '.php');
  include('widgets/Footer.php');
  ?>
  <!--==================== CHATBOT ====================-->
  <div class="chatbox-wrapper">
    <div class="chatbox-toggle">
      <i class="bx bx-message-dots"></i>
    </div>
    <div class="chatbox-message-wrapper">
      <div class="chatbox-message-header">
        <div class="chatbox-message-profile">
          <img
            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
            alt=""
            class="chatbox-message-image" />
          <div>
            <h2 class="chatbox-message-name">Ben Hanscom</h2>
            <p class="chatbox-message-status">online</p>
          </div>
        </div>
      </div>
      <div class="chatbox-message-content">
        <h4 class="chatbox-message-no-message">
          You don't have message yet!
        </h4>
      </div>
      <div class="chatbox-message-bottom">
        <form action="#" class="chatbox-message-form">
          <textarea
            rows="1"
            placeholder=""
            class="chatbox-message-input"></textarea>
          <button type="submit" class="chatbox-message-submit">
            <i class="bx bx-send"></i>
          </button>
        </form>
      </div>
    </div>
  </div>

  <!--========== SCROLL UP ==========-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-line"></i>
  </a>

  <!--=============== SCROLLREVEAL ===============-->
  <script src="view/JS/js/scrollreveal.min.js"></script>

  <!--=============== SWIPER JS ===============-->
  <script src="view/JS/js/swiper-bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="view/JS/js/main.js"></script>




  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // cart
    $(document).ready(function() {

      // --- AJAX Add to Cart ---
      // Target forms with a specific class, e.g., 'ajax-add-to-cart-form'
      // Ensure your forms in home.php, list.php, detail.php etc. have this class.
      $(document).on('submit', '.ajax-add-to-cart-form', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var formData = form.serialize(); // Get form data
        formData += '&ajax=true'; // Add the AJAX flag

        // Optional: Add a visual indicator (e.g., spinner)
        var submitButton = form.find('button[type="submit"]');
        var originalButtonContent = submitButton.html();
        submitButton.html('<i class="ri-loader-4-line ri-spin"></i>').prop('disabled', true);


        $.ajax({
          url: '<?= href('product', 'cart') ?>', // The URL to your cart action
          type: 'POST',
          dataType: 'json', // Expect JSON response
          data: formData,
          success: function(response) {
            if (response.success) {
              // Update header cart count
              $("#cart-count").text(response.cartCount);

              // Provide user feedback (e.g., temporary message)
              // You can replace this alert with a more sophisticated notification
              alert(response.message || 'Item added to cart!');

              // Optional: Animate the cart icon briefly
              $("#cart-link").addClass('shake'); // Assuming your cart link has id="cart-link"
              setTimeout(function() {
                $("#cart-link").removeClass('shake');
              }, 500);


            } else {
              // Handle errors (e.g., product already exists if you check for that)
              alert(response.message || 'Could not add item to cart.');
            }
          },
          error: function(xhr, status, error) {
            console.error("AJAX Add to Cart Error:", status, error);
            alert('An error occurred while adding the item to the cart.');
          },
          complete: function() {
            // Restore button state
            submitButton.html(originalButtonContent).prop('disabled', false);
          }
        });
      });

      // --- Optional: CSS for cart icon shake ---
      /* Add this to your CSS file */
      /*
      @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
      }
      .shake {
        animation: shake 0.5s ease-in-out;
      }
      */

      // --- Initial fetch of counts on page load ---
      function updateHeaderCounts() {
        $.ajax({
          url: '<?= href('product', 'ajaxGetCounts') ?>',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              $("#cart-count").text(response.cartCount);
              $("#wishlist-count").text(response.wishlistCount); // Assuming you have #wishlist-count
            }
          },
          error: function(xhr, status, error) {
            console.error("AJAX Get Counts Error:", status, error);
          }
        });
      }
      // Call on initial load
      updateHeaderCounts();


    }); // End document ready
    //prefer
    $(document).ready(function() {

      // --- AJAX Add to Wishlist ---
      // Use event delegation in case content is loaded dynamically
      $(document).on('submit', '.add-to-wishlist-form', function(e) {
        e.preventDefault(); // Prevent the default form submission (page reload)

        var form = $(this);
        var formData = form.serializeArray(); // Get form data as an array
        var postData = {}; // Convert to object

        // Convert array to object and add ajax=true flag
        $.each(formData, function(i, field) {
          postData[field.name] = field.value;
        });
        postData['ajax'] = 'true'; // Add the flag for the controller

        var wishlistButton = form.find('button[type="submit"], button'); // Find the button within the form
        var originalButtonIcon = wishlistButton.html(); // Store original icon/text

        // Optional: Provide visual feedback (e.g., disable button, show spinner)
        wishlistButton.prop('disabled', true).html('<i class="ri-loader-4-line ri-spin"></i>'); // Example spinner

        $.ajax({
          url: form.attr('action'), // Get URL from form's action attribute
          type: 'POST',
          dataType: 'json',
          data: postData, // Send the data object
          success: function(response) {
            // Display message using alert (or a nicer notification)
            alert(response.message);

            // Update header wishlist count
            if (response.hasOwnProperty('wishlistCount')) {
              $("#wishlist-count").text(response.wishlistCount);
            }

            // Optional: Change button icon briefly on success
            if (response.success) {
              wishlistButton.html('<i class="ri-check-line"></i>'); // Show checkmark
              // Maybe change back after a delay or leave it
            } else if (response.alreadyExists) {
              // Optional: Indicate it's already added (e.g., filled heart)
              wishlistButton.html('<i class="ri-heart-fill"></i>'); // Example: Filled heart
            } else {
              // Revert icon on other errors
              wishlistButton.html(originalButtonIcon);
            }

            // Re-enable button after a short delay (or immediately if preferred)
            setTimeout(function() {
              // Decide whether to keep the success/alreadyExists icon or revert
              // Reverting after a delay:
              // wishlistButton.prop('disabled', false).html(originalButtonIcon);

              // Keeping the new icon (check or filled heart) but enabling:
              wishlistButton.prop('disabled', false);

              // If you want to always revert after success/already exists:
              if (response.success || response.alreadyExists) {
                // Maybe revert after a longer delay if showing checkmark
                // setTimeout(() => { wishlistButton.prop('disabled', false).html(originalButtonIcon); }, 1500);
              } else {
                wishlistButton.prop('disabled', false); // Re-enable immediately on other errors
              }

            }, 500); // Adjust delay as needed

          },
          error: function(xhr, status, error) {
            console.error("AJAX Wishlist Error:", error);
            alert("An error occurred. Could not add item to wishlist.");
            // Re-enable button and revert icon on AJAX error
            wishlistButton.prop('disabled', false).html(originalButtonIcon);
          }
        });
      });

      // --- Other existing JS code (like cart quantity, delete buttons, etc.) ---
      // ... make sure your existing cart/wishlist delete AJAX code is also here ...

    });
  </script>
</body>

</html>