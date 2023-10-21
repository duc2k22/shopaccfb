<section>
        <div class="product-chitiet">
            <div class="img-product-chitet">
                <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
            </div>
            <div class="info-product-chitiet">
                <div class="title-chitiet">
                    <h3><?= $account_id['name']; ?></h3>
                </div>
                <p class="total-product">Còn lại: <?= $account_id['quantity_available'] ?></p>
                <div class="price-wrapper">
                    <p class="price-product price-sale">
                        <del><?= number_format($account_id['original_price'], 0, ',', '.') ?>đ</del>
                        <ins>
                            <span><?= number_format($account_id['discounted_price'], 0, ',', '.') ?>đ</span>
                        </ins>
                    </p>
                </div>
                <div class="product-description">
                    <ul>
                        <li>Info: <span>Có</span></li>
                        <li>2FA: <span><?= $account_id['twofa_available'] == 1 ? 'Có' : 'Không' ?></span></li>
                        <li>Very: <span>Phone, mail</span></li>
                        <li>Mail: <span>Live 6-12 tháng</span></li>
                        <li>Chuyên dùng: <span>Reg BM, Chơi 2$, 3$, kích 10$, 12$, Reg Page, Spam</span></li>
                    </ul>
                </div>
                <div class="thanh-toan-money">
                    <button>MUA NGAY</button>
                </div>
            </div>
            <div class="product-sidebar">
                <div class="row-product-sidebar">
                    <div class="box-product">
                        <div class="icon-product">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="text-box-product">
                            <h5>Giá cả tốt nhất</h5>
                            <h6>Giá cả tốt nhất thị trường</h6>
                        </div>
                    </div>
                    <div class="box-product">
                        <div class="icon-product">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="text-box-product">
                            <h5>Giá cả tốt nhất</h5>
                            <h6>Giá cả tốt nhất thị trường</h6>
                        </div>
                    </div>
                    <div class="box-product">
                        <div class="icon-product">
                            <i class="fa-regular fa-thumbs-up"></i>
                        </div>
                        <div class="text-box-product">
                            <h5>Giá cả tốt nhất</h5>
                            <h6>Giá cả tốt nhất thị trường</h6>
                        </div>
                    </div>
                    <div class="box-product">
                        <div class="icon-product">
                            <i class="fa-solid fa-dumpster-fire"></i>
                        </div>
                        <div class="text-box-product">
                            <h5>Giá cả tốt nhất</h5>
                            <h6>Giá cả tốt nhất thị trường</h6>
                        </div>
                    </div>
                    <div class="box-product">
                        <div class="icon-product">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        <div class="text-box-product">
                            <h5>Giá cả tốt nhất</h5>
                            <h6>Giá cả tốt nhất thị trường</h6>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        <div class="table-mota">
            <ul>
                <li><a href="#">MÔ TẢ</a></li>
                <li><a href="#">THÔNG TIN CHI TIẾT</a></li>
                <li><a href="#">ĐÁNH GIÁ (0)</a></li>
            </ul>
        </div>
    </section>