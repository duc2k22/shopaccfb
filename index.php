<?php
session_start();
require_once "config.php";
spl_autoload_register(function($class){
    require_once "controllers/".$class.".php";
});

$baseDir = "/shopaccfb/";

$router = [
    'get' => [
        '' => [new SanphamController, 'index'],
        'products' => [new SanphamController, 'products'],
    ],
    'post' => [
        'dangky' => [new UserController, 'dangky'],
    ],
];

$path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));
$arr = explode("?", $path);
$route = strtolower($arr[0]);
if (count($arr) >= 2) {
    parse_str($arr[1], $params);
} else {
    $params = [];
}
$method = strtolower($_SERVER['REQUEST_METHOD']);
if (!array_key_exists($method, $router)) {
    die("Method kô phù hợp:" . $method);
}
if (!array_key_exists($route, $router[$method])) {
    die("Đâu có route:" . $route);
}
$action = $router[$method][$route];
call_user_func($action);
?>
