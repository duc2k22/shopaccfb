<?php
require_once "models/sanpham.php";

class SanphamController
{
    private $model = null;
    function __construct()
    {
        $this->model = new sanpham();
    }

    function index()
    {
        $titlePage = "Trang chủ";
        $viewnoidung = "home.php";
        // Lấy tham số type_id từ URL
        $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : null;

        // Gọi phương thức trong model để lấy tài khoản theo loại
        $accounType = $this->model->getIdloai();
        include "views/layout.php";
    }
    function abc()
    {
        echo "ABC";
    }
    function addloai()
    {
        $name = trim(strip_tags($_POST['name']));
        $noidung = trim(strip_tags($_POST['noidung']));
        $them = $this->model->addLoai($name, $noidung);
        echo "Thêm loại thành công!";
    }
}
