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
        foreach ($accounts as $lissacc) { ?>
            <div class="product">

                <div class="img-product">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </div>
                <div class="title-product">
                    <a href="<?= ROOT_URL . 'chitiet?id=' . $lissacc['account_id'] ?>"><h2><?= $lissacc['name'] ?></h2></a>
                </div>
                <span class="ton-kho">Còn lại: <?= $lissacc['quantity_available'] ?></span>
                <div class="price">
                    <span class="price"><?= number_format($lissacc['original_price'], 0, '', ',') ?>đ</span>
                    <span class="price-sale"><?= number_format($lissacc['discounted_price']), 0, '' ?>đ</span>
                </div>
                <div class="btn-cart-product">
                    <button class="btn-cart"><i class="fa-solid fa-cart-plus"></i></button>
                    <button class="btn-product">Mua ngay</button>
                </div>





            </div>
        <?php } ?>
       
    </div>
</section>
