<!-- Page Banner Section Start -->
<div class="page-banner-section section"
    style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Chi tiết sản phẩm</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="single-product.html">Chi tiết sản phẩm</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-50">

            <div class="col-12">
                <div class="row row-20 mb-10">

                    <div class="col-lg-6 col-12 mb-40">

                        <div class="pro-large-img mb-10 fix ">
                            <a href="#">
                                <img src="<?= BASE_URL . $product_one['hinh_sp'] ?>" alt="" />
                            </a>
                        </div>
                        <!-- Single Product Thumbnail Slider -->
                        <ul id="pro-thumb-img" class="pro-thumb-img">
                            <li><a href="" data-standard=""><img src="<?= BASE_URL . $product_one['hinh_sp'] ?>"
                                        alt="" /></a></li>
                            <?php foreach ($hinhPhu as $img => $value): ?>
                                <li><a href="" data-standard=""><img src="<?= BASE_URL . $value['anh_phu'] ?>" alt="" /></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-12 mb-40">
                        <div class="single-product-content">

                            <div class="head">
                                <div class="head-left">

                                    <h3 class="title">
                                        <?= $product_one['ten_sp'] ?>
                                    </h3>

                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= round($product_one['dg_sao'])) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        } ?>
                                    </div>

                                </div>

                                <div class="head-right">
                                    <?php if (!empty($product_one['giam_gia'])): ?>
                                        <span class="price mb-3 d-flex">
                                            <?= number_format($product_one['giam_gia'], 0, ',') ?>
                                            <span class="ms-2 fs-6 old text-info">
                                                <del>
                                                    <?= number_format($product_one['gia_sp'], 0, ',') ?>
                                                </del>
                                            </span>
                                        </span>
                                    <?php else: ?>
                                        <span class="price mb-3 d-flex">
                                            <?= number_format($product_one['gia_sp'], 0, ',') ?>
                                        </span>
                                    <?php endif ?>
                                </div>
                            </div>


                            <span class="availability">Kho: <span>
                                    <?= $product_one['so_luong'] ?>
                                </span></span>

                            <?php
                            $variants = listVariantsByIdSp($product_one['id']);
                            $colors = array_unique(array_column($variants, 'ma_mau'));
                            $nameColor = array_unique(array_column($variants, 'ten_mau'));
                            // debug($nameColor);
                            $sizes = array_unique(array_column($variants, 'size'));
                            ?>
                            <div class="quantity-colors d-flex flex-column">
                                <div class="colors">
                                    <h5>Màu:</h5>
                                    <div class="color-options">
                                    <?php foreach ($colors as $key => $color): ?>
                                            <button class="color-detail rounded-circle"
                                                data-name="<?= $nameColor[$key] ?>"
                                                style="background-color:<?= $color ?>; border: 1px solid #cccc"></button>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="colors">
                                    <h5>Size:</h5>
                                    <div class="size-options">
                                        <?php foreach ($sizes as $size): ?>
                                            <button class="size-detail me-2" data-name="<?= $size ?>">
                                                <?= $size ?>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="quantity-colors">

                                    <div class="quantity">
                                        <h5>Số lượng:</h5>
                                        <div class="pro-qty">
                                            <span class="dec qtybtn"><i class="ti-minus"></i></span>
                                            <p class="my-1 text-center">1</p>
                                            <span class="inc qtybtn"><i class="ti-plus"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <form action="<?= BASE_URL ?>?act=add-cart" method="post">
                                    <div class="actions">
                                        <input type="hidden" id="quantity" value="1" name="quantity">
                                        <input type="hidden" id="id_sp" value="<?= $product_one['id'] ?>" name="id_sp">
                                        <input type="hidden" id="mau" value="" name="mau">
                                        <input type="hidden" id="size" value="" name="size">
                                        <input type="hidden" id="price" name="price"
                                            value="<?= $product_one['giam_gia'] ?: $product_one['gia_sp'] ?>">
                                        <button type="submit"><i class="ti-shopping-cart"></i><span>Thêm vào giỏ
                                                hàng</span></button>
                                    </div>
                                </form>
                                <div class="share">

                                    <h5>Share: </h5>
                                    <a href="<?= $GLOBALS['settings']['Facebook'] ?? null ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row mb-50">
                        <!-- Nav tabs -->
                        <div class="col-12">
                            <ul class="pro-info-tab-list section nav">
                                <li><a class="active" href="#more-info" data-bs-toggle="tab">Mô tả sản phẩm</a></li>
                                <li><a href="#data-sheet" data-bs-toggle="tab">Đánh giá</a></li>
                                <li><a href="#reviews" data-bs-toggle="tab">Bình luận</a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content col-12">
                            <div class="pro-info-tab tab-pane active" id="more-info">
                                <p>
                                    <?= $product_one['mo_ta'] ?>
                                </p>
                            </div>
                            <div class="pro-info-tab tab-pane" id="data-sheet">
                                <h2>Đánh giá</h2>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-8">
                                            <!-- begin rating  -->
                                            <div class="row pb-5 border-bottom">
                                                <div
                                                    class="pe-3 col-md-3 col-6 m-auto p-3 shadow rounded d-flex flex-column align-items-center">
                                                    <span class="h1 mb-0 ">
                                                        <?= number_format($product_one['dg_sao'], 1) ?>
                                                    </span>
                                                    <div>

                                                        <?php for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= round($product_one['dg_sao'])) {
                                                                echo '<i class="fa fa-star" style="color: #94c7eb;"></i>';
                                                            } else {
                                                                echo '<i class="fa fa-star-o"></i>';
                                                            }
                                                        } ?>

                                                    </div>
                                                    <small class="text-black-50">12 Ratings</small>
                                                </div>
                                                <div class="col-md-8 col-12 mt-md-0 mt-3">
                                                    <div class="container ps-5">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-1 col-2 px-0">5<i class="ms-1 fa fa-star"
                                                                    style="color: #94c7eb;"></i></div>
                                                            <div class="col-md-10 col-8 px-0">
                                                                <div class="w-100 bg-secondary rounded-pill">
                                                                    <div class="py-1 rounded-pill  w-75"
                                                                        style="background-color: #94c7eb;"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-custom-class="custom-tooltip"
                                                                        data-bs-title="80%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-2"></div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-1 col-2 px-0">4<i class="ms-1 fa fa-star"
                                                                    style="color: #94c7eb;"></i></div>
                                                            <div class="col-md-10 col-8 px-0">
                                                                <div class="w-100 bg-secondary rounded-pill">
                                                                    <div class="py-1 rounded-pill  w-50"
                                                                        style="background-color: #94c7eb;"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-custom-class="custom-tooltip"
                                                                        data-bs-title="50%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-2"></div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-2 col-md-1 px-0">3<i class="ms-1 fa fa-star"
                                                                    style="color: #94c7eb;"></i></div>
                                                            <div class="col-8 col-md-10 px-0">
                                                                <div class="w-100 bg-secondary rounded-pill">
                                                                    <div class="py-1 rounded-pill w-100"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-custom-class="custom-tooltip"
                                                                        data-bs-title="0%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 col-md-1"></div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-2 col-md-1 px-0">2<i class="ms-1 fa fa-star"
                                                                    style="color: #94c7eb;"></i></div>
                                                            <div class="col-8 col-md-10 px-0">
                                                                <div class="w-100 bg-secondary rounded-pill">
                                                                    <div class="py-1 rounded-pill w-100"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-custom-class="custom-tooltip"
                                                                        data-bs-title="0%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 col-md-1"></div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-2 col-md-1 px-0">1<i class="ms-1 fa fa-star"
                                                                    style="color: #94c7eb;"></i></div>
                                                            <div class="col-8 col-md-10 px-0">
                                                                <div class="w-100 bg-secondary rounded-pill">
                                                                    <div class="py-1 rounded-pill w-100"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-custom-class="custom-tooltip"
                                                                        data-bs-title="0%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 col-md-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end rating  -->

                                            <!-- begin review  -->
                                            <?php foreach ($ratings as $rate): ?>
                                                <div class="row align-items-center my-5">
                                                    <div class="col-md-2 col-12 p-0 text-end">
                                                        <img src="<?= $rate['anh_tk'] ?>" class=" mb-3 rounded-circle"
                                                            style="width: 70px; height: 70px;">
                                                    </div>
                                                    <div class="col-md-10 col-12">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-0">
                                                                <?= $rate['ten_tk'] ?> <small class="ms-2 text-black-50">
                                                                    <?= $rate['ngay_dg'] ?>
                                                                </small>
                                                            </p>
                                                            <div>
                                                                <?php for ($i = 1; $i <= 5; $i++) {
                                                                    if ($i <= $rate['sao_dg']) {
                                                                        echo '<i class="fa fa-star" style="color: #94c7eb;"></i>';
                                                                    } else {
                                                                        echo '<i class="fa fa-star-o"></i>';
                                                                    }
                                                                } ?>

                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <p class="mb-0">
                                                                <small class="ms-2 text-black-50">
                                                                    Size :
                                                                    <?= $rate['size'] ?>
                                                                </small>
                                                            </p>
                                                            <p class="mb-0">
                                                                <small class="ms-2 text-black-50">
                                                                    Màu :
                                                                    <?= $rate['mau'] ?>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <!-- <p class="h6 my-1"><?= $rate['noi_dung'] ?></p> -->
                                                            <p class="text-black">
                                                                <?= $rate['noi_dung'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <!-- end review  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-info-tab tab-pane" id="reviews">
                                <div class="comment-wrap mt-20">
                                    <ul class="comment-list">
                                        <?php foreach ($comment as $key => $value): ?>
                                            <li>
                                                <div class="single-comment">
                                                    <div class="image h-70 "><img src="<?= BASE_URL . $value['tk_anh'] ?>"
                                                            alt="" height="70px"></div>
                                                    <div class="content">
                                                        <h4>
                                                            <?= $value['tk_ten'] ?>
                                                        </h4>
                                                        <span>
                                                            <?= date('d-m-Y', strtotime( $value['bl_ngaybl'])) ?>
                                                            <p>
                                                                <?= $value['bl_nd'] ?>
                                                            </p>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <h3>Bình luận</h3>
                                    <div class="comment-form">
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
                                            <form action="" method="POST">
                                                <div class="row row-10">
                                                    <input type="hidden" value="<?= $product_one['id'] ?>" name="id_sp">
                                                    <input type="hidden" value="<?= $_SESSION['user']['id'] ?>"
                                                        name="id_tk">
                                                    <div class="col-12 mb-1"><textarea name="noi_dung"
                                                            placeholder="Nội dung"></textarea></div>
                                                    <!-- <div class="col-12">
                                                        <input type="date" id="date" name="ngay_bl" readonly>
                                                    </div> -->
                                                    <div class="col-12 mt-3"><input name="submit" value="Gửi bình luận"
                                                            type="submit"></div>
                                                </div>
                                            </form>
                                        <?php else: ?>
                                            <div class="alert alert-danger"> Bạn cần đăng nhập trước khi bình luận</div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            var today = new Date().toISOString().split('T')[0]; // Lấy ngày hôm nay
                                            document.getElementById("date").value = today; // Đưa giá trị vào trường input
                                        });
                                    </script> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page Section End -->

    <!-- Related Product Section Start -->
    <div class="section section-padding pt-0 mt-40">
        <div class="container">

            <div class="section-title text-start mb-30">
                <h1>Sản phẩm liên quan</h1>
            </div>

            <div class="related-product-slider related-product-slider-1 slick-space p-0">
                <?php foreach ($same as $product => $value): ?>
                    <div class="slick-slide">
                        <div class="product-item">
                            <div class="product-inner">
                                <div class="image">
                                    <img src="<?= BASE_URL . $value['sp_hinh'] ?>" alt="Image">
                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <div class="content-left">
                                        <h4 class="title"><a
                                                href="<?= BASE_URL ?>?act=single-product&id=<?= $value['sp_id'] ?>">
                                                <?= $value['sp_ten'] ?>
                                            </a></h4>
                                        <?php if (!empty($value['sp_giam_gia'])): ?>
                                            <span class="price mb-3 d-flex">
                                                <?= number_format($value['sp_giam_gia'], 0, ',') ?>
                                                <span class="ms-2 fs-6 old">
                                                    <?= number_format($value['sp_gia'], 0, ',') ?>
                                                </span>
                                            </span>
                                        <?php else: ?>
                                            <span class="price mb-3 d-flex">
                                                <?= number_format($value['sp_gia'], 0, ',') ?>
                                            </span>
                                        <?php endif ?>
                                        <div class="ratting">
                                            <?php for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= round($value['dg_sao'])) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                            } ?>
                                        </div>

                                        <?php
                                        $variants = listVariantsByIdSp($value['sp_id']);
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
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- Related Product Section End -->

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
    <script>
        const colors = document.querySelectorAll('.color-detail');
        const id_sp = document.querySelector('#id_sp');
        // console.log(id_sp);
        var nameColor = document.querySelector('#mau');
        var nameSize = document.querySelector('#size');
        var qtyPro = document.querySelector('#quantity');
        var inputElement = document.querySelector('.pro-qty p');
        for (const color of colors) {
            color.addEventListener('click', () => {
                for (var i = 0; i < colors.length; i++) {
                    colors[i].style.border = "#cccc";
                }
                color.style.border = "2px solid";
                inputElement.innerHTML = 1;
                qtyPro.value = 1

                nameColor.value = color.dataset.name;
                if (nameSize.value != '') {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText == 'errorSize') {
                                alert('Màu này sản phẩm không có');
                                color.style.border = "none";
                                nameColor.value = ''
                            }
                            console.log(this.responseText);
                        }
                    };
                    xmlhttp.open("GET", "<?= BASE_URL ?>?act=checkSize&id_sp=" + id_sp.value + "&color=" + nameColor.value + "&size=" + nameSize.value + "&quantity=" + qtyPro.value, true);
                    xmlhttp.send();
                }
                // check(nameColor.value, nameSize.value, qtyPro.value)
            })
        }

        const sizes = document.querySelectorAll('.size-detail');
        for (const size of sizes) {
            size.addEventListener('click', () => {
                for (var i = 0; i < sizes.length; i++) {
                    sizes[i].classList.remove('selected-size');
                }
                size.classList.add('selected-size');
                inputElement.innerHTML = 1;
                qtyPro.value = 1
                nameSize.value = size.dataset.name;
                if (nameColor.value != '') {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText == 'errorSize') {
                                alert('Size này sản phẩm không có');
                                size.classList.remove('selected-size');
                                nameSize.value = ''
                            }
                            console.log(this.responseText);
                        }
                    };
                    xmlhttp.open("GET", "<?= BASE_URL ?>?act=checkSize&id_sp=" + id_sp.value + "&color=" + nameColor.value + "&size=" + nameSize.value + "&quantity=" + qtyPro.value, true);
                    xmlhttp.send();
                }
                // check(nameColor.value, nameSize.value, qtyPro.value)
            })
        }



        // Lấy nút tăng và giảm
        var decreaseButton = document.querySelector('.pro-qty .dec');
        var increaseButton = document.querySelector('.pro-qty .inc');

        // Thêm sự kiện "click" cho nút giảm
        decreaseButton.addEventListener('click', function () {
            var value = parseInt(inputElement.innerHTML);
            if (value > 1) {
                inputElement.innerHTML = value - 1;
                qtyPro.value = value - 1
                check(nameColor.value, nameSize.value, qtyPro.value)
            }
        });

        // Thêm sự kiện "click" cho nút tăng
        increaseButton.addEventListener('click', function () {
            var value = parseInt(inputElement.innerHTML);
            inputElement.innerHTML = value + 1;
            qtyPro.value = value + 1
            check(nameColor.value, nameSize.value, qtyPro.value)
        });


        function check(color, size, quantity) {
            if (color == '' || size == '') {
                inputElement.innerHTML = 1;
                qtyPro.value = 1;
                alert('Vui lòng chọn size với màu trước');
                return false
            }

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'errorQty') {
                        alert('Số lượng vượt quá trong kho');
                        inputElement.innerHTML = inputElement.innerHTML - 1;
                        qtyPro.value = qtyPro.value - 1;
                    }
                    // console.log(this.responseText);
                }
            };
            xmlhttp.open("GET", "<?= BASE_URL ?>?act=checkSize&id_sp=" + id_sp.value + "&color=" + nameColor.value + "&size=" + nameSize.value + "&quantity=" + quantity, true);
            xmlhttp.send();
        }

    </script>