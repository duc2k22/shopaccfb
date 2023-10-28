<!-- giohang.php -->

<style>
    #cart {
        width: 100%;
        margin: auto;
    }

    /* #cart>div {
        display: grid;
        grid-template-columns: 300px 80px 120px auto;
    }

    #cart>div>* {
        border: 1px solid darkcyan;
        padding: 8px;
    } */

    table {
        width: 70%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .button {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }


    .button:hover {
        background-color: darkred;
    }

    .container-cart {
        display: flex;
        margin-top: 50px;
    }

    .right-cart {
        margin-left: 30px;
        width: 30%;
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .right-cart h4 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .total-cart {
        border-top: 1px solid #ccc;
        padding-top: 10px;
        margin-top: 10px;
    }

    .total-cart h2 {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
    }

    .total-cart label {
        color: #333;
    }

    .checkout {
        display: block;
        padding: 10px;
        background-color: #e91e63;
        color: white;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        margin-top: 10px;
    }


    .clearfix {
        display: flex;
        align-items: center;
        gap: 20px;

    }

    .clearfix a {
        padding: 10px 20px;
        outline: 1px solid salmon;
        list-style: none;
        text-decoration: none;

    }

    .clearfix button {
        padding: 10px 20px;
        cursor: pointer;
        background-color: #ffffff;
        border: none;
        outline: 1px solid salmon;

    }

    .quantity-control {
        display: flex;
        align-items: center;
    }

    .quantity-button {
        font-size: 1.2rem;
        padding: 0.2rem 0.5rem;
        border: 1px solid #ccc;
        background-color: #fff;
        cursor: pointer;
    }

    .quantity-input {
        width: 40px;
        text-align: center;
        border: none;
        -moz-appearance: textfield;
    }

    /* Ẩn mũi tên điều hướng của input */
    .quantity-input::-webkit-inner-spin-button,
    .quantity-input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<section>
    <form action="capnhatcart" method="post">
        <div id="cart">
            <div class="container-cart">
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productList as $sp) { ?>
                            <tr>
                                <td><?= $sp['name'] ?></td>
                                <td>
                                    <form action="<?= ROOT_URL ?>capnhatcart" method="post">
                                        <input type="number" name="soluong[<?= $sp['account_id'] ?>]" value="<?= $sp['quantity'] ?>">
                                        <!--  -->
                                    </form>
                                </td>
                                <td><?= number_format($sp['discounted_price'], 0, "", ",") ?></td>
                                <td><?= number_format($sp['totalPrice'], 0, "", ",") ?></td>
                                <td> <a class="button" href="<?= ROOT_URL . 'deletecart?id=' . $sp['account_id'] ?>">Xoá</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <div class="right-cart">
                    <h4>Đơn hàng</h4>
                    <div class="total-cart">
                        <h2>
                            <label for="">Tổng tiền</label>
                            <label for=""><?= number_format($totalPrice, 0, "", ",") ?>đ</label>
                        </h2>
                        <input type="submit" class="checkout" value="CẬP NHẬT">
                    </div>
                </div>
            </div>
        </div>
    </form>



</section>