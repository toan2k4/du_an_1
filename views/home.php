<!-- Hero Section Start -->
<div class="hero-section section">

    <!-- Hero Slider Start -->
    <div class="hero-slider hero-slider-one fix">

        <!-- Hero Item Start -->
        <div class="hero-item" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">

            <!-- Hero Content -->
            <div class="hero-content">

                <h1>Giảm 100K <br> Bộ sưu tập thời trang mới nhất</h1>
                <a href="#">Xem thêm</a>

            </div>

        </div><!-- Hero Item End -->

        <!-- Hero Item Start -->
        <div class="hero-item" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-2.jpg)">

            <!-- Hero Content -->
            <div class="hero-content">

                <h1>Giảm 100K <br> Bộ sưu tập thời trang mới nhất</h1>
                <a href="#">Xem thêm</a>

            </div>

        </div><!-- Hero Item End -->

    </div><!-- Hero Slider End -->

</div><!-- Hero Section End -->

<!-- Banner Section Start -->
<div class="banner-section section mt-40">
    <div class="container-fluid">
        <div class="row row-10 mbn-20">

            <div class="col-lg-4 col-md-6 col-12 mb-20">
                <div class="banner banner-1 content-left content-middle">

                    <a href="#" class="image"><img src="<?= BASE_URL ?>/assets/user/assets/images/banner/banner-1.jpg"
                            alt="Banner Image"></a>

                    <div class="content">
                        <h1>Giày trẻ em<br>mới về<br>Giảm giá 30%</h1>
                        <a href="#" data-hover="Xem thêm">Xem thêm</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-20">
                <a href="#" class="banner banner-2">

                    <img src="<?= BASE_URL ?>/assets/user/assets/images/banner/banner-2.jpg" alt="Banner Image">

                    <div class="content bg-theme-one">
                        <h1>Đồ chơi cho trẻ em</h1>
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-20">
                <div class="banner banner-1 content-left content-top">

                    <a href="#" class="image"><img src="<?= BASE_URL ?>/assets/user/assets/images/banner/banner-3.jpg"
                            alt="Banner Image"></a>

                    <div class="content">
                        <h1>Bộ sưu tập <br> thời trang</h1>
                        <a href="#" data-hover="Xem thêm">Xem thêm</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div><!-- Banner Section End -->

<!-- Product Section Start -->
<div class="product-section section section-padding">
    <div class="container">

        <div class="row">
            <div class="section-title text-center col mb-30">
                <h1>Sản phẩm phổ biến</h1>
                <p>Tất cả sản phẩm phổ biến đều có ở đây</p>
            </div>
        </div>

        <div class="row mbn-40">

            <?php foreach ($productsPopular as $product): ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                    <div class="product-item">
                        <div class="product-inner">

                            <div class="image">
                                <img src="<?= BASE_URL . $product['sp_hinh'] ?>" alt="Image">
                                
                                <div class="image-overlay">
                                    <div class="action-buttons">
                                        <a href="<?= BASE_URL ?>?act=single-product&id=<?= $product['sp_id'] ?>"><button>Xem chi tiết</button></a>
                                    </div>
                                </div>

                            </div>

                            <div class="content">

                                <div class="content-left">

                                    <h4 class="title"><a href="<?= BASE_URL ?>?act=single-product&id=<?= $product['sp_id'] ?>">
                                            <?= $product['sp_ten'] ?>
                                        </a></h4>
                                    <?php if (!empty($product['sp_giam_gia'])): ?>
                                        <span class="price mb-3 d-flex">
                                            <?= number_format($product['sp_giam_gia'], 0, ',') ?>
                                            <span class="ms-2 fs-6 old">
                                                <?= number_format($product['sp_gia'], 0, ',') ?>
                                            </span>
                                        </span>
                                    <?php else: ?>
                                        <span class="price mb-3 d-flex">
                                            <?= number_format($product['sp_gia'], 0, ',') ?>
                                        </span>
                                    <?php endif ?>
                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= round($product['dg_sao'])) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        } ?>

                                    </div>
                                    <?php
                                    $variants = listVariantsByIdSp($product['sp_id']);
                                    $colors = array_unique(array_column($variants, 'ma_mau'));
                                    $sizes = array_unique(array_column($variants, 'size'));
                                    ?>
                                    <h5 class="size">Size:
                                        <?php foreach ($sizes as $size): ?>
                                            <span>
                                                <?= $size ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </h5>
                                    <h5 class="color">Color:
                                        <?php foreach ($colors as $color): ?>
                                            <span class="border border-dark-subtle rounded-circle" style="background-color: <?= $color ?>;"></span> 
                                        <?php endforeach; ?>

                                    </h5>

                                </div>

                                <div class="content-right">

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div><!-- Product Section End -->

