<?php
require_once "models/sanpham.php";
require_once "models/usermodel.php";

class SanphamController
{
    private $model = null;
    private $usermodel = null;
    function __construct()
    {
        $this->model = new sanpham();
        $this->usermodel = new usermodel();
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
    function header()
    {
    }

    function abc()
    {
        echo "ABC";
    }
    // function addloai()
    // {
    //     $name = trim(strip_tags($_POST['name']));
    //     $noidung = trim(strip_tags($_POST['noidung']));
    //     $them = $this->model->addLoai($name, $noidung);
    //     echo "Thêm loại thành công!";
    // }
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
    function chitiet()
    {
        $account_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $accounType = $this->model->getAllloai();



        $account_id = $this->model->getAccountByid($account_id);
        $isDanhMucPage = true; // Đặt biến kiểm tra là true

        $titlePage = $account_id['name'];
        $slideshow = "slideshow.php";
        $viewnoidung  = "chitiet.php";
        include "views/layout.php";
    }
    public function addToCart()
    {
        // lấy thông tin sản phẩm và số lượng theo yêu cầu
        $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $quantity = isset($_GET['soluong']) ? (int)$_GET['soluong'] : 0;


        $product = [];

        //lấy giỏ hàng từ session hoặc csdl
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        // kiểm tra xem sp đã có trong giỏ hàng chưa
        if (array_key_exists($productId, $cart)) {
            // nếu đã có sp trong giỏ hàng + thêm số lượng
            $cart[$productId] += $quantity;
        } else {
            // nếu chưa có sản phẩm thì thêm sp mới vào session 
            $cart[$productId] = $quantity;
        }
        // lưu giỏ hàng mới vào session
        $_SESSION['cart'] = $cart;
        // chuyển người dùng đến trang thông tin giỏ hàng
        // unset($_SESSION['cart']);
        header('Location:' . ROOT_URL . 'giohang');
    }

    public function giohang()
    {
        $accounType = $this->model->getAllloai();
        $isDanhMucPage = true;
        $tongtien = $tongsoluong = 0;

        // Lấy danh sách sản phẩm từ giỏ hàng
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $productList = [];

        // Lặp qua từng sản phẩm trong giỏ hàng và lấy thông tin sản phẩm từ cơ sở dữ liệu
        foreach ($cart as $productId => $quantity) {
            $product = $this->model->getAccountByid($productId);
            if ($product) {
                // Thêm thông tin số lượng sản phẩm và tổng tiền vào sản phẩm
                $product['quantity'] = $quantity;
                $product['totalPrice'] = $product['discounted_price'] * $quantity;
                $productList[] = $product;
            }
        }

        if (isset($_POST['update_cart'])) {
            $newQuantities = $_POST['soluongs'];

            // Lặp qua số lượng mới và cập nhật giỏ hàng
            foreach ($newQuantities as $productId => $newQuantity) {
                if (is_numeric($newQuantity) && $newQuantity >= 0) {
                    // Nếu đã có sản phẩm trong giỏ hàng, thì cộng thêm số lượng mới
                    if (isset($_SESSION['cart'][$productId])) {
                        $_SESSION['cart'][$productId] += $newQuantity;
                    } else {
                        // Nếu sản phẩm chưa có trong giỏ hàng, thì đặt số lượng mới
                        $_SESSION['cart'][$productId] = $newQuantity;
                    }
                }
            }

            // Sau khi cập nhật, bạn có thể chuyển người dùng đến trang giỏ hàng để xem thay đổi
            // header("Location: " . ROOT_URL . "giohang");
            exit;
        }


        // Tính tổng tiền
        $totalPrice = array_sum(array_column($productList, 'totalPrice'));
var_export($_SESSION['cart']);
        $viewnoidung = "giohang.php";
        include "views/layout.php";
    }


    public function capnhatcart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy số lượng mới từ biểu mẫu
        $newQuantities = $_POST['soluong'];

        // Lấy giỏ hàng từ session hoặc cơ sở dữ liệu
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Lặp qua số lượng mới và cập nhật giỏ hàng
        foreach ($newQuantities as $productId => $newQuantity) {
            if (is_numeric($newQuantity) && $newQuantity >= 0) {
                // Nếu đã có sản phẩm trong giỏ hàng, thì cập nhật số lượng mới
                if (isset($cart[$productId])) {
                    $cart[$productId] = $newQuantity;
                }
            }
        }

        // Lưu giỏ hàng mới vào session
        $_SESSION['cart'] = $cart;

        // Sau khi cập nhật, bạn có thể chuyển người dùng đến trang giỏ hàng để xem thay đổi
        header("Location: " . ROOT_URL . "giohang");
        exit;
    }

    // Bạn có thể hiển thị thông tin giỏ hàng và tổng tiền ở đây
}







    // xóa sp khỏi giỏ hàng
    function deletecart()
    {
        $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        // lấy giỏ hàng từ session
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        // kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (array_key_exists($productId, $cart)) {
            // xóa sản phảm khỏi giỏ hàng
            unset($cart[$productId]);
        }
        // cập nhật giỏ hàng mới vào session
        $_SESSION['cart'] = $cart;
        header('Location:' . ROOT_URL . 'giohang');
    }

    function taikhoan()
    {

        $accounType = $this->model->getAllloai();
        $isDanhMucPage = true;
        $titlePage = "Tài khoản";
        $viewnoidung = "views/taikhoan/info-account.php";
        include "./views/taikhoan/layout.php";
    }

    function lichsugiaodich()
    {
        $accounType = $this->model->getAllloai();
        $isDanhMucPage = true;
        $lichsugiaodic = $this->model->getLichsugiaodichByid($_SESSION['user_id']);
        $titlePage = "Lịch sử giao dịch";
        $viewnoidung = "views/taikhoan/lichsugiaodich.php";
        include "./views/taikhoan/layout.php";
    }
}
