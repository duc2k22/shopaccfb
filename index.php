<?php
session_start();
require_once "config.php";
spl_autoload_register(function($class){
    require_once "controllers/".$class.".php";
});

$baseDir ="/shopaccfb/";
?>

<?php
$router =[
    'get'=>[
        '' => [new SanphamController, 'index'],
    ],
    'post'=>[
        'dangky' => [new UserController, 'dangky'],
    ],
]
?>

<?php // http://localhost/banhang/Loai?idloai=1&page=3
$path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));//Loai?idloai=1&page=3
$arr = explode("?",$path);  // ['Loai', 'idloai=1&page=3]
$route = strtolower($arr[0]);  //loai
if (count($arr)>=2) parse_str($arr[1],$params);  // [idloai=>1, page=>3]
else $params = [];
$method = strtolower($_SERVER['REQUEST_METHOD']); //get
if (!array_key_exists($method, $router)) die("Method kô phù hợp:". $method);
if (!array_key_exists($route, $router[$method])) die("Đâu có route:". $route);
$action = $router[$method][$route];  // [0 => SanphamController, 1 => detail]
call_user_func( $action );

?>