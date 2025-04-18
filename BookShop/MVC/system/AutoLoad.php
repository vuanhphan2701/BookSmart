<?php
session_start();
ob_start();
include('system/config/Config.php');
include('system/libs/Funs.php');
// xu ly autoload cho class trong vc new obj
spl_autoload_register(function ($class_name) {
    // autoload controller
    $path_controller = 'controller/' . $class_name . '.php';
    if (file_exists($path_controller)) {
        include($path_controller);
    }
    // autoload model
    $path_model = 'model/' . $class_name . '.php';
    if (file_exists($path_model)) {
        include($path_model);
    }
    // autoload repository
    $path_repository = 'repository/' . $class_name . '.php';
    if (file_exists($path_repository)) {
        include($path_repository);
    }
    // autoload database
    $path_system_db = 'system/db/' . $class_name . '.php';
    if (file_exists($path_system_db)) {
        include($path_system_db);
    }
    // autoload libraly
    $path_system_libs = 'system/libs/' . $class_name . '.php';
    if (file_exists($path_system_libs)) {
        include($path_system_libs);
    }
    // autoload connectDB
    $path_system_connectDb = 'system/database' . $class_name . '.php';
    if (file_exists($path_system_connectDb)) {
        include($path_system_connectDb);
    };
     // autoload Authentication
     $path_system_connectDb = 'middleware/'.$class_name.'.php';
     if (file_exists($path_system_connectDb)) {
         include($path_system_connectDb);
     };
});
