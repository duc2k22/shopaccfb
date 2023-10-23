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
    <form action="addloai" method="post">
        <h1>Thêm loại sản phẩm</h1>
        <!-- Hiển thị lỗi -->
        <div class="message">
            <?php if (isset($message)) {
                echo $message;
            } ?></div>
        <label for="sanpham">Tên sản phẩm</label>
        <input type="text" placeholder="Tên sản phẩm" name="name">
        <label for="sanpham">Nội dung</label>
        <input type="text" placeholder="Nội dung" name="noidung">
        <label for="sanpham">Ẩn hiện</label>
        <select name="anhien" id="">
            <option value="0">Ẩn</option>
            <option value="1">HIện</option>
        </select>
        <label for="sanpham">Thứ tự</label>
        <input type="text" placeholder="Thứ tự" name="thutu">
        <button type="submit">Thêm</button>

    </form>
</div>