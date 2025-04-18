<style>
  /* Custom styles for product edit form */
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
  
  .form-control:disabled, .form-control[readonly] {
    background-color: #f8f9fa;
    opacity: 1;
  }
  
  .form-label {
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: #525f7f;
    display: flex;
    align-items: center;
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
  
  .btn-danger {
    color: #fff;
    background-color: #f5365c;
    border-color: #f5365c;
  }
  
  .btn-danger:hover {
    color: #fff;
    background-color: #f31a43;
    border-color: #ec0c38;
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
  }
  
  .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    line-height: 1.5;
    border-radius: 0.2rem;
  }
  
  .mt-4 {
    margin-top: 1.5rem !important;
  }
  
  .mb-3 {
    margin-bottom: 1rem !important;
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
  
  .product-image-container {
    margin-top: 1rem;
    margin-bottom: 1.5rem;
  }
  
  .product-image-preview {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    padding: 1rem;
    border: 1px solid #e9ecef;
    border-radius: 0.375rem;
    background-color: #f8f9fa;
  }
  
  .product-image {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 0.25rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: all 0.3s ease;
  }
  
  .product-image:hover {
    transform: scale(1.05);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  }
  
  .image-actions {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .image-info {
    font-size: 0.875rem;
    color: #525f7f;
  }
  
  .form-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    justify-content: flex-end;
  }
  
  .text-muted {
    color: #8898aa !important;
    font-size: 0.75rem;
    margin-top: 0.25rem;
  }
  
  .required-field::after {
    content: "*";
    color: #f5365c;
    margin-left: 4px;
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
  
  /* Image preview */
  .new-image-preview {
    width: 100%;
    height: 200px;
    border: 1px dashed #e9ecef;
    border-radius: 0.25rem;
    margin-top: 0.5rem;
    display: none;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background-color: #f8f9fa;
  }
  
  .new-image-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
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
    
    .product-image-preview {
      flex-direction: column;
      align-items: flex-start;
    }
    
    .product-image {
      width: 100%;
      height: auto;
      max-height: 200px;
    }
  }
</style>

<?php
$alert = new userController();
echo $alert->getError('alert1');

foreach ($lists as $item) {
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit Product</div>
            <a class="btn btn-success" href="<?= href('product', 'list') ?>" role="button">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo href('product', 'save') ?>" class="form-container" enctype="multipart/form-data" id="editProductForm">
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-info-circle mr-2"></i> Basic Information
                    </div>
                    
                    <div class="form-group">
                        <label for="id" class="form-label">Product ID</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            <input type="text" name="product_id" id="id" class="form-control" value="<?= $item->getId() ?>" readonly>
                        </div>
                        <small class="text-muted">This is a unique identifier and cannot be changed.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="product_name" class="form-label required-field">Product Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" name="product_name" id="product_name" class="form-control" value="<?= htmlspecialchars($item->getProductName()) ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="form-label required-field">Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="price" id="price" class="form-control" value="<?= $item->getPrice() ?>" step="0.01" min="0" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-image mr-2"></i> Product Image
                    </div>
                    
                    <div class="product-image-container">
                        <div class="product-image-preview">
                            <img id="h_avt" src="/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getImage() ? $item->getImage() : 'noimg.jpg' ?>" class="product-image" alt="Current Product Image">
                            <div class="image-actions">
                                <div class="image-info">
                                    <strong>Current Image:</strong> <?= $item->getImage() ? $item->getImage() : 'No image' ?>
                                </div>
                                <input class="form-control" name="avt_2" type="hidden" id="avt_2" value="<?= $item->getImage() ?>">
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage()">
                                    <i class="fas fa-trash-alt"></i> Delete Current Image
                                </button>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Upload New Image</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                <input class="form-control" name="avt" type="file" id="formFile" accept="image/*">
                            </div>
                            <small class="text-muted">Upload a new image to replace the current one. Supported formats: JPG, PNG, GIF.</small>
                            
                            <div class="new-image-preview" id="newImagePreview">
                                <img src="/placeholder.svg" alt="New image preview">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-align-left mr-2"></i> Product Details
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5"><?= htmlspecialchars($item->getDescription()) ?></textarea>
                        <small class="text-muted">Provide a detailed description of the product.</small>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-calendar-alt mr-2"></i> Timestamps
                    </div>
                    
                    <div class="form-group">
                        <label for="updated_at" class="form-label">Updated At</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="datetime-local" class="form-control" id="updated_at" value="<?= $item->getUpdated_at() ?>" name="updated_at">
                        </div>
                        <small class="text-muted">This will be automatically set to the current time when you save changes.</small>
                    </div>
                </div>
                
                <div class="form-buttons">
                    <input type="hidden" name="id" value="<?= $item->getId() ?>">
                    <button type="button" class="btn btn-primary" onclick="resetForm()">
                        <i class="fas fa-undo"></i> Reset Changes
                    </button>
                    <button type="submit" name="button" value="Save" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Store original form values for reset functionality
    const originalFormValues = {
        product_name: document.getElementById('product_name').value,
        price: document.getElementById('price').value,
        description: document.getElementById('description').value,
        updated_at: document.getElementById('updated_at').value,
        avt_2: document.getElementById('avt_2').value
    };
    
    const originalImage = document.getElementById('h_avt').src;
    
    // Form validation
    const form = document.getElementById('editProductForm');
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
    
    // Image preview for new uploads
    const fileInput = document.getElementById('formFile');
    const newImagePreview = document.getElementById('newImagePreview');
    
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const fileSize = this.files[0].size / 1024 / 1024; // in MB
            
            if (fileSize > 2) {
                showError(fileInput, 'File size should not exceed 2MB');
                this.value = ''; // Clear the input
                newImagePreview.style.display = 'none';
            } else {
                clearError(fileInput);
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    newImagePreview.style.display = 'flex';
                    newImagePreview.querySelector('img').src = e.target.result;
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        } else {
            newImagePreview.style.display = 'none';
        }
    });
    
    // Format price input
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('blur', function() {
        if (this.value && !isNaN(this.value)) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });
    
    // Reset form function
    window.resetForm = function() {
        document.getElementById('product_name').value = originalFormValues.product_name;
        document.getElementById('price').value = originalFormValues.price;
        document.getElementById('description').value = originalFormValues.description;
        document.getElementById('updated_at').value = originalFormValues.updated_at;
        document.getElementById('avt_2').value = originalFormValues.avt_2;
        document.getElementById('h_avt').src = originalImage;
        document.getElementById('formFile').value = '';
        newImagePreview.style.display = 'none';
        
        // Clear any error messages
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(message => message.remove());
        
        // Reset border colors
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => {
            control.style.borderColor = '#e9ecef';
        });
    };
    
    // Delete image function
    window.deleteImage = function() {
        document.getElementById('avt_2').value = '';
        document.getElementById('h_avt').src = '/BOOKSMART/BookShop/MVC/view/JS/img/noimg.jpg';
    };
});
</script>