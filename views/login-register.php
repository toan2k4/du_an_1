<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Đăng nhập & Đăng ký</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="login-register.html">Đăng nhập & Đăng ký</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row mbn-40">

            <div class="col-lg-4 col-12 mb-40">
                <div class="login-register-form-wrap">
                    <h3>ĐĂNG NHẬP</h3>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']?></div>
                    <?php endif; unset($_SESSION['error']) ?>
                    <form action="" class="mb-30" method="post">
                        <div class="row">
                            <div class="col-12 mb-15"><input type="text" placeholder="Email" name="email"></div>
                            <div class="col-12 mb-15"><input type="password" placeholder="Mật khẩu" name="password">
                            </div>
                            <div class="col-12"><input type="submit" value="Đăng nhập"></div>
                        </div>
                    </form>
                    <a href="?act=quenmk" class="border-bottom">Quên mật khẩu</a><hr/>
                    <h4>Bạn cũng có thể đăng nhập bằng...</h4>
                    <div class="social-login">
                        <a href="<?= $GLOBALS['settings']['Facebook'] ?? null ?>"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-12 mb-40 text-center d-none d-lg-block">
                <span class="login-register-separator"></span>
            </div>

            <div class="col-lg-6 col-12 mb-40 ms-auto">
                <div class="login-register-form-wrap">
                    <h3>ĐĂNG KÝ</h3>

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                            <?php unset($_SESSION['success']) ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['errors'])): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($_SESSION['errors'] as $error): ?>
                                    <li>
                                        <?= $error ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php unset($_SESSION['errors']) ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= BASE_URL ?>?act=register" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-15"><input type="text" placeholder="Họ và tên"
                                    name="ho_va_ten" <?= isset($_SESSION['data'])?$_SESSION['data']['ho_va_ten']:null ?>></div>
                            <div class="col-md-6 col-12 mb-15"><input type="text" placeholder="Tên tài khoản" class="form-control " name="ten_tk" <?= isset($_SESSION['data'])?$_SESSION['data']['ten_tk']:null ?>>
                            </div>
                            <div class="col-md-6 col-12 mb-15"><input type="email" placeholder="Email" name="email_tk" <?= isset($_SESSION['data'])?$_SESSION['data']['email_tk']:null ?>>
                            </div>
                            <div class="col-md-6 col-12 mb-15"><input type="password" placeholder="Mật khẩu"
                                    name="mat_khau" <?= isset($_SESSION['data'])?$_SESSION['data']['mat_khau']:null ?>></div>
                            <div class="col-md-6 col-12 mb-15"><input type="password" placeholder="Nhập lại mật khẩu"
                                    name="confirm_mk" <?= isset($_SESSION['data'])?$_SESSION['data']['confirm_mk']:null ?>></div>
                            <div class="col-md-6 col-12"><input type="submit" value="Đăng ký"></div>
                        </div>
                    </form>
                </div>
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
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-1.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-2.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-3.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-4.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-5.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-6.png" alt="">
                </div>

            </div>
        </div>
    </div>
</div><!-- Brand Section End -->
<?php if(isset($_SESSION['data'])) unset($_SESSION['data']) ?>