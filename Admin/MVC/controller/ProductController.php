<?php
class productController extends controller
{
    public $productRepository = null;
    // khởi tạo instance
    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new productRepository();
    }

    // get all users
    function list()
    {
        $list = $this->productRepository->list();
        // dd($list);
        $data = ['lists' => $list];
        $this->show('view/product/List', $data);
    }
    function delete()
    {
        //dd($_GET);
        if (isset($_GET['id'])) {
            $list =  $this->productRepository->delete($_GET['id']);
            $this->setError(['alert' => $list ?
                messenger('Delete Book Successfully', 'success') :
                messenger('Delete Book Failed')]);
            redirect(href('product', 'List'));
        }
    }
    function deletePermanently()
    {
        if (isset($_GET['id'])) {
            $list = $this->productRepository->deletePermanently($_GET['id']);
            $this->setError(['alert' => $list ?
                messenger('Delete Book Successfully', 'success') :
                messenger('Delete Book Failed')]);
            redirect(href('product', 'history'));
        }
    }
    function editProduct()
    {
        $edit = $this->productRepository->getProductById($_GET['id']);
        $data = ['lists' => $edit];

        if (!isset($_GET['id']) && !$_GET['id']) {
            redirect(BASE);
        }

        $this->show('view/product/Edit', $data);
    }
    function save()
    {
        //dd($_POST);
        if (!isset($_POST['product_name'], $_POST['product_id'])) {
            redirect(href('product', 'editProduct'));
        }

        $lists = $this->productRepository->getProductById($_POST['id']);
        foreach ($lists as $item) {

            if (!$lists) {
                redirect(href('product', 'editProduct'));
            }

            $avt = $item->getImage();
            if (isset($_FILES['avt']['error']) && $_FILES['avt']['error'] == 0) {
                $avt = myUpload(
                    $_FILES['avt'] ?? null,
                    $imgMessenger,
                    '../../BookShop/MVC/view/JS/img'
                );
            } else {
                if (!$_POST['avt_2']) {
                    unlink($avt);
                    $avt = '';
                }
            }

            $update = $this->productRepository->update(
                trim($item->getId()),
                trim($_POST['product_name']),
                $avt,
                trim($_POST['description']),
                trim($_POST['price']),
                trim($_POST['updated_at'])

            );

            $this->setError(['alert1' => !$update ?
                messenger('Update Faild') :
                messenger('Update Successfully', 'success')]);

            redirect(href('product', 'editProduct', ['id' => $item->getId()]));
            $user = $this->productRepository->getProductById($item->getId());
        }
    }
    function addNewProduct()
    {
        if (isset($_POST['product_name'])) {
            $avt = myUpload(
                $_FILES['avt'] ?? null,
                $imgMessenger,
                '../../BookShop/MVC/view/JS/img'
            );
            $product_name = $_POST['product_name'] ?? '';
            $price = $_POST['price'] ?? '';
            $description = $_POST['description'] ?? '';
            $created_at = $_POST['created_at'] ?? null;
            $updated_at = $_POST['updated_at'] ?? null;
            $flag = true;
            $messenger = '';



            if ($product_name == '') {
                $flag = false;
                $messenger .= 'product_name must not empty<br>';
            }

            if ($price == '') {
                $flag = false;
                $messenger .= 'price must not empty<br>';
            }
            if ($description == '') {
                $flag = false;
                $messenger .= 'description must not empty<br>';
            }



            if ($flag) {
                $create = $this->productRepository
                    ->add(
                        $product_name,
                        $avt,
                        $description,
                        $price,

                    );


                if ($create) {
                    $this->setError(['alert2' =>
                    messenger('User product successfully.', 'success')]);
                } else {
                    $this->setError(['alert2' =>
                    messenger('Failed to product user.')]);

                    redirect(href('user', 'addNewUser'));
                }
            } else {
                $this->setError(['alert2' => messenger($messenger)]);
            }
        }
        $this->show('view/product/Add', '');
    }
    function history()
    {
        $list = $this->productRepository->history();
        $data = ['lists' => $list];
        $this->show('view/product/History', $data);
    }
    function restore()
    {
        if (isset($_GET['id'])) {
            $list =  $this->productRepository->restore($_GET['id']);
            $this->setError(['alert' => $list ?
                messenger('Restore Book Successfully', 'success') :
                messenger('Restore Book Failed')]);
            redirect(href('product', 'history'));
        }
    }
    function search()
    {
        $lists = $this->productRepository->search($_POST['user_name']);
        $this->show('view/product/Search', ['lists' => $lists]);
    }
}
