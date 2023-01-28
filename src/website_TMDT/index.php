<?php

include_once __DIR__ . ('/dbconnect.php');

session_start();

$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;

$sqlsp = "SELECT * FROM sanpham ORDER BY masp ASC LIMIT " . $item_per_page . " OFFSET " . $offset . " ";
$relsultsp = mysqli_query($conn, $sqlsp);
$totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");

$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);

$arraysp = [];

while ($row = mysqli_fetch_array($relsultsp, MYSQLI_ASSOC)) {
  $arraysp[] = array(
    'masp' => $row['masp'],
    'tenhang' => $row['tenhang'],
    'math' => $row['math'],
    'hinhsp' => $row['hinhsp'],
    'soluong' => $row['soluong'],
    'donvitinh' => $row['donvitinh'],
    'giamoi' => $row['giamoi'],
    'giacu' => $row['giacu'],
    'malh' => $row['malh']
  );
}
$sqlspnew = "SELECT * 
FROM sanpham 
ORDER BY masp DESC LIMIT 9;";

$relsultspnew = mysqli_query($conn, $sqlspnew);

$arrayspnew = [];
while ($row = mysqli_fetch_array($relsultspnew, MYSQLI_ASSOC)) {
  $arrayspnew[] = array(
    'masp' => $row['masp'],
    'tenhang' => $row['tenhang'],
    'math' => $row['math'],
    'hinhsp' => $row['hinhsp'],
    'soluong' => $row['soluong'],
    'donvitinh' => $row['donvitinh'],
    'giamoi' => $row['giamoi'],
    'giacu' => $row['giacu'],
    'malh' => $row['malh']
  );
}
//bien truyen nhan
$themgiohang = 'themgiohang';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <?php include_once(__DIR__ . '/frontend/layouts/styles.php'); ?>

</head>
<style>
  .tinhtoan {
    display: flex;
    justify-content: center;
  }

  .products:hover {
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
  }

  .product-price-old {
    text-decoration-line: line-through;
    font-size: 12px;
    color: gray;
  }

  .product-price {
    padding-left: 5px;
    font-size: 13.5px;
    color: red;
    font-weight: 800;
  }

  .btncard {
    background: linear-gradient(144deg, #ff8949, #f7434c);
    padding: 9px;
    border-radius: 6px;
    text-align: center;
    color: white;
    font-weight: 700;
  }

  .badge-container {
    margin-top: 0.5rem;
    display: flex;
  }

  .z-1 {
    z-index: 21;
  }

  .left {
    left: 5px;
  }

  .top {
    top: -10px;
  }

  .absolute {
    position: absolute !important;
  }

  .badge,
  .badge+.badge {
    height: 2.5rem;
    width: 2.5rem;
    font-size: 15px;
    margin-left: 0.5rem;
    margin-top: 0.25rem;
  }

  .badge-outline,
  .badge-circle {
    margin-left: -0.4em;
  }

  .badge {
    display: table;
    z-index: 20;
    pointer-events: none;
    height: 3.3em;
    width: 4em;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
  }

  .badge-inner.secondary.on-sale {
    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 8%);
    background-color: #f7464c;
  }

  .badge-circle-inside .badge-inner,
  .badge-circle .badge-inner {
    border-radius: 999px;
  }

  .secondary,
  .checkout-button,
  .button.checkout,
  .button.alt {
    background: #f84c4c;
    border: none;
  }

  .secondary,
  .checkout-button,
  .button.checkout,
  .button.alt {
    background-color: #d26e4b;
  }

  .badge-inner {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    height: 3.3em;
    width: 4em;
    background-color: #446084;
    line-height: .85;
    color: #fff;
    font-weight: bolder;
    padding: 2px;
    white-space: nowrap;
    -webkit-transition: background-color .3s, color .3s, border .3s;
    -o-transition: background-color .3s, color .3s, border .3s;
    transition: background-color .3s, color .3s, border .3s;
  }

  .onsale {
    font-size: 13px;
  }

  .name-product {
    display: -webkit-box;
    color: black;
    font-weight: 500;
    font-size: 15px;
    text-align: center;
    line-height: 1.3;
    -webkit-line-clamp: 3;
    /* số dòng hiển thị */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 40px;
  }

  .products {
    margin-top: 15px;

  }

  .cot {
    padding-left: 50px;
    margin-left: -12px;
  }



  /* ------------- */
  @keyframes slidy {
    0% {
      left: 0%;
    }

    20% {
      left: 0%;
    }

    25% {
      left: -100%;
    }

    45% {
      left: -100%;
    }

    50% {
      left: -200%;
    }

    70% {
      left: -200%;
    }

    75% {
      left: -300%;
    }

    95% {
      left: -300%;
    }

    100% {
      left: -400%;
    }
  }

  div#slider {
    overflow: hidden;
  }

  div#slider figure img {
    object-fit: contain;
    width: 20%;
    height: 600px;
    float: left;
  }

  div#slider figure {
    position: relative;
    width: 500%;
    margin: 0;
    left: 0;
    text-align: left;
    font-size: 0;
    animation: 10s slidy infinite;
  }

  .card-home-page {
    margin-bottom: 20px;
  }

  h2 {
    font-size: 2.25rem;
    margin-bottom: 0.75rem;
    font-weight: 700;
    color: #424242;
    font-family: Courier;
  }
