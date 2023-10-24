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
    <form action="edittaikhoan" method="post">
        <h1>Sửa loại sản phẩm</h1>
        <!-- Hiển thị lỗi -->
        <div class="message">
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </div>
        <input type="hidden" name="detail_id" value="<?= $dstk['detail_id'] ?>">

        <label for="username">Tài khoản</label>
        <input type="text" name="username" value="<?= $dstk['username']; ?>">

        <label for="password">Password</label>
        <input type="text" name="password" value="<?= $dstk['password'] ?>">

        <label for="account_id">Loại tài khoản</label>

        <select name="account_id">
            <?php foreach ($accountDetailModel as $tk) { ?>
                <option value="<?= $tk['account_id'] ?>" <?php if ($tk['account_id'] == $dstk['account_id']) echo 'selected'; ?>>
                    <?= $tk['name'] ?>
                </option>
            <?php } ?>
        </select><br>



        <button type="submit">Sửa</button>
    </form>
</div>