<?php
session_start();
require_once "config.php";
spl_autoload_register(function($class){
    $userClassFile = "controllers/".$class .".php";
    $adminClassFile = "admin/controllers/" .$class.".php";

    if(file_exists($userClassFile)){
        require_once $userClassFile;
    }elseif(file_exists($adminClassFile)){
        require_once $adminClassFile;
    }else{
        die("Không tìm thấy file:" .$class);
    }

});

$baseDir ="/shopaccfb/";

$router =[
    'get'=>[
        // route Users
        '' => [new SanphamController, 'index'],
        'abc' => [new SanphamController, 'abc'],
        'danhmuc' => [new SanphamController, 'danhmuc'],
        'chitiet' => [new SanphamController, 'chitiet'],
        //route Admin
        'admin' => [new AdminController, 'index'],
        'admin/addloai' => [new AdminController, 'loaisp'],
        'admin/dsloai' => [new AdminController, 'dsloai'],
        'admin/editloai' => [new AdminController, 'editloai'],
        'admin/deleteloai' => [new AdminController, 'deleteloai'], 
        'admin/themaccount' => [new AdminController, 'addAccount'],


    ],
    'post'=>[
        'admin/addloai' => [new AdminController, 'addloai'],
        'admin/addloaisp' => [new AdminController, 'addAcc'],
        'admin/editloai_' => [new AdminController, 'editloai_'],
        'admin/themaccount' => [new AdminController, 'addAccount_'],



    ],
];

// Xử lý route tương ứng với từng phần (user hoặc admin)
$path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));
$arr = explode("?", $path);
$route = strtolower($arr[0]);
$method = strtolower($_SERVER['REQUEST_METHOD']);

if (!array_key_exists($method, $router) || !array_key_exists($route, $router[$method])) {
    die("Đâu có route: " . $route);
}

$action = $router[$method][$route];
call_user_func($action);

?>