<!-- Banner Section Start -->
<div class="banner-section section section-padding pt-0 fix">
    <div class="row row-5 mbn-10">

        <div class="col-lg-4 col-md-6 col-12 mb-10">
            <div class="banner banner-3">

                <a href="#" class="image"><img src="<?= BASE_URL ?>/assets/user/assets/images/banner/banner-4.jpg"
                        alt="Banner Image"></a>

                <div class="content"
                    style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/banner/banner-3-shape.png)">
                    <h1>Hàng mới</h1>
                    <h2>Giảm tới 20%</h2>
                    <h4>2 - 5 tuổi</h4>
                </div>

                <a href="#" class="shop-link" data-hover="Xem thêm">Xem thêm</a>

            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-10">
            <div class="banner banner-4">

                <a href="#" class="image"><img src="<?= BASE_URL ?>/assets/user/assets/images/banner/banner-5.jpg"
                        alt="Banner Image"></a>

                <div class="content">
                    <div class="content-inner">
                        <h1>Mua hàng trực tuyến</h1>
                        <h2>Giảm tới 25%<br>Nổi bật nhất 2023</h2>
                        <a href="#" data-hover="Xem thêm">Xem thêm</a>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-10">
            <div class="banner banner-5">

                <a href="#" class="image"><img src="<?= BASE_URL ?>/assets/user/assets/images/banner/banner-6.jpg"
                        alt="Banner Image"></a>

                <div class="content"
                    style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/banner/banner-5-shape.png)">
                    <h1>BST dành cho<br>Bé gái</h1>
                    <h2>Giảm tới 25%</h2>
                </div>

                <a href="#" class="shop-link" data-hover="Xem thêm">Xem thêm</a>

            </div>
        </div>

    </div>
</div><!-- Banner Section End -->

<!-- Product Section Start -->
<div class="product-section section section-padding pt-0">
    <div class="container">
        <div class="row mbn-40">

            <div class="col-lg-4 col-md-6 col-12 mb-40">

                <div class="row">
                    <div class="section-title text-start col mb-30">
                        <h1>Sản phẩm mới nhất</h1>
                        <p>Sản phẩm dành riêng cho bạn</p>
                    </div>
                </div>

                <div class="best-deal-slider w-100">

                    <?php foreach ($productsNew as $pro): ?>
                        <div class="slide-item">
                            <div class="best-deal-product">

                                <div class="image"><img src="<?= BASE_URL . $pro['sp_hinh'] ?>" alt="Image">
                                </div>

                                <div class="content-top">

                                    <div class="content-top-left">
                                        <h4 class="title"><a href="<?= BASE_URL ?>?act=single-product&id=<?= $pro['sp_id'] ?>">
                                                <?= $pro['sp_ten'] ?>
                                            </a></h4>
                                        <div class="ratting">
                                            <?php for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= round($pro['dg_sao'])) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                            } ?>
                                        </div>
                                    </div>

                                    <div class="content-top-right">
                                        <?php if (!empty($pro['sp_giam_gia'])): ?>
                                            <span class="price mb-3">
                                                <?= number_format($pro['sp_giam_gia'], 0, ',') ?>
                                                <span class="ms-2 fs-6 old">
                                                    <?= number_format($pro['sp_gia'], 0, ',') ?>
                                                </span>
                                            </span>
                                        <?php else: ?>
                                            <span class="price mb-3">
                                                <?= number_format($pro['sp_gia'], 0, ',') ?>
                                            </span>
                                        <?php endif ?>
                                    </div>

                                </div>

                                <div class="content-bottom">
                                    <!-- <div class="countdown" data-countdown="2024/04/01"></div> -->
                                    <a href="<?= BASE_URL?>?act=single-product&id=<?= $pro['sp_id'] ?>" data-hover="SHOP NOW">Mua ngay</a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="col-lg-8 col-md-6 col-12 ps-3 ps-lg-4 ps-xl-5 mb-40">

                <div class="row">
                    <div class="section-title text-start col mb-30">
                        <h1>Sản phẩm có đánh giá cao nhất</h1>
                        <p>Tất cả sản phẩm được tìm được ở đây</p>
                    </div>
                </div>

                <div class="small-product-slider row row-7 mbn-40">
                    <?php foreach ($productsRating as $pro): ?>
                        <div class="col mb-40">
                            <div class="on-sale-product">
                                <a href="<?= BASE_URL ?>?act=single-product&id=<?= $pro['sp_id'] ?>" class="image"><img src="<?= BASE_URL . $pro['sp_hinh'] ?>"
                                        alt="Image"></a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="<?= BASE_URL ?>?act=single-product&id=<?= $pro['sp_id'] ?>"><?= $pro['sp_ten'] ?></a></h4>
                                    <?php if (!empty($pro['sp_giam_gia'])): ?>
                                        <span class="price mb-3">
                                            <?= number_format($pro['sp_giam_gia'], 0, ',') ?>
                                            <span class="ms-2 fs-6 old">
                                                <?= number_format($pro['sp_gia'], 0, ',') ?>
                                            </span>
                                        </span>
                                    <?php else: ?>
                                        <span class="price mb-3">
                                            <?= number_format($pro['sp_gia'], 0, ',') ?>
                                        </span>
                                    <?php endif ?>
                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= round($pro['dg_sao'])) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </div>
</div><!-- Product Section End -->

