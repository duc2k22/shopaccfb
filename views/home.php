<section>

    <div class="title-container-product">
        <div class="title-ban-chay">
            <h3>Bán chạy nhất</h3>
        </div>
        <div class="xem-them-ban-chay">
            <a href="#">Xem thêm <i class="fa-solid fa-plus"></i></a>

        </div>



        <!-- <hr> -->
    </div>
    <h2 class="gach-chan-ban-chay"></h2>
    <div class="container-product">
        <?php
        foreach ($productList as $lissacc) { ?>
            <div class="product">

                <div class="img-product">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </div>
                <div class="title-product">
                    <h2><?= $lissacc['name'] ?></h2>
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
        <div class="product">
            <div class="img-product">
                <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
            </div>
            <div class="title-product">
                <h2>Hotmail Trust sống 6-12 tháng chuyên dùng Verify</h2>
            </div>
            <span class="ton-kho">Còn lại: 1000 sản phẩm</span>
            <div class="price">
                <span class="price">50000đ</span>
                <span class="price-sale">10000đ</span>
            </div>
            <div class="btn-cart-product">
                <button class="btn-cart"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-product">Mua ngay</button>
            </div>

        </div>
        <div class="product">
            <div class="img-product">
                <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
            </div>
            <div class="title-product">
                <h2>Hotmail Trust sống 6-12 tháng chuyên dùng Verify</h2>
            </div>
            <span class="ton-kho">Còn lại: 1000 sản phẩm</span>
            <div class="price">
                <span class="price">50000đ</span>
                <span class="price-sale">10000đ</span>
            </div>
            <div class="btn-cart-product">
                <button class="btn-cart"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-product">Mua ngay</button>
            </div>

        </div>
        <div class="product">
            <div class="img-product">
                <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
            </div>
            <div class="title-product">
                <h2>Hotmail Trust sống 6-12 tháng chuyên dùng Verify</h2>
            </div>
            <span class="ton-kho">Còn lại: 1000 sản phẩm</span>
            <div class="price">
                <span class="price">50000đ</span>
                <span class="price-sale">10000đ</span>
            </div>
            <div class="btn-cart-product">
                <button class="btn-cart"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-product">Mua ngay</button>
            </div>

        </div>
        <div class="product">
            <div class="img-product">
                <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
            </div>
            <div class="title-product">
                <h2>Hotmail Trust sống 6-12 tháng chuyên dùng Verify</h2>
            </div>
            <span class="ton-kho">Còn lại: 1000 sản phẩm</span>
            <div class="price">
                <span class="price">50000đ</span>
                <span class="price-sale">10000đ</span>
            </div>
            <div class="btn-cart-product">
                <button class="btn-cart"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-product">Mua ngay</button>
            </div>

        </div>
        <div class="product">
            <div class="img-product">
                <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
            </div>
            <div class="title-product">
                <h2>Hotmail Trust sống 6-12 tháng chuyên dùng Verify</h2>
            </div>
            <span class="ton-kho">Còn lại: 1000 sản phẩm</span>
            <div class="price">
                <span class="price">50000đ</span>
                <span class="price-sale">10000đ</span>
            </div>
            <div class="btn-cart-product">
                <button class="btn-cart"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-product">Mua ngay</button>
            </div>

        </div>
    </div>
</section>
<section>
    <div class="title-container-viavn">
        <div class="title-ban-chay">
            <h3>Bán chạy nhất</h3>
        </div>
        <div class="xem-them-ban-chay">
            <a href="#">Xem thêm <i class="fa-solid fa-plus"></i></a>

        </div>



        <!-- <hr> -->
    </div>
    <h2 class="gach-chan-ban-chay"></h2>


    <div class="container-via-vn">
        <div class="product-viavn">
            <div class="img-viavn">
                <a href="#">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </a>
            </div>
            <div class="title-viavn">
                <h2>Via Việt Nam 50 đến 1000 bạn bè Unlock Checkpoint Mail</h2>
            </div>
            <span class="tonkho-viavn">Còn lại: 100 sản phẩm</span>
            <div class="price-viavn">
                <span class="pricevn">20000đ</span>
                <span class="pricesalevn">5000đ</span>
            </div>
            <div class="btn-viavn">
                <button class="btn-cart-viavn"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-muangay-viavn">Mua ngay</button>


            </div>
        </div>
        <div class="product-viavn">
            <div class="img-viavn">
                <a href="#">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </a>
            </div>
            <div class="title-viavn">
                <h2>Via Việt Nam 50 đến 1000 bạn bè Unlock Checkpoint Mail</h2>
            </div>
            <span class="tonkho-viavn">Còn lại: 100 sản phẩm</span>
            <div class="price-viavn">
                <span class="pricevn">20000đ</span>
                <span class="pricesalevn">5000đ</span>
            </div>
            <div class="btn-viavn">
                <button class="btn-cart-viavn"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-muangay-viavn">Mua ngay</button>


            </div>
        </div>
        <div class="product-viavn">
            <div class="img-viavn">
                <a href="#">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </a>
            </div>
            <div class="title-viavn">
                <h2>Via Việt Nam 50 đến 1000 bạn bè Unlock Checkpoint Mail</h2>
            </div>
            <span class="tonkho-viavn">Còn lại: 100 sản phẩm</span>
            <div class="price-viavn">
                <span class="pricevn">20000đ</span>
                <span class="pricesalevn">5000đ</span>
            </div>
            <div class="btn-viavn">
                <button class="btn-cart-viavn"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-muangay-viavn">Mua ngay</button>


            </div>
        </div>
        <div class="product-viavn">
            <div class="img-viavn">
                <a href="#">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </a>
            </div>
            <div class="title-viavn">
                <h2>Via Việt Nam 50 đến 1000 bạn bè Unlock Checkpoint Mail</h2>
            </div>
            <span class="tonkho-viavn">Còn lại: 100 sản phẩm</span>
            <div class="price-viavn">
                <span class="pricevn">20000đ</span>
                <span class="pricesalevn">5000đ</span>
            </div>
            <div class="btn-viavn">
                <button class="btn-cart-viavn"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-muangay-viavn">Mua ngay</button>


            </div>
        </div>
        <div class="product-viavn">
            <div class="img-viavn">
                <a href="#">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                </a>
            </div>
            <div class="title-viavn">
                <h2>Via Việt Nam 50 đến 1000 bạn bè Unlock Checkpoint Mail</h2>
            </div>
            <span class="tonkho-viavn">Còn lại: 100 sản phẩm</span>
            <div class="price-viavn">
                <span class="pricevn">20000đ</span>
                <span class="pricesalevn">5000đ</span>
            </div>
            <div class="btn-viavn">
                <button class="btn-cart-viavn"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-muangay-viavn">Mua ngay</button>


            </div>
        </div>
        <div class="product-viavn">
            <div class="img-viavn">
                <a href="#">
                    <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">

                </a>
                <div class="giamgia-viavn">
                    <p>Hết hàng!</p>
                </div>

            </div>
            <div class="title-viavn">
                <h2>Via Việt Nam 50 đến 1000 bạn bè Unlock Checkpoint Mail</h2>
            </div>
            <span class="tonkho-viavn">Còn lại: 100 sản phẩm</span>
            <div class="price-viavn">
                <span class="pricevn">20000đ</span>
                <span class="pricesalevn">5000đ</span>
            </div>
            <div class="btn-viavn">
                <button class="btn-cart-viavn"><i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn-muangay-viavn">Mua ngay</button>


            </div>
        </div>


    </div>
</section>