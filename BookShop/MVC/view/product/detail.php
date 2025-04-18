<main class="main">
  <?php
  // dd($lists);
  foreach ($lists as $item) { ?>

        <!--==================== BOOK DETAILS BANNER ====================-->
        <section class="book-detail__banner">
        <div class="book-detail__banner-container">
          <?= $this->getError('alert') ?>
          <div class="book-detail-image__banner">
            <img src="view/JS/img/banner-book--detail1.jpg" alt="Book Banner" />
          </div>
          <div class="book-detail-image__banner">
            <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
          </div>
          <div class="book-detail-image__banner">
            <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
          </div>
          <div class="book-detail-image__banner">
            <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
          </div>
          <div class="book-detail-image__banner">
            <img src="view/JS/img/banner-book--main.jpg" alt="Book Banner" />
          </div>
          <div class="book-detail-image__banner">
            <img src="view/JS/img/banner-book--detail1.jpg" alt="Book Banner" />
          </div>
        </div>
      </section>

    <!--==================== BOOK DETAILS ====================-->
    <section class="book-detail section" id="book-details">
      <div class="book-detail__container container">
        <article class="book-detail__card">
          <!-- Book Image -->
          <div class="book-detail__img">
            <img src="view/JS/img/<?= $item->getImage() ?>" alt="<?= $item->getProductName() ?>" />
          </div>

          <!-- Book Content -->
          <div class="book-detail__content">
            <!-- Title -->
            <h2 class="book-detail__title"><?= $item->getProductName() ?></h2>

            <!-- Meta Information (Ratings & Reviews) -->
            <div class="book-detail__meta">
              <div class="book-detail__rating">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
                <span>4.5</span>
              </div>
              <div class="book-detail__interaction">
                <small class="interaction-item">
                  <i class="ri-chat-1-line"></i>
                  <span>256 Reviews</span>
                </small>
                <small class="interaction-item">
                  <i class="ri-thumb-up-line"></i>
                  <span>456k Likes</span>
                </small>
              </div>
            </div>

            <!-- Price -->
            <div class="book-detail__prices">
              <span class="book-detail__price">$<?= $item->getPrice() ?></span>
            </div>

            <!-- Book Description -->
            <div class="book-detail__description">
              <h3>Description</h3>
              <p><?= $item->getDescription() ?></p>
            </div>

            <!-- Action Buttons & Quantity -->
            <div class="book-detail__actions">
              <form action="<?= href('product', 'cart') ?>" method="POST" class="ajax-add-to-cart-form">
                <input type="hidden" name="id" value="<?= $item->getId() ?>">
                <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                <input type="hidden" name="action" value="increase">

                <div style="display: flex; align-items: center; gap: 1rem;">
                  <div class="quantity">
                    <button type="button" class="button-minus">-</button>
                    <input name="quantity" value="1" class="quantity-field">
                    <button type="button" class="button-plus">+</button>
                  </div>

                  <button type="submit" class="cart-btn">
                    <i class="ri-shopping-cart-line"></i> Add to cart
                  </button>
                </div>
              </form>
              <form class="add-to-wishlist-form" action="<?= href('product', 'prefer') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $item->getId() ?>">
                  <input type="hidden" name="name" value="<?= $item->getProductName() ?>">
                  <input type="hidden" name="price" value="<?= $item->getPrice() ?>">
                  <input type="hidden" name="image" value="<?= $item->getImage() ?>">
                  <input type="hidden" name="description" value="<?= $item->getDescription() ?>">
                  <button type="submit" class="like-heart"><i class="ri-heart-3-line"></i></button>
                </form>
              
            </div>
            <!-- Book Details Information -->
            <div class="books__detail">
              <div class="detail__line">
                <strong>Book Title:</strong> <span><?php echo $item->getProductName() ? $item->getProductName() : 'no information' ?></span>
              </div>
              <div class="detail__line">
                <strong>Author:</strong> <span><?= $item->getAuthor() ? $item->getAuthor() : 'no information'  ?></span>
              </div>
              <div class="detail__line">
                <strong>ISBN:</strong> <span><?= $item->getISBN() ? $item->getISBN() : 'no information'  ?></span>
              </div>
              <div class="detail__line">
                <strong>Edition Language:</strong> <span>English</span>
              </div>
              <div class="detail__line">
                <strong>Book Format:</strong> <span><?= $item->getBookFormat() ? $item->getISBN() : 'no information' ?></span>
              </div>
              <div class="detail__line">
                <strong>Date Published:</strong> <span>August 10th, 2019</span>
              </div>
              <div class="detail__line">
                <strong>Publisher:</strong> <span><?= $item->getPublisher() ? $item->getISBN() : 'no information' ?></span>
              </div>
              <div class="detail__line">
                <strong>Tags:</strong>
                <span>Drama</span>
                <span>Adventure</span>
                <span>Survival</span>
                <span>Biography</span>
                <span>Bestseller</span>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>
  <?php } ?>
  
  <!--==================== CUSTOMER DETAILS ====================-->
  <section class="detail-customer section" id="detail-customer">
    <div class="detail-customer__container">
      <div class="customer-review tabcontent" id="customer">
        <div class="rating">
          <div class="rating-info">
            <h5>Rating Information</h5>
            <p>
              This rating reflects user satisfaction, quality, and reliability based on reviews and feedback.
            </p>
          </div>
          <div class="star">
            <small><span>4.7</span> out of 5</small>
            <div class="stars">
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-half-fill"></i>
            </div>
          </div>
        </div>
        <!-- =========================display cmt ===================== -->
        <div class="comments__list" id="comment-list">
          <?php if (isset($comments) && count($comments) > 0) : ?>
            <?php foreach ($comments as $index => $comment) : ?>
              <?php
              // Thêm class 'comment-hidden' cho các bình luận từ vị trí thứ 3 trở đi (index >= 2)
              $hiddenClass = ($index >= 2) ? 'comment-hidden' : '';
              ?>
              <!-- Swiper Slider for Reviews -->
              <div class="customer-detail__swiper swiper">
                <div class="swiper-wrapper">
                  <!-- Repeatable Review Slide -->
                  <div class="swiper-slide review comment <?= $hiddenClass ?>" data-comment-id="<?= $comment->getId() ?>">
                    <div class="review-header">
                      <img src="view/JS/img/<?= $comment->getImage() ? $comment->getImage() : 'noimg.jpg' ?>" alt="Reviewer Image" class="reviewer-img" />
                      <div class="reviewer-info">
                        <h5><?php echo htmlspecialchars($comment->getUserName()) ?></h5>
                        <small><?php echo date('F j, Y', strtotime($comment->getCreatedAt())) ?> at
                          <?= date('g:i A', strtotime($comment->getCreatedAt())) ?></small>
                      </div>
                      <?php if (isset($_SESSION['name']) && $_SESSION['name'] == $comment->getUserName()) : ?>
                        <div class="comment__actions">
                          <button class="edit-comment-button" title="Edit Comment"><i class="ri-edit-line"></i></button>
                          <button class="delete-comment-button" title="Delete Comment"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="review-body">
                      <p class="comment__text">
                        <?php echo htmlspecialchars($comment->getCommentText()) ?>
                      </p>
                      <!-- Edit Comment Area (Hidden by default) -->
                      <div class="edit-comment-area">
                        <textarea class="edit-comment-text"><?= htmlspecialchars($comment->getCommentText()) ?></textarea>
                        <button class="save-edit-button">Save</button>
                        <button class="cancel-edit-button">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          <?php // Thêm nút "Xem thêm" và "Thu gọn" nếu số lượng bình luận lớn hơn 2 ?>
          <?php if (count($comments) > 2) : ?>
            <div class="comment-toggle-buttons"> 
                <button id="show-more-comments" class="button button-icon-only" title="Show More Comments"> 
                    <i class="ri-arrow-down-s-line"></i>
                </button>
                <button id="show-less-comments" class="button button-icon-only" style="display: none;" title="Show Less Comments">
                    <i class="ri-arrow-up-s-line"></i>
                </button>
            </div>
          <?php endif; ?>

          <?php else : ?>
            <p>No comments yet. Be the first to comment!</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

          <!--==================== COMMENTS SECTION ====================-->
          <section class="comments-section" id="comments">
          <div class="comments__container container">
            <h5 class="comments__section-title">Comments</h5>
            <!-- Add Comment Form -->
            <div class="comments__form">
              <form action="<?= href('product', 'addComment') ?>" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $item->getId() ?>">

                <div class="comments__form-group">
                  <label for="user_name" class="comments__label">Full Name</label>
                  <input type="text" id="user_name" name="user_name" class="comments__input" value="<?= $_SESSION['name'] ?>" readonly>
                </div>
                <div class="comments__form-group">
                  <label for="comment_text" class="comments__label">Comment</label>
                  <textarea id="comment_text" name="comment_text" class="comments__textarea" required></textarea>
                </div>
                <button type="submit" class="post-comment__button button">Post Comment</button>
              </form>
            </div>
          </div>
        </section>

      <!--==================== JOIN ====================-->
      <section class="join section">
        <div class="join__container">
          <img src="view/JS/img/join-bg.jpg" alt="Join Background" class="join__bg" />
          <div class="join__content container grid">
            <h2 class="join__title section__title">
              Subscribe To Receive <br />
              The Latest Updates
            </h2>

            <form action="#" class="join__form">
              <input type="email" placeholder="Enter your email" class="join__input" required />
              <button type="submit" class="join__button button">Subscribe</button>
            </form>
          </div>
        </div>
      </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // --- Chọn các phần tử DOM cần thiết ---
    const commentList = $('#comment-list');
    const showMoreButton = $('#show-more-comments');
    const showLessButton = $('#show-less-comments');

    // --- Hàm gắn sự kiện cho các nút Sửa/Xóa trên mỗi bình luận ---
    function attachCommentListeners(commentElement) {
      // Tìm các nút và phần tử con trong bình luận được truyền vào
      const editButton = commentElement.find('.edit-comment-button');
      const deleteButton = commentElement.find('.delete-comment-button');
      const saveButton = commentElement.find('.save-edit-button');
      const cancelButton = commentElement.find('.cancel-edit-button');
      const editArea = commentElement.find('.edit-comment-area');
      const commentTextDisplay = commentElement.find('.comment__text'); // Phần tử p hiển thị text
      const editCommentTextarea = commentElement.find('.edit-comment-text'); // Textarea để sửa
      const commentId = commentElement.data('comment-id'); // Lấy ID bình luận từ data attribute

      // Sự kiện click nút Sửa
      editButton.off('click').on('click', () => {
        editArea.addClass('show'); // Hiện vùng sửa
        commentTextDisplay.hide(); // Ẩn text đang hiển thị
      });

      // Sự kiện click nút Xóa
      deleteButton.off('click').on('click', () => {
        if (confirm("Bạn có chắc chắn muốn xóa bình luận này không?")) {
          $.ajax({
            url: '<?= href('product', 'ajaxDeleteComment') ?>', // URL xử lý xóa (PHP)
            type: 'POST',
            dataType: 'json',
            data: { comment_id: commentId }, // Gửi ID bình luận cần xóa
            success: function(response) {
              if (response.success) {
                // Xóa cả khối div cha chứa bình luận khỏi giao diện
                commentElement.closest('.customer-detail__swiper').remove();
                // Cập nhật lại trạng thái nút Xem thêm/Thu gọn
                updateCommentButtonsVisibility();
              } else {
                alert(response.message || "Xóa bình luận thất bại.");
              }
            },
            error: function(xhr, status, error) {
              console.error("AJAX request failed:", error);
              alert("Đã xảy ra lỗi khi xóa bình luận. Vui lòng thử lại.");
            }
          });
        }
      });

      // Sự kiện click nút Lưu (khi sửa)
      saveButton.off('click').on('click', () => {
        const newText = editCommentTextarea.val(); // Lấy nội dung mới từ textarea
        $.ajax({
          url: '<?= href('product', 'ajaxEditComment') ?>', // URL xử lý sửa (PHP)
          type: 'POST',
          dataType: 'json',
          data: {
            comment_id: commentId,
            new_text: newText
          }, // Gửi ID và nội dung mới
          success: function(response) {
            if (response.success) {
              commentTextDisplay.text(newText); // Cập nhật text hiển thị
              editCommentTextarea.val(newText); // Cập nhật cả textarea (phòng khi sửa lại)
              editArea.removeClass('show'); // Ẩn vùng sửa
              commentTextDisplay.show(); // Hiện lại text
            } else {
              alert(response.message || "Lưu bình luận thất bại.");
            }
          },
          error: function(xhr, status, error) {
            console.error("AJAX request failed:", error);
             alert("Đã xảy ra lỗi khi lưu bình luận. Vui lòng thử lại.");
          }
        });
      });

      // Sự kiện click nút Hủy (khi sửa)
      cancelButton.off('click').on('click', () => {
        // Reset textarea về nội dung gốc trước khi ẩn
        editCommentTextarea.val(commentTextDisplay.text());
        editArea.removeClass('show'); // Ẩn vùng sửa
        commentTextDisplay.show(); // Hiện lại text
      });
    }

    // --- Gắn sự kiện cho các bình luận đã có sẵn khi tải trang ---
    commentList.find('.comment').each(function() {
      attachCommentListeners($(this));
    });

    // --- Hàm cập nhật hiển thị nút Xem thêm/Thu gọn ---
    function updateCommentButtonsVisibility() {
        // Đếm tổng số bình luận và số bình luận đang bị ẩn
        const totalComments = commentList.find('.comment').length;
        const hiddenComments = commentList.find('.comment-hidden').length;

        // Nếu có 2 bình luận hoặc ít hơn, ẩn cả 2 nút
        if (totalComments <= 2) {
            showMoreButton.hide();
            showLessButton.hide();
        } else {
            // Nếu còn bình luận bị ẩn
            if (hiddenComments > 0) {
                showMoreButton.show(); // Hiện nút "Xem thêm"
                showLessButton.hide(); // Ẩn nút "Thu gọn"
            } else { // Nếu tất cả bình luận đã được hiển thị
                showMoreButton.hide(); // Ẩn nút "Xem thêm"
                showLessButton.show(); // Hiện nút "Thu gọn"
            }
        }
    }

    // --- Xử lý sự kiện click nút "Xem thêm" ---
    showMoreButton.click(function() {
      // Tìm các bình luận đang ẩn và hiển thị chúng với hiệu ứng trượt xuống
      commentList.find('.comment-hidden').slideDown(function() {
          // Callback: Sau khi hiển thị xong
          $(this).removeClass('comment-hidden'); // Xóa class 'comment-hidden'
          // Cập nhật lại trạng thái của các nút
          updateCommentButtonsVisibility();
      });
    });

    // --- Xử lý sự kiện click nút "Thu gọn" ---
    showLessButton.click(function() {
      // Tìm tất cả các bình luận từ vị trí thứ 3 trở đi (index > 1) và ẩn chúng
      commentList.find('.comment:gt(1)').slideUp(function() {
          // Callback: Sau khi ẩn xong
          $(this).addClass('comment-hidden'); // Thêm lại class 'comment-hidden'
          // Cập nhật lại trạng thái của các nút
          updateCommentButtonsVisibility();
      });

      // (Tùy chọn) Cuộn màn hình lên đầu danh sách bình luận để người dùng thấy hiệu ứng
      $('html, body').animate({
            scrollTop: commentList.offset().top - 100 // Cuộn đến vị trí của commentList trừ đi 100px padding
      }, 500); // Thời gian animation là 500ms
    });

    // --- (Tùy chọn) Xử lý khi thêm bình luận mới bằng AJAX ---
    // Nếu bạn có chức năng thêm bình luận mà không tải lại trang,
    // bạn cần gọi attachCommentListeners và updateCommentButtonsVisibility sau khi thêm.
    /*
    function appendNewComment(commentHtml) {
      const newCommentElement = $(commentHtml); // Tạo jQuery object từ HTML bình luận mới

      // Kiểm tra xem có nên ẩn bình luận mới không
      const totalComments = commentList.find('.comment').length;
      if (totalComments >= 2 && showMoreButton.is(':visible')) {
          newCommentElement.addClass('comment-hidden').hide(); // Thêm class và ẩn nếu đang ở trạng thái thu gọn
      }

      // Thêm bình luận mới vào cuối danh sách (hoặc đầu danh sách tùy ý)
      // Nếu có nút Xem thêm/Thu gọn, thêm vào trước nút đó
      const toggleButtons = commentList.find('.comment-toggle-buttons');
      if (toggleButtons.length > 0) {
          toggleButtons.before(newCommentElement);
      } else {
          commentList.append(newCommentElement); // Nếu không có nút (ít hơn 3 comment ban đầu)
      }


      // Gắn sự kiện cho bình luận mới
      attachCommentListeners(newCommentElement.find('.comment'));

      // Cập nhật lại trạng thái nút Xem thêm/Thu gọn
      updateCommentButtonsVisibility();
    }
    */

    // --- Xử lý nút tăng/giảm số lượng sản phẩm ---
    document.querySelectorAll('.button-plus').forEach(button => {
      button.addEventListener('click', function() {
        let input = this.previousElementSibling; // Input nằm ngay trước nút '+'
        let currentValue = parseInt(input.value);
        input.value = currentValue + 1;
      });
    });

    document.querySelectorAll('.button-minus').forEach(button => {
      button.addEventListener('click', function() {
        let input = this.nextElementSibling; // Input nằm ngay sau nút '-'
        let currentValue = parseInt(input.value);
        if (currentValue > 1) { // Chỉ giảm nếu giá trị lớn hơn 1
          input.value = currentValue - 1;
        }
      });
    });

    // --- Gọi hàm cập nhật nút lần đầu khi trang tải xong ---
    updateCommentButtonsVisibility();

  }); // Kết thúc $(document).ready()
</script>

