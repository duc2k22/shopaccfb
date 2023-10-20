<?php
require_once "./models/sanpham.php";
// require_once "views/loai.php";

?>
<?php
class AdminController
{
    private $model = null;
    protected $listloai = null;
    function __construct()
    {
        $this->model = new sanpham();
    }

    function index()
    {
        $titlePage = "Trang chủ";
        $viewnoidung = "content.php";
        $accountList = $this->model->getAllaccounts();
        include "views/layout.php";
    }

    function loaisp()
    {
        $titlePage = "Thêm loại sản phẩm";
        $viewnoidung = "addLoai.php";
        include "admin/views/layout.php";
    }
    function addLoai()
    {
        $name = trim(strip_tags($_POST['name']));
        $noidung = trim(strip_tags($_POST['noidung']));
        if (empty($name) || empty($noidung)) {
            $message = "Vui lòng nhập đầu đủ thông tin!";
        } else {
            $them = $this->model->addLoai($name, $noidung);
            $message = $them ? "Thêm loại thành công" : "Thêm thất bại";
        }
        $titlePage = "Thêm loại sản phẩm";
        $viewnoidung = "addLoai.php";
        include "admin/views/layout.php";
    }
    function dsloai()
    {
        $titlePage = "Danh sách loại sản phẩm";
        $listLoai = $this->model->getAllloai();
        $viewnoidung = "loaiDs.php";
        include "admin/views/layout.php";
    }
    function editloai()
    {
        // Kiểm tra xem type_id có tồn tại trong URL không
        if (isset($_GET['id'])) {
            // Lấy type_id từ URL và chuyển đổi thành kiểu số nguyên
            $type_id = (int)$_GET['id'];

            // Kiểm tra xem type_id có hợp lệ (lớn hơn 0) không
            if ($type_id > 0) {
                // Gọi model để lấy thông tin loại sản phẩm
                $dsloai = $this->model->getidLoai($type_id);

                // Kiểm tra xem loại sản phẩm có tồn tại không
                if ($dsloai) {
                    $titlePage = "Sửa loại sản phẩm";
                    $viewnoidung = "loaiEdit.php";
                    include "admin/views/layout.php";
                } else {
                    // Loại sản phẩm không tồn tại
                    echo "Không tìm thấy loại sản phẩm.";
                }
            } else {
                // Type ID không hợp lệ (<= 0)
                echo "Type ID không hợp lệ.";
            }
        } else {
            // Type ID không tồn tại trong URL
            echo "Thiếu Type ID trong URL.";
        }
    }
    function editloai_()
    {
        $type_id = (int)$_POST['type_id'];

        $type_name = trim(strip_tags($_POST['type_name']));
        $description = trim(strip_tags($_POST['description']));

        $them = $this->model->editLoai($type_id, $type_name, $description);
        echo "Sửa loại $type_id thành công";
    }

    function deleteloai()
    {
        if (isset($_GET['id'])) {
            $type_id = (int)$_GET['id'];
            //kiểm tra xem id có hơp lệ không

            $xoa = $this->model->deleteloai($type_id);
            if ($xoa) {
                echo "Xoá loại $type_id thành công";
            } else {
                echo " Xoá loại thất bại";
            }
        }
    }






    function addAccount()
    {
        $titlePage = "Thêm sản phẩm";
        $viewnoidung = "addAccount.php";

        $accounType = $this->model->getAllloai();
        include "admin/views/layout.php";





        // print_r($accounType);

    }

    function addAccount_()
    {
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
        $accountTypes = $this->model->getAllloai();
        include "admin/views/layout.php";
    }


    function login()
    {
        $titlePage = "Trang chủ";
        $viewnoidung = "addSanpham.php";

        include "admin/views/layout.php";
    }
}

?>