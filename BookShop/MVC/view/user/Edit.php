<!--==================== MAIN ====================-->
<style>
/* General page section layout for edit address */
.edit-address {
  max-width: 1350px; 
  margin: 1px auto; 
  font-family: "Poppins", Arial, sans-serif; 
  color: #333;
}

/* Card container styling */
.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.08); /* Slightly softer border */
  border-radius: 0.375rem; /* 6px */
  box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.05); /* Softer shadow */
  margin-bottom: 1.5rem; /* Spacing below the card */
}

/* Card Header */
.card-header {
  padding: 1.25rem 1.5rem;
  margin-bottom: 0;
  background-color: #f8f9fa; /* Light background for header */
  border-bottom: 1px solid rgba(0, 0, 0, 0.08);
  border-top-left-radius: calc(0.375rem - 1px);
  border-top-right-radius: calc(0.375rem - 1px);
}

.card-title {
  margin-bottom: 0.25rem; /* Reduced space below title */
  font-size: 1.2rem; /* Slightly larger title */
  font-weight: 600;
  color: #172b4d; /* Dark blue */
}

.card-subtitle {
  font-size: 0.875rem; /* 14px */
  color: #6c757d; /* Grey */
  margin-top: 0;
}

/* Card Body */
.card-body {
  flex: 1 1 auto;
  padding: 1.5rem; /* 24px padding */
}

/* Form Sections */
.form-section {
  border-bottom: 1px solid #e9ecef;
  padding-bottom: 1.5rem; /* 24px */
  margin-bottom: 1.5rem; /* 24px */
}
.form-section:last-of-type {
  border-bottom: none; /* Remove border from the last section */
  margin-bottom: 0; /* Remove bottom margin from the last section before buttons */
}

.form-section-title {
  font-size: 1rem; /* 16px */
  font-weight: 600;
  color: #172b4d;
  margin-bottom: 1.25rem; /* Space below section title */
}

/* Form Groups */
.form-group {
  margin-bottom: 1.5rem; /* 24px spacing between form groups */
}
.form-group:last-child {
    margin-bottom: 0; /* Remove margin from last group in a section */
}


/* Form Labels */
.form-label {
  display: block; /* Ensure label is on its own line */
  margin-bottom: 0.5rem; /* 8px */
  font-size: 0.875rem; /* 14px */
  font-weight: 600;
  color: #525f7f; /* Dark grey */
}

/* Form Controls (Inputs) */
.form-control {
  display: block;
  width: 100%;
  padding: 0.75rem 1rem; /* 12px 16px */
  font-size: 0.875rem; /* 14px */
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #e9ecef; /* Lighter border */
  border-radius: 0.25rem; /* 4px */
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
  color: #495057;
  background-color: #fff;
  outline: 0;
}

/* Input Groups (for icons) */
.input-group {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  width: 100%;
}

.input-group-text {
  display: flex;
  align-items: center;
  padding: 0.75rem 1rem; /* Match input padding */
  font-size: 0.875rem; /* Match input font size */
  font-weight: 400;
  line-height: 1.5; /* Match input line height */
  color: #495057;
  text-align: center;
  white-space: nowrap;
  background-color: #f8f9fa; /* Light background for icon area */
  border: 1px solid #e9ecef;
  border-radius: 0.25rem;
  border-top-right-radius: 0; /* Remove right radius */
  border-bottom-right-radius: 0; /* Remove right radius */
  border-right: 0; /* Remove border between text and input */
}

.input-group > .form-control {
  position: relative;
  flex: 1 1 auto;
  width: 1%;
  min-width: 0;
  border-top-left-radius: 0; /* Remove left radius */
  border-bottom-left-radius: 0; /* Remove left radius */
}
.input-group > .form-control:focus {
  z-index: 3; /* Ensure focused input is on top */
}


/* User Image Preview */
.user-image-preview {
  display: flex;
  align-items: center;
  gap: 1rem; /* Space between image and actions */
  margin-bottom: 1rem; /* Space below preview */
}

.user-image {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 50%; /* Circular image */
  border: 2px solid #e9ecef; /* Optional border */
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.image-actions {
  display: flex;
  align-items: center;
  gap: 0.5rem; /* Space between buttons if there were more */
}

/* Small text hint */
.text-muted {
  font-size: 0.75rem; /* 12px */
  color: #6c757d;
}

/* Gender Radio Buttons */
.gender-options {
  display: flex;
  gap: 1.5rem; /* Space between options */
  margin-top: 0.5rem; /* Space above options */
}

.gender-option {
  display: flex;
  align-items: center;
  gap: 0.5rem; /* Space between radio and label */
  cursor: pointer;
}

.gender-option input[type="radio"] {
  cursor: pointer;
  margin-top: 0; /* Align radio button better */
}

.gender-option label {
  cursor: pointer;
  font-weight: 500;
  margin-bottom: 0;
  color: #495057;
}

/* Basic Check/Radio Input Styling */
.form-check-input {
  width: 1em;
  height: 1em;
  margin-top: 0.25em;
  vertical-align: top;
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  border: 1px solid rgba(0, 0, 0, 0.25);
  appearance: none;
  color-adjust: exact;
  transition: background-color 0.15s ease-in-out, background-position 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-check-input[type="radio"] {
  border-radius: 50%;
}

.form-check-input:checked {
  background-color: #1e272c; /* Primary color when checked */
  border-color: #1e272c;
}

/* Custom checkmark for radio */
.form-check-input:checked[type="radio"] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
}

/* Form Buttons Container */
.form-buttons {
  display: flex;
  gap: 1rem; /* Space between buttons */
  margin-top: 2rem; /* Space above buttons */
  padding-top: 1.5rem; /* Add padding if needed after removing last section border */
  border-top: 1px solid #e9ecef;
}

/* General Button Styling */
.btn {
  display: inline-block;
  font-weight: 600;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.75rem 1.25rem; /* Slightly larger padding */
  font-size: 0.875rem; /* 14px */
  line-height: 1.5;
  border-radius: 0.25rem; /* 4px */
  transition: all 0.15s ease-in-out;
  cursor: pointer;
}
.btn i {
    margin-right: 0.5em; /* Space between icon and text */
}

/* Primary Button (Save) */
.btn-primary {
  color: #fff;
  background-color: #1e272c;
  border-color: #1e272c;
}

/* Secondary Button (Cancel, Delete Image) */
.btn-secondary {
  color: #fff;
  background-color: #6c757d; /* Grey */
  border-color: #6c757d;
}

/* Smaller button variant */
.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.75rem; /* 12px */
  border-radius: 0.2rem;
}
.btn-sm i {
    margin-right: 0.3em;
}


