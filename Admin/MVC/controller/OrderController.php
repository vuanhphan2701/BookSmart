<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\OrderController.php

class OrderController extends Controller
{
    private $orderRepository = null;
    public $userRepository = null;


    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new userRepository();
    }




    public function list()
    {
        // 1. Get all orders
        $orders = $this->orderRepository->list();
        $data = ['orders' => $orders];
        // dd($orders);
        $this->show('view/order/list', $data); // 'view/order/list' is our new view file
    }
    public function orderHistory()
    {
        $orders = $this->orderRepository->historyOrder();
        $data = ['orders' => $orders];
        // dd($orders);
        $this->show('view/order/history', $data); // 'view/order/list' is our new view file
    }

    public function delete()
    {
        $this->orderRepository->Delete($_GET['id']);
        $this->setError(['alert' =>
        messenger('Cancel Order Successfully', 'success')]);
        redirect(href('order', 'list'));
    }

    public function deletePermanently()
    {
        try {
            // Perform the deletion
            $this->orderRepository->deletePermanently($_GET['id']);

            // Set a success message
            $this->setError(['alert' => messenger('Order deleted successfully.', 'success')]);
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, display an error message)
            $this->setError(['alert' => messenger('Error deleting order. Please try again later.', 'danger')]);
        }

        // Redirect back to the order history page
        redirect(href('order', 'orderHistory'));
    }
}
