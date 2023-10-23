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
    public function getProductPrice($accountId) {
        $query = "SELECT discounted_price FROM accounts WHERE account_id = :account_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':account_id', $accountId);
        $stmt->execute();
    
        // Kiểm tra xem truy vấn có thành công hay không
        if ($stmt->execute()) {
            // Lấy dữ liệu từ kết quả truy vấn
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Kiểm tra xem có dữ liệu được trả về hay không
            if ($result) {
                // Trả về giá trị giảm giá của sản phẩm
                return $result['discounted_price'];
            }
        }
    
        // Nếu không lấy được giá sản phẩm hoặc truy vấn không thành công, xử lý theo ý của bạn (ví dụ: trả về một giá trị mặc định)
        return 0;
    }
    
}