/* Specific override for Delete Image button */
.image-actions .btn-secondary {
  background-color: #f5365c; /* Reddish color for delete */
  border-color: #f5365c;
}
.image-actions .btn-secondary:hover {
  background-color: #f41f49;
  border-color: #ec0c38;
}
.image-actions .btn-secondary:focus {
    box-shadow: 0 0 0 0.2rem rgba(245, 54, 92, 0.5);
}
</style>

<main class="main">
  <!--==================== EDIT ADDRESS ====================-->
  <section class="edit-address section" id="edit-address">
  <?= $this->getError('alert')?>

    <div class="edit-address__container container">
      <div class="col-md-12">
        <div class="card">
          <!-- Edit Address Header -->
          <div class="card-header">
            <div class="card-title">Edit Address</div>
            <div class="card-subtitle">Update your shipping and billing address information.</div>
          </div>
          <?php
          //  / dd($data);
          foreach ($data as $item) {
          ?>
            <!-- Edit Address Form -->
            <div class="card-body">
              <form action="<?= href('user', 'save') ?> " method="post" class="edit-address__form" id="edit-address-form" style="width: 100%; margin: 0 auto;" enctype="multipart/form-data">
                <div class="form-section">
                  <div class="form-section-title">Personal Information</div>

                  <div class="form-group">
                    <label for="avt" class="form-label">Avatar</label>
                    <div class="user-image-preview">
                      <img id="h_avt" src="view/JS/img/<?= $item->getImage()  ?  $item->getImage()  : 'noimg.jpg' ?>" class="user-image" alt="User Image">
                      <div class="image-actions">
                        <input class="form-control" name="avt_2" type="hidden" id="avt_2" value="<?= $item->getImage() ?>">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('avt').value='';document.getElementById('avt_2').value='';document.getElementById('h_avt').src='view/JS/img/noimg.jpg'"> <i class="fas fa-trash-alt"></i> Delete Image
                        </button>
                      </div>
                    </div>
                    <input type="file" id="avt" name="avt" class="form-control" />
                    <small class="text-muted">Upload a new image to replace the current one.</small>
                  </div>

                  <div class="form-group">
                    <label for="full-name" class="form-label">Full Name</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                      <input type="text" id="full-name" name="fullName" class="form-control" value="<?= $item->getName()  ?  $item->getName() : '' ?>" required />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Gender</label>
                    <div class="gender-options">
                      <div class="gender-option">
                        <input class="form-check-input" name="gender" type="radio" id="gender-male" value="1" <?= $item->getGender() == 1  ? 'checked' : '' ?>>
                        <label for="gender-male">Male</label>
                      </div>
                      <div class="gender-option">
                        <input class="form-check-input" name="gender" type="radio" id="gender-female" value="0" <?= $item->getGender() == 0  ? 'checked' : '' ?>>
                        <label for="gender-female">Female</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-section">
                  <div class="form-section-title">Address Information</div>

                  <div class="form-group">
                    <label for="address-line1" class="form-label">Address</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fas fa-home"></i></span>
                      <input type="text" id="address-line1" name="address" class="form-control" value="<?= $item->getAddress()  ?  $item->getAddress()  : '' ?>" required />
                    </div>
                  </div>

                </div>

                <div class="form-section">
                  <div class="form-section-title">Contact Information</div>


                  <div class="form-group">
                    <label for="phone" class="form-label">Email</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fas fa-envelope register__icon"></i></span>
                      <input type="email" id="email" name="email" class="form-control" value="<?= $item->getEmail()  ? $item->getEmail()  : '' ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      <input id="phone" name="phone" class="form-control" value="<?= $item->getPhone() ? $item->getPhone()  : '' ?>" required />
                    </div>
                  </div>
                </div>

                <div class="form-buttons">
                  <button type="submit" class="btn btn-primary">
                    Save Changes
                  </button>
                  <a href="<?= href('user', 'checkProfile') ?>"><button type="button" class="btn btn-secondary cancel-button">
                       Cancel
                    </button></a>
                </div>
                <input type="hidden" name="id" value="<?php echo $_SESSION['login_id'] ?>">
              </form>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</main>