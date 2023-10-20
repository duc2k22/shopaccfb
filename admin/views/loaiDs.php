<style>
    /* Reset CSS */
    .centered {
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    /* Style cho header */
    th {
        background-color: #f2f2f2;
        text-align: left;
        padding: 12px;
    }

    /* Style cho dòng chẵn */
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Style cho dòng lẻ */
    tr:nth-child(odd) {
        background-color: #fff;
    }

    /* Style cho ô dữ liệu */
    td {
        padding: 12px;
        text-align: left;
    }

    /* Hover hiệu ứng */
    tr:hover {
        background-color: #ddd;
    }
    .editloai{
        text-decoration: none;
        padding: 5px;
        color: #fff;
        border-radius: 5px;
        background-color: #33c172;

    }
    .editloai:hover{
        background-color: #57ef9b;
    }
    .deleteloai{
        text-decoration: none;
        padding: 5px;
        color: #fff;
        border-radius: 5px;
        background-color: red;
    }
    .deleteloai:hover{
        background-color: #eb6e6e;
    }
</style>
<h1 class="centered">Danh sách loại tài khoản</h1>

<table border="1">
    <tr>
        <th>ID loại tài khoản</th>
        <th>Tên loại tài khoản</th>
        <th>Mô tả loại tài khoản</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($listLoai as $loai) : ?>
        <tr>
            <td><?php echo $loai['type_id']; ?></td>
            <td><?php echo $loai['type_name']; ?></td>
            <td><?php echo $loai['description']; ?></td>
            <td>
            <a class="editloai" href="<?= ROOT_URL . 'admin/editloai?id=' . $loai['type_id']; ?>">Sửa</a>


                <a class="deleteloai" href="<?= ROOT_URL . 'admin/deleteloai?id=' .$loai['type_id']; ?>" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</a>
            </td>
        </tr>
        
    <?php endforeach; ?>
</table>