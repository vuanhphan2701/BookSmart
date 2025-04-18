<?php
class productController extends controller
{
    public $productRepository = null;
    public $orderRepository = null;
    public $userRepository = null;
    public $commentRepository = null;

    // khởi tạo instance
    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new productRepository();
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new userRepository();
        $this->commentRepository = new CommentRepository();
    }
    // get all users
    function home()
    {
        //  dd($_SESSION);

        $list = $this->productRepository->list();
        $typeBook = ['recommend', 'popular', 'special', 'trending', 'feature', 'new', 'best_seller', 'best_seller_new'];
        $listType = [];
        foreach ($typeBook as $type) {
            $listType[$type] = $this->productRepository->listType($type);
        }
        //dd($listType);
        $data = ['lists' => $list, 'listType' => $listType];
        // dd($data);
        $this->show('view/product/home', $data, 'LayoutLogin');
    }

    // list book
    function list()
    {
        $list = $this->productRepository->list();
        $data = ['lists' => $list];
        //   dd($data);
        $this->show('view/product/list', $data);
    }
    // order history
    function orderHistory()
    {
        $this->show('view/product/orderHistory');
    }
    //delete bool
    function delete()
    {
        //dd($_GET);
        if (isset($_GET['id'])) {
            $list =  $this->productRepository->delete($_GET['id']);
            $this->setError(['alert' => $list ?
                messenger('Delete Book Successfully', 'success') :
                messenger('Delete Book Failed')]);
            redirect(href('product', 'list'));
        }
    }

    // detail book
    function detail()
    {
        if ($_GET['id']) {
            $list = $this->productRepository->detail($_GET['id']);
            // dd($list);
            $comments = $this->commentRepository->getCommentsByProductId($_GET['id']);
            // dd($comments);
            $data = ['lists' => $list, 'comments' => $comments];
            // dd($comments);
            $this->show('view/product/detail', $data);
        }
    }
    // comment 
    public function addComment()
    {
        // dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['product_id'];
            $userName = $_POST['user_name']; // You might get this from a user session later
            $commentText = $_POST['comment_text'];
            $userId = $_SESSION['login_id'];

            $success = $this->commentRepository->addComment($productId, $userId, $userName, $commentText);

            if ($success) {
                $this->setError(['alert' =>
                messenger('Upload Comment successfully.', 'success')]);
                header("Location: " . href('product', 'detail') . "&id=" . $productId);
                exit();
            } else {
                // Handle error (e.g., show an error message)
                $this->setError(['alert1' =>
                messenger('Upload Comment Failed.')]);
                echo "Error adding comment.";
            }
        }
    }
    // delete commetn
    public function ajaxDeleteComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_id'])) {
            $commentId = $_POST['comment_id'];
            $result = $this->commentRepository->deleteComment($commentId);

            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete comment.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        }
    }
    // edit comment
    public function ajaxEditComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_id']) && isset($_POST['new_text'])) {
            $commentId = $_POST['comment_id'];
            $newText = $_POST['new_text'];
            $result = $this->commentRepository->editComment($commentId, $newText);

            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to edit comment.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        }
    }
    // about booksmart
    function about()
    {
        $this->show('view/product/about');
    }

    // category book
    function category()
    {
        //if(isset($_GET['type'])){
        $list = $this->productRepository->category($_GET['type']);
        //  dd($list);

        $this->show('view/product/category', ['category' => $list]);
        // }
    }

    // search book
    function search()
    {
        // dd($_POST);
        $lists = $this->productRepository->search($_POST['product_name']);
        $keyword = $_POST['product_name'] ?? ''; // Lấy keyword, mặc định là chuỗi rỗng nếu không có
        $this->show('view/product/Search', ['lists' => $lists, 'searchedKeyword' => $keyword]);
    }

    // search by genre
    function searchGender()
    {
        $gender = $this->productRepository->searchGender($_POST['gender']);
        $keyword = $_POST['gender'] ?? ''; // Lấy keyword, mặc định là chuỗi rỗng nếu không có
        $this->show('view/product/searchGender', ['gender' => $gender, 'genreKeyWord' => $keyword]);
    }
    // contact page
    function contact()
    {
        $this->show('view/product/contact');
    }
    // read bool 
    function read()
    {
        if ($_GET['id']) {
            $list = $this->productRepository->detail($_GET['id']);
            //  dd($list);
            $data = ['lists' => $list];
            // dd($data);
            $this->show('view/product/read', $data, 'lay');
        }
    }
    //========================================wishlist=========================================================================
    // wish list books
    function prefer()
    {
        // Initialize session if not set
        if (!isset($_SESSION['prefer'])) {
            $_SESSION['prefer'] = [];
        }

        // Check if it's a POST request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['id'] ?? null;
            $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
            $name = $_POST['name'] ?? 'Unknown Product';
            $image = $_POST['image'] ?? 'noimg.jpg'; // Ensure a default image if needed
            $description = $_POST['description'] ?? '';

            // Check if essential data is present
            if ($productId === null) {
                // Handle missing product ID for AJAX and non-AJAX
                if (isset($_POST['ajax']) && $_POST['ajax'] == 'true') {
                    header('Content-Type: application/json');
                    // Calculate current count even on error
                    $wishlistCount = isset($_SESSION['prefer']) ? count($_SESSION['prefer']) : 0;
                    echo json_encode(['success' => false, 'message' => 'Product ID missing.', 'wishlistCount' => $wishlistCount]);
                    exit();
                } else {
                    $this->setError(['alertPrefer' => messenger('Error: Product ID missing.')]);
                    redirect(href('product', 'home')); // Or wherever appropriate
                    exit();
                }
            }

            // Reference the wishlist
            $prefer = &$_SESSION['prefer'];
            $productFound = false;
            $message = '';
            $success = false;

            // Check if product already exists
            foreach ($prefer as $item) {
                if ($item['id'] == $productId) {
                    $productFound = true;
                    $message = 'Book is already in your wishlist.';
                    $success = false; // Indicate not newly added, but not necessarily an error
                    break;
                }
            }

            // If not found, add it
            if (!$productFound) {
                $prefer[] = [
                    'id' => $productId,
                    'description' => $description,
                    'price' => $price,
                    'name' => $name,
                    'image' => $image
                ];
                $message = 'Added Book To WishList Successfully!';
                $success = true; // Indicate successfully added
            }

            // Update wishlist count in session
            $_SESSION['wishlist_count'] = count($prefer);
            $wishlistCount = $_SESSION['wishlist_count'];

            // Check if it's an AJAX request
            if (isset($_POST['ajax']) && $_POST['ajax'] == 'true') {
                // Send JSON response for AJAX
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => $success, // True if newly added, false if already exists or error
                    'message' => $message,
                    'wishlistCount' => $wishlistCount,
                    'alreadyExists' => $productFound && !$success // Add a flag for "already exists" state
                ]);
                exit(); // Important: stop script execution after sending JSON
            } else {
                // Original non-AJAX behavior (set flash message and redirect)
                // Use 'success' for newly added, 'info' for already exists
                $messageType = $success ? 'success' : 'info';
                $this->setError(['alertPrefer' => messenger($message, $messageType)]);
                //   redirect(href('product', 'home'));
                exit();
            }
        } else {
            // Handle GET request (viewing the wishlist page - prefer.php)
            $prefer = $_SESSION['prefer'] ?? []; // Ensure prefer is an array
            // Update wishlist count in session (in case it wasn't set)
            $_SESSION['wishlist_count'] = count($prefer);
            $data = ['prefer' => $prefer];
            $this->show('view/product/prefer', $data);
        }
    }

    // delete wish list book
    function removePrefer()
    {
        if (isset($_SESSION['prefer'])) {
            // Get the product ID from the URL
            $productId = $_GET['id'];
            //dd($_SESSION);

            // Loop through the cart to find and remove the item
            foreach ($_SESSION['prefer'] as $index => $item) {
                if ($item['id'] == $productId) {
                    // Remove the item from the cart
                    unset($_SESSION['prefer'][$index]);
                    // Reindex the array to prevent gaps in the cart array
                    $_SESSION['prefer'] = array_values($_SESSION['prefer']);
                    $this->setError(['alert' =>
                    messenger('Remove successfully', 'success')]);
                }
            }
            //   dd($_SESSION);

            redirect(href('product', 'prefer'));
        }
    }
    // delete wish list book

    public function ajaxDeletePrefer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['id'] ?? null;

            // error if not get id or action
            if ($productId === null) {
                echo json_encode(['success' => false, 'message' => 'Missing product ID.']);
                return;
            }

            // Get the current prefer from session
            $prefer = $_SESSION['prefer'] ?? [];
            // Find product in cart
            $found = false;
            foreach ($prefer as $key => $item) {
                if ($item['id'] == $productId) {
                    $found = true;
                    // delete in cart
                    unset($prefer[$key]);
                    //reindex
                    $prefer = array_values($prefer);
                }
            }

            // if not find
            if (!$found) {
                echo json_encode(['success' => false, 'message' => 'Product not found in prefer.']);
                return;
            }

            //update session
            $_SESSION['prefer'] = $prefer;
            $_SESSION['wishlist_count'] = count($prefer);
            $newWishlistCount = $_SESSION['wishlist_count']; // Get the updated count


            // send response success
            echo json_encode([
                'success' => true,
                'wishlistCount' => $newWishlistCount
            ]);
            return;
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }
    // delete all wish list book
    function removeAll()
    {
        if (isset($_SESSION['prefer'])) {
            unset($_SESSION['prefer']);
        }
        redirect(href('product', 'prefer'));
    }

    //========================================Cash=========================================================================
    // add to cart
    function cart()
    {
        // Initialize cart session if not set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Handle POST request (adding/updating item)
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            $action = $_POST['action'] ?? 'increase'; // Default action is 'increase'
            $productId = $_POST['id'] ?? null;
            $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
            $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
            $name = $_POST['name'] ?? 'Unknown Product';
            $image = $_POST['image'] ?? 'noimg.jpg';
            $description = $_POST['description'] ?? '';

            // Basic validation
            if ($productId === null || $price <= 0 || $quantity <= 0) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 'true') {
                    header('Content-Type: application/json');
                    echo json_encode(['success' => false, 'message' => 'Invalid product data.', 'cartCount' => count($_SESSION['cart'])]);
                    exit();
                } else {
                    $this->setError(['alertCart' => messenger('Error: Invalid product data.')]);
                    redirect(href('product', 'cart')); // Redirect to cart page on error for non-AJAX
                    exit();
                }
            }


            // Reference the cart
            $cart = &$_SESSION['cart'];

            $productFound = false;
            foreach ($cart as &$item) { // Use reference &$item to modify directly
                if ($item['id'] == $productId) {
                    if ($action == 'increase') {
                        $item['quantity'] += $quantity;
                    } elseif ($action == 'decrease' && $item['quantity'] > 1) {
                        // Decrease action is usually handled by ajaxUpdateCart,
                        // but handle here just in case a form submits 'decrease'
                        $item['quantity'] -= $quantity;
                        if ($item['quantity'] < 1) $item['quantity'] = 1; // Ensure quantity doesn't go below 1
                    }
                    $productFound = true;
                    break;
                }
            }
            unset($item); // Unset reference

            // If product is not found, add a new entry (only for 'increase' action from product pages)
            if (!$productFound && $action == 'increase') {
                $cart[] = [
                    'id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                    'name' => $name,
                    'image' => $image,
                    'description' => $description
                ];
            }

            // Update cart count in session
            $_SESSION['cart_count'] = count($cart); // Recalculate count based on items, not just adding

            // --- AJAX Response ---
            if (isset($_POST['ajax']) && $_POST['ajax'] == 'true') {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'message' => 'Added Book To Cart Successfully!', // Or updated
                    'cartCount' => $_SESSION['cart_count']
                ]);
                exit(); // Stop script execution for AJAX
            }
            // --- Non-AJAX Redirect ---
            else {
                $this->setError(['alertCart' => messenger('Added Book To Cart Successfully!', 'success')]);
                redirect(href('product', 'cart')); // Redirect to cart page for non-AJAX
                exit();
            }
        }
        // Handle GET request (viewing the cart page)
        else {
            $cart = $_SESSION['cart']; // Get current cart
            $_SESSION['cart_count'] = count($cart); // Ensure count is up-to-date

            // Show the cart view
            $this->show('view/product/cart', [
                'cart' => $cart,
            ]);
        }
    }
    // update cart
    public function ajaxUpdateCart()
    {
        //dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['id'] ?? null;
            $action = $_POST['action'] ?? null;

            // error if not get id or action
            if ($productId === null || $action === null) {
                echo json_encode(['success' => false, 'message' => 'Missing product ID or action.']);
                return;
            }
            // Get the current cart from session
            $cart = $_SESSION['cart'] ?? [];
            // Find product in cart
            $found = false;
            foreach ($cart as $key => $item) {
                if ($item['id'] == $productId) {
                    $found = true;
                    // increase quantity
                    if ($action == 'increase') {
                        $cart[$key]['quantity']++;
                    }
                    // decrease quantity
                    else if ($action == 'decrease') {
                        if ($cart[$key]['quantity'] > 1) {
                            $cart[$key]['quantity']--;
                        }
                    }
                    // get new quantity
                    $newQuantity = $cart[$key]['quantity'];
                    // new total price of product
                    $newTotal = $cart[$key]['price'] * $newQuantity;
                }
            }

            // if not find
            if (!$found) {
                echo json_encode(['success' => false, 'message' => 'Product not found in cart.']);
                return;
            }

            //update session
            $_SESSION['cart'] = $cart;
            $_SESSION['cart_count'] = count($cart);

            // calculate new grand total
            $newGrandTotal = 0;
            foreach ($cart as $item) {
                $newGrandTotal += $item['price'] * $item['quantity'];
            }

            // send response success
            echo json_encode([
                'success' => true,
                'new_quantity' => $newQuantity,
                'new_total' => $newTotal,
                'new_grand_total' => $newGrandTotal
            ]);
            return;
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }

    // deleta cart
    public function ajaxDeleteCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['id'] ?? null;

            // error if not get id or action
            if ($productId === null) {
                echo json_encode(['success' => false, 'message' => 'Missing product ID.']);
                return;
            }

            // Get the current cart from session
            $cart = $_SESSION['cart'] ?? [];
            // Find product in cart
            $found = false;
            foreach ($cart as $key => $item) {
                if ($item['id'] == $productId) {
                    $found = true;
                    // delete in cart
                    unset($cart[$key]);
                    //reindex
                    $cart = array_values($cart);
                }
            }

            // if not find
            if (!$found) {
                echo json_encode(['success' => false, 'message' => 'Product not found in cart.']);
                return;
            }

            //update session
            $_SESSION['cart'] = $cart;
            $_SESSION['cart_count'] = count($cart);
            $newCartCount = $_SESSION['cart_count']; // Get the updated count


            // calculate new grand total
            $newGrandTotal = 0;
            foreach ($cart as $item) {
                $newGrandTotal += $item['price'] * $item['quantity'];
            }

            // send response success
            echo json_encode([
                'success' => true,
                'new_grand_total' => $newGrandTotal,
                'cartCount' => $newCartCount // <-- ADD THIS

            ]);
            return;
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }

    // Get cart and wishlist counts
    public function ajaxGetCounts()
    {
        $cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
        $wishlistCount = isset($_SESSION['wishlist_count']) ? $_SESSION['wishlist_count'] : 0;

        echo json_encode(['success' => true, 'cartCount' => $cartCount, 'wishlistCount' => $wishlistCount]);
    }

    // confirm order
    public function confirm()
    {
        //dd($_POST);

        // dd($_SESSION['cart_confirm']);
        // 1. Check if the user is logged in
        if (!isset($_SESSION['login_id'])) {
            $this->setError(['alert' => messenger('Please log in to place an order.', 'warning')]);
            redirect(href('user', 'login')); // Redirect to login page
            return;
        }

        // 2. Get user information
        $userId = $_SESSION['login_id'];
        $user = $this->userRepository->getUserById($userId);

        // 3. Get cart data from session
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $this->setError(['alert' => messenger('Your cart is empty. Please add items to your cart.', 'warning')]);
            redirect(href('product', 'index')); // Redirect to products page
            return;
        }
        // 3.1 Get the selected product IDs from the form
        $selectedProductIds = $_POST['selectedProducts'] ?? []; // Get the selected product IDs from the form
        // 3.2 get only the product select
        $cart = [];
        foreach ($selectedProductIds as $productId) {
            foreach ($_SESSION['cart'] as $item) {
                if ($item['id'] == $productId) {
                    $cart[] = $item;
                }
            }
        }
        // if no product selected
        if (empty($cart)) {
            $this->setError(['alert' => messenger('Please select items to confirm your order.', 'warning')]);
            redirect(href('product', 'cart'));
            return;
        }
        $cartDetails = [];
        // Get the details for each item in the cart
        foreach ($cart as $item) {
            $product = $this->productRepository->getproductById($item['id']);
            if ($product) {
                //we get the first element of the array
                $cartDetails[$item['id']] = [
                    'product' => $product[0],
                    'quantity' => $item['quantity']
                ];
            }
        }

        $subtotal = 0;
        foreach ($cartDetails as $item) {
            //now it work
            $subtotal += $item['product']->getPrice() * $item['quantity'];
        }
        // Assume a fixed shipping cost for simplicity (you can make this dynamic later)
        $shippingCost = 10;
        $total = $subtotal + $shippingCost;
        // Save cart information to session
        $_SESSION['cart_confirm'] = [
            'cart_details' => $cartDetails,
            'total' => $total,
        ];

        // 5. Prepare data to send to the view
        $data = [
            'user' => $user[0], // Assuming getUserById returns an array with one user
            'cartDetails' => $cartDetails,
            'subtotal' => $subtotal,
            'shippingCost' => $shippingCost,
            'total' => $total,
        ];
        //dd($data);
        // 6. Load the confirmation view
        $this->show('view/product/confirm', $data);
    }

    // place order by cash
    function order()
    {
        // dd($_POST);
        // 1. Ensure user is logged in
        if (!isset($_SESSION['login_id'])) {
            $this->setError(['alert' => messenger('You need to log in to place an order.', 'warning')]);
            redirect(href('user', 'login'));
            return;
        }

        // 2. Get the selected product IDs from the form
        $selectedProductIds = $_POST['selectedProducts'] ?? [];
        //dd($selectedProductIds);
        // 3. check if have select book
        if (empty($selectedProductIds)) {
            $this->setError(['alert' => messenger('Please select items to confirm your order.', 'warning')]);
            redirect(href('product', 'cart'));
            return;
        }

        // 4. filter only select book in cart
        $cart = [];
        foreach ($selectedProductIds as $productId) {
            foreach ($_SESSION['cart'] as $item) {
                if ($item['id'] == $productId) {
                    $cart[] = $item;
                }
            }
        }
        // 5. Get the user ID
        $userId = $_SESSION['login_id'] ?? null;
        //dd($cart);
        // 6. save the order in db
        $orderId = $this->orderRepository->createOrder($userId, $cart);

        if ($orderId == null) {
            // save fail
            $this->setError(['alert' => messenger('Error processing your order. Please try again later.', 'danger')]);
            // prepare data
            $data = ['order' => $cart];
            // render view
            $this->show('view/product/order', $data);
        } else {
            // save success
            //4. save in order session

            $_SESSION['order'] = $cart;
            //   unset($_SESSION['cart']);
            //6. Handle successful order creation (e.g., redirect to order confirmation page)
            // Prepare data to be passed to the view
            $data = ['order' => $_SESSION['order']];
            $this->setError(['alert' => messenger("A new user just placed an order, the order's id is  = " . $orderId, "success")]);
            // render view
            $this->show('view/product/order', $data);
        }
    }

    // payment order
    function payment()
    {
        //dd($_SESSION);
        // Check if data is posted from confirm.php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get user info and order details from POST data
            $userInfo = [
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'order_desc' => $_POST['order_desc']
            ];
            $this->userRepository->updateUser($_SESSION['login_id'], $_POST['phone'], $_POST['address']);
            $amount = $_POST['amount'];
            $product_id = $_POST['product_id'];

            // Store user info and order info in session
            $_SESSION['payment_info'] = [
                'user_info' => $userInfo,
                'amount' => $amount,
                'product_id' => $product_id,
            ];
            $data = [
                'payment_info' => $_SESSION['payment_info'],
            ];
            $this->show('view/product/payment', $data);
        } else {
            // Handle direct access to payment.php (optional)
            redirect(href('product', 'cart'));
        }
    }

    //place order by vnpay
    function paymentSave()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $vnp_TmnCode = "PTILUBQG"; //Website ID in VNPAY System
        $vnp_HashSecret = "SL2PBRN0K583UCYVG5UYDVG934UJFNVU"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/BookSmart/BookShop/MVC/?controller=product&action=return";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = $_POST['order_id'];
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $_POST['txtexpire'];
        //Get bill state if exist
        $vnp_Bill_State = isset($_POST['txt_bill_state']) ? $_POST['txt_bill_state'] : "";

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    // return of vnpay
    function return()
    {
        // 2. Get the selected product IDs from the form
        $selectedProductIds = $_SESSION['payment_info']['product_id'] ?? [];

        // 4. filter only select book in cart
        $cart = [];
        foreach ($selectedProductIds as $productId) {
            foreach ($_SESSION['cart'] as $item) {
                if ($item['id'] == $productId) {
                    $cart[] = $item;
                }
            }
        }
        // 5. Get the user ID
        $userId = $_SESSION['login_id'] ?? null;
        //dd($cart);
        // 6. save the order in db
        if ($_GET['vnp_ResponseCode'] == '00') {
            $orderId = $this->orderRepository->createOrder($userId, $cart);

            $this->orderRepository->statusPayment($orderId);
        }

        $this->show('view/product/return');
    }
}
