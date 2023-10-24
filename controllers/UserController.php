<?php
require_once "models/usermodel.php";

class UserController
{
    private $model = null;
    function __construct()
    {
        $this->model = new usermodel();
    }

    function index()
    {
        $titlePage = "Trang chủ";
        $viewnoidung = "home.php";
    }

    function dangky()
    {
        $titlePage = "Đăng ký";
        include  "views/dangky.php";
    }
    function dangky_()
    {
        $titlePage = "Đăng ký";

        include "views/dangky.php";

        $username = trim(strip_tags($_POST['username']));
        $password = trim(strip_tags($_POST['password']));
        $confirm_password = trim(strip_tags($_POST['confirm_password']));
        $email = trim(strip_tags($_POST['email']));
        $errors = array(); // Khởi tạo mảng lưu thông báo lỗi

        if (empty($username) || empty($password) || empty($confirm_password) || empty($email)) {
            // Thêm thông báo lỗi vào mảng
            $errors[] = "Vui lòng nhập đầy đủ thông tin";
        } elseif ($password !== $confirm_password) {
            $errors[] = "Nhập lại mật khẩu không đúng";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không đúng định dạng";
        } elseif ($this->model->isEmailExits($email)) {
            $errors[] = "Email đã tồn tại";
        } else {
            // Mã hoá mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $result = $this->model->dangky($username, $hashed_password, $email);

            if ($result) {
                // Thêm thông báo thành công vào mảng
                $errors[] = "Đăng ký thành công";
            } else {
                $errors[] = "Đăng ký không thành công";
            }
        }

        // Hiển thị thông báo lỗi hoặc thành công bằng SweetAlert2
        echo '<script>';
        foreach ($errors as $error) {
            echo 'Swal.fire("Thông báo", "' . $error . '", "info");';
        }
        echo '</script>';
    }

    function dangnhap()
    {
        $titlePage = 'Đăng nhập';
        include 'views/dangnhap.php';
    }
    function dangnhap_()
    {
        $titlePage = 'Đăng nhập';
        include 'views/dangnhap.php';
        print_r($_SESSION);

        $username = trim(strip_tags($_POST['username']));
        $password = trim(strip_tags($_POST['password']));
        $errors = [];

        if (empty($username) || empty($password)) {
            $errors[] = 'Vui lòng nhập đầy đủ thông tin';
        }

        if (empty($errors)) {
            $user = $this->model->checkLogin($username, $password);

            if ($user && password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['user_id'] = $user['user_id'];

                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                echo '<script>
            Swal.fire("Đăng nhập thành công", "", "success").then(function() {
                window.location = "' . ROOT_URL . '";
            });
            </script>';
                // header('Location:' . ROOT_URL . '');
            } else {
                echo '<script>
            Swal.fire("Lỗi", "Tên tài khoản hoặc mật khẩu sai!", "error");
            </script>';
            }
        } else {
            // Có lỗi xảy ra, hiển thị thông báo lỗi
            foreach ($errors as $error) {
                echo '<script>Swal.fire("Lỗi", "' . $error . '", "error");</script>';
            }
        }
    }

    // Mua hàng
    function muahang()
{
    $titlePage = 'Mua hàng';
    include 'views/muahang.php';
    $errors = array(); // Tạo mảng lưu thông báo lỗi

    if (!isset($_SESSION['user_id'])) {
        $errors[] = 'Vui lòng đăng nhập để mua hàng';
    } else {
        $userId = $_SESSION['user_id'];
        $productId = $_GET['id'];
        $typeId = $this->model->getTypeIdForProduct($productId); // Lấy typeId

        // Lấy giá sản phẩm từ cơ sở dữ liệu
        $productPrice = $this->model->getProductPrice($productId);

        // Kiểm tra số dư người dùng
        $userBalance = $this->model->checkUserBalance($userId, $productPrice);

        if ($userBalance !== false) {
            $newBalance = $userBalance - $productPrice;

            // Lấy số lượng sản phẩm hiện tại
            $currentQuantity = $this->model->getCurrentProductQuantity($productId);
            $newQuantity = $currentQuantity - 1; // Giảm đi 1 sau mỗi lần mua

            // Kiểm tra số lượng sản phẩm
            if ($newQuantity <= 0) {
                $errors[] = 'Hết hàng';
            } else {
                if ($this->model->updateBalance($userId, $newBalance)) {
                    // Cập nhật số lượng sản phẩm
                    if ($this->model->updateProductQuantity($productId, $newQuantity)) {
                        echo '<script>Swal.fire("Mua hàng thành công", "", "success");</script>';
                    } else {
                        $errors[] = 'Lỗi khi cập nhật số lượng sản phẩm';
                    }
                } else {
                    $errors[] = 'Lỗi khi cập nhật số dư người dùng';
                }
            }
        } else {
            $errors[] = 'Số dư không đủ để mua hàng';
        }
    }

    // Hiển thị thông báo lỗi bằng Sweet Alert 2
    if (!empty($errors)) {
        echo '<script>';
        echo 'Swal.fire({';
        echo '    title: "Lỗi",';
        echo '    html: "' . implode("<br>", $errors) . '",';
        echo '    icon: "error"';
        echo '}).then(function() {';
            echo '    window.location.href = "' . ROOT_URL . 'danhmuc?type_id=' . $typeId . '";';
            // Thay ' =' bằng ' . ROOT_URL
        echo '});';
        echo '</script>';
    }
}



    // public function muahang() {
    //     if (!isset($_SESSION['user_id'])) {
    //         echo "Vui lòng đăng nhập để mua hàng.";
    //         return;
    //     }

    //     $userId = $_SESSION['user_id'];
    //     $productId = $_GET['id'];

    //     // Lấy giá sản phẩm từ cơ sở dữ liệu
    //     $productPrice = $this->model->getProductPrice($productId);

    //     $userBalance = $this->model->checkUserBalance($userId, $productPrice);

    //     if ($userBalance) {
    //         $newBalance = $userBalance - $productPrice;

    //         // Tính toán số lượng sản phẩm mới, ví dụ: giảm 1 sản phẩm sau mỗi lần mua
    //         $currentQuantity = $this->model->getCurrentProductQuantity($productId);
    //         $newQuantity = $currentQuantity - 1;

    //         // Kiểm tra số lượng sản phẩm
    //         if ($newQuantity <= 0) {
    //             echo "Hết hàng";
    //         } else {
    //             // Cập nhật số dư người dùng
    //             if ($this->model->updateBalance($userId, $newBalance)) {
    //                 // Cập nhật số lượng sản phẩm
    //                 if ($this->model->updateProductQuantity($productId, $newQuantity)) {
    //                     echo "Mua hàng thành công.";
    //                 } else {
    //                     echo "Lỗi khi cập nhật số lượng sản phẩm.";
    //                 }
    //             } else {
    //                 echo "Lỗi khi cập nhật số dư người dùng.";
    //             }
    //         }
    //     } else {
    //         echo "Số dư không đủ để mua sản phẩm.";
    //     }
    // }
}
