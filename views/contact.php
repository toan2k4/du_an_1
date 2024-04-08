<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
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
                <p>Tại thương hiệu của chúng tôi, chúng tôi không chỉ tạo ra sản phẩm và dịch vụ, mà còn xây dựng một
                    mối quan hệ đặc biệt với khách hàng của mình. Qua việc liên tục lắng nghe phản hồi từ khách hàng và
                    áp dụng các cải tiến, chúng tôi xây dựng sự tin cậy và lòng trung thành trong cộng đồng của mình.
                   </p>
                <ul class="contact-info">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <p>Ngõ 55 Hoàng Hoa Thám, Ba Đình, Hà Nội</p>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <p><a href="#">+0397183920</a><a href="#">+0354570412</a></p>
                    </li>
                    <li>
                        <i class="fa fa-globe"></i>
                        <p><a href="#">Trangg@example.com</a><a href="#">Toan.example.com</a><a
                                href="#">Hang.example.com</a></p>
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
                                    placeholder="Địa chỉ email"></div>
                            <div class="col-12 mb-30"><textarea name="noi_dung"
                                    placeholder="Nội dung lời nhắn"></textarea></div>
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