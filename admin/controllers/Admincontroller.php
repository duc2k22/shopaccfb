<?php
require_once "models/sanpham.php";

class AdminController{
    private $model = null;
    function __construct()
    {
    }

    function index(){
        $titlePage = "Trang chủ";
        $viewnoidung = "content.php";
        include "views/layout.php";
    }

    function products(){
        echo "Con me may!";
    }
}
?>