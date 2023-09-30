<?php
require_once "models/sanpham.php";

class UserController{
    private $model = null;
    function __construct()
    {
    }

    function index(){
        $titlePage = "Trang chủ";
        $viewnoidung = "home.php";
    }
}
?>