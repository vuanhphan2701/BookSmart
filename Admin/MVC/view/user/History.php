<?php
defined('BASE') or exit('access deny');
?>

<style>
  /* Custom styles for deleted users page */
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
  
  .badge {
    display: inline-block;
    padding: 0.35em 0.65em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 50px;
  }
  
  .bg-success {
    background-color: #2dce89 !important;
  }
  
  .bg-dark {
    background-color: #172b4d !important;
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
  
  .btn-dark {
    color: #fff;
    background-color: #172b4d;
    border-color: #172b4d;
  }
  
  .btn-dark:hover {
    color: #fff;
    background-color: #0f1c33;
    border-color: #0a1526;
  }
  
  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  
  .user-avatar {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  }
  
  .gender-icon {
    width: 30px;
    height: 30px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
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
  
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
  }
  
  .page-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #172b4d;
    margin: 0;
  }
  
  .empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3rem;
    text-align: center;
  }
  
  .empty-state-icon {
    font-size: 3rem;
    color: #8898aa;
    margin-bottom: 1rem;
  }
  
  .empty-state-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #172b4d;
    margin-bottom: 0.5rem;
  }
  
  .empty-state-description {
    color: #8898aa;
    max-width: 400px;
    margin-bottom: 1.5rem;
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
  
  .alert-warning {
    color: #fb6340;
    background-color: #fee3d7;
    border-color: #fed8c4;
  }
  
  .alert-info {
    color: #11cdef;
    background-color: #d0f7fb;
    border-color: #c0f3fa;
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
  }
</style>

<?php
$user = new userController();
echo $user->getError('alert')
?>

<div class="page-header">
    <div class="page-title">Deleted Users</div>
    <a class="btn btn-dark" role="button" href="<?php echo href('user', 'getAllUsers'); ?>">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Trash Bin</div>
            <div class="text-muted">Users in trash can be restored or permanently deleted</div>
        </div>
        <div class="card-body">
            <div class="search-filter">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search deleted users..." id="userSearchInput">
                </div>
            </div>
            
            <?php if (empty($list)): ?>
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <div class="empty-state-title">No Deleted Users</div>
                <div class="empty-state-description">
                    There are no users in the trash bin. Deleted users will appear here.
                </div>
            </div>
            <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Full Name</th>
                            <th>Contact Info</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                                <td data-label="Avatar">
                                    <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getImage() ? $item->getImage() : 'public/images/noimg.jpg' ?>' 
                                         class='user-avatar' 
                                         alt="User Avatar" />
                                </td>
                                <td data-label="Username"><?= $item->getUsername() ?></td>
                                <td data-label="Gender">
                                    <img src="/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getGender() ?>.jpg" 
                                         class='gender-icon' 
                                         alt="Gender" />
                                </td>
                                <td data-label="Full Name"><?= $item->getName() ?></td>
                                <td data-label="Contact Info">
                                    <div>
                                        <div><i class="fas fa-phone-alt me-2 text-muted"></i> <?= $item->getPhone() ?></div>
                                        <div><i class="fas fa-envelope me-2 text-muted"></i> <?= $item->getEmail() ?></div>
                                    </div>
                                </td>
                                <td data-label="Status">
                                    <?php
                                    echo $item->getStatus() == 1 
                                        ? '<span class="badge bg-success">Active</span>' 
                                        : '<span class="badge bg-dark">Inactive</span>'
                                    ?>
                                </td>
                                <td data-label="Actions">
                                    <div class="action-buttons">
                                        <a class="btn btn-primary btn-sm action-button" 
                                           role="button" 
                                           href="<?php echo href('user', 'restore') ?>&id=<?php echo $item->getId() ?>"
                                           title="Restore User">
                                            <i class="fas fa-undo"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure you want to permanently delete this user? This action cannot be undone.')" 
                                           class="btn btn-danger btn-sm action-button" 
                                           role="button" 
                                           href="<?php echo href('user', 'deletePermanently') ?>&id=<?php echo $item->getId() ?>"
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
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // Simple search functionality
    document.getElementById('userSearchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const table = document.getElementById('userTable');
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
    
    // Confirm delete with better styling
    function confirmPermanentDelete(userId) {
        if (confirm('Are you sure you want to permanently delete this user? This action cannot be undone.')) {
            window.location.href = '<?php echo href('user', 'deletePermanently') ?>&id=' + userId;
        }
    }
</script>