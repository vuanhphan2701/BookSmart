<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img
                        src="public/assets/img/kaiadmin/v.png"
                        alt="navbar brand"
                        class="navbar-brand"
                        height="20"/>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="nav nav-secondary">

                <li class="nav-item active">
                    <a
                            data-bs-toggle="collapse"
                            href="#dashboard"
                            class="collapsed"
                            aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Phan Anh Vu</p>
                    </a>
                </li>
                <li class="nav-section">
           <span class="sidebar-mini-icon">
             <i class="fa fa-ellipsis-h"></i>
           </span>
                    <h4 class="text-section">Information</h4>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE ?>">
                        <i class="fa fa-home search-icon"></i>
                        <p>Home</p>
                    </a>
                </li>


                <!-- <li class="nav-item">
           <a data-bs-toggle="collapse" href="#base">
             <i class="fas fa-user-cog"></i>
             <p>Manage User</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="base">
             <ul style="list-style-type:none;">
               <li>
                 <a href="<?php //echo href('user', 'getAllUsers') 
                ?>">
                   <i class="fas fa-list"></i>
                   <span class="sub-item">List User</span>
                 </a>
               </li>
               <li>
                 <a href="<?php // echo href('user', 'addNewUser') 
                ?>">
                   <i class="fas fa-plus-square add-icon"></i>
                   <span class="sub-item">Add User</i></span>
                 </a>
               </li>
               <li>
                 <a href="<?php // echo href('user', 'checkHistory') 
                ?>">
                   <i class="fa fa-trash search-icon"></i>
                   <span class="sub-item">History</i></span>
                 </a>
               </li>
               <li>
               <li>
                 <a href="<?php //echo href('Role', 'index') 
                ?>">
                   <i class="fa fa-users group-icon"></i>
                   <span class="sub-item">Role</span>
                 </a>
               </li>
             </ul>
           </div>
         </li> -->


                <li class="nav-item">
                    <?php
                    if ($this->parent) {
                        // dd($this->parent);
                        foreach ($this->parent as $pr) {
                            $childs = $this->roleModel->listMenu($_SESSION["login_id_admin"], $pr->id);
                            ?>
                            <a data-bs-toggle="collapse" href="#collapse<?= $pr->id ?>">
                                <i class="<?php echo $pr->icon ?>"></i>
                                <p><?php echo $pr->name ?></p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="collapse<?= $pr->id ?>">
                                <ul style="list-style-type:none;">
                                    <?php foreach ($childs as $ch) {
                                        ?>
                                        <li>
                                            <a href="<?php echo href($ch->controller, $ch->action) ?>">
                                                <i class="<?php echo $ch->icon ?>"></i>
                                                <span><?php echo $ch->name ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        <?php }
                    } else {
                        ?>

                        <p>you do not permision to set role</p>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <a href="<?php echo href('user', 'logOut') ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Sign out</p>
                    </a>
                </li>


            </div>
        </div>
    </div>
</div>
<!-- End Sidebar -->