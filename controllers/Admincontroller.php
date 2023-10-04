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
        $accountList = $this->model->getAllaccounts();
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

    function addAccount_() {
        // Lấy thông tin từ form
        $accountDetails = array(
            'name' => trim(strip_tags($_POST['name'])),
            'description' => trim(strip_tags($_POST['noidung'])),
            'quantity_available' => trim(strip_tags($_POST['soluong'])),
            'original_price' => trim(strip_tags($_POST['giagoc'])),
            'discounted_price' => trim(strip_tags($_POST['giagiam'])),
            'min_friends_count' => trim(strip_tags($_POST['banbemin'])),
            'max_friends_count' => trim(strip_tags($_POST['banbemax'])),
            'country' => trim(strip_tags($_POST['quocgia'])),
            'xmdt_status' => trim(strip_tags($_POST['xmdt_status'])),
            'backup_available' => trim(strip_tags($_POST['backup_available'])),
            'twofa_available' => trim(strip_tags($_POST['twofa_available'])),
            'email_available' => trim(strip_tags($_POST['email_available'])),
            'cp_via_email' => trim(strip_tags($_POST['email_cp'])),
            'min_created_year' => trim(strip_tags($_POST['yearmin'])),
            'max_created_year' => trim(strip_tags($_POST['yearmax'])),
            'account_type_id' => trim(strip_tags($_POST['account_type'])),
            'image_url' => trim(strip_tags($_POST['image_url']))
        );
    
        // Kiểm tra dữ liệu
        if (empty($accountDetails['name']) || empty($accountDetails['description'])) {
            $message = "Vui lòng nhập đủ thông tin";
        } else {
            // Thêm tài khoản
            $them = $this->model->addAccount($accountDetails);
            $message = $them ? "Thêm tài khoản thành công" : "Thêm thất bại";
        }
    
        // Tiếp tục phần còn lại của hàm
        $titlePage = "Thêm sản phẩm";
        $viewnoidung = "addAccount.php";
        $accountTypes = $this->model->getIdloai();
        include "admin/views/layout.php";
    }
    
    
    function login(){
        $titlePage = "Trang chủ";
        $viewnoidung = "addSanpham.php";

        include "admin/views/layout.php";
    }

}

?>