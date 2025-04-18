<!-- content -->
<style>
  /* Custom styles for user edit form */
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
  
  .card-header {
    padding: 1.25rem 1.5rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
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
  
  .form-group {
    margin-bottom: 1.5rem;
  }
  
  .form-control {
    display: block;
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e9ecef;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  
  .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #5e72e4;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
  }
  
  .form-control:disabled, .form-control[readonly] {
    background-color: #f8f9fa;
    opacity: 1;
  }
  
  .form-label {
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: #525f7f;
  }
  
  .form-select {
    display: block;
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 16px 12px;
    border: 1px solid #e9ecef;
    border-radius: 0.25rem;
    appearance: none;
  }
  
  .form-select:focus {
    border-color: #5e72e4;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
  }
  
  .form-check {
    display: block;
    min-height: 1.5rem;
    padding-left: 1.5em;
    margin-bottom: 0.125rem;
  }
  
  .form-check-inline {
    display: inline-block;
    margin-right: 1rem;
  }
  
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
    background-color: #5e72e4;
    border-color: #5e72e4;
  }
  
  .form-check-input:checked[type="radio"] {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
  }
  
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
  }
  
  .btn-success {
    color: #fff;
    background-color: #2dce89;
    border-color: #2dce89;
  }
  
  .btn-success:hover {
    color: #fff;
    background-color: #26b977;
    border-color: #24af70;
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
  }
  
  .mt-4 {
    margin-top: 1.5rem !important;
  }
  
  .mb-3 {
    margin-bottom: 1rem !important;
  }
  
  .user-image-preview {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
  }
  
  .user-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  }
  
  .image-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .form-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
  }
  
  .gender-options {
    display: flex;
    gap: 1.5rem;
    margin-top: 0.5rem;
  }
  
  .gender-option {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
  }
  
  .gender-option input {
    cursor: pointer;
  }
  
  .gender-option label {
    cursor: pointer;
    font-weight: 500;
    margin-bottom: 0;
  }
  
  .form-section {
    border-bottom: 1px solid #e9ecef;
    padding-bottom: 1.5rem;
    margin-bottom: 1.5rem;
  }
  
  .form-section-title {
    font-size: 1rem;
    font-weight: 600;
    color: #172b4d;
    margin-bottom: 1rem;
  }
  
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
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: center;
    white-space: nowrap;
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 0.25rem;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  
  .input-group > .form-control {
    position: relative;
    flex: 1 1 auto;
    width: 1%;
    min-width: 0;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  
  .alert {
    position: relative;
    padding: 1rem 1.5rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.375rem;
  }
  
  .alert-success {
    color: #1aae6f;
    background-color: #d7f1e6;
    border-color: #c7edd8;
  }
  
  .alert-danger {
    color: #f5365c;
    background-color: #fdd1da;
    border-color: #fcc1ce;
  }
</style>

<?php 
$alert= new userController();
echo $alert->getError('alert1');

foreach($users as $user) {
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit User: <?= $user->getUsername() ?></div>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo href('user', 'save') ?>" style="width: 66%; margin: 0 auto;" enctype="multipart/form-data">
                <div class="form-section">
                    <div class="form-section-title">Account Information</div>
                    
                    <div class="form-group">
                        <label for="id" class="form-label">User ID</label>
                        <input type="text" name="user_id" id="id" class="form-control" value="<?= $user->getId()?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="user_name" id="username" class="form-control" value="<?= $user->getUsername() ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="text" name="password" id="password" class="form-control" value="<?= $user->getPassword() ?>" required>
                        </div>
                        <small class="text-muted">Leave blank to keep current password</small>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">Personal Information</div>
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $user->getName() ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="formFile" class="form-label">Profile Image</label>
                        <div class="user-image-preview">
                            <img id="h_avt" src="/BOOKSMART/BookShop/MVC/view/JS/img/<?= $user->getImage() ? $user->getImage() : 'public/images/noimg.jpg' ?>" class="user-image" alt="User Image">
                            <div class="image-actions">
                                <input class="form-control" name="avt_2" type="hidden" id="avt_2" value="<?= $user->getImage() ?>">
                                <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('avt_2').value='';document.getElementById('h_avt').src='public/images/noimg.jpg'">
                                    <i class="fas fa-trash-alt"></i> Delete Image
                                </button>
                            </div>
                        </div>
                        <input class="form-control" name="avt" type="file" id="formFile">
                        <small class="text-muted">Upload a new image to replace the current one.</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <div class="gender-options">
                            <div class="gender-option">
                                <input class="form-check-input" name="gender" type="radio" id="gender-male" <?= $user->getGender() == 1 ? 'checked' : '' ?> value="1">
                                <label for="gender-male">Male</label>
                            </div>
                            <div class="gender-option">
                                <input class="form-check-input" name="gender" type="radio" id="gender-female" <?= $user->getGender() == 0 ? 'checked' : '' ?> value="0">
                                <label for="gender-female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">Contact Information</div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="phone" name="phone" id="phone" class="form-control" value="<?= $user->getPhone() ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" id="email" value="<?= $user->getEmail() ?>" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">Account Status</div>
                    
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="">--- Select Status ---</option>
                            <option <?= $user->getStatus() == 1 ? 'selected' : '' ?> value="1">Active</option>
                            <option <?= $user->getStatus() == 2 ? 'selected' : '' ?> value="2">Blocked</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-buttons">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>" class="form-control">
                    <button type="submit" name="button" value="Save" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a class="btn btn-success" href="<?= href('user','getAllUsers') ?>" role="button">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>