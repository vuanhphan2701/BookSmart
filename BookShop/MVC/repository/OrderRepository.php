<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\repository\OrderRepository.php

class OrderRepository extends Repository
{
    private $db = null;
    private $orderModel = null;

    function __construct()
    {
        $this->db = new Repository();
        $this->orderModel = new Order();
    }

    public function createOrder($userId, $cartItems)
    {
        // 1. Calculate the total price.
        $totalPrice = $this->calculateTotalPrice($cartItems);

        // 2. Insert a new order into the 'orders' table.
        $orderId = $this->insertOrder($userId, $totalPrice);

        if ($orderId === null) {
            // if can not create order
            return null;
        }
        // 3. Insert order details into the 'order_details' table.
        $this->insertOrderDetails($orderId, $cartItems);

        // 4. Return the newly created order ID.
        return $orderId;
    }

    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }

    private function insertOrder($userId, $totalPrice)
    {
        try {
            $this->db->setquery('INSERT INTO orders (user_id, total_price) VALUES (?, ?)')
                ->save([$userId, $totalPrice]);
            return $this->db->pdo->lastInsertId();
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, throw an exception).
            // In this example, we're just returning null.
            return null;
        }
    }

    private function insertOrderDetails($orderId, $cartItems)
    {
        try {
            $stmtDetail = $this->db->setquery('INSERT INTO order_details (order_id, product_id, image, product_name, quantity, price) VALUES (?,?,?, ?, ?, ?)');
            foreach ($cartItems as $item) {
                $stmtDetail->save([$orderId, $item['id'], $item['image'], $item['name'], $item['quantity'], $item['price']]);
            }
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, throw an exception).
            // In this example, we're just not doing anything.
            //throw $e;
        }
    }
    // list order user
    function getOrdersByUserId($userId)
    {
        $orders = [];
        $lists =  $this->db->setquery('SELECT * FROM orders WHERE orderDelete= 0  and user_id = ? ORDER BY created_at DESC')->loadrows([$userId]);
        //  dd($lists);
        foreach ($lists as $value) {
            $this->mapDataToModel($value, [
                'id',
                'user_id',
                'total_price',
                'orderStatus',
                'created_at'
            ]);

            $orders[] = clone  $this->orderModel;
            $this->orderModel->reset();
            //     dd($orders);
        }
        return $orders;
    }
    // list order cancel
    function historyCancel($userId)
    {
        $orders = [];
        $lists =  $this->db->setquery('SELECT * FROM orders WHERE orderDelete= 1  and user_id = ?')->loadrows([$userId]);
        //  dd($lists);
        foreach ($lists as $value) {
            $this->mapDataToModel($value, [
                'id',
                'user_id',
                'total_price',
                'orderStatus',
                'created_at'
            ]);

            $orders[] = clone  $this->orderModel;
            $this->orderModel->reset();
            //     dd($orders);
        }
        return $orders;
    }
    // cancel order
    function Delete($id)
    {
        return $this->db
            ->setquery('update orders set orderDelete= 1 where id=?')
            ->save([$id]);
    }
    function deletePermanently($id)
    {
        try {
            $sqlDeleteOrderDetails = "DELETE FROM order_details WHERE order_id = ?";
            $this->db->setquery($sqlDeleteOrderDetails)->save([$id]);

            $sqlDeleteOrder = "DELETE FROM orders WHERE id = ?";
            $this->db->setquery($sqlDeleteOrder)->save([$id]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
//------------------------------------------------------------------------------
    function list()
    {
        $orders = [];
        $lists =  $this->db->setquery('SELECT
        o.id AS order_id,                  
        o.user_id,                  
        o.total_price AS order_total_price, 
        o.orderStatus, 
        o.created_at AS order_created_at,    
        od.detail_id,               
        od.image AS product_image,  
        od.product_name,            
        od.product_id,              
        od.quantity,                
        od.price AS price   
    FROM orders o
    JOIN order_details od 
        ON o.id = od.order_id ORDER BY o.created_at DESC;')->loadrows();

        $orderGroup = [];
        foreach ($lists as $list) {
            $orderId = $list->order_id;
            if (!isset($orderGroup[$orderId])) {
                $this->mapDataToModel($list);
                $orderGroup[$orderId] = clone $this->orderModel;
                $orderGroup[$orderId]->orderDetails = [];
            }
            $orderGroup[$orderId]->orderDetails[] = [
                'detailId' => $list->detail_id,
                'productImage' => $list->product_image,
                'productName' => $list->product_name,
                'productId' => $list->product_id,
                'quantity' => $list->quantity,
                'price' => $list->price,
            ];
            $this->orderModel->reset();
        }
        //dd($orderGroup);

        return $orderGroup;
    }
    function getOrderDetailsByOrderId($orderId)
    {
        $orderDetails = [];
        $lists =  $this->db->setquery('SELECT * FROM order_details WHERE order_id = ? ')->loadrows([$orderId]);
        foreach ($lists as $value) {
            $this->mapDataToModel($value, [
                'detailId',
                'orderId',
                'productId',
                'quantity',
                'price'
            ]);

            $orderDetails[] = clone  $this->orderModel;
            $this->orderModel->reset();
        }
        // dd($orderDetails);
        return $orderDetails;
    }

    public function getOrdersByUserIdWithDetails($userId)
    {
        $orders = [];
        $lists =  $this->db->setquery('SELECT
        o.id ,                  
        o.user_id,                  
        o.total_price ,  
        o.orderStatus, 
        o.created_at ,    
        od.detail_id,               
        od.image AS product_image,  
        od.product_name,            
        od.product_id,              
        od.quantity,                
        od.price   
    FROM orders o
    JOIN order_details od 
        ON o.id = od.order_id WHERE o.user_id = ? 
         ORDER BY o.created_at DESC ')->loadrows([$userId]);
        $orderGroup = [];
        //dd($lists);
        foreach ($lists as $value) {
            $orderId = $value->id;
            if (!isset($orderGroup[$orderId])) {
                $this->mapDataToModel($value);
                $orderGroup[$orderId] = clone $this->orderModel;
                $orderGroup[$orderId]->orderDetails = [];
            }
            $orderGroup[$orderId]->orderDetails[] = [
                'detailId' => $value->detail_id,
                'productImage' => $value->product_image,
                'productName' => $value->product_name,
                'productId' => $value->product_id,
                'quantity' => $value->quantity,
                'price' => $value->price,
            ];
            $this->orderModel->reset();
        }
        //   /  dd( $orderGroup);

        return $orderGroup;
    }

   
    function statusPayment($id)
    {
        $this->db->setquery("UPDATE `orders` SET `orderStatus` = '1' WHERE `orders`.`id`= ?")
            ->save([$id]);
    }
    //----------------------------------------------- MAP DATA TO MODEL  -----------------------------------------------------------


    function mapDataToModel($value, $fields = [])
    {

        if (empty($fields) || in_array('id', $fields)) {
            $this->orderModel->setId($value->id);
        }
        if (empty($fields) || in_array('detailId', $fields)) {
            $this->orderModel->setDetailId($value->detail_id);
        }

        if (empty($fields) || in_array('productId', $fields)) {
            $this->orderModel->setProductId($value->product_id);
        }
        if (empty($fields) || in_array('userId', $fields)) {
            $this->orderModel->setUserId($value->user_id);
        }
        if (empty($fields) || in_array('total_price', $fields)) {
            $this->orderModel->setTotalPrice($value->total_price);
        }
        if (empty($fields) || in_array('orderStatus', $fields)) {
            $this->orderModel->setOrderStatus($value->orderStatus);
        }
        if (empty($fields) || in_array('quantity', $fields)) {
            $this->orderModel->setQuantity($value->quantity);
        }
        if (empty($fields) || in_array('price', $fields)) {
            $this->orderModel->setPrice($value->price);
        }
        if (empty($fields) || in_array('created_at', $fields)) {
            $this->orderModel->setCreatedAt($value->created_at);
        }
        if (empty($fields) || in_array('productImage', $fields)) {
            $this->orderModel->setProductImage($value->product_image);
        }
        if (empty($fields) || in_array('productName', $fields)) {
            $this->orderModel->setProductName($value->product_name);
        }
    }
}
