<?php
class Database {
    protected $conn = null;


    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối CSDL thất bại: " . $e->getMessage();
        }
    }

    public function select($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($query, $params){
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    public function update($query, $params) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    public function delete($query, $params) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }
}
?>