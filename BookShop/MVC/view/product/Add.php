<style>
  .error-message {
    color: #f5365c;
    font-size: 0.75rem;
    margin-top: 0.25rem;
}
  /* Custom styles for add product form */
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
  .form-control:hover {
    border-color: #cbd3da;
  }
  
  /* Focus indicator for accessibility */
  .form-control:focus, .btn:focus {
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
  
  /* Textarea styling */
  textarea.form-control {
    min-height: 120px;
    resize: vertical;
  }
  
  /* Price input styling */
  .price-input-group {
    position: relative;
  }
  
  .price-input-group .form-control {
    padding-left: 2rem;
  }
  
  .price-input-group::before {
    content: "$";
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #8898aa;
    z-index: 10;
    font-weight: 600;
  }
  
  /* Image preview */
  .image-preview {
    width: 100%;
    height: 200px;
    border: 1px dashed #e9ecef;
    border-radius: 0.25rem;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background-color: #f8f9fa;
  }
  
  .image-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }
  
  .image-preview-placeholder {
    color: #8898aa;
    font-size: 0.875rem;
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
  }
</style>

<?php
$user = new userController();
echo $user->getError('alert2')
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Add New Product</div>
            <a class="btn btn-primary" href="<?php echo href('product','getAllProducts')?>" role="button">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo href('product', 'addNewProduct') ?>" class="form-container" enctype="multipart/form-data">
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-box mr-2"></i> Product Information
                    </div>
                    
                    <div class="form-group">
                        <label for="product_name" class="form-label required-field">Product Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" class="form-control" id="product_name" name="product_name" required placeholder="Enter product name">
                        </div>
                        <small class="text-muted">Enter a descriptive name for the product.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="form-label required-field">Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required placeholder="0.00">
                        </div>
                        <small class="text-muted">Enter the product price (e.g., 19.99).</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description"></textarea>
                        <small class="text-muted">Provide a detailed description of the product.</small>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-image mr-2"></i> Product Image
                    </div>
                    
                    <div class="form-group">
                        <label for="formFile" class="form-label">Product Image</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                            <input class="form-control" name="avt" type="file" id="formFile" accept="image/*">
                        </div>
                        <small class="text-muted">Upload a high-quality image of the product. Supported formats: JPG, PNG, GIF.</small>
                        
                        <div class="image-preview" id="imagePreview">
                            <div class="image-preview-placeholder">
                                <i class="fas fa-image fa-3x mb-2"></i>
                                <p>Image preview will appear here</p>
                            </div>
                        </div>
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
                        <i class="fas fa-plus-circle"></i> Add Product
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
    const productName = document.getElementById('product_name');
    const price = document.getElementById('price');
    
    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        // Product name validation
        if (productName.value.trim() === '') {
            showError(productName, 'Product name is required');
            isValid = false;
        } else {
            clearError(productName);
        }
        
        // Price validation
        if (price.value === '' || isNaN(price.value) || parseFloat(price.value) < 0) {
            showError(price, 'Please enter a valid price');
            isValid = false;
        } else {
            clearError(price);
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
        errorElement.style.color = '#f5365c';
        errorElement.style.fontSize = '0.75rem';
        errorElement.style.marginTop = '0.25rem';
        
        if (!formGroup.querySelector('.error-message')) {
            formGroup.appendChild(errorElement);
        }
        
        input.style.borderColor = '#f5365c';
    }
    
    // Clear error message
    function clearError(input) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.error-message');
        
        if (errorElement) {
            formGroup.removeChild(errorElement);
        }
        
        input.style.borderColor = '#e9ecef';
    }
    
    // Form section animations
    const formSections = document.querySelectorAll('.form-section');
    formSections.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Image preview
    const fileInput = document.getElementById('formFile');
    const imagePreview = document.getElementById('imagePreview');
    
    fileInput.addEventListener('change', function() {
        const previewPlaceholder = imagePreview.querySelector('.image-preview-placeholder');
        
        if (this.files && this.files[0]) {
            const fileSize = this.files[0].size / 1024 / 1024; // in MB
            
            if (fileSize > 2) {
                showError(fileInput, 'File size should not exceed 2MB');
                this.value = ''; // Clear the input
                
                if (previewPlaceholder) {
                    previewPlaceholder.style.display = 'flex';
                }
                
                // Remove any existing preview image
                const existingImg = imagePreview.querySelector('img');
                if (existingImg) {
                    imagePreview.removeChild(existingImg);
                }
            } else {
                clearError(fileInput);
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    if (previewPlaceholder) {
                        previewPlaceholder.style.display = 'none';
                    }
                    
                    // Remove any existing preview image
                    const existingImg = imagePreview.querySelector('img');
                    if (existingImg) {
                        imagePreview.removeChild(existingImg);
                    }
                    
                    // Create new image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    imagePreview.appendChild(img);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        } else {
            if (previewPlaceholder) {
                previewPlaceholder.style.display = 'flex';
            }
            
            // Remove any existing preview image
            const existingImg = imagePreview.querySelector('img');
            if (existingImg) {
                imagePreview.removeChild(existingImg);
            }
        }
    });
    
    // Format price input
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('blur', function() {
        if (this.value && !isNaN(this.value)) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });
});
</script>