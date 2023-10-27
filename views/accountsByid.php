<style>
    .disabled-button {
        cursor: not-allowed;
        /* Thay đổi con trỏ chuột thành biểu tượng "không cho phép" */
        background-color: #ccc;
        /* Đổi màu nền thành màu xám */
        color: #666;
        /* Đổi màu chữ thành màu xám nhạt */
    }
</style>
<section>

    <div class="title-container-product">
        <div class="title-ban-chay">
            <h3><?= $typeName ?></h3>
        </div>
        <div class="xem-them-ban-chay">
            <a href="#">Xem thêm <i class="fa-solid fa-plus"></i></a>

        </div>



        <!-- <hr> -->
    </div>
    <h2 class="gach-chan-ban-chay"></h2>
    <div class="container-product">
        <?php
        foreach ($accounts as $lissacc) {
            $quantity = $lissacc['quantity_available'];
        ?>
            <div class="product">

                <div class="img-product">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </div>
                <div class="title-product">
                    <a href="<?= ROOT_URL . 'chitiet?id=' . $lissacc['account_id'] ?>">
                        <h2><?= $lissacc['name'] ?></h2>
                    </a>
                </div>
                <span class="ton-kho">Còn lại: <?= $lissacc['quantity_available'] ?></span>
                <div class="price">
                    <span class="price"><?= number_format($lissacc['original_price'], 0, '', ',') ?>đ</span>
                    <span class="price-sale"><?= number_format($lissacc['discounted_price'], 0, '', ',') ?>đ</span>
                </div>
                <div class="btn-cart-product">
                    <?php if($quantity === 0) { ?>
                        <!-- Nếu số lượng sản phẩm là 0, vô hiệu hóa nút bằng cách thêm lớp CSS "disabled-button" -->
                        <a class="btn-cart disabled-button" href="#"><i class="fa-solid fa-cart-plus"></i></a>
                   <?php }elseif($quantity >0) { ?>  
                        <!-- Nếu số lượng sản phẩm lớn hơn 1, hiển thị nút -->
                        <a class="btn-cart" href="<?= ROOT_URL . 'addtoCart?id=' . $lissacc['account_id'] ?>&soluong=1">
                            <i class="fa-solid fa-cart-plus"></i>
                        </a>
                  <?php } ?>
                  <a href="<?= ROOT_URL . 'muahang?id=' . $lissacc['account_id'] . '&soLuongMua=1&thanhToan=' . $lissacc['discounted_price'] ?>" class="btn-product">Mua hàng</a>



                </div>
            </div>
        <?php } ?>

    </div>
</section>


