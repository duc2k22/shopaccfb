<?php
require_once "models/sanpham.php";
class AdminController{
    private $conn = null;
    function __construct()
    {
        $this->conn = new Sanpham();

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
    function addloai(){
        $name = trim(strip_tags($_POST['name']));
        $noidung = trim(strip_tags($_POST['noidung']));
        $them = $this->conn->addLoai($name, $noidung);
        echo "Thêm loại thành công!";


    }
    function login(){
        $titlePage = "Trang chủ";
        $viewnoidung = "addSanpham.php";

        include "admin/views/layout.php";
    }

}

?>