<div class="page-section section section-padding">
    <div class="container">

        <!-- Checkout Form s-->

        <div class="row row-50 mbn-40">
            <h5 style="text-align: center"><img src="<?= BASE_URL ?>uploads/Thiết kế chưa có tên.png" alt=""
                    width="150px" style="margin-top : -50px"></h5>
            <h1 class="p-3" style="text-align: center">Cảm ơn bạn đã mua hàng bên chúng tôi!</h1>
            <div class="col-lg-7">
                <div class="row">
                    <!-- Cart Total -->
                    <div class="col-12 mb-40">

                        <div class="checkout-cart-total">

                            <!-- <h4>Product <span>Total</span></h4> -->
                            <p>Họ và tên:
                                <?= $bill['ho_va_ten'] ?>
                            </p>
                            <p>Số điện thoại:
                                <?= $bill['so_dien_thoai'] ?>
                            </p>
                            <p>Địa chỉ:
                                <?= $bill['dia_chi'] ?>
                            </p>
                            <p>Email:
                                <?= $bill['email'] ?>
                            </p>
                            <p>Ngày mua hàng:
                                <?= $bill['thoi_gian'] ?>
                            </p>
                            <p>Phương thức thanh toán:
                                <?= $bill['thanh_toan'] == 0 ? 'Tiền mặt' : 'Thanh toán online' ?>
                            </p>
                            <p>Tổng tiền:
                                <?= number_format($bill['tong_tien']) ?>
                            </p>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row">
                    <!-- Cart Total -->
                    <div class="col-12 mb-40">


                        <div class="checkout-cart-total">

                            <h4>Sản phẩm <span>Tổng</span></h4>

                            <ul>
                                <?php
                                $total = 0;
                                foreach ($detailBills as $pro):
                                    $total += $pro['thanh_tien'];
                                    ?>
                                    <div class="mb-3">
                                        <li class="mb-0">
                                            <?= $pro['ten_sp'] ?> x <small class="fw-semibold fs-6">
                                                <?= $pro['quantity'] ?>
                                            </small>
                                            <span>
                                                <?= number_format($pro['thanh_tien']) ?>
                                            </span>
                                        </li>
                                        <small>Màu:
                                            <?= $pro['mau'] ?>
                                        </small> -
                                        <small>Size:
                                            <?= $pro['size'] ?>
                                        </small>
                                    </div>
                                <?php endforeach; ?>
                            </ul>

                            <p>Tổng phụ <span>
                                    <?= number_format($total) ?>
                                </span></p>
                            <?php if ($total > $bill['tong_tien']): ?>
                                <p>Khuyến mại <span>-
                                        <?= number_format($total - $bill['tong_tien']) ?>
                                    </span></p>
                            <?php endif; ?>

                            <h4>Tổng cộng <span>
                                    <?= number_format($bill['tong_tien']) ?>
                                </span></h4>

                        </div>

                    </div>
                </div>
            </div>

            <div style="margin-left : 50px">
                <style>
                    .rounded-button {
                        border-radius: 25px;
                        padding: 10px 20px;
                        background-color: #579cca;
                        color: white;
                        /* Màu chữ trắng */
                        border: none;
                        /* Không có viền */
                    }

                    .btn-bc {
                        border-radius: 25px;
                        background-color: #579cca;
                        color: white;
                        /* Màu chữ trắng */
                        border: none;
                        /* Không có viền */
                    }
                </style>
                <div class="action-buttons"> 
                    <a href="index.php" class="btn-bc"><button class="btn rounded-button btn-sm">Tiếp tục mua sắm</button></a>
                </div>
            </div>

        </div>


    </div>
</div>