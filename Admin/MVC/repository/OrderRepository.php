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
    // create order
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
    // caculate total price
    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    // insert order
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
    //insert order details
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
    // get order by id
    function getOrdersByUserId($userId)
    {
        $orders = [];
        $lists =  $this->db->setquery('SELECT * FROM orders WHERE user_id = ?')->loadrows([$userId]);
        foreach ($lists as $value) {
            $this->mapDataToModel($value, [
                'id',
                'userId',
                'totalPrice',
                'orserStatus',
                'createdAt'
            ]);

            $orders[] = clone  $this->orderModel;
            $this->orderModel->reset();
        }
        return $orders;
    }
    // list order
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
        od.price AS product_price   
    FROM orders o
    JOIN order_details od 
        ON o.id = od.order_id  where orderDelete = 0 ORDER BY o.created_at DESC ;')->loadrows();

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
                'price' => $list->product_price,
            ];
            $this->orderModel->reset();
        }
        //dd($orderGroup);

        return $orderGroup;
    }
    // get oreder detail by order id
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
        return $orderDetails;
    }
    // get order by user with detail 
    public function getOrdersByUserIdWithDetails($userId)
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
        od.price AS product_price   
    FROM orders o
    JOIN order_details od 
        ON o.id = od.order_id WHERE o.user_id = ? 
         ORDER BY o.created_at DESC ')->loadrows([$userId]);

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
                'price' => $list->product_price,
            ];
            $this->orderModel->reset();
        }

        return $orderGroup;
    }
    // detele order
    function Delete($id)
    {
        return $this->db
            ->setquery('update orders set orderDelete= 1 where id=?')
            ->save([$id]);
    }
    // history order delete
    function historyOrder()
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
        od.price AS product_price   
    FROM orders o
    JOIN order_details od 
        ON o.id = od.order_id  where orderDelete = 1 ORDER BY o.created_at DESC ;')->loadrows();

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
                'price' => $list->product_price,
            ];
            $this->orderModel->reset();
        }
        //dd($orderGroup);

        return $orderGroup;
    }
    //delete order permanently
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
    //----------------------------------------------- MAP DATA TO MODEL  -----------------------------------------------------------


    function mapDataToModel($value, $fields = [])
    {

        if (empty($fields) || in_array('id', $fields)) {
            $this->orderModel->setId($value->order_id);
        }
        if (empty($fields) || in_array('detailId', $fields)) {
            $this->orderModel->setDetailId($value->detail_id);
        }
        if (empty($fields) || in_array('orderId', $fields)) {
            $this->orderModel->setOrderId($value->order_id);
        }
        if (empty($fields) || in_array('productId', $fields)) {
            $this->orderModel->setProductId($value->product_id);
        }
        if (empty($fields) || in_array('userId', $fields)) {
            $this->orderModel->setUserId($value->user_id);
        }
        if (empty($fields) || in_array('totalPrice', $fields)) {
            $this->orderModel->setTotalPrice($value->order_total_price);
        }
        if (empty($fields) || in_array('orderStatus', $fields)) {
            $this->orderModel->setOrderStatus($value->orderStatus);
        }
        if (empty($fields) || in_array('quantity', $fields)) {
            $this->orderModel->setQuantity($value->quantity);
        }
        if (empty($fields) || in_array('price', $fields)) {
            $this->orderModel->setPrice($value->product_price);
        }
        if (empty($fields) || in_array('createdAt', $fields)) {
            $this->orderModel->setCreatedAt($value->order_created_at);
        }
        if (empty($fields) || in_array('productImage', $fields)) {
            $this->orderModel->setProductImage($value->product_image);
        }
        if (empty($fields) || in_array('productName', $fields)) {
            $this->orderModel->setProductName($value->product_name);
        }
    }
}
