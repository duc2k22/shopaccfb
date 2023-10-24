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
     
    // Mua Mua hàng
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
        echo '    window.location.href = "' . ROOT_URL . 'danhmuc' . $typeId . '";';
            // Thay ' =' bằng ' . ROOT_URL
        echo '});';
        echo '</script>';
    }
}



//     public function muahang()
// {
//     // Kiểm tra xem người dùng đã đăng nhập hay chưa
//     if ($this->model->isUserLoggedIn()) {
//         // Lấy account_id và product_price từ URL thông qua $_GET
//         $accountId = $_GET['account_id'];
//         $productPrice = $_GET['product_price'];

//         // Người dùng đã đăng nhập
//         $userId = $_SESSION['username'];
//         $userBalance = $this->model->getUserBalance($userId);

//         if ($userBalance >= $productPrice) {
//             // Người dùng có đủ số dư để mua sản phẩm
//             // Hiển thị thông báo xác nhận với SweetAlert2
//             echo '<script>
//             Swal.fire({
//                 title: "Xác nhận mua sản phẩm",
//                 text: "Bạn có chắc chắn muốn mua sản phẩm này với giá ' . $productPrice . '?",
//                 icon: "question",
//                 showCancelButton: true,
//                 confirmButtonText: "Mua ngay",
//                 cancelButtonText: "Hủy",
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     // Thực hiện mua sản phẩm ở đây
//                     // ...
//                     // Để xử lý mua hàng, bạn có thể thêm dữ liệu vào CSDL hoặc thực hiện bất kỳ hành động nào cần thiết.
//                 }
//             });
//         </script>';
//         } else {
//             // Người dùng không có đủ số dư
//             echo '<script>
//             Swal.fire("Lỗi", "Số dư tài khoản không đủ để mua sản phẩm", "error");
//         </script>';
//         }
//     } else {
//         // Người dùng chưa đăng nhập
//         echo '<script>
//         Swal.fire("Lỗi", "Vui lòng đăng nhập để mua sản phẩm", "error");
//         </script>';
//     }
// }



}
