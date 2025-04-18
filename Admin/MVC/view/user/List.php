<?php
defined('BASE') or exit('access deny');
?>

<style>
  /* Custom styles for user management */
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

  .add-user-btn {
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

  .add-user-btn:hover {
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
$alert = new userController;
echo $alert->getError('alert');
?>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="card-title">User Management</div>
      <a href="<?php echo href('user', 'addNewUser') ?>" class="add-user-btn">
        <i class="fas fa-plus"></i> Add New User
      </a>
    </div>
    <div class="card-body">
      <div class="search-filter">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search users..." id="userSearchInput">
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover" id="userTable">
          <thead>
            <tr>
              <th>Avatar</th>
              <th>Full Name</th>
              <th>Gender</th>
              <th>Contact Info</th>
              <th>Status</th>
              <th>Actions</th>
              <th>Profile</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($list as $item) {
            ?>
              <tr>
                <td data-label="Avatar">
                  <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getImage() ? $item->getImage() : 'BookShop/MVC/public/images/noimg.jpg' ?>'
                    class='user-avatar'
                    alt="User Avatar" />
                </td>
                <td data-label="Full Name"><?= $item->getName() ?></td>

                <td data-label="Gender">
                  <img src="/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getGender() ?>.jpg"
                    class='gender-icon'
                    alt="Gender" />
                </td>
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
                      href="<?php echo href('user', 'editUser') ?>&id=<?php echo $item->getId() ?>"
                      title="Edit User">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Are you sure you want to delete this user?')"
                      class="btn btn-danger btn-sm action-button"
                      role="button"
                      href="<?php echo href('user', 'delete') ?>&id=<?php echo $item->getId() ?>"
                      title="Delete User">
                      <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </td>
                <td data-label="Profile">
                  <a class="btn btn-dark btn-sm action-button"
                    role="button"
                    href="<?php echo href('user', 'checkProfile') ?>&id=<?php echo $item->getId() ?>"
                    title="View Profile">
                    <i class="fas fa-user"></i>
                  </a>
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

  // Confirm delete with better styling
  function confirmDelete(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
      window.location.href = '<?php echo href('user', 'delete') ?>&id=' + userId;
    }
  }
</script>