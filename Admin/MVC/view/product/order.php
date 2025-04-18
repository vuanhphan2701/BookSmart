<?php
$alert = new userController;
echo $alert->getError('alert');
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">List Users</div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product_id</th>
                        <th>Image</th>
                        <th>Product_name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lists as $item) {
                    ?>
                        <tr>
                            <td><?= $item->getId() ?></td>

                            <td scope="row"> <img src='/BOOKSMART/BookShop/MVC/view/JS/img/<?= $item->getImage() ? $item->getImage() : 'noimg.jpg' ?>' width="70px" class='img-fluid rounded-top' /></td>
                            <td><?= $item->getProductName() ?></td>
                            <td><?= $item->getPrice() ?></td>
                            <td><?= $item->getDescription() ?></td>
                            <td>
                                <a name="" class="btn btn-primary" role="button" href="<?php echo href('product', 'editProduct') ?>&id=<?php echo $item->getId() ?>"><i class="fas fa-edit edit-icon"></i>
                                </a>
                                <a  class="btn btn-danger" role="button" href="<?php echo href('product', 'delete') ?>&id=<?php echo $item->getId() ?>"><i class="fa fa-trash search-icon"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>