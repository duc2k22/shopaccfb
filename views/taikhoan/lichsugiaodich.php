<style>
    .transaction-history {
        width: 100%;
        border-collapse: collapse;
    }

    .transaction-history th,
    .transaction-history td {
        padding: 10px;
        text-align: center;
    }

    .transaction-history th {
        background-color: #f2f2f2;
    }

    .transaction-history tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .button-xem,
    .button {
        display: inline-block;
        margin: 5px;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
    }

    .button-xem:hover,
    .button:hover {
        background-color: #0056b3;
    }

    .button-xem {
        background-color: #e91e63;
        padding: 5px;
    }

    .button-xem:hover {
        background-color: #fd6b9d;
    }

    @media screen and (max-width: 768px) {
        table {
            overflow-x: auto;
            /* Tạo thanh cuộn ngang */
        }
    }
</style>
<div class="myaccount-content">

    <div id="cart">
        <div class="container-cart">
            <?php if (!empty($lichsugiaodic)) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Mã giao dịch</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lichsugiaodic as $row) : ?>
                            <tr>
                                <td><?= $row['purchase_id'] ?></td>
                                <td><?= $row['product_name'] ?></td>
                                <td><?= $row['so_luong_mua'] ?></td>
                                <td><?= number_format($row['thanh_toan'], 0, '', ',') ?>đ</td>
                                <td><?= number_format($row['so_luong_mua'] * $row['thanh_toan'], 0, '', ',') ?>đ</td>
                                <td><?= $row['purchase_date'] ?></td>
                                <!-- Trong danh sách giao dịch -->
                                <td>
                                    <a class="button-xem" href="chitietgiaodich?purchase_id=<?= $row['purchase_id'] ?>">Xem ngay</a>
                                    <a class="button" href="">Xoá</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Không có lịch sử giao dịch.</p>
            <?php endif; ?>



        </div>

    </div>


</div>

</div>
</section>