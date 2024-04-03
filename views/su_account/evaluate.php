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

                                        <?php foreach ($order_product as $key => $value): ?>
                                            <div class="row my-2 mx-1 justify-content-center d-flex "
                                                style="align-items: center;">
                                                <div class="col-md-2 mb-4 mb-md-0 mt-3">
                                                    <div class="rounded-5 mb-4 overflow-hidden " data-ripple-color="light">
                                                        <img src="<?= BASE_URL . $value['hinh_sp'] ?>" class="w-120"
                                                            height="150px" alt="anh san pham" />
                                                    </div>
                                                </div>
                                                <div class="col-md-7 mb-4 mb-md-0 mt-3">
                                                    <p class="fw-bold fs-6">
                                                        <?= $value['ten_sp'] ?>
                                                    </p>
                                                    <p class="mb-1">
                                                        <span class="text-muted me-2">Kích thước :</span><span>
                                                            <?= $value['size'] ?>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span class="text-muted me-2 ">Màu :</span><span class="capitalize">
                                                            <?= $value['mau'] ?>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span class="text-muted me-2">Số lượng :</span><span>
                                                            <?= $value['so_luong'] ?>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 mb-4 mb-md-0 mt-3">
                                                    <h5 class="mb-2">
                                                        <span class="fw-bold fs-5">
                                                            <?= number_format($value['thanh_tien'], 0, ',') ?> đ
                                                        </span>
                                                    </h5>
                                                </div>
                                                <!-- --------------- -->
                                                <div class="row">
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
                                                                <form action="" class="mb-30"
                                                                    method="POST">
                                                                    <div class="row">
                                                                        <input type="hidden" value="<?= $value['id_sp'] ?>"
                                                                            name="id_sp">
                                                                        <input type="hidden"
                                                                            value="<?= $_SESSION['user']['id'] ?>" name="id_tk">
                                                                        <div class="col-12 mb-15">
                                                                            <input type="text" placeholder="Nội dung"
                                                                                name="noi_dung">
                                                                        </div>
                                                                        <div class="col-12 mb-15">
                                                                            <select name="sao_dg" id=""
                                                                                class="rounded-pill col-12 mb-15 form-control-sm border-black"
                                                                                style="height : 44px">
                                                                                <option value="" selected disabled>Chọn sao đánh
                                                                                    giá</option>
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
                                            <hr>
                                        <?php endforeach; ?>
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