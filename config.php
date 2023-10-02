<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shopfwb');

define('ROOT_URL', '/shopaccfb/');

define('ADMIN', ROOT_URL . '/admin');

// các tệp css layout
define('CSS_PATH', ROOT_URL . 'public/css/');
define('CSS_PATH_1', CSS_PATH . 'style.css');

// các tệp css admin
define('CSS_ADMIN', ADMIN . '/public/css');

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