<!-- Feature Section Start -->
<div class="feature-section bg-theme-two section section-padding fix"
    style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/pattern/pattern-dot.png);">
    <div class="container">
        <div class="feature-wrap row justify-content-between mbn-30">

            <div class="col-md-4 col-12 mb-30">
                <div class="feature-item text-center">

                    <div class="icon"><img src="<?= BASE_URL ?>/assets/user/assets/images/feature/feature-1.png"
                            alt="Image"></div>
                    <div class="content">
                        <h3>Miễn phí giao hàng</h3>
                        <p>Từ 300,000đ</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-12 mb-30">
                <div class="feature-item text-center">

                    <div class="icon"><img src="<?= BASE_URL ?>/assets/user/assets/images/feature/feature-2.png"
                            alt="Image"></div>
                    <div class="content">
                        <h3>Đảm bảo hoàn tiền</h3>
                        <p>Trong vòng 20 ngày</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-12 mb-30">
                <div class="feature-item text-center">

                    <div class="icon"><img src="<?= BASE_URL ?>/assets/user/assets/images/feature/feature-3.png"
                            alt="Image"></div>
                    <div class="content">
                        <h3>Thanh toán an toàn</h3>
                        <p>Bảo mật thanh toán</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div><!-- Feature Section End -->

<!-- Blog Section Start -->
<div class="blog-section section section-padding">
    <div class="container">
        <div class="row mbn-40">

            <div class="col-xl-6 col-lg-5 col-12 mb-40">

                <div class="row">
                    <div class="section-title text-start col mb-30">
                        <h1>Khách hàng đánh giá</h1>
                        <p>Khách hàng nói về chúng tôi</p>
                    </div>
                </div>

                <div class="row mbn-40">

                    <div class="col-12 mb-40">
                        <div class="testimonial-item">
                            <p>Jadusona là một trong những cửa hàng bán đồ trẻ em độc quyền nhất trên thế giới, nơi bạn có thể tìm thấy tất cả các sản phẩm dành cho bé mà bạn muốn mua cho bé. Tôi đã giới thiệu cửa hàng này cho tất cả các bạn</p>
                            <div class="testimonial-author">
                                <img src="<?= BASE_URL ?>uploads/accounts/1711943217-428698978_917285240042699_2250207063385128103_n.jpg"
                                    alt="Image" width ="60px" class="rounded-circle">
                                <div class="content">
                                    <h4>Trangg</h4>
                                    <p>Khách hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-40">
                        <div class="testimonial-item">
                            <p>Jadusona là một trong những cửa hàng bán đồ trẻ em độc quyền nhất trên thế giới, nơi bạn có thể tìm thấy tất cả các sản phẩm dành cho bé mà bạn muốn mua cho bé. Tôi đã giới thiệu cửa hàng này cho tất cả các bạn</p>
                            <div class="testimonial-author">
                                <img src="<?= BASE_URL ?>uploads/accounts/1711943217-428698978_917285240042699_2250207063385128103_n.jpg"
                                    alt="Image" width ="60px" class="rounded-circle">
                                <div class="content">
                                    <h4>Namm</h4>
                                    <p>Khách hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-xl-6 col-lg-7 col-12 mb-40">

                <div class="row">
                    <div class="section-title text-start col mb-30">
                        <h1>Bài viết tin tức</h1>
                        <p>Tìm tất cả bài viết tin tức mới ở đây.
                </div>

                <div class="row mbn-40">  
                    <style>
                        .img_blog{
                            width: 209px;
                            height: 177px;
                        }
                        .shorten-text {
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                            width: 391px; /* Độ rộng của đoạn văn */
                        }
                    </style>
                    <?php foreach ($best_blog_home as $key => $value): ?>
                        <div class="col-12 mb-40">
                            <div class="blog-item">
                                <div class="image-wrap">
                                    <h4 class="date"><?= date('m', strtotime($value['time_blog'])) ?> <span><?= date('d', strtotime($value['time_blog'])) ?></span></h4>
                                    <a class="imagee" href="<?= BASE_URL?>?act=blog-single&id=<?= $value['id'] ?>">
                                        <img class="img_blog" src="<?= BASE_URL. $value['img_blog'] ?>" width="209px" height ="177px" alt="" >
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="<?= BASE_URL?>?act=blog-single&id=<?= $value['id'] ?>"><?= $value['tieu_de'] ?></a>
                                    </h4>
                                    <div class="desc shorten-text">
                                        <p><?= $value['focus'] ?></p>
                                    </div>
                                    <ul class="meta">
                                    <li><a href="#"><img src="uploads/blogs/download.jpg" alt="Blog Author">Trangg</a></li>
                                    <li><a href="#"><?= $value['luot_xem'] ?> Lượt xem</a></li>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </div>
</div><!-- Blog Section End -->

<!-- Brand Section Start -->
<div class="brand-section section section-padding pt-0 mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="brand-slider">

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-1.png" alt="Image">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-2.png" alt="Image">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-3.png" alt="Image">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-4.png" alt="Image">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-5.png" alt="Image">
                </div>

                <div class="brand-item col">
                    <img src="<?= BASE_URL ?>/assets/user/assets/images/brands/brand-6.png" alt="Image">
                </div>

            </div>
        </div>
    </div>
</div><!-- Brand Section End -->