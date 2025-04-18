<style>
  /* Custom styles for add user form */
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
  
  .form-group {
    margin-bottom: 1.5rem;
    position: relative;
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
    transition: all 0.2s ease;
  }
  
  .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #5e72e4;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
  }
  
  .form-label {
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: #525f7f;
    display: flex;
    align-items: center;
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
    transition: all 0.2s ease;
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
    cursor: pointer;
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
  
  .btn-success {
    color: #fff;
    background-color: #2dce89;
    border-color: #2dce89;
  }
  
  .btn-success:hover {
    color: #fff;
    background-color: #26b977;
    border-color: #24af70;
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
  }
  
  .mb-3 {
    margin-bottom: 1rem !important;
  }
  
  .mt-4 {
    margin-top: 1.5rem !important;
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
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    transition: all 0.2s ease;
  }
  
  .gender-option:hover {
    background-color: rgba(94, 114, 228, 0.1);
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
    animation: fadeIn 0.5s ease-in-out;
  }
  
  .form-section:last-child {
    border-bottom: none;
  }
  
  .form-section-title {
    font-size: 1rem;
    font-weight: 600;
    color: #172b4d;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
  }
  
  .form-section-title::before {
    content: '';
    display: inline-block;
    width: 4px;
    height: 18px;
    background-color: #5e72e4;
    margin-right: 0.75rem;
    border-radius: 2px;
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
  
  .form-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    justify-content: flex-end;
  }
  
  .alert {
    position: relative;
    padding: 1rem 1.5rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.375rem;
    animation: slideDown 0.3s ease-in-out;
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
  
  .required-field::after {
    content: "*";
    color: #f5365c;
    margin-left: 4px;
  }
  
  .text-muted {
    color: #8898aa !important;
    font-size: 0.75rem;
    margin-top: 0.25rem;
  }
  
  /* Animations */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  /* Hover effects */
  .form-control:hover, .form-select:hover {
    border-color: #cbd3da;
  }
  
  /* Focus indicator for accessibility */
  .form-control:focus, .form-select:focus, .btn:focus {
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
  }
  
  /* File input styling */
  input[type="file"]::file-selector-button {
    border: none;
    background: #5e72e4;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    color: white;
    cursor: pointer;
    margin-right: 1rem;
    transition: all 0.2s ease;
  }
  
  input[type="file"]::file-selector-button:hover {
    background: #485fe0;
  }
  
  /* Form container */
  .form-container {
    width: 66%;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1.5rem rgba(18, 38, 63, 0.05);
    padding: 1.5rem;
    transition: all 0.3s ease;
  }
  
  /* Responsive adjustments */
  @media (max-width: 992px) {
    .form-container {
      width: 80%;
    }
  }
  
  @media (max-width: 768px) {
    .form-container {
      width: 100%;
    }
    
    .form-buttons {
      flex-direction: column;
    }
    
    .gender-options {
      flex-direction: column;
      gap: 0.5rem;
    }
  }
</style>

<?php
$user = new userController();
echo $user->getError('alert2')
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Add New User</div>
            <a class="btn btn-primary" href="<?php echo href('user','getAllUsers')?>" role="button">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo href('user', 'addNewUser') ?>" class="form-container" enctype="multipart/form-data">
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-user-shield mr-2"></i> Account Information
                    </div>
                    
                    <div class="form-group">
                        <label for="username" class="form-label required-field">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="user_name" required placeholder="Enter username">
                        </div>
                        <small class="text-muted">Choose a unique username for this account.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label required-field">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
                        </div>
                        <small class="text-muted">Use a strong password with at least 8 characters.</small>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-id-card mr-2"></i> Personal Information
                    </div>
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <div class="gender-options">
                            <div class="gender-option">
                                <input class="form-check-input" name="gender" type="radio" id="gender-male" value="1" checked>
                                <label for="gender-male">Male</label>
                            </div>
                            <div class="gender-option">
                                <input class="form-check-input" name="gender" type="radio" id="gender-female" value="0">
                                <label for="gender-female">Female</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="formFile" class="form-label">Profile Image</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                            <input class="form-control" name="avt" type="file" id="formFile" accept="image/*">
                        </div>
                        <small class="text-muted">Upload a profile picture (optional). Supported formats: JPG, PNG, GIF.</small>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-address-book mr-2"></i> Contact Information
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-toggle-on mr-2"></i> Account Status
                    </div>
                    
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="">--- Select Status ---</option>
                            <option value="1" selected>Active</option>
                            <option value="2">Blocked</option>
                        </select>
                        <small class="text-muted">Active users can log in, blocked users cannot access the system.</small>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-calendar-alt mr-2"></i> Timestamps
                    </div>
                    
                    <div class="form-group">
                        <label for="created_at" class="form-label">Created At</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo date('Y-m-d\TH:i'); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="updated_at" class="form-label">Updated At</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo date('Y-m-d\TH:i'); ?>">
                        </div>
                    </div>
                </div>
                
                <div class="form-buttons">
                    <button type="reset" class="btn btn-primary">
                        <i class="fas fa-redo"></i> Reset Form
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    
    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        // Username validation
        if (username.value.trim().length < 3) {
            showError(username, 'Username must be at least 3 characters');
            isValid = false;
        } else {
            clearError(username);
        }
        
        // Password validation
        if (password.value.length < 8) {
            showError(password, 'Password must be at least 8 characters');
            isValid = false;
        } else {
            clearError(password);
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });
    
    // Show error message
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.error-message') || document.createElement('div');
        
        errorElement.className = 'error-message text-danger mt-1';
        errorElement.textContent = message;
        
        if (!formGroup.querySelector('.error-message')) {
            formGroup.appendChild(errorElement);
        }
        
        input.classList.add('is-invalid');
    }
    
    // Clear error message
    function clearError(input) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.error-message');
        
        if (errorElement) {
            formGroup.removeChild(errorElement);
        }
        
        input.classList.remove('is-invalid');
    }
    
    // Form section animations
    const formSections = document.querySelectorAll('.form-section');
    formSections.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.1}s`;
    });
    
    // File input preview
    const fileInput = document.getElementById('formFile');
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const fileSize = this.files[0].size / 1024 / 1024; // in MB
            if (fileSize > 2) {
                showError(fileInput, 'File size should not exceed 2MB');
                this.value = ''; // Clear the input
            } else {
                clearError(fileInput);
            }
        }
    });
});
</script>