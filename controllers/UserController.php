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
    function dangky_(){
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
        } elseif($this->model->isEmailExits($email)){
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
    
    }
    
    

