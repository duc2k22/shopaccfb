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
}
