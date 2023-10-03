<?php
require_once "./models/sanpham.php";
// require_once "views/loai.php";

?>
<?php
class AdminController{
    private $model = null;
    protected $listloai = null;
    function __construct()
    {
        $this->model = new sanpham();
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
    function addLoai(){
        $name = trim(strip_tags($_POST['name']));
        $noidung = trim(strip_tags($_POST['noidung']));
        if(empty($name) || empty($noidung)){
            $message = "Vui lòng nhập đầu đủ thông tin!";
        }else{
            $them = $this->model->addLoai($name, $noidung);
            $message = $them ? "Thêm loại thành công" : "Thêm thất bại";
        }
        $titlePage = "Thêm loại sản phẩm";
        $viewnoidung = "addLoai.php";
        include "admin/views/layout.php";
    }



    function addAccount(){
        $titlePage = "Thêm sản phẩm";
        $viewnoidung = "addAccount.php";

        $accounType = $this->model->getIdloai();
        include "admin/views/layout.php";


        // print_r($accounType);

    }
    
    function login(){
        $titlePage = "Trang chủ";
        $viewnoidung = "addSanpham.php";

        include "admin/views/layout.php";
    }

}

?>