</style>

<body>
  <div>
    <?php include_once(__DIR__ . '/frontend/layouts/partials/header.php'); ?>
  </div>
  <div class="wrapper">
    <div id="slider">
      <figure>
        <img src="/website_TMDT/assets/shared/slide1.jpg" alt />
        <img src="/website_TMDT/assets/shared/slide2.jpg" alt />
        <img src="/website_TMDT/assets/shared/slide3.jpg" alt />
        <img src="/website_TMDT/assets/shared/slide1.jpg" alt />

      </figure>
    </div>
    <div class="container">
      <!-- <div class="row">

        <div class="carousel-container">
          <button id="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
          <button id="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          <div class="carousel-slide">
            <?php foreach ($arrayspnew as $mangsanphammoi) : ?>
              <a href="./page_main/detail_product.php?masp=<?= $mangsanphammoi['masp'] ?>&math=<?= $mangsanphammoi['math'] ?>">
                <img src="./assets/uploads/sanpham/<?= $mangsanphammoi['hinhsp'] ?>" alt="" />
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div> -->


      <!-- End block content -->
      <br>
      <h3 style="color:black ; text-align: center;">Sản phẩm nổi bật</h3>
      <div class="row card-home-page container">
        <?php foreach ($arraysp as $mangsanpham) : ?>
          <a style="text-decoration: none;" href="./page_main/detail_product.php?masp=<?= $mangsanpham['masp'] ?>&math=<?= $mangsanpham['math'] ?>">
            <div class="col-md-3 cot">

              <div class="card products" style="width: 18rem;">
                <div class="badge-container absolute left top z-1">
                  <div class="callout badge badge-circle">
                    <div class="badge-inner secondary on-sale">
                      <span class="onsale">-<?= number_format((($mangsanpham['giacu'] - $mangsanpham['giamoi']) / $mangsanpham['giacu']) * 100, 0, ",", ".") ?>%</span>
                    </div>
                  </div>
                </div>
                <img style="margin-bottom: 20px; margin-top: 60px;" src="./assets/uploads/sanpham/<?= $mangsanpham['hinhsp'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name-product">
                    <?= $mangsanpham['tenhang'] ?>
                  </h5>
                  <div class="tinhtoan">
                    <p class="product-price-old"><?= number_format($mangsanpham['giacu'], 0, ",", ".") ?> <?= $mangsanpham['donvitinh'] ?></p>
                    <p class="product-price"><?= number_format($mangsanpham['giamoi'], 0, ",", ".") ?> <?= $mangsanpham['donvitinh'] ?></p>
                  </div>

                  <?php
                  if (!isset($_SESSION['makh'])) { ?>
                    <div class="btncard">
                      <form action="/website_tmdt/customer/login-register/dangnhap_dangky.php?themgiohang=<?= $themgiohang ?>" method="post">
                        <fieldset>
                          <input type="hidden" name="tenhang" value="<?= $mangsanpham['tenhang'] ?>">
                          <input type="hidden" name="masp" value="<?= $mangsanpham['masp'] ?>">
                          <input type="hidden" name="giasanpham" value="<?= $mangsanpham['giamoi'] ?>">
                          <input type="hidden" name="hinhsanpham" value="<?= $mangsanpham['hinhsp'] ?>">
                          <input type="hidden" name="soluong" value="1">
                          <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button">
                        </fieldset>
                      </form>
                    </div>
                  <?php  } else { ?>
                    <div class="btncard">
                      <form action="/../website_TMDT/customer/giohang.php" method="post">
                        <fieldset>
                          <input type="hidden" name="tenhang" value="<?= $mangsanpham['tenhang'] ?>">
                          <input type="hidden" name="masp" value="<?= $mangsanpham['masp'] ?>">
                          <input type="hidden" name="giasanpham" value="<?= $mangsanpham['giamoi'] ?>">
                          <input type="hidden" name="hinhsanpham" value="<?= $mangsanpham['hinhsp'] ?>">
                          <input type="hidden" name="soluong" value="1">
                          <input type="hidden" name="makh" value="<?= $kh['makh'] ?>">
                          <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button">
                        </fieldset>
                      </form>
                    </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </a>
          </a>
        <?php endforeach; ?>
      </div>
      <?php
      include './page_main/pagination.php';
      ?>
    </div>
  </div>
  <?php include_once(__DIR__ . '/frontend/layouts/partials/footer.php'); ?>

</body>

</html>