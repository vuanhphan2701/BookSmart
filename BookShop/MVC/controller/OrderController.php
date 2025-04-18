<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\OrderController.php

class OrderController extends Controller
{
    private $orderRepository = null;
    private $productRepository = null;
    private $userRepository = null;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
        $this->productRepository = new productRepository();
        $this->userRepository = new userRepository();
    }
    // list order history
    public function orderHistory()
    {
        if (!isset($_SESSION['login_id'])) {
            // Handle case where user is not logged in (e.g., redirect to login)
            $this->setError(['alert' => messenger('You need to log in to view your order history.', 'warning')]);
            redirect(href('user', 'authenticate'));
            return; // Stop further execution
        }

        $userId = $_SESSION['login_id'];
        $orders = $this->orderRepository->getOrdersByUserId($userId);

        // Now you can pass the $orders array to your view
        // dd($orderDetails);
        $data = ['orders' => $orders];
        // dd($orders);

        $this->show('view/product/orderHistory', $data);
    }
    // list order cancel
    public function orderCancel()
    {
        if (!isset($_SESSION['login_id'])) {
            // Handle case where user is not logged in (e.g., redirect to login)
            $this->setError(['alertOrder' => messenger('You need to log in to view your order history.', 'warning')]);
            redirect(href('user', 'authenticate'));
            return; // Stop further execution
        }

        $userId = $_SESSION['login_id'];
        $orders = $this->orderRepository->historyCancel($userId);

        // Now you can pass the $orders array to your view
        // dd($orderDetails);
        $data = ['orders' => $orders];
        // dd($user);

        $this->show('view/product/cancelHistory', $data);
    }
    // deail order  
    public function detailOrder()
    {
        if (!isset($_GET['id'])) {
            redirect(href('order', 'orderHistory'));
        }
        $orderId = $_GET['id'];
        $userId = $_SESSION['login_id'];
        $user = $this->userRepository->getUserById($userId);
        //get order with detail
        $orders = $this->orderRepository->getOrdersByUserIdWithDetails($userId);
        // dd($orders);
        $order = null;
        foreach ($orders as $o) {
            if ($o->getId() == $orderId) {
                $order = $o;
                break;
            }
        }
        if ($order == null) {
            $this->setError(['alert' => messenger('Order not found.', 'danger')]);
            redirect(href('order', 'orderHistory'));
        }

        $data = ['order' => $order, 'user' => $user[0]];
        $this->show('view/product/detailOrder', $data);
    }

    public function deletePermanently()
    {
        //  dd()
        $this->orderRepository->deletePermanently($_GET['id']);
        $this->setError(['alertOrder' =>
        messenger('Cancel Order Successfully', 'success')]);
        redirect(href('order', 'orderCancel'));
    }
    public function delete()
    {
        $this->orderRepository->Delete($_GET['id']);
        $status = $_GET['status']; // Lấy status trực tiếp từ GET
        $isPaid = ($status == '1');
        if ($isPaid) {
            $this->setError(['alertOrder' =>
            messenger('Order cancelled successfully.
            Your payment has been refunded to your account.', 'success')]);
            redirect(href('order', 'orderHistory'));
        } else {
            $this->setError(['alertOrder' =>
            messenger('Cancel Order Successfully', 'success')]);
            redirect(href('order', 'orderHistory'));
        }
    }
}
