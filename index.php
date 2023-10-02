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
?>

<?php
$router =[
    'get'=>[
        // route Users
        '' => [new SanphamController, 'index'],
        'abc' => [new SanphamController, 'abc'],
        //rotew Admin
        'admin/home' => [new AdminController, 'index'],
        'admin/ak' => [new AdminController, 'sanpham'],


    ],
    'post'=>[
        'dangky' => [new UserController, 'dangky'],
    ],
]
?>

<?php // Xử lý route tương ứng với từng phần (user hoặc admin)

// Lấy phần path sau $baseDir, bỏ đi đoạn $baseDir

$path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));

// Tách path thành mảng, tách phần query parameters nếu có

$arr = explode("?", $path);

// Lấy phần đầu của path và chuyển thành chữ thường

$route = strtolower($arr[0]);


// Lấy method HTTP (GET, POST, PUT, DELETE,...) và chuyển thành chữ thường

$method = strtolower($_SERVER['REQUEST_METHOD']);

// Kiểm tra xem route và method có tồn tại trong router không, nếu không thì in ra lỗi

if (!array_key_exists($method, $router) || !array_key_exists($route, $router[$method])) {
    die("Đâu có route: " . $route);
}

// Lấy action tương ương với method và route

$action = $router[$method][$route];

// Gọi action tương ứng

call_user_func($action);


?>