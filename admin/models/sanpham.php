<?php
require_once "../../config.php";

class Sanpham{
    private $conn = null;

    public function __construct()
    {
        $this->conn = new Database();
    }

    // thêm loại sản phẩm
    public function addLoai($type_name, $description){
        $query = "INSERT INTO accounttypes (type_name, description) VALUE (:name, :description) ";
        $params = array(':name' => $type_name, ':description' => $description);
        $this->conn->insert($query, $params);
    }
}
?>