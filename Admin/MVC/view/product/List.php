<style>
  /* Custom styles for product list */
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
  
  .table-hover tbody tr:hover {
    background-color: rgba(94, 114, 228, 0.05);
    transition: all 0.2s ease;
  }
  
  .table thead th {
    font-size: 0.85rem;
    font-weight: 600;
    color: #8898aa;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 1px solid #e9ecef;
    padding: 1rem;
    vertical-align: middle;
  }
  
  .table td {
    padding: 1rem;
    vertical-align: middle;
    border-top: 1px solid #e9ecef;
    font-size: 0.875rem;
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
  
  .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.75rem;
    line-height: 1.5;
    border-radius: 0.2rem;
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
  
  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  
  .product-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 0.25rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: transform 0.2s ease;
  }
  
  .product-image:hover {
    transform: scale(1.1);
    cursor: pointer;
  }
  
  .action-buttons {
    display: flex;
    gap: 0.5rem;
  }
  
  .action-button {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border-radius: 0.25rem;
    transition: all 0.2s ease;
  }
  
  .action-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
  }
  
  .search-filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
  }
  
  .search-box {
    display: flex;
    align-items: center;
    background-color: #f8f9fa;
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    width: 100%;
    max-width: 300px;
  }
  
  .search-box input {
    border: none;
    background: transparent;
    padding: 0.5rem;
    width: 100%;
    outline: none;
  }
  
  .search-box i {
    color: #8898aa;
  }
  
  .add-product-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background-color: #5e72e4;
    color: white;
    border: none;
    border-radius: 0.375rem;
    padding: 0.625rem 1.25rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  
  .add-product-btn:hover {
    background-color: #485fe0;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
  }
  
  .pagination-container {
    display: flex;
    justify-content: flex-end;
    margin-top: 1.5rem;
  }
  
  .pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .page-item {
    margin: 0 0.25rem;
  }
  
  .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid #e9ecef;
    color: #8898aa;
    text-decoration: none;
    transition: all 0.2s ease;
  }
  
  .page-link:hover {
    background-color: #f8f9fa;
    color: #5e72e4;
  }
  
  .page-item.active .page-link {
    background-color: #5e72e4;
    color: #fff;
    border-color: #5e72e4;
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
  
  .product-description {
    max-width: 250px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  
  .product-description.expanded {
    white-space: normal;
    overflow: visible;
  }
  
  .price-tag {
    font-weight: 600;
    color: #5e72e4;
  }
  
  .product-name {
    font-weight: 600;
    color: #172b4d;
  }
  
  .product-id {
    color: #8898aa;
    font-size: 0.75rem;
  }
  
  .modal {
    display: none;
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }
  
  .modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 0;
    border: 0;
    border-radius: 0.375rem;
    box-shadow: 0 15px 35px rgba(50, 50, 93, 0.2), 0 5px 15px rgba(0, 0, 0, 0.17);
    width: 80%;
    max-width: 500px;
    position: relative;
    animation: modalFadeIn 0.3s ease;
  }
  
  .modal-header {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  .modal-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #172b4d;
  }
  
  .modal-close {
    background: transparent;
    border: 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: #8898aa;
    cursor: pointer;
  }
  
  .modal-body {
    padding: 1.5rem;
  }
  
  .modal-footer {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
  }
  
  .product-detail {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  
  .product-detail-image {
    width: 100%;
    max-height: 200px;
    object-fit: contain;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
  }
  
  .product-detail-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .product-detail-name {
    font-size: 1.25rem;
    font-weight: 600;
    color: #172b4d;
  }
  
  .product-detail-price {
    font-size: 1.1rem;
    font-weight: 600;
    color: #5e72e4;
  }
  
  .product-detail-description {
    color: #525f7f;
    margin-top: 0.5rem;
  }
  
  @keyframes modalFadeIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @media (max-width: 768px) {
    .table-responsive {
      border: 0;
    }
    
    .table-responsive table {
      width: 100%;
    }
    
    .table-responsive thead {
      display: none;
    }
    
    .table-responsive tr {
      margin-bottom: 1rem;
      display: block;
      border: 1px solid #e9ecef;
      border-radius: 0.375rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .table-responsive td {
      display: flex;
      justify-content: space-between;
      align-items: center;
      text-align: right;
      border-bottom: 1px solid #e9ecef;
      padding: 0.75rem 1rem;
    }
    
    .table-responsive td:last-child {
      border-bottom: 0;
    }
    
    .table-responsive td::before {
      content: attr(data-label);
      font-weight: 600;
      color: #8898aa;
      text-align: left;
    }
    
    .action-buttons {
      justify-content: flex-end;
    }
    
    .product-description {
      max-width: 150px;
    }
  }
</style>

<?php
$alert = new userController;
echo $alert->getError('alert');
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Product Management</div>
            <a href="<?php echo href('product', 'addNewProduct') ?>" class="add-product-btn">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
        <div class="card-body">
            <div class="search-filter">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search products..." id="productSearchInput">
                </div>
                <div class="filter-dropdown">
                    <select class="form-select" id="productSortSelect">
                        <option value="name-asc">Name (A-Z)</option>
                        <option value="name-desc">Name (Z-A)</option>
                        <option value="price-asc">Price (Low to High)</option>
                        <option value="price-desc">Price (High to Low)</option>
                    </select>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover" id="productTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($lists as $item) {
                        ?>
                            <tr>
                                <td data-label="Image">
                                    <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getImage() ? $item->getImage() : 'noimg.jpg' ?>' 
                                         class='product-image' 
                                         alt="<?= $item->getProductName() ?>"
                                         onclick="showProductDetails('<?= $item->getId() ?>', '<?= $item->getProductName() ?>', '<?= $item->getPrice() ?>', '<?= htmlspecialchars($item->getDescription()) ?>', '<?= $item->getImage() ? $item->getImage() : 'noimg.jpg' ?>')" />
                                </td>
                                <td data-label="Product ID">
                                    <span class="product-id">#<?= $item->getId() ?></span>
                                </td>
                                <td data-label="Product Name">
                                    <span class="product-name"><?= $item->getProductName() ?></span>
                                </td>
                                <td data-label="Price">
                                    <span class="price-tag">$<?= number_format($item->getPrice(), 2) ?></span>
                                </td>
                                <td data-label="Description">
                                    <div class="product-description" id="desc-<?= $item->getId() ?>">
                                        <?= $item->getDescription() ?>
                                    </div>
                                    <?php if (strlen($item->getDescription()) > 50): ?>
                                    <button class="btn btn-sm btn-link" onclick="toggleDescription('desc-<?= $item->getId() ?>')">
                                        <span id="toggle-text-<?= $item->getId() ?>">Read more</span>
                                    </button>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Actions">
                                    <div class="action-buttons">
                                        <a class="btn btn-primary btn-sm action-button" 
                                           role="button" 
                                           href="<?php echo href('product', 'editProduct') ?>&id=<?php echo $item->getId() ?>"
                                           title="Restore Product">
                                           <i class="fas fa-edit"></i>
                                           </a>
                                        <a onclick="confirmDelete(<?= $item->getId() ?>, '<?= $item->getProductName() ?>')" 
                                           class="btn btn-danger btn-sm action-button" 
                                           role="button"
                                           href="javascript:void(0)"
                                           title="Delete Permanently">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="pagination-container">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Product Details Modal -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalProductName">Product Details</h5>
            <button type="button" class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <div class="product-detail">
                <img id="modalProductImage" src="/placeholder.svg" alt="Product Image" class="product-detail-image">
                <div class="product-detail-info">
                    <div class="product-detail-name" id="modalProductTitle"></div>
                    <div class="product-detail-price" id="modalProductPrice"></div>
                    <div class="product-detail-description" id="modalProductDescription"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="closeModal()">Close</button>
        </div>
    </div>
</div>

<script>
    // Search functionality
    document.getElementById('productSearchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const table = document.getElementById('productTable');
        const rows = table.getElementsByTagName('tr');
        
        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let found = false;
            
            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent || cells[j].innerText;
                
                if (cellText.toLowerCase().indexOf(searchValue) > -1) {
                    found = true;
                    break;
                }
            }
            
            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
    
    // Sort functionality
    document.getElementById('productSortSelect').addEventListener('change', function() {
        const sortValue = this.value;
        const table = document.getElementById('productTable');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        
        rows.sort((a, b) => {
            let aValue, bValue;
            
            if (sortValue === 'name-asc' || sortValue === 'name-desc') {
                aValue = a.querySelector('.product-name').textContent.trim();
                bValue = b.querySelector('.product-name').textContent.trim();
                
                if (sortValue === 'name-asc') {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            } else if (sortValue === 'price-asc' || sortValue === 'price-desc') {
                aValue = parseFloat(a.querySelector('.price-tag').textContent.replace('$', '').replace(',', ''));
                bValue = parseFloat(b.querySelector('.price-tag').textContent.replace('$', '').replace(',', ''));
                
                if (sortValue === 'price-asc') {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            }
            
            return 0;
        });
        
        // Clear the table and append sorted rows
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        
        rows.forEach(row => {
            tbody.appendChild(row);
        });
    });
    
    // Toggle description
    function toggleDescription(id) {
        const desc = document.getElementById(id);
        const toggleText = document.getElementById('toggle-text-' + id.split('-')[1]);
        
        if (desc.classList.contains('expanded')) {
            desc.classList.remove('expanded');
            toggleText.textContent = 'Read more';
        } else {
            desc.classList.add('expanded');
            toggleText.textContent = 'Read less';
        }
    }
    
    // Confirm delete with better styling
    function confirmDelete(id, name) {
        if (confirm(`Are you sure you want to delete "${name}"? `)) {
            window.location.href = `<?php echo href('product', 'delete') ?>&id=${id}`;
        }
    }
    
    // Product details modal
    function showProductDetails(id, name, price, description, image) {
        const modal = document.getElementById('productModal');
        const modalTitle = document.getElementById('modalProductName');
        const modalProductTitle = document.getElementById('modalProductTitle');
        const modalProductPrice = document.getElementById('modalProductPrice');
        const modalProductDescription = document.getElementById('modalProductDescription');
        const modalProductImage = document.getElementById('modalProductImage');
        
        modalTitle.textContent = 'Product Details';
        modalProductTitle.textContent = name;
        modalProductPrice.textContent = `$${parseFloat(price).toFixed(2)}`;
        modalProductDescription.textContent = description;
        modalProductImage.src = `/BOOKSMART/BookShop/MVC/view/JS/img/${image}`;
        modalProductImage.alt = name;
        
        modal.style.display = 'block';
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target === modal) {
                closeModal();
            }
        };
    }
    
    function closeModal() {
        const modal = document.getElementById('productModal');
        modal.style.display = 'none';
    }
    
    // Add keyboard support for modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
    
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        tooltipTriggerEl.setAttribute('data-bs-toggle', 'tooltip');
        tooltipTriggerEl.setAttribute('data-bs-placement', 'top');
    });
</script>