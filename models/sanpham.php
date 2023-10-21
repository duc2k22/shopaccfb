<?php
require_once 'database.php';

class sanpham
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function addLoai($type_name, $description)
    {
        $query = "INSERT INTO accounttypes (type_name, description) VALUES (:name, :description)";
        $params = array(':name' => $type_name, ':description' => $description);
        return $this->conn->insert($query, $params);
    }

    function getAllloai()
    {
        $query = "SELECT * from accounttypes";
        return $this->conn->select($query);
    }
    function getidLoai($type_id){
        $query = "SELECT * FROM accounttypes where type_id = :type_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function editLoai($type_id, $type_name, $description){
        $query = "UPDATE accounttypes SET type_name = :type_name, description = :description WHERE type_id = :type_id";
        $params = array(
            ':type_id' => $type_id,
            ':type_name' => $type_name,
            ':description' => $description,
        );
        return $this->conn->update($query, $params);
    }
    function deleteloai($type_id){
        $query = "DELETE from accounttypes where type_id =:type_id ";
        $params = array(
            ':type_id' => $type_id,
        );
        return $this->conn->delete($query, $params);
    }

    function addAccount($accountDetails)
    {
        $query = "INSERT INTO accounts (name, description, quantity_available, original_price, discounted_price, 
        min_friends_count, max_friends_count, country, xmdt_status, backup_available, twofa_available, email_available, 
        min_created_year, max_created_year, cp_via_email, account_type_id, image_url) VALUES (:name, :description, :quantity_available, :original_price, :discounted_price, :min_friends_count, :max_friends_count, :country, :xmdt_status, :backup_available, :twofa_available, :email_available, :min_created_year, :max_created_year, :cp_via_email, :account_type_id, :image_url) ";
        $params = array(
            ':name' => $accountDetails['name'],
            ':description' => $accountDetails['description'],
            ':quantity_available' => $accountDetails['quantity_available'],
            ':original_price' => $accountDetails['original_price'],
            ':discounted_price' => $accountDetails['discounted_price'],
            ':min_friends_count' => $accountDetails['min_friends_count'],
            ':max_friends_count' => $accountDetails['max_friends_count'],
            ':country' => $accountDetails['country'],
            ':xmdt_status' => $accountDetails['xmdt_status'],
            ':backup_available' => $accountDetails['backup_available'],
            ':twofa_available' => $accountDetails['twofa_available'],
            ':email_available' => $accountDetails['email_available'],
            ':min_created_year' => $accountDetails['min_created_year'],
            ':max_created_year' => $accountDetails['max_created_year'],
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

    public function selectByTypeId($type_id) {
        $query = "SELECT * FROM accounts WHERE account_type_id = :type_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':type_id', $type_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    
    
    
}
