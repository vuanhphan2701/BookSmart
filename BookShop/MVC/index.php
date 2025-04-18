<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\index.php

include('system/AutoLoad.php');

ob_start();

$action = $_GET['action'] ?? 'about';
$controllerName = ($_GET['controller'] ?? 'product') . 'Controller';

//Payment run first
if ($controllerName == 'paymentController' && in_array($action, ['createPayment', 'success', 'failed'])) {
    require_once 'controller/PaymentController.php';
    $controller = new PaymentController();
    $controller->$action();
} elseif (class_exists($controllerName)) {
    require_once "controller/{$controllerName}.php";
    $controller = new $controllerName();

    if (method_exists($controller, $action)) {
        // Action public
        $publicActions = ['about', 'contact', 'authenticate', 'home','list','addNewUser'];
        if (in_array($action, $publicActions)) {
            $controller->$action();
        } else {
            // Action need to be verified
            if (isVerified()) {
                $controller->$action();
            } else {
                $user = (new userController())->authenticate();
            }
        }
    } else {
        $controller = new Controller();
        $controller->_404();
    }
} else {
    $controller = new Controller();
    $controller->_404();
}
ob_end_flush();
?>
