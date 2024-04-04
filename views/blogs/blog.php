    <!-- Page Banner Section Start -->
    <div class="page-banner-section section" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="page-banner-content col">
                    <h1>Bài viết</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="<?= BASE_URL?>?act=blogs">Bài viết</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- Page Banner Section End -->

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

    
    <!-- Blog Section Start --> 
    <div class="blog-section section section-padding">
        <div class="container">
            <div class="row">
                <?php foreach ($blogs as $key => $value): ?>
                    <div class="col-lg-6 col-12 mb-50">
                        <div class="blog-item">
                            <div class="image-wrap">
                            <h4 class="date"><?= date('m', strtotime($value['time_blog'])) ?> <span><?= date('d', strtotime($value['time_blog'])) ?></span></h4>
                                <a class="image_blog" href="<?= BASE_URL?>?act=blog-single&id=<?= $value['id'] ?>">
                                    <img class="img_blog" src="<?= BASE_URL. $value['img_blog'] ?>" alt="" >
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?= BASE_URL?>?act=blog-single&id=<?= $value['id'] ?>"><?= $value['tieu_de'] ?></a></h4>
                                <div class="desc shorten-text">
                                    <p><?= $value['focus'] ?></p>
                                </div>
                                <ul class="meta">
                                <li><a href="#"><img src="uploads/blogs/download.jpg" alt="Blog Author">Trangg</a></li>
                                <li><a href="#"><?= $value['luot_xem'] ?> luợt xem</a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-12">
                    <ul class="page-pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
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
    </div><!-- Brand Section End