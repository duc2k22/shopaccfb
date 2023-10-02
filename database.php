<?php
// require "./config.phpe";
class Database {
    protected $conn = null;

    function __construct() {
        try { 
            $str = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
            $this->conn = new PDO($str, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch(PDOException $e) {
            echo ("Lỗi kết nối db: " . $e->getMessage());
        }
    }

    function query($sql) {
        try { 
            $result = $this->conn->query($sql); 
            return $result; 
        }
        catch (PDOException $e) { 
            echo ("Lỗi truy vấn data: " . $e->getMessage() . "<br>" . $sql); 
        }
    }

    function queryOne($sql) {
        try { 
            $kq = $this->conn->query($sql); 
            return $kq->fetch(); 
        }
        catch (PDOException $e) { 
            echo("Lỗi lấy record: " . $e->getMessage() . "<br>" . $sql);
        }
    }
}
?>
