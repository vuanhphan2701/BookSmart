<?php
class controller
{
    public $parent ;
    public $roleModel ;

    function __construct()
    {
        if (isVerified()) {
            $this->roleModel = new userRepository();
            $this->parent = $this->roleModel->listMenu( $_SESSION["login_id"]);
        }
    }
    function show($view, $data = [], $layout = 'Layout')
    {
        if (is_array($data) && $data) {
            foreach ($data as $k => $value) {
                $$k = $value;
            }
        }
        include('view/' . $layout . '.php');
    }
    function _404()
    {
        $this->show('view/system/404', '', 'empty');
    }
    function _403()
    {
        $this->show('view/system/403', '', 'empty');
    }

    function setError($err = [])
    {
        foreach ($err as $k => $e) {
            $_SESSION['error'][$k] = $e;
        }
    }
    function getError($k)
    {
        if (isset($_SESSION['error'][$k])) {
            $e = $_SESSION['error'][$k];
            unset($_SESSION['error'][$k]);
            return $e;
        } else {
            return '';
        }
    }
}
