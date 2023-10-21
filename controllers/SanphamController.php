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
        $isDanhMucPage = false;
        $titlePage = "Trang chủ";
        $slideshow = "slideshow.php";
        $viewnoidung = "home.php";

        // Gọi phương thức trong model để lấy danh sách loại sản phẩm
        $accounType = $this->model->getAllloai();

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
    function danhmuc()
    {
        // var_dump($_GET);
        $accounType = $this->model->getAllloai();
        // Lấy loại tài khoản từ URL hoặc các tham số khác nếu cần
        $type_id = isset($_GET['type_id']) ? (int)$_GET['type_id'] : 0;

        // Truy xuất danh sách tài khoản thuộc loại tương ứng
        $typeName = $this->model->getTypeNameById($type_id);
        $isDanhMucPage = true; // Đặt biến kiểm tra là true
       

        $accounts = $this->model->selectByTypeId($type_id);
        // var_dump($accounts);
        $titlePage = "Mua $typeName";
        $slideshow = "slideshow.php";
        $viewnoidung = "accountsByid.php";
        include 'views/layout.php';
    }
    function chitiet(){
        $account_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $accounType = $this->model->getAllloai();

        

        $account_id = $this->model->getAccountByid($account_id);
        $isDanhMucPage = true; // Đặt biến kiểm tra là true

        $titlePage = $account_id['name'];
        $slideshow = "slideshow.php";
        $viewnoidung  = "chitiet.php";
        include "views/layout.php";

    }
}
