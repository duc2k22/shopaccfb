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
        width: 100%;
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
    @media screen and (max-width: 768px) {
        table {
            overflow-x: auto; /* Tạo thanh cuộn ngang */
        }
    }
    
</style>
<div class="myaccount-content">

    <div id="cart">
        <div class="container-cart">
        <table>
    <thead>
        <tr>
        <th>Mã giao dịch</th>

            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            <th>Thời gian</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($lichsugiaodic)) {
            foreach ($lichsugiaodic as $row) {
                echo '<tr>';
                echo '<td>' . $row['purchase_id'] . '</td>';

                echo '<td>' . $row['product_name'] . '</td>';
                echo '<td>' . $row['so_luong_mua'] . '</td>';
                echo '<td>' . number_format($row['thanh_toan'], 0, '', ',') . 'đ</td>';
                echo '<td>' . number_format($row['so_luong_mua'] * $row['thanh_toan'], 0, '', ',') . 'đ</td>';
                echo '<td>' . $row['purchase_date'] . '</td>';

                echo '<td><a class="button" href="">Xoá</a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5">Không có lịch sử giao dịch.</td></tr>';
        }
        ?>
    </tbody>
</table>


        </div>

    </div>


</div>

</div>
</section>