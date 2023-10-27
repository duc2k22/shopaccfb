<?php
require_once "database.php";

class usermodel
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }
    function dangky($username, $password, $email)
    {
        $query = "INSERT INTO users set username = :username, password = :password, email =:email";
        $params = array(
            ':username' => $username,
            ':password' => $password,
            ':email' => $email,
        );
        return $this->conn->insert($query, $params);
    }
    // kiểm tra email đã tồn tại hay chưa
    function isEmailExits($email)
    {
        $query = "SELECT COUNT(*) FROM users where email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Lấy số lượng dòng kết quả
        $row_count = $stmt->fetchColumn();

        // Kiểm tra nếu số lượng dòng kết quả lớn hơn 0, email đã tồn tại
        if ($row_count > 0) {
            return true;
        } else {
            return false;
        }
    }
    function checkLogin($username, $password)
    {
        $query = "SELECT * FROM users where username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getUserBalance($userId)
    {
        $query = "SELECT account_balance FROM users WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        // Kiểm tra xem truy vấn có thành công hay không
        if ($stmt->execute()) {
            // Lấy dữ liệu từ kết quả truy vấn
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kiểm tra xem có dữ liệu được trả về hay không
            if ($result) {
                // Trả về giá trị số dư
                return $result['account_balance'];
            }
        }

        // Nếu không lấy được số dư hoặc truy vấn không thành công, trả về một giá trị mặc định (ví dụ: 0)
        return 0;
    }

    // kiểm tra người đã đăng nhập chưa
    function isUserLoggedIn()
    {
        // Kiểm tra xem phiên làm việc chứa thông tin người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['username'])) {
            // Người dùng đã đăng nhập
            return true;
        } else {
            // Người dùng chưa đăng nhập
            return false;
        }
    }

    // Lấy giá sản phẩm theo id 
    // public function getProductPrice($accountId) {
    //     $query = "SELECT discounted_price FROM accounts WHERE account_id = :account_id";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':account_id', $accountId);
    //     $stmt->execute();

    //     // Kiểm tra xem truy vấn có thành công hay không
    //     if ($stmt->execute()) {
    //         // Lấy dữ liệu từ kết quả truy vấn
    //         $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //         // Kiểm tra xem có dữ liệu được trả về hay không
    //         if ($result) {
    //             // Trả về giá trị giảm giá của sản phẩm
    //             return $result['discounted_price'];
    //         }
    //     }

    //     // Nếu không lấy được giá sản phẩm hoặc truy vấn không thành công, xử lý theo ý của bạn (ví dụ: trả về một giá trị mặc định)
    //     return 0;
    // }



    // lấy giá sản phẩm từ csdl
    function getProductPrice($accountId)
    {
        $query = 'SELECT discounted_price FROM accounts where account_id = :account_id ';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':account_id', $accountId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        // !==(không bằng hoặc không cùng loại) nó kiểm tra xem 2 giá trị có bằng nhau và có cùng kiểu dữ liệu không
        if ($result !== false) {
            return $result;
        }
        return 0;  // Trả về 0 nếu không tìm thấy giá sản phẩm hoặc có lỗi xảy ra
    }

    // kiểm tra số dư người dùng
    function checkUserBalance($userId, $productPrice)
    {
        $query = "SELECT account_balance  from users where user_id = $userId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        // lấy giá trị cột trực tiếp
        $userbalance = $stmt->fetchColumn();
        if ($userbalance !== false && $userbalance >= $productPrice) {
            return $userbalance;
        }
        return false;
    }

    // lấy số lượng sản phẩm hiện tại
    function getCurrentProductQuantity($productId)
    {
        $query = "SELECT quantity_available FROM accounts where account_id =:account_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":account_id", $productId, PDO::PARAM_INT);
        $stmt->execute();
        $quantity = $stmt->fetchColumn();
        if ($quantity !== false) {
            return $quantity;
        }
        return 0; // trả về 0 nếu không tìm thấy giá sản phẩm
    }

    // cập nhật số dư người dùng
    function updateBalance($userId, $newBalance)
    {
        $query = "UPDATE users SET account_balance = :new_balance WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":new_balance", $newBalance, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt;
    }

    // cập nhật số lượng sản phẩm sau khi mua hàng
    function updateProductQuantity($productId, $newQuantity)
    {
        $query = "UPDATE accounts set quantity_available = :quantity_available where account_id = :account_id";
        $params = array(":account_id" => $productId, ":quantity_available" => $newQuantity);
        return $this->conn->update($query, $params);
    }

    function getTypeIdForProduct($productId)
    {

        // Viết truy vấn SQL để lấy type_id dựa trên $productId
        $query = "SELECT account_type_id FROM accounts WHERE account_id = :product_id";

        // Sử dụng PDO để thực hiện truy vấn
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":product_id", $productId, PDO::PARAM_INT);
        $stmt->execute();

        // Kiểm tra kết quả trả về
        $result = $stmt->fetchColumn();
        if ($result !== false) {
            return $result;
        } else {
            return false; // Trả về false nếu không tìm thấy type_id
        }
    }

    function getProductInfo($accountId)
    {
        $query = 'SELECT name, description, original_price FROM accounts WHERE account_id = :account_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':account_id', $accountId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            return $result;
        }
        return false;
    }

    // Hàm lấy một tài khoản ngẫu nhiên chưa bán
    public function selectRandomUnsoldAccount($productId)
    {
        $query = "SELECT detail_id FROM account_details WHERE account_id = :account_id AND sold_status = 0 ORDER BY RAND() LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':account_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['detail_id'];
        } else {
            return null;
        }
    }


    // Hàm cập nhật trạng thái đã bán của tài khoản
    public function updateAccountSoldStatus($detail_id)
    {
        $query = "UPDATE account_details SET sold_status = 1 WHERE detail_id = :detail_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':detail_id', $detail_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Hàm lấy thông tin tài khoản dựa trên detail_id
    public function getAccountDetails($detail_id)
    {
        $query = "SELECT * FROM account_details WHERE detail_id = :detail_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':detail_id', $detail_id, PDO::PARAM_INT);
        $stmt->execute();
        $account = $stmt->fetch(PDO::FETCH_ASSOC);

        return $account;
    }
    public function addPurchaseHistory($user_id, $account_id, $account_detail_id, $soLuongMua, $thanhToan)
{
    $query = "INSERT INTO lichsumuahang (user_id, account_id, account_detail_id, purchase_date, so_luong_mua, thanh_toan) VALUES (:user_id, :account_id, :account_detail_id, NOW(), :soLuongMua, :thanhToan)";


    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':account_id', $account_id);
    $stmt->bindParam(':account_detail_id', $account_detail_id);
    $stmt->bindParam(':soLuongMua', $soLuongMua);
    $stmt->bindParam(':thanhToan', $thanhToan);

    if ($stmt->execute()) {
        // Thực hiện thành công
        return true;
    } else {
        // Xảy ra lỗi khi thực hiện
        return false;
    }
}

    

    public function getAccountDetailsById($account_id)
    {
        $query = "SELECT * FROM accounts WHERE account_id = :account_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':account_id', $account_id);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
