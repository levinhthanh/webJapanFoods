<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Food</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="teleMail.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>

    <div class="teleMail" style="display: flex;">
        <div class="teleMail1">
            <i id="teleIcon" class="fas fa-phone-square-alt"></i>
            <p id="teleNum"> +81-30-6271-5720 </p>
        </div>
        <div class="teleMail2">
            <i id="letterIcon" class="fas fa-envelope-square"></i>
            <p id="email"> info@betogaizin.com </p>
        </div>
    </div>

    <div class="search" style="display: flex;">
        <img id="logo" src="images/logo.png" alt="logo">
        <form class="searchProduct" style="display: flex;" action="" method="post">
            <label id="show">Tất cả</label>
            <input id="inputProduct" type="text" name="search" placeholder="Từ khóa tìm kiếm...">
            <div id="btn-cover">
                <img id="btnImg" src="images/search.png" alt="" srcset="">
                <input id="btn" type="submit" value="">
            </div>
        </form>
        <div class="others" style="display: flex;">
            <div class="dangNhap">
                <i id="login" class="fas fa-user"></i><br>
                <a href="">Đăng nhập</a>
            </div>
            <div class="gioHang">
                <i id="box" class="fas fa-shopping-cart"></i><br>
                <a href="">Giỏ hàng</a>
            </div>
        </div>
    </div>

    <div class="header" style="display: flex;">
        <div class="trangchu"><a id="trangchu" href="">Trang chủ</a></div>
        <div class="header"></div>
        <div class="header"></div>
        <div class="header"></div>
        <div class="header"></div>
        <div class="header"></div>
        <div class="header"></div>
    </div>

    <div class="main">
        <div class="showProducts">
            <?php
            include 'Product.php';
            $dataJson = file_get_contents('product.json');
            $dataArray = json_decode($dataJson);
            for ($i = 0; $i < count($dataArray); $i++) {
                $productsArray[$i] = new Product($dataArray[$i]->sku, $dataArray[$i]->price, $dataArray[$i]->image);
            }
            $productJson = json_encode($productsArray);
            file_put_contents('myProducts.json', $productJson);

            if (!isset($_POST['search'])) {
                for ($i = 0; $i < count($productsArray); $i++) {
                    echo "<div class='product'><div class='image'><img id='image' src='" . $productsArray[$i]->image . "'></div>
                    <p id='name'>" . $productsArray[$i]->name . "</p>
                    <p id='price'>" . $productsArray[$i]->price . " ¥</p>
                    </div>";
                }
            }

            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $search = strtoupper($search);
                for ($i = 0; $i < count($productsArray); $i++) {
                    if ($search === $productsArray[$i]->name) {
                        echo "<div class='product'><div class='image'><img id='image' src='" . $productsArray[$i]->image . "'></div>
                        <p id='name'>" . $productsArray[$i]->name . "</p>
                        <p id='price'>" . $productsArray[$i]->price . " ¥</p>
                        </div>";
                    }
                }
            }

            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $search = strtoupper($search);
                for ($i = 0; $i < count($productsArray); $i++) {
                    if ($search === "") {
                        echo "<div class='product'><div class='image'><img id='image' src='" . $productsArray[$i]->image . "'></div>
                            <p id='name'>" . $productsArray[$i]->name . "</p>
                            <p id='price'>" . $productsArray[$i]->price . " ¥</p>
                            </div>";
                    }
                }
            }



            ?>
        </div>
    </div>
    <div class="footer"></div>
    </div>
</body>

</html>