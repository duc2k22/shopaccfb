<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm các tệp CSS và JS của SweetAlert2 vào trang web -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

    <title><?= $titlePage ?></title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f0f0;
        font-weight: 400;

        /* display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0; */

    }

    .form-dangky {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;

        margin: 0 auto;

    }

    .text-h1 {
        text-align: center;
        font-size: 20px;
    }

    .form-dangky form {
        display: flex;
        width: 100%;
        max-width: 400px;
        flex-direction: column;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
    }

    label {
        margin-top: 10px;
    }

    input {
        width: 100%;
        padding: 10px 10px;
        outline: 1px solid seashell;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.8s each;

    }

    button:hover {
        background-color: #0056b3;
        transition: all 0.4s each;

    }

    .tex-login {
        text-align: center;
        margin-top: 10px;

    }

    .tex-login span {
        opacity: 0.4;

    }

    .tex-login a {
        opacity: 0.9;
        font-weight: 500;
        color: #009ef7;
        transition: all 0.4s each;

    }

    .tex-login a:hover {
        color: #004c9d;
        transition: all 0.4s each;
    }

    @media(max-width: 710px) {
        .form-dangky {
            width: 100%;
            padding: 10px;
        }
    }
</style>

<body>
    <div class="form-dangky">

        <form method="post" action="dangky">
            <h1 class="text-h1">Đăng ký</h1>
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username">

            <label for="password">Mật khẩu:</label>
            <input type="password" name="password">

            <label for="confirm_password">Nhập lại mật khẩu:</label>
            <input type="password" name="confirm_password">

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <button type="submit">Đăng ký</button>

            <div class="tex-login">
                <span>Đã có tài khoản? </span>
                <a href="">Đăng nhập ngay</a>
            </div>
        </form>
    </div>

</body>

</html>