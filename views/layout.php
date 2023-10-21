<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <link rel="stylesheet" href="asset/css/style.css">
    <title><?= $titlePage; ?></title>
</head>

<body>
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- end header -->

    <?php if (!$isDanhMucPage) : ?>
        <!-- Chỉ hiển thị $slideshow nếu không ở trang danh mục -->
        <?php include $slideshow ?>
    <?php endif ?>

    <!-- content -->
    <?php include $viewnoidung; ?>
    <!-- end content -->

    <!-- footer -->
    <?php include "footer.php"; ?>
    <!-- end footer -->
</body>

<script>
     $(document).ready(function(){
            $('.slider-product').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                prevArrow: false, // Hide default "Previous" arrow
                nextArrow: false  // Hide default "Next" arrow
            });
        });

    const btndrop = document.getElementById('profile-icon');
    const dropmenu = document.getElementById('dropdown-menu');

    btndrop.addEventListener('click', () => {
        dropmenu.classList.toggle('active');
    });

    document.addEventListener('click', (event) => {
        if (!btndrop.contains(event.target) && !dropmenu.contains(event.target)) {
            dropmenu.classList.remove('active');
        }
    });

    const iconmenu = document.getElementById('icon-menu');
    const dropmenumain = document.getElementById('drop-menu');

    iconmenu.addEventListener('click', () => {
        dropmenumain.classList.toggle('active');
    });

</script>

</html>