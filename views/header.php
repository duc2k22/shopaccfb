<?php
// Lấy danh sách sản phẩm từ giỏ hàng
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$productList = [];

// Lặp qua từng sản phẩm trong giỏ hàng và lấy thông tin sản phẩm từ cơ sở dữ liệu
foreach ($cart as $productId => $quantity) {
    $product = $this->model->getAccountByid($productId);
    if ($product) {
        // Thêm thông tin số lượng sản phẩm và tổng tiền vào sản phẩm
        $product['quantity'] = $quantity;
        $product['totalPrice'] = $product['discounted_price'] * $quantity;
        $productList[] = $product;
    }
}

// Tính tổng tiền
$totalPrice = array_sum(array_column($productList, 'totalPrice'));
?>
<header>
    <div class="container-menu">
        
        <div class="menu-main">
            <i class="fa-solid fa-bars" id="icon-menu"></i>
            <div class="menu-left">
                <div class="logo">
                    <a href="<?= ROOT_URL ?>"><img src="asset/img/logo.svg" alt=""></a>
                </div>
                <ul class="menu" id="drop-menu">
                    <li><a href="<?= ROOT_URL ?>">HOME</a></li>
                    <?php
                    foreach ($accounType as $type) {
                    ?>
                        <li><a href="<?= ROOT_URL . "danhmuc?type_id=" . $type['type_id']; ?>"><?= $type['type_name'] ?></a></li>

                    <?php } ?>
                </ul>

            </div>
            <div class="menu-right">
                <div class="money">
                    <a href="#"><span>Số dư: 0đ</span></a>

                </div>
                <div class="user-profile">
                    <a href="#" id="profile-icon"><i class="fa-solid fa-user-secret"></i></a>
                    <div class="drop-profile" id="dropdown-menu">
                        <a href="#">Menu 1</a>
                        <a href="#">Menu 2</a>
                        <a href="#">Menu 3</a>
                        <a href="#">Menu 4</a>
                        <a href="dangxuat">Đăng xuất</a>
                    </div>
                </div>

                <div class="cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> <span class="gio-hang">Giỏ hàng</span></a>
                    <span class="soluong">0</span>
                    <div class="menu-cart">
                <?php foreach ($productList as $product) { ?>

                        <div class="cart-info">
                            <img src="asset/img/Hotmail-Trust-song-6-12-thang-300x300.png" alt="">
                            <a href="#"><?= $product['name'] ?></a>
                            <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
               <?php } ?>

                        

                        <div class="total-cart">
                            <h5>Tổng tiền: <span><?= number_format($totalPrice, 0, '', ',')?></span></h5>
                        </div>
                        <div class="cart-info-thanhtoan">
                            <div class="cart-thanhtoan">
                                <button>Thanh toán</button>
                            </div>
                            <div class="cart-xem">
                                <button>Xem ngay</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>