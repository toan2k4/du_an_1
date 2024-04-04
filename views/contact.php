<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Liên hệ với chúng tôi</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="contact.html">Liên hệ</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-40">

            <div class="contact-info-wrap col-md-6 col-12 mb-40">
                <h3>Liên lạc</h3>
                <p>Jadusona là thương hiệu tiên phong trong lĩnh vực nghiên cứu chất liệu an toàn, cao cấp dành cho trẻ sơ sinh và trẻ nhỏ. Chúng tôi tự tin mang tới những sản phẩm cao cấp chuẩn quốc tế - đồng hành cùng ba mẹ trong hành trình nuôi con khôn lớn</p>
                <ul class="contact-info">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <p>Phố Trịnh Văn Bô<br>Hà Nội</br></p>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <p><a href="#">+01 235 567 89</a><a href="#">+01 235 286 65</a></p>
                    </li>
                    <li>
                        <i class="fa fa-globe"></i>
                        <p><a href="#">hanghttph44322@fpt.edu.vn</a><a href="#">www.example.com</a></p>
                    </li>
                </ul>
            </div>

            <div class="contact-form-wrap col-md-6 col-12 mb-40">
                <h3>Để lại lời nhắn</h3>
                <?php if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                }
                unset($_SESSION['success']);
                ?>
                <?php
                if (isset($_SESSION['errors'])):
                    foreach ($_SESSION['errors'] as $error):
                        ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                        <?php
                    endforeach;
                endif;
                unset($_SESSION['errors']);
                ?>
                <form action="" method="post">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-30"><input type="text" name="ten" placeholder="Tên của bạn">
                            </div>
                            <div class="col-lg-6 col-12 mb-30"><input type="email" name="email"
                                    placeholder="Email"></div>
                            <div class="col-12 mb-30"><textarea name="noi_dung" placeholder="Lời nhắn"></textarea></div>
                            <div class="col-12"><input type="submit" value="Gửi"></div>
                        </div>
                    </div>
                </form>
                <div class="form-message mt-3"></div>
            </div>

        </div>
    </div>
</div><!-- Page Section End -->

<!-- Brand Section Start -->
<div class="brand-section section section-padding pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="brand-slider">

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-1.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-2.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-3.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-4.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-5.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-6.png" alt="">
                </div>

            </div>
        </div>
    </div>
</div><!-- Brand Section End -->