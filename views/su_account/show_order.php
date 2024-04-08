<!-- Page Banner Section Start -->
<div class="page-banner-section section"
    style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">
                <h1>Chi tiết đơn hàng</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Chi tiết đơn hàng</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<style>
    .capitalize {
        text-transform: capitalize;
    }

    .btn-evaluate {
        width: 118px;
        height: 40px;
        color: white;
        background-color: #1f1f1f;
        text-align: center;
        padding-top: 9px;
    }

    .btn-evaluate:hover {
        width: 118px;
        height: 40px;
        color: white;
        background-color: #ff718b;
    }
</style>


<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <form action="#">
            <div class="row mbn-40">
                <div class="col-12 mb-40">
                    <!-- ------- -->
                    <div class="card">
                        <div class="card-body">
                            <div class="container mb-5 mt-3">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <ul class="list-unstyled">
                                                <li class="fs-6 fw-bolder text-black mb-2">Thông tin giao hàng </li>
                                                <li class="fs-6 mb-2">Tên người nhận : <span style="color:#8f8062 ;">
                                                        <?= $order_detail['ho_va_ten'] ?>
                                                    </span></li>
                                                <li class="fs-6 mb-2">Địa chỉ :
                                                    <?= $order_detail['dia_chi'] ?>
                                                </li>
                                                <li class="fs-6 mb-2"><i class="bi bi-telephone text-warning"></i></i>
                                                    <?= $order_detail['dien_thoai_tk'] ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-5">
                                            <p class="fs-6 mb-2 fw-bolder text-black ">Hóa đơn</p>
                                            <ul class="list-unstyled">
                                                <li class="fs-6 mb-2"><i class="bi bi-dot"></i> <span>Ngày đặt hàng :
                                                    </span>
                                                    <?= date('d-m-Y & H:i:s', strtotime($order_detail['thoi_gian'])) ?>
                                                </li>
                                                <li class="fs-6 mb-2"><i class="bi bi-dot"></i> <span>Hình thức thanh
                                                        toán : </span>
                                                    <?php
                                                    switch ($order_detail['thanh_toan']) {
                                                        case '1':
                                                            echo 'Thanh toán khi nhận hàng';
                                                            break;
                                                        case '2':
                                                            echo 'Thanh toán online';
                                                            break;
                                                    } ?>
                                                </li>
                                                <li class="fs-6 mb-2"><i class="bi bi-dot"></i><span>Trạng thái :
                                                    </span>
                                                    <span class="badge text-black fw-bold fs-6">
                                                        <?php
                                                        switch ($order_detail['ten_trang_thai']) {
                                                            case 'Chờ xác nhận':
                                                                echo '<div class="badge text-bg-secondary">Chờ xác nhận</div>';
                                                                break;
                                                            case 'Đã xác nhận':
                                                                echo '<div class="badge text-bg-dark">Đã xác nhận</div>';
                                                                break;
                                                            case 'Đang xử lý':
                                                                echo '<div class="badge text-bg-warning">Đang xử lý</div>';
                                                                break;
                                                            case 'Đang vận chuyển':
                                                                echo '<div class="badge text-bg-primary">Đang vận chuyển</div>';
                                                                break;
                                                            case 'Đã giao':
                                                                echo '<div class="badge text-bg-success">Đã giao</div>';
                                                                break;
                                                            case 'Đã hủy':
                                                                echo '<div class="badge text-bg-danger">Đã hủy</div>';
                                                                break;
                                                            default:
                                                                echo '<div class="badge text-bg-info">' . $value['ten_trang_thai'] . '</div>';
                                                                break;
                                                        }
                                                        ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php $total = 0; ?>
                                    <?php foreach ($order_product as $key => $value): ?>
                                        <div class="row my-2 mx-1 justify-content-center d-flex "
                                            style="align-items: center;">
                                            <div class="col-md-2 mt-3">
                                                <div class="overflow-hidden " data-ripple-color="light">
                                                    <img src="<?= BASE_URL . $value['hinh_sp'] ?>" class="w-120"
                                                        height="150px" alt="anh san pham" />
                                                </div>
                                            </div>
                                            <div class="col-md-5 mb-4 mb-md-0 mt-3">
                                                <p class="fw-bold fs-6">
                                                    <?= $value['ten_sp'] ?>
                                                </p>
                                                <p class="mb-1">
                                                    <span class="text-muted me-2">Kích thước :</span><span>
                                                        <?= $value['size'] ?>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span class="text-muted me-2">Màu :</span><span>
                                                        <?= $value['mau'] ?>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span class="text-muted me-2">Số lượng :</span><span>
                                                        <?= $value['so_luong'] ?>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-2 mb-4 mb-md-0 mt-3">
                                                <h5 class="mb-2">
                                                    <span class="fw-bold fs-5">
                                                        <?= number_format($value['thanh_tien'], 0, ',') ?> đ
                                                    </span>
                                                </h5>
                                            </div>
                                            <?php if ($order_detail['ten_trang_thai'] === "Đã giao"): ?>
                                                <div class="col-md-2 mb-4 mb-md-0 mt-3 ">
                                                    <a href="<?= BASE_URL ?>?act=my-evaluate&id=<?= $value['id_don_hang'] ?>&id_sp=<?= $value['id_sp'] ?>&mau=<?= $value['mau'] ?>&size=<?= $value['size'] ?>"
                                                        class="btn-evaluate rounded-pill text-white fw-bold">
                                                        ĐÁNH GIÁ</a>
                                                </div>
                                           
                                            <?php endif; ?>
                                        </div>
                                        <?php $total += $value['thanh_tien'];
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="col-lg-8 col-md-7 col-12 mb-40">
                        <div class="cart-buttons mb-30">
                            <a href="<?= BASE_URL ?>?act=my-account&id=<?= $_SESSION['user']['id'] ?>">Quay lại</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-4 col-md-5 col-12 mb-40">
                    <div class="cart-total fix">
                        <h3>Tổng hóa đơn</h3>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Tạm tính</th>
                                    <td><span class="amount">
                                            <?= number_format($total, 0, ',') ?>
                                        </span></td>
                                </tr>
                                <?php if ($total > $order_detail['tong_tien']): ?>
                                    <tr class="cart-subtotal">
                                        <th>Khuyến mại</th>
                                        <td><span class="amount">-
                                                <?= number_format($total - $order_detail['tong_tien'], 0, ',') ?>
                                            </span></td>
                                    </tr>
                                <?php endif; ?>
                                <tr class="order-total">
                                    <th>Tổng</th>
                                    <td>
                                        <strong><span class="amount">
                                                <?= number_format($order_detail['tong_tien'], 0, ',') ?>
                                            </span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if ($order_detail['ten_trang_thai'] === "Chờ xác nhận"): ?>
                            <div class="proceed-to-checkout section mt-30">
                                <a href="<?= BASE_URL ?>?act=change-order&id=<?= $order_detail['dh_id'] ?>">Hủy đơn hàng</a>
                            </div>
                        <?php endif; ?>
                        <?php if ($order_detail['ten_trang_thai'] === "Đang vận chuyển"): ?>
                            <div class="proceed-to-checkout section mt-30">
                                <a href="<?= BASE_URL ?>?act=final-order&id=<?= $order_detail['dh_id'] ?>">Xác nhận giao
                                    hàng</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>

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