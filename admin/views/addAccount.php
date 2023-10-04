<style>
    .form-sp {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;


    }

    .form-sp form {
        width: 100%;
        max-width: 500px;
        display: flex;
        flex-direction: column;
    }

    .form-sp form h1 {
        font-size: 20px;
        opacity: 0.4;
        text-align: center;
    }

    .form-sp form label {
        margin-top: 10px;
        text-align: left;
    }

    .form-sp form input {
        border: none;
        border-radius: 5px;
        margin-top: 5px;
        padding: 5px 20px;
        outline: 1px solid salmon;
    }

    .form-sp form input:focus {
        opacity: 0.3;
    }

    .form-sp form button {
        width: 100px;
        margin-top: 20px;
        cursor: pointer;
        border: none;
        background-color: blue;
        padding: 10px;
        color: #fff;
        border-radius: 5px;
        transition: all 0.8s each;

    }

    .form-sp form button:hover {
        background-color: #4b4b95;
        transition: all 0.4s each;
    }

    .message {
        color: red;
    }

    @media(max-width:710px) {
        .form-sp {
            width: 100%;
        }
    }
</style>
<div class="form-sp">
    <form action="themaccount" method="post">
        <h1>Thêm sản phẩm</h1>
        <!-- Hiển thị lỗi -->
        <div class="message">
            <?php if (isset($message)) {
                echo $message;
            } ?></div>
        <label for="sanpham">Tên sản phẩm</label>
        <input type="text" placeholder="Tên sản phẩm" name="name">

        <label for="sanpham">Nội dung</label>
        <input type="text" placeholder="Tên sản phẩm" name="noidung">

        <label for="sanpham">Số lượng</label>
        <input type="text" placeholder="Số lượng" name="soluong">

        <label for="sanpham">Giá gốc</label>
        <input type="text" placeholder="Giá gốc" name="giagoc">

        <label for="sanpham">Giá giảm</label>
        <input type="text" placeholder="Tên sản phẩm" name="giagiam">

        <label for="sanpham">Bạn bè min</label>
        <input type="text" placeholder="Số bạn bè tối thiểu" name="banbemin">

        <label for="sanpham">Bạn bè max</label>
        <input type="text" placeholder="Số bạn bè tối đa" name="banbemax">

        <label for="sanpham">Quốc gia</label>
        <input type="text" placeholder="Quốc gia" name="quocgia">

        <label for="xmdt_status">Trạng thái XMDT:</label>
        <select name="xmdt_status">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select><br>

        <label for="backup_available">Backup có sẵn:</label>
        <select name="backup_available">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select><br>

        <label for="twofa_available">2FA có sẵn:</label>
        <select name="twofa_available">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select><br>

        <label for="email_available">Email có sẵn:</label>
        <select name="email_available">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select><br>

        <label for="email_cp">Email có sẵn:</label>
        <select name="email_cp">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select><br>

        <label for="sanpham">Năm tạo tối thiểu</label>
        <input type="text" placeholder="Năm tạo tối thiểu" name="yearmin">

        <label for="sanpham">Năm tạo tối đa</label>
        <input type="text" placeholder="Năm tạo tối đa" name="yearmax">

        <label for="image_url">URL hình ảnh:</label>
        <input type="text" name="image_url"><br>

        <label for="account_type">Chọn loại tài khoản:</label>
        <select name="account_type">
            <?php foreach ($accounType as $loai) { ?>
                <option value="<?= $loai['type_id'] ?>"><?= $loai['type_name'] ?></option>
            <?php } ?>
        </select><br>


        <button type="submit">Thêm</button>

    </form>
</div>