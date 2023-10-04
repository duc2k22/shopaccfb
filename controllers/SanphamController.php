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

    // Gọi phương thức trong model để lấy danh sách loại sản phẩm
    $accounType = $this->model->getIdloai();

    // Kiểm tra xem có parameter type_id không
    if (isset($_GET['type_id'])) {
        $type_id = $_GET['type_id'];
        // Gọi hàm để lấy danh sách sản phẩm theo type_id
        $productList = $this->model->selectByTypeId($type_id);
    } else {
        // Nếu không có parameter type_id, lấy danh sách tất cả sản phẩm
        $productList = $this->model->getAllaccounts();
    }

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
