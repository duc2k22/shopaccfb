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
        die("Không tìm thấy file nào" .$class);
    }

});

$baseDir ="/shopaccfb/";

$router =[
    'get'=>[
        // route Users
        '' => [new SanphamController, 'index'],
        'abc' => [new SanphamController, 'abc'],
        //rotew Admin
        'admin' => [new AdminController, 'index'],
        'admin/add' => [new AdminController, 'sanpham'],
        'admin/login' => [new AdminController, 'login'],


    ],
    'post'=>[
        'dangky' => [new UserController, 'dangky'],
        'admin/add-loai' => [new AdminController, 'sanpham'],

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