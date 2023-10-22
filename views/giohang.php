<!-- giohang.php -->

<style>
    section {

}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f1f1f1;
    font-weight: bold;
}

table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.total-price {
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
}

</style>
<section>
<table>
<h1>Giỏ hàng của bạn</h1>

    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productList as $product) { ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= number_format($product['discounted_price'], 0, '', ',') ?>đ</td>
                <td><?= $product['quantity'] ?></td>
                <td><?= number_format($product['totalPrice'], 0, '', ',') ?>đ</td>
                <td>
                <a href="<?= ROOT_URL . 'deletecart?id=' . $product['account_id'] ?>">Xóa</a>


                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<p>Tổng tiền: <?= number_format($totalPrice, 0, '', ',') ?>đ</p>

</section>