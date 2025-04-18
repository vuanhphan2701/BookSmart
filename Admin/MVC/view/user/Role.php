<style>
  /* Custom styles for user list */
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
    font-size: 1rem;
    font-weight: 600;
    color: #172b4d;
  }
  
  .card-body {
    flex: 1 1 auto;
    padding: 1.5rem;
  }
  
  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.03);
  }
  
  .table thead th {
    font-size: 0.85rem;
    font-weight: 600;
    color: #8898aa;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 1px solid #e9ecef;
    padding: 1rem;
  }
  
  .table td {
    padding: 1rem;
    vertical-align: middle;
    border-top: 1px solid #e9ecef;
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
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  
  .btn-sm {
    padding: 0.25rem 0.5rem;
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
  
  .user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
  }
  
  .user-details {
    display: flex;
    flex-direction: column;
  }
  
  .user-name {
    font-weight: 600;
    color: #172b4d;
    margin-bottom: 0.25rem;
  }
  
  .user-username {
    font-size: 0.875rem;
    color: #8898aa;
  }
  
  .action-button {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .action-button i {
    font-size: 0.875rem;
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
  
  .filter-dropdown {
    position: relative;
  }
  
  .filter-button {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    cursor: pointer;
  }
  
  .filter-button i {
    color: #8898aa;
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
</style>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">User Management</div>
        </div>
        <div class="card-body">
            <div class="search-filter">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search users..." id="userSearchInput">
                </div>
                <div class="filter-dropdown">
                    <div class="filter-button">
                        <i class="fas fa-filter"></i>
                        <span>Filter</span>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getImage() ? $item->getImage() : 'public/images/noimg.jpg' ?>' 
                                             class='user-avatar' 
                                             alt="<?= $item->getName() ?>" />
                                        <div class="user-details">
                                            <div class="user-name"><?= $item->getName() ?></div>
                                            <div class="user-username">@<?= $item->getUsername() ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getGender() ?>.jpg" 
                                             class='gender-icon' 
                                             alt="<?= $item->getGender() ?>" />
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div><i class="fas fa-phone-alt me-2 text-muted"></i> <?= $item->getPhone() ?></div>
                                        <div><i class="fas fa-envelope me-2 text-muted"></i> <?= $item->getEmail() ?></div>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    echo $item->getStatus() == 1 
                                        ? '<span class="badge bg-success">Active</span>' 
                                        : '<span class="badge bg-dark">Inactive</span>'
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary btn-sm action-button" 
                                           role="button" 
                                           href="<?php echo href('Role', 'setRole') ?>&id=<?php echo $item->getId() ?>">
                                            <i class="fas fa-user-shield"></i> Set Role
                                        </a>
                                        <a class="btn btn-info btn-sm action-button ms-2" 
                                           role="button" 
                                           href="<?php echo href('user', 'checkProfile') ?>&id=<?php echo $item->getId() ?>">
                                            <i class="fas fa-eye"></i> View
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
</script>