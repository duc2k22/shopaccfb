<?php
require_once "models/sanpham.php";

class SanphamController{
    private $model = null;
    function __construct()
    {
    }

    function index(){
        $titlePage = "Trang chủ";
        $viewnoidung = "home.php";
        include "views/layout.php";
    }
}
?>