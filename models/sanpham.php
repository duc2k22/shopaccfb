<?php
require_once 'database.php';

class sanpham {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addLoai($type_name, $description) {
        $query = "INSERT INTO accounttypes (type_name, description) VALUES (:name, :description)";
        $params = array(':name' => $type_name, ':description' => $description);
        return $this->db->insert($query, $params);
    }

    function getIdloai(){
        $query = "SELECT * from accounttypes";
        return $this->db->select($query);
    }
}
?>