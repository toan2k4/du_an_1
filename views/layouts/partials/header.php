<div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-one bg-theme-two">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">

                <div class="col mt-10 mb-10 d-none d-md-flex">
                    <!-- Header Top Left Start -->
                    <div class="header-top-left">
                        <p>Chào mừng tới Jadusona</p>
                        <p>Hotline: <a href="tel:0123456789">0123 456 789</a></p>
                    </div><!-- Header Top Left End -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header Shop Links Start -->

                    <div class="header-top-right ">
                        <?php if (isset($_SESSION['user'])): ?>

                            <p class="me-2 mt-1"><a href="<?= BASE_URL ?>?act=my-account&id=<?= $_SESSION['user']['id'] ?>">Quản lý tài khoản</a></p>
                            <img class="img-profile rounded-circle"
                                src="<?= BASE_URL . $_SESSION['user']['anh_tk'] ?>" width="30px" height="30px">
                        <?php else: ?>
                            <p><a href="<?= BASE_URL ?>?act=login">Đăng ký</a><a href="<?= BASE_URL ?>?act=login">Đăng
                                    nhập</a></p>
                        <?php endif; ?>
                    </div><!-- Header Shop Links End -->
                </div>

            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container-fluid">
            <div class="row menu-center align-items-center justify-content-between">

                <div class="col mt-15 mb-15">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="<?= BASE_URL ?>">
                            <img src="<?= BASE_URL ?>/assets/user/assets/images/logo.png" alt="Jadusona">
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col order-2 order-lg-3">
                    <!-- Header Advance Search Start -->
                    <div class="header-shop-links">

                        <div class="header-search">
                            <button class="search-toggle"><img
                                    src="<?= BASE_URL ?>/assets/user/assets/images/icons/search.png"
                                    alt="Search Toggle"><img class="toggle-close"
                                    src="<?= BASE_URL ?>/assets/user/assets/images/icons/close.png"
                                    alt="Search Toggle"></button>
                            <div class="header-search-wrap">
                                <form action="<?= BASE_URL ?>?act=list-product" method="post">
                                    <input type="text" name="search" placeholder="Type and hit enter">
                                    <button type="submit"><img
                                            src="<?= BASE_URL ?>/assets/user/assets/images/icons/search.png"
                                            alt="Search"></button>
                                </form>
                            </div>
                        </div>



                        <div class="header-mini-cart">
                            <a href="<?= BASE_URL ?>?act=cart"><img
                                    src="<?= BASE_URL ?>/assets/user/assets/images/icons/cart.png" alt="Cart">
                                <span>
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        $cartID = getCartId($_SESSION['user']['id']);
                                        echo count(listProductByIdCart($cartID));
                                    }
                                    ?>
                                </span></a>
                        </div>

                    </div><!-- Header Advance Search End -->
                </div>

                <div class="col order-3 order-lg-2">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="active"><a href="<?= BASE_URL ?>">Trang chủ</a>
                                </li>
                                <li><a href="<?= BASE_URL ?>?act=list-product">Tất cả</a>

                                </li>
                                <li><a href="<?= BASE_URL ?>?act=list-product">Danh mục</a>
                                    <ul class="sub-menu">
                                        <?php foreach ($GLOBALS['listCate'] as $cate): ?>
                                            <li><a href="<?= BASE_URL ?>?act=list-product&id_danh_muc=<?= $cate['id'] ?>">
                                                    <?= $cate['ten_dm'] ?>
                                                </a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="<?= BASE_URL ?>?act=blogs">Bài viết</a>

                                </li>
                                <li><a href="<?= BASE_URL ?>?act=contact">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="mobile-menu order-4 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header BOttom End -->

</div>