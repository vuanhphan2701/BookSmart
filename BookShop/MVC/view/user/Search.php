<div class="row">
    <div class="col">
    <div class="text-start">
        <a name="" class="btn btn-dark" role="button" href="<?php echo href('user', 'getAllUsers'); ?>"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h3 class="text-center">User <?php  echo  $_POST['user_name'] ;?></h3>
      
        <table class="table table-striped table-hover ">
            <thead class="table-light">
                <tr>
                    <th>Figure</th>
                    <th>UserName</th>
                    <th>Gender</th>
                    <th>FullName</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Profile</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lists as $item) {
                    //echo '<pre>',print_r($item),'</pre>';
                ?>
                    <tr>
                        <td scope="row"> <img src='<?= $item->getImage() ? $item->getImage() : 'public/images/noimg.jpg' ?>' width="70px" class='img-fluid rounded-top' /></td>
                        <td><?= $item->getUsername() ?></td>
                        <td><img src="./public/images/<?= $item->getGender() ?>.jpg" width="40px" class='img-fluid rounded-top'> </td>
                        <td><?= $item->getName() ?></td>
                        <td><?= $item->getPhone() ?></td>
                        <td><?= $item->getEmail() ?></td>
                        <td>
                            <?php
                            echo  $item->getStatus() == 1 ? '<span class="badge bg-success">active</span>' : '<span class="badge bg-dark">lock</span>'
                            ?>

                        </td>
                        <td> <a name="" class="btn btn-dark" role="button" href="<?php echo href('user' ,'checkProfile')?>&id=<?php echo $item->getId() ?>"><i class="fas fa-user profile-icon"></i></a></td>

                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>


</div>