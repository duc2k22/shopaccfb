<?php
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

    function sanpham(){
        $titlePage = "Thêm sản phẩm";
        $viewnoidung = "addLoai.php";
        include "admin/views/layout.php";
    }
    function login(){
        $titlePage = "Trang chủ";
        $viewnoidung = "addSanpham.php";

        include "admin/views/layout.php";
    }

}

?>