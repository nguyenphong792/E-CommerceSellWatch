<!--Important link source from https://bootsnipp.com/snippets/ooa9M-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
  body {
    color: #ccc
  }

  .footer-widget p {
    margin-bottom: 27px;
  }

  p {
    font-family: 'Nunito', sans-serif;
    font-size: 16px;
    color: white;
    line-height: 28px;
  }

  .animate-border {
    position: relative;
    display: block;
    width: 115px;
    height: 3px;
    background: #007bff;
  }

  .animate-border:after {
    position: absolute;
    content: "";
    width: 35px;
    height: 3px;
    left: 0;
    bottom: 0;
    border-left: 10px solid #fff;
    border-right: 10px solid #fff;
    -webkit-animation: animborder 2s linear infinite;
    animation: animborder 2s linear infinite;
  }

  @-webkit-keyframes animborder {
    0% {
      -webkit-transform: translateX(0px);
      transform: translateX(0px);
    }

    100% {
      -webkit-transform: translateX(113px);
      transform: translateX(113px);
    }
  }

  @keyframes animborder {
    0% {
      -webkit-transform: translateX(0px);
      transform: translateX(0px);
    }

    100% {
      -webkit-transform: translateX(113px);
      transform: translateX(113px);
    }
  }

  .animate-border.border-white:after {
    border-color: #fff;
  }

  .animate-border.border-yellow:after {
    border-color: #F5B02E;
  }

  .animate-border.border-orange:after {
    border-right-color: #007bff;
    border-left-color: #007bff;
  }

  .animate-border.border-ash:after {
    border-right-color: #EEF0EF;
    border-left-color: #EEF0EF;
  }

  .animate-border.border-offwhite:after {
    border-right-color: #F7F9F8;
    border-left-color: #F7F9F8;
  }

  /* Animated heading border */
  @keyframes primary-short {
    0% {
      width: 15%;
    }

    50% {
      width: 90%;
    }

    100% {
      width: 10%;
    }
  }

  @keyframes primary-long {
    0% {
      width: 80%;
    }

    50% {
      width: 0%;
    }

    100% {
      width: 80%;
    }
  }

  .dk-footer {
    padding: 10px 0 0;
    background-color: #151414;
    position: relative;
    z-index: 2;
  }

  .dk-footer .contact-us {
    margin-top: 0;
    margin-bottom: 30px;
    padding-left: 80px;
  }

  .dk-footer .contact-us .contact-info {
    margin-left: 50px;
  }

  .dk-footer .contact-us.contact-us-last {
    margin-left: -80px;
  }

  .dk-footer .contact-icon i {
    font-size: 24px;
    top: -15px;
    position: relative;
    color: #007bff;
  }

  .dk-footer-box-info {
    position: absolute;
    top: -10px;
    margin-right: 15px;
    background: #202020;
    z-index: 2;
  }

  .dk-footer-box-info .footer-social-link h3 {
    color: #fff;
    font-size: 24px;
    margin-bottom: 25px;
  }

  .dk-footer-box-info .footer-social-link ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align: center;
  }

  .dk-footer-box-info .footer-social-link li {
    display: inline-block;
  }

  .dk-footer-box-info .footer-social-link a i {
    display: block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    background: #000;
    margin-right: 5px;
    color: #fff;
  }

  .dk-footer-box-info .footer-social-link a i.fa-facebook {
    background-color: #3B5998;
  }

  .dk-footer-box-info .footer-social-link a i.fa-twitter {
    background-color: #55ACEE;
  }

  .dk-footer-box-info .footer-social-link a i.fa-google-plus {
    background-color: #DD4B39;
  }

  .dk-footer-box-info .footer-social-link a i.fa-linkedin {
    background-color: #0976B4;
  }

  .dk-footer-box-info .footer-social-link a i.fa-instagram {
    background-color: #B7242A;
  }

  .footer-awarad {
    margin-top: 285px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 100%;
    -moz-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }

  .footer-awarad p {
    color: #fff;
    font-size: 24px;
    font-weight: 700;
    margin-left: 20px;
    padding-top: 15px;
  }



  .footer-left-widget {
    padding-left: 80px;
  }

  .footer-widget .section-heading {
    margin-bottom: 35px;
  }

  .footer-widget h3 {
    font-size: 24px;
    color: #fff;
    position: relative;
    margin-bottom: 15px;
    max-width: -webkit-fit-content;
    max-width: -moz-fit-content;
    max-width: fit-content;
  }

  .footer-widget ul {
    /* width: 50%; */
    float: left;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .footer-widget li {
    margin-bottom: 10px;
  }

  .footer-widget p {
    margin-bottom: 27px;
  }

  .footer-widget a {
    color: #878787;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
  }

  .footer-widget a:hover {
    color: #007bff;
  }

  .footer-widget:after {
    content: "";
    display: block;
    clear: both;
  }

  .dk-footer-form {
    position: relative;
  }

  .dk-footer-form input[type=email] {
    padding: 14px 28px;
    border-radius: 50px;
    background: #2E2E2E;
    border: 1px solid #2E2E2E;
  }

  .dk-footer-form input::-webkit-input-placeholder,
  .dk-footer-form input::-moz-placeholder,
  .dk-footer-form input:-ms-input-placeholder,
  .dk-footer-form input::-ms-input-placeholder,
  .dk-footer-form input::-webkit-input-placeholder {
    color: #878787;
    font-size: 14px;
  }

  .dk-footer-form input::-webkit-input-placeholder,
  .dk-footer-form input::-moz-placeholder,
  .dk-footer-form input:-ms-input-placeholder,
  .dk-footer-form input::-ms-input-placeholder,
  .dk-footer-form input::placeholder {
    color: #878787;
    font-size: 14px;
  }

  .dk-footer-form button[type=submit] {
    position: absolute;
    top: 0;
    right: 0;
    padding: 12px 24px 12px 17px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    border: 1px solid #007bff;
    background: #007bff;
    color: #fff;
  }

  .dk-footer-form button:hover {
    cursor: pointer;
  }

  /* ==========================

    Contact

=============================*/
  .contact-us {
    position: relative;
    z-index: 2;
    margin-top: 65px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }

  .contact-icon {
    position: absolute;
  }

  .contact-icon i {
    font-size: 36px;
    top: -5px;
    position: relative;
    color: #007bff;
  }

  .contact-info {
    margin-left: 75px;
    color: #fff;
  }

  .contact-info h3 {
    font-size: 20px;
    color: #fff;
    margin-bottom: 0;
  }

  .copyright {
    margin-top: 55px;
    background-color: #202020;
  }

  .copyright span,
  .copyright a {
    color: #878787;
    -webkit-transition: all 0.3s linear;
    -o-transition: all 0.3s linear;
    transition: all 0.3s linear;
  }

  .copyright a:hover {
    color: #007bff;
  }

  .copyright-menu ul {
    text-align: right;
    margin: 0;
  }

  .copyright-menu li {
    display: inline-block;
    padding-left: 20px;
  }

  .icon-infor {
    width: 14px;
    height: 14px;
  }

  .back-to-top {
    position: relative;
    z-index: 2;
  }

  .back-to-top .btn-dark {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    padding: 0;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #2e2e2e;
    border-color: #2e2e2e;
    display: none;
    z-index: 999;
    -webkit-transition: all 0.3s linear;
    -o-transition: all 0.3s linear;
    transition: all 0.3s linear;
  }

  .back-to-top .btn-dark:hover {
    cursor: pointer;
    background: #FA6742;
    border-color: #FA6742;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<footer id="dk-footer" class="dk-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-4">
        <div class="dk-footer-box-info">
          <a href="index.html" class="footer-logo">
            <img style="    max-width: 100%;height: 270px;" src="https://cdn.pixabay.com/photo/2016/11/07/13/04/yoga-1805784_960_720.png" alt="footer_logo" class="img-fluid">
          </a>
          <p class="footer-info-text">
            Trang web thực hiện mua bán cho các nhu cầu của khách hàng về các mặt hàng đồng hồ.
          </p>
          <!-- <div class="footer-social-link">
            <h3>Theo dõi chúng tôi</h3>
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div> -->
          <!-- End Social link -->
        </div>
        <!-- End Footer info -->
        <div class="footer-awarad">
          <img src="images/icon/best.png" alt="">
          <p></p>
        </div>
      </div>
      <!-- End Col -->
      <div class="col-md-12 col-lg-8">
        <div class="row">
          <div class="col-md-6">
            <div class="contact-us">
              <div class="contact-icon">
                <i class="fa fa-map-o" aria-hidden="true"></i>
              </div>
              <!-- End contact Icon -->
              <div class="contact-info">
                <h3>Đia chỉ</h3>
                <p>Đường Trần Chiên, Phường Lê Bình, Quận Cái Răng, TP. Cần Thơ</p>
              </div>
              <!-- End Contact Info -->
            </div>
            <!-- End Contact Us -->
          </div>
          <!-- End Col -->
          <div class="col-md-6">
            <div class="contact-us contact-us-last">
              <div class="contact-icon">
                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
              </div>
              <!-- End contact Icon -->
              <div class="contact-info">
                <h3>Số điện thoại</h3>
                <p>0963493525</p>
              </div>
              <!-- End Contact Info -->
            </div>
            <!-- End Contact Us -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Contact Row -->
        <div class="row">
          <div class="col-md-12 col-lg-6">
            <div class="footer-widget footer-left-widget">
              <div class="section-heading">
                <h3>Thông Tin Hữu Dụng</h3>
                <span class="animate-border border-black"></span>
              </div>
              <ul>
                <li>
                  <i class="fa fa-clock-o icon-infor" aria-hidden="true"></i> Thời gian làm việc: 08:00 - 21:00
                </li>
                <li>
                  <i class="fa fa-phone" aria-hidden="true"></i> Hotline: 1900.571.269 - 0292.2244.456
                </li>
                <li>
                  <i class="fa fa-envelope-o" aria-hidden="true"></i> Email: CSTORE@gmail.com
                </li>
                <li>
                  <i class="fa fa-user-o" aria-hidden="true"></i> Thông tin về chúng tôi
                </li>
              </ul>
            </div>
            <!-- End Footer Widget -->
          </div>
          <!-- End col -->
          <div class="col-md-12 col-lg-6">
            <div class="footer-widget">
              <div class="section-heading">
                <h3>Chào Mừng</h3>
                <span class="animate-border border-black"></span>
              </div>
              <p>
                <!-- Don’t miss to subscribe to our new feeds, kindly fill the form below. -->
                Đây là trang web mà nhóm chúng tối thực hiện dựa trên nền tảng các thương mại điện tử đi trước nhằm cung cấp các phục vụ mua bán sản phẩm
              </p>
              <!-- <form action="#">
                                    <div class="form-row">
                                        <div class="col dk-footer-form">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                            <button type="submit">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> -->
              <!-- End form -->
            </div>
            <!-- End footer widget -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Widget Row -->
  </div>
  <!-- End Contact Container -->


  <div class="copyright">
    <div class="container" style="text-align: center;">
      <span style="color: white;">CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ CÔNG NGHỆ C STORE </br>
        MST: 1801608803 Đăng ký tại sở kế hoạch và đầu tư thành phố Cần Thơ Ngày 18/09/2022</span>
      <!-- End Row -->
    </div>
    <!-- End Copyright Container -->
  </div>
  <!-- End Copyright -->
  <!-- Back to top -->
  <!-- End Back to top -->
</footer>
<?php include_once(__DIR__ . '/../styles.php'); ?>
<style>
  /* button active */
  .fab {
    position: fixed;
    bottom: 32px;
    right: 32px;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    background: #db4437;
    box-shadow: 1px 2px 4px grey;
    z-index: 5;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .edit {
    display: block;
    padding: 0;
    line-height: 65px;
    animation: shake 0.5s ease infinite alternate;
    transition-property: all;
    transition-duration: 0.3s;
    transition-timing-function: ease;
    transition-delay: 0s;
  }

  @keyframes shake {
    0% {
      transform: rotateZ(45deg);
    }

    100% {
      transform: rotateZ(0deg);
    }
  }

  .fab:hover {
    cursor: pointer;
  }

  .fab img {
    width: 45%;
    transform: rotate(45deg);
    transition: 0.4s;
  }

  .box {
    position: fixed;
    bottom: 44px;
    right: 5px;
    height: 0px;
    transition-delay: 0.3s;
    width: 80px;
    transition: 0.5s cubic-bezier(0.445, 0.05, 0.55, 0.95);
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .item {
    overflow: hidden;
    border-radius: 50%;
    transition: 0.4 ease-in;
    width: 44px;
    height: 44px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    box-shadow: 1px 1px 3px grey;
    margin-left: 7px;
    margin-top: 15px;

  }

  .item1 {
    transition-delay: 0.2s;
    background: #1565c0;
  }

  .item2 {
    transition-delay: 0.4s;
    background: #29b6fc;
  }

  .item3 {
    transition-delay: 0.6s;
    background: white;
  }

  .item4 {
    transition-delay: 0.8s;
    background: white;
  }

  .item:hover {
    cursor: pointer;
  }

  .item:hover img {
    transform: rotate(360deg);
    transition: all 0.5s;
  }

  .box-active {
    height: 500px;
    z-index: 4;
  }

  .fab-active img {
    transform: rotate(270deg);
    width: 40%;
  }

  .choose-color {
    color: white;
  }

  .block {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: black;
    opacity: 0.4;
    filter: alpha(opacity=40);
    width: 100%;
    height: 100%;
    /* Not work! */
    z-index: 30;

  }

  .block-active {
    display: none;
  }

  .room {
    z-index: 31;
  }

  .facebook {
    position: relative;
  }

  .twitter {
    position: relative;
  }

  .google {
    position: relative;
  }

  .hotline {
    position: relative;
  }

  .zalo {
    position: relative;
  }



  .title-F {
    width: 120px;
    position: absolute;
    font-size: 18px;
    font-weight: 600;
    color: #1565c0;
    top: 86px;
    left: -90px;
  }

  .title-T {
    width: 120px;
    position: absolute;
    font-size: 18px;
    font-weight: 600;
    color: #1565c0;
    top: 158px;
    left: -90px;
  }

  .title-H {
    width: 120px;
    position: absolute;
    font-size: 18px;
    font-weight: 600;
    color: #1565c0;
    top: 300px;
    left: -90px;
  }

  .title-G {
    width: 120px;
    position: absolute;
    font-size: 18px;
    font-weight: 600;
    color: #1565c0;
    top: 232px;
    left: -90px;
  }

  .title-Z {
    width: 120px;
    position: absolute;
    font-size: 18px;
    font-weight: 600;
    color: #1565c0;
    top: 380px;
    left: -90px;
  }

  .color {
    align-items:
      center;
    color: #fff;
    display:
      inline-flex;
    flex-wrap:
      wrap;
    font-family:
      Quicksand;
    font-size:
      14px;
    font-weight:
      700;
    letter-spacing:
      0.28px;
    line-height:
      20px;
    text-transform:
      uppercase;
  }

  .text {
    font-weight: 600;
    font-size: 12px;
    color: white;
  }
</style>
<!-- <div class="block block-active"></div>
<div class="room">
  <div class="fab">
    <img class="edit" src="https://nguyenvu.store/wp-content/uploads/2021/08/Icon-Robot.png" alt="">
  </div>
  <div class="box">
    <div class="title-F">
      <span class="color">Facebook </br>
        <div class="">
          <p class="text">Dzo là ngon</p>
        </div>
      </span>
    </div>
    <a href="https://www.facebook.com/poppy.nhat.3" class="item item1 facebook mb-3" style="text-decoration: none;">

      <img src="/website_tmdt/assets/uploads/icon/facebook.png" alt="" style="width: 40px; height: 40px;">
    </a>

    <div class="title-T">
      <span class="color">Twitter </br>
        <p class="text">Dzo là ngon</p>
      </span>
    </div>
    <a href="" class="item item2 twitter mb-3" style="text-decoration: none;">
      <img src="/website_tmdt/assets/uploads/icon/twitter.jpg" alt="" style="width: 30px; height: 30px;">
    </a>

    <div class="title-G">
      <span class="color">Google </br>
        <p class="text">Dzo là ngon</p>
      </span>
    </div>
    <a href="" class="item item3 google mb-3" style="text-decoration: none;">
      <img src="/website_tmdt/assets/uploads/icon/google.png" alt="" style="width: 30px; height: 30px;">
    </a>

    <div class="title-H">
      <span class="color">Hotline </br>
        <p class="text">Dzo là ngon</p>
      </span>
    </div>
    <a href="" class="item item4 hotline mb-3" style="text-decoration: none;">
      <img src="/website_tmdt/assets/uploads/icon/hotline.jpg" alt="" style="width: 40px; height: 40px;">
    </a>
    <div class="title-Z">
      <span class="color">Zalo </br>
        <p class="text">Dzo là ngon</p>
      </span>
    </div>
    <a href="https://chat.zalo.me/" class="item item4 zalo">
      <img src="/website_tmdt/assets/uploads/icon/zalo.png" alt="" style="width: 40px; height: 40px;">
    </a>
  </div>
</div> -->

<script>
  document.querySelector('.fab').addEventListener('click', function(e) {
    document.querySelector('.box').classList.toggle('box-active');
    document.querySelector('.block').classList.toggle('block-active');
    document.querySelector('.fab').classList.toggle('fab-active');
  })
</script>