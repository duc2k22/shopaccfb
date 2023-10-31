<?php
require_once 'database.php';

class sanpham
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function addLoai($type_name, $description, $anhien, $thutu)
    {
        $query = "INSERT INTO accounttypes (type_name, description, anhien, thutu) VALUES (:name, :description, :anhien, :thutu)";
        $params = array(':name' => $type_name, ':description' => $description, ':anhien' => $anhien, ':thutu' => $thutu);
        return $this->conn->insert($query, $params);
    }

    function getAllloai()
    {
        $query = "SELECT * FROM accounttypes where anhien = 1 ORDER BY thutu";
        return $this->conn->select($query);
    }
    function getidLoai($type_id)
    {
        $query = "SELECT * FROM accounttypes where type_id = :type_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function editLoai($type_id, $type_name, $description, $anhien, $thutu)
    {
        $query = "UPDATE accounttypes SET type_name = :type_name, description = :description, anhien =:anhien, thutu = :thutu WHERE type_id = :type_id";
        $params = array(
            ':type_id' => $type_id,
            ':type_name' => $type_name,
            ':description' => $description,
            ':anhien' => $anhien,
            ':thutu' => $thutu,
        );
        return $this->conn->update($query, $params);
    }
    function deleteloai($type_id)
    {
        $query = "DELETE from accounttypes where type_id =:type_id ";
        $params = array(
            ':type_id' => $type_id,
        );
        return $this->conn->delete($query, $params);
    }

    function addAccount($accountDetails)
    {
        $query = "INSERT INTO accounts (name, description, quantity_available, original_price, discounted_price, 
        min_friends_count, country, xmdt_status, backup_available, twofa_available, email_available, 
        min_created_year, cp_via_email, account_type_id, image_url) VALUES (:name, :description, :quantity_available, :original_price, :discounted_price, :min_friends_count, :country, :xmdt_status, :backup_available, :twofa_available, :email_available, :min_created_year, :cp_via_email, :account_type_id, :image_url) ";
        $params = array(
            ':name' => $accountDetails['name'],
            ':description' => $accountDetails['description'],
            ':quantity_available' => $accountDetails['quantity_available'],
            ':original_price' => $accountDetails['original_price'],
            ':discounted_price' => $accountDetails['discounted_price'],
            ':min_friends_count' => $accountDetails['min_friends_count'],
            ':country' => $accountDetails['country'],
            ':xmdt_status' => $accountDetails['xmdt_status'],
            ':backup_available' => $accountDetails['backup_available'],
            ':twofa_available' => $accountDetails['twofa_available'],
            ':email_available' => $accountDetails['email_available'],
            ':min_created_year' => $accountDetails['min_created_year'],
            ':cp_via_email' => $accountDetails['cp_via_email'],
            ':account_type_id' => $accountDetails['account_type_id'],
            ':image_url' => $accountDetails['image_url'],
        );
        return $this->conn->insert($query, $params);
    }
    function getAllaccounts()
    {
        $query = "SELECT * FROM accounts";
        return $this->conn->select($query);
    }
    function getAccountByid($account_id)
    {
        $query = "SELECT * FROM accounts where account_id = :account_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectByTypeId($type_id)
    {
        $query = "SELECT * FROM accounts WHERE account_type_id = :type_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':type_id', $type_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Kiểm tra xem có bất kỳ sản phẩm nào được trả về không
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        // Trường hợp không có sản phẩm nào được tìm thấy hoặc có lỗi trong quá trình thực hiện truy vấn
        return [];
    }

    // lấy tên loại theo id
    function getTypeNameById($type_id)
    {
        $query = "SELECT type_name FROM accounttypes WHERE type_id = :type_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type_id', $type_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['type_name'];
        } else {
            return "Loại không tồn tại"; // Hoặc giá trị mặc định khác tùy bạn
        }
    }

    // lấy account theo id accounts
    function getAccountInfo($account_id)
    {
        $query = "SELECT * from accounts where account_id =:account_id  ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":account_id ", $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm tài khoản 
    function addAccountDetail($account_id, $username, $password)
    {
        $query = "INSERT INTO account_details  set account_id =:account_id, username =:username, password = :password ";
        $params = array(
            ":account_id" => $account_id,
            "username" => $username,
            "password" => $password,
        );
        return $this->conn->insert($query, $params);
    }
    // danh sách tài khoản
    function getAllTaikhoan()
    {
        $query = "SELECT * FROM account_details";
        return $this->conn->select($query);
    }

    // Edit tài khoản
    function getIdtaikhoan($account_id)
    {
        $query = "SELECT * from account_details where detail_id  = :detail_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":detail_id", $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function editTaikhoan($detail_id, $username, $password, $account_id)
    {
        $query = "UPDATE account_details SET username = :username, password = :password, account_id = :account_id WHERE detail_id = :detail_id";
        $params = array(
            ":detail_id" => $detail_id,
            ":username" => $username,
            ":password" => $password,
            ":account_id" => $account_id
        );
        return $this->conn->update($query, $params);
    }

    function getLichsugiaodichByid($user_id)
    {
        $query = "SELECT l.purchase_id, a.name AS product_name, l.so_luong_mua, l.thanh_toan, l.purchase_date
          FROM lichsumuahang l
          INNER JOIN accounts a ON l.account_id = a.account_id
          WHERE l.user_id = :user_id
          ORDER BY l.purchase_date DESC";


        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChitietgiaodichByPurchaseId($purchase_id) {
        $query = "SELECT ad.username, ad.password 
                  FROM lichsumuahang lh 
                  INNER JOIN account_details ad ON lh.account_id = ad.account_id 
                  WHERE lh.purchase_id = :purchase_id";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':purchase_id', $purchase_id, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getInfoUser(){
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user where user_id =:user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
