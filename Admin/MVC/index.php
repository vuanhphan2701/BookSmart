<?php
include('system/AutoLoad.php');
$action = $_GET['action'] ?? 'index';
$controllerName = ($_GET['controller'] ?? 'system') . 'Controller';
if (class_exists($controllerName)) {

    $controller = new $controllerName();
    if (method_exists($controller, $action))
    {
        if (isVerified()) {
            //check role
            if($controller->roleModel
            ->confirmRole($_SESSION['login_id_admin'],str_replace('Controller','',$controllerName),$action)){
               $controller->$action();

            }else{
                $controller->_403();
            }
        } else { 
            $user = (new userController())->authenticate();
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

