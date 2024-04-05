<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Trang danh sách sản phẩm</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="shop-left-sidebar.html"> Danh sách sản phẩm</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-40">

            <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
                <div class="row">

                    <?php
                    if (!empty($products)):
                        foreach ($products as $product):
                            ?>
                            <div class="col-xl-4 col-md-6 col-12 mb-40">

                                <div class="product-item">
                                    <div class="product-inner">

                                        <div class="image">
                                            <img src="<?= BASE_URL . $product['sp_hinh'] ?>" alt="Image">

                                            <div class="image-overlay">
                                                <div class="action-buttons">
                                                    <a href="<?= BASE_URL ?>?act=single-product&id=<?= $product['sp_id'] ?>"><button>Xem
                                                            chi tiết</button></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content">
                                            <div class="content-left">
                                                <h4 class="title"><a
                                                        href="<?= BASE_URL ?>?act=single-product&id=<?= $product['sp_id'] ?>">
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
                                                        <span style="background-color: <?= $color ?>"></span>
                                                    <?php endforeach; ?>

                                                </h5>

                                            </div>

                                            <div class="content-right">

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>


                    <!-- <div class="col-12">
                        <ul class="page-pagination">
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div> -->

                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">
                <form action="<?= BASE_URL ?>?act=list-product" method="post" class="mb-5">
                    <div class="sidebar">
                        <h4 class="sidebar-title mb-3">Tên sản phẩm</h4>
                        <input type="text" class="form-control" name="search" placeholder="nhập tên sản phẩm">
                    </div>
                    <div class="sidebar">
                        <h4 class="sidebar-title">Danh mục</h4>
                        <ul class="sidebar-list">
                            <?php foreach ($GLOBALS['listCate'] as $cate): ?>
                                <li><a href="<?= BASE_URL ?>?act=list-product&id_danh_muc=<?= $cate['id'] ?>">
                                        <?= $cate['ten_dm'] ?> <span class="num">
                                            <?= $cate['tong'] ?>
                                        </span>
                                    </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar">
                        <h3 class="sidebar-title">Giá</h3>
                        <div class="sidebar-price">
                            <div id="price-range"></div>
                            <input type="text" id="price-amount" readonly>
                            <input type="hidden" id="min" value="<?= $price['min'] ?>">
                            <input type="hidden" id="max" value="<?= $price['max'] ?>">
                            <input type="hidden" id="getprice-amount1" name="priceMin">
                            <input type="hidden" id="getprice-amount2" name="priceMax">
                        </div>
                        <button type="submit" class="btn btn-warning mt-3 mb-5"
                            style="background-color: #ff708a; color: white">Áp dụng</button>
                    </div>
                </form>
                <div class="sidebar"></div>
                <div class="sidebar mt-5 pt-5">
                    <h4 class="sidebar-title">Sản phẩm phổ biến</h4>
                    <div class="sidebar-product-wrap">
                        <?php foreach ($productsPopular as $pro): ?>
                            <div class="sidebar-product">
                                <a href="<?= BASE_URL ?>?act=single-product&id=<?= $product['sp_id'] ?>" class="image">
                                    <img src="<?= BASE_URL . $pro['sp_hinh'] ?>" alt=""></a>
                                <div class="content">
                                    <a href="<?= BASE_URL ?>?act=single-product&id=<?= $product['sp_id'] ?>" class="title">
                                        <?= $pro['sp_ten'] ?>
                                    </a>
                                    <?php if (!empty($pro['sp_giam_gia'])): ?>
                                        <span class="price mb-3 d-flex">
                                            <?= number_format($pro['sp_giam_gia'], 0, ',') ?>
                                            <span class="ms-2 fs-6 old">
                                                <?= number_format($pro['sp_gia'], 0, ',') ?>
                                            </span>
                                        </span>
                                    <?php else: ?>
                                        <span class="price mb-3 d-flex">
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
                        <?php endforeach; ?>
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