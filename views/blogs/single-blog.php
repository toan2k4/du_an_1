<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url( <?= BASE_URL . $blog['img_blog'] ?>)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col text-center">
                <h1>
                    <?= $blog['tieu_de'] ?>
                </h1>
            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Blog Section Start -->
<div class="blog-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-40">
            <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
                <div class="single-blog">
                    <div class="image-wrap">
                        <h4 class="date">
                            <?= date('m', strtotime($blog['time_blog'])) ?> <span>
                                <?= date('d', strtotime($blog['time_blog'])) ?>
                            </span>
                        </h4>
                        <a class="image" href="#"><img src=" <?= BASE_URL . $blog['img_blog'] ?>" class="img-fluid"
                                alt=""></a>
                    </div>
                    <div class="content">
                        <ul class="meta">
                            <li><a href="#"><img src="uploads/blogs/download.jpg" alt="Blog Author">Trangg</a></li>
                            <li><a href="#">
                                    <?= $blog['luot_xem'] ?> lượt xem
                                </a></li>
                        </ul>
                        <div class="desc">
                            <p>
                                <?= $blog['nd_blog'] ?>
                            </p>
                            <blockquote class="blockquote">
                                <p>
                                    <?= $blog['focus'] ?>
                                </p><br>
                                <?php if (!empty($code['bai_viet'])): ?>
                                    <p>Mã khuyến mãi : <?= $code['code_km'] ?></p>
                                <?php endif ?>
                                 
                                <span>Trangg - Designer</span>
                            </blockquote>
                        </div>

                        <div class="blog-footer row mt-45">
                            <div class="post-share col-lg-6 col-12 mv-15">
                                <h4>Share:</h4>
                                <ul class="share">
                                    <li><a href="<?= $GLOBALS['settings']['Facebook'] ?? null ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">

                <div class="sidebar">
                    <h4 class="sidebar-title">Bài viết nổi bật</h4>
                    <div class="sidebar-blog-wrap">
                        <?php foreach ($best_blog as $key => $value): ?>
                            <div class="sidebar-blog mb-4">
                                <a href="<?= BASE_URL ?>?act=blog-single&id=<?= $value['id'] ?>" class="image"
                                    style="width = 40px"><img src="<?= BASE_URL . $value['img_blog'] ?>" height="100px"
                                        alt=""></a>
                                <div class="content">
                                    <a href="<?= BASE_URL ?>?act=blog-single&id=<?= $value['id'] ?>" class="title mt-1">
                                        <?= $value['tieu_de'] ?>
                                    </a>
                                    <span class="date">
                                        <?= date('d-m-Y', strtotime($value['time_blog'])) ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Blog Section End -->

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