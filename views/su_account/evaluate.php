<!-- Page Banner Section Start -->
<div class="page-banner-section section"
    style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">
                <h1>Đánh giá</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Đánh giá</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->


<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row mbn-40">
            <div class="col-12 mb-40">
                <!-- ------- -->
                <div class="card">
                    <div class="card-body">
                        <div class="container mb-5 mt-3">
                            <div class="container">
                                <div class="row">

                                    <div class="row my-2 mx-1 justify-content-center d-flex "
                                        style="align-items: center;">
                                        <div class="col-md-2 mt-3">
                                            <div class="overflow-hidden " data-ripple-color="light">
                                                <img src="<?= BASE_URL . $order_product_one['hinh_sp'] ?>" class="w-120"
                                                    height="150px" alt="anh san pham" />
                                            </div>
                                        </div>
                                        <div class="col-md-10 mb-4 mb-md-0 mt-3">
                                            <p class="fw-bold fs-6 pro-title">
                                                <a href="<?= BASE_URL?>?act=single-product&id=<?= $order_product_one['id_sp']?>"> <?= $order_product_one['ten_sp'] ?></a>                                               
                                            </p>
                                            <p class="mb-1">
                                                <span class="text-muted me-2">Kích thước :</span><span>
                                                    <?= $order_product_one['size'] ?>
                                                </span>
                                            </p>
                                            <p>
                                                <span class="text-muted me-2">Màu :</span><span>
                                                    <?= $order_product_one['mau'] ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 40px; margin-left: 10px;">
                                        <div class="col-lg-7 col-12 mb-40">
                                            <div class="login-register-form-wrap">
                                                <h4>Bảng đánh giá</h4>
                                                <?php if (isset($_SESSION['success'])): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo $_SESSION['success'];
                                                        unset($_SESSION['success']) ?>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (isset($_SESSION['errors'])): ?>
                                                    <div class="alert alert-danger">
                                                        <?php
                                                        echo $_SESSION['errors'];
                                                        unset($_SESSION['errors']) ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (isset($_SESSION['user'])): ?>
                                                    <form action="" class="mb-30" method="POST">
                                                        <div class="row">
                                                            <input type="hidden" value="<?= $order_product_one['id_sp'] ?>"
                                                                name="id_sp">
                                                            <input type="hidden" value="<?= $_SESSION['user']['id'] ?>"
                                                                name="id_tk">
                                                            <input type="hidden" value="<?= $order_product_one['size'] ?>"
                                                                name="size">
                                                            <input type="hidden" value="<?= $order_product_one['mau'] ?>"
                                                                name="mau">
                                                            <div class="col-12 mb-15"><input type="text"
                                                                    placeholder="Nội dung" name="noi_dung"></div>
                                                            <div class="col-12 mb-15">
                                                                <select name="sao_dg"
                                                                    class="rounded-pill col-12 mb-15 form-control-sm border-black"
                                                                    style="height : 44px">
                                                                    <option value="" selected disabled>Chọn sao đánh giá
                                                                    </option>
                                                                    <option value="1">
                                                                        <p>1</p>
                                                                    </option>
                                                                    <option value="2">
                                                                        <p>2</p>
                                                                    </option>
                                                                    <option value="3">
                                                                        <p>3</p>
                                                                    </option>
                                                                    <option value="4">
                                                                        <p>4</p>
                                                                    </option>
                                                                    <option value="5">
                                                                        <p>5</p>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="submit" name="submit" value="Đánh giá">
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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