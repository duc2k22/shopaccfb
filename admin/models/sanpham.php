<?php
// require_once "database.php";

class Sanpham extends Database
{
    function detail($id_sp)
    {
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh, soluotxem, ngay FROM sanpham WHERE id_sp = $id_sp";
        return $this->queryOne($sql);
    }
    function sanphamTrongLoai($id_loai = 0, $pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT  id_sp, ten_sp, gia, gia_km, hinh from sanpham where id_loai=$id_loai order by ngay desc limit $startRow, $pageSize";
        return $this->query($sql);
    }
    function layTenLoai($id_loai = 0)
    {
        $sql = "SELECT ten_loai from loai where id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['ten_loai'];
    }
    function demSPTrongLoai($id_loai = 0)
    {
        $sql = "SELECT count(id_sp) as dem from sanpham where id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function layListLoai()
    {
        $sql = "SELECT id_loai, ten_loai, thutu, anhien from loai where anhien=1 order by thutu";
        return $this->query($sql);
    }

    function sanphamXemNhieu($sosp = 9)
{
    $sql = "SELECT id_sp, ten_sp, gia, hinh FROM sanpham ORDER BY soluotxem DESC LIMIT 0, $sosp";
    return $this->query($sql);
}

function sanphamNoiBat($sosp = 9)
{
    $sql = "SELECT id_sp, ten_sp, gia, hinh FROM sanpham WHERE hot = 1 ORDER BY ngay DESC LIMIT 0, $sosp";
    return $this->query($sql);
}
function luudonhang($hoten, $email, $diachi, $dienthoai){
    $sql = "INSERT INTO donhang set hoten =:ht, email = :em, diachi =:dc, dienthoai =:dt";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":ht", $hoten, PDO::PARAM_STR);
    $stmt->bindParam(":em", $email, PDO::PARAM_STR);
    $stmt->bindParam(":dc", $diachi, PDO::PARAM_STR);
    $stmt->bindParam(":dt", $dienthoai, PDO::PARAM_STR);
    $stmt->execute();
    $idDH = $this-> conn->lastInsertId();
    return $idDH;
}
function luuSpTrongGioHang($id_dh) {
    foreach ($_SESSION['cart'] as $id_sp => $soluong) {
        $sp = $this->detail($id_sp); // Lấy thông tin sản phẩm từ database
        $ten_sp = $sp['ten_sp'];
        $gia = $sp['gia'];

        // Thực hiện câu truy vấn SQL để lưu thông tin vào bảng donhangchitiet
        $sql = "INSERT INTO donhangchitiet (id_dh, id_sp, ten_sp, soluong, gia) VALUES (:id_dh, :id_sp, :ten_sp, :soluong, :gia)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_dh", $id_dh, PDO::PARAM_INT);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":soluong", $soluong, PDO::PARAM_INT);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->execute();
    }
}


}
