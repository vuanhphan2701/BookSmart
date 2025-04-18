<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('view/widgets/Head.php') ?>
</head>
<body>
  <div class="wrapper">

    <!-- Sidebar -->
    <?php include('view/widgets/Sidebar.php') ?>

    <div class="main-panel">
      <div class="main-header">

        <!-- Navbar Header -->
        <?php include('view/widgets/Nav.php') ?>
      </div>

      <div class="container">
        <div class="page-inner">
          <!-- Content -->
          <div class="col-md-12">
            <div class="card card-round">
              <?php
              include($view . '.php');
              ?>

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <?php //include('widgets/footer.php') 
  ?>
  </div>
  </div>
  <!--   Core JS Files   -->
  <?php include('view/widgets/Js.php') ?>
</body>

</html>