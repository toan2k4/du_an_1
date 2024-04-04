<div class="footer-top-section section bg-theme-two-light section-padding">
    <div class="container">
        <div class="row mbn-40">

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">Liên hệ</h4>
                <p><a href="tel:01234567890">01234 567 890</a><a href="tel:01234567891">01234 567 891</a></p>
                <p><a href="mailto:info@example.com">Trangg@example.com</a><a href="#">www.example.com</a></p>
            </div>

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">SẢN PHẨM</h4>
                <ul>
                    <li><a href="#">Sản phẩm mới</a></li>
                    <li><a href="#">Sản phẩm bán chạy</a></li>
                    <li><a href="#">Sản phẩm nổi bật</a></li>
                    <li><a href="#">Khuyến mãi xịn</a></li>
                    <li><a href="#">Sản phẩm đang giảm giá</a></li>
                </ul>
            </div>

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">THÔNG TIN</h4>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Điều khoản và điều kiện </a></li>
                    <li><a href="#">Phương thức thanh toán</a></li>
                    <li><a href="#">Bảo hàng sản phẩm</a></li>
                    <li><a href="#">Quy trình trả hàng</a></li>
                    <li><a href="#">Bảo mật thanh toán</a></li>
                </ul>
            </div>

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">BẢN TIN</h4>
                <p><?= $GLOBALS['settings']['bantin'] ?? null ?></p>

                <form id="mc-form" class="mc-form footer-subscribe-form">
                    <input id="mc-email" autocomplete="off" placeholder="Nhập Email" name="EMAIL"
                        type="email">
                    <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                </form>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts">
                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div><!-- mailchimp-alerts end -->

                <h5>THEO DÕI CHÚNG TÔI</h5>
                <p class="footer-social"><a href="<?= $GLOBALS['settings']['Facebook'] ?? null ?>">Facebook</a> - <a href="#">Twitter</a> - <a href="#">Google+</a>
                </p>

            </div>

        </div>
    </div>
</div><!-- Footer Top Section End -->

<!-- Footer Bottom Section Start -->
<div class="footer-bottom-section section bg-theme-two pt-15 pb-15">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <p class="footer-copyright">© 2024 Jadusona. Made with <i class="fa fa-heart heart-icon"></i> By Trangg - Toản - Hằng</p>
            </div>
        </div>
    </div>
</div>