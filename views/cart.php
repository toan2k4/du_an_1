<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Giỏ hàng</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->
<style>
    .capitalize {
        text-transform: capitalize;
    }
</style>
<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">

        <form action="" method="post">
            <div class="row mbn-40">
                <div class="col-12 mb-40">
                    <div class="cart-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Hình ảnh</th>
                                    <th class="pro-title">Tên </th>
                                    <th class="pro-price">Giá</th>
                                    <th class="pro-title">Màu</th>
                                    <th class="pro-title">Size</th>
                                    <th class="pro-quantity">Số lượng</th>
                                    <th class="pro-subtotal">Tổng</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                if (isset($products)):
                                    foreach ($products as $product):
                                        $total += $product['price'] * $product['quantity'];
                                        ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="<?= BASE_URL?>?act=single-product&id=<?= $product['id_sp']?>"><img
                                                        src="<?= BASE_URL . $product['hinh_sp'] ?>" alt="" /></a></td>
                                            <td class="pro-title"><a href="<?= BASE_URL?>?act=single-product&id=<?= $product['id_sp']?>">
                                                    <?= $product['ten_sp'] ?>
                                                </a></td>
                                            <td class="pro-price"><span class="amount">
                                                    <?= number_format($product['price']) ?>
                                                </span></td>
                                            <td class="pro-title capitalize">
                                                <?= $product['mau'] ?>
                                            </td>
                                            <td class="pro-title">
                                                <?= $product['size'] ?>
                                            </td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <a href="<?= BASE_URL ?>?act=cart-inc&id_ctgh=<?= $product['id_ctgh'] ?>&id_sp=<?= $product['id_sp'] ?>&mau=<?= $product['mau'] ?>&size=<?= $product['size'] ?>&quantity=<?= $product['quantity'] ?>"
                                                        class="dec qtybtn"><i class="ti-minus"></i></a>
                                                    <p class="my-1 text-center">
                                                        <?= $product['quantity'] ?>
                                                    </p>
                                                    <a href="<?= BASE_URL ?>?act=cart-dec&id_ctgh=<?= $product['id_ctgh'] ?>&id_sp=<?= $product['id_sp'] ?>&mau=<?= $product['mau'] ?>&size=<?= $product['size'] ?>&quantity=<?= $product['quantity'] ?>"
                                                        class="inc qtybtn"><i class="ti-plus"></i></a>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal">
                                                <?= number_format($product['price'] * $product['quantity']) ?>
                                            </td>
                                            <td class="pro-remove"><a
                                                    onclick="return confirm('bạn có chắc chắn muốn xóa không?')"
                                                    href="<?= BASE_URL ?>?act=del-cart&id_ctgh=<?= $product['id_ctgh'] ?>&id_sp=<?= $product['id_sp'] ?>&mau=<?= $product['mau'] ?>&size=<?= $product['size'] ?>&quantity=<?= $product['quantity'] ?>">×</a>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12 mb-40">
                    <div class="cart-buttons mb-30">
                        <a href="index.php">Quay lại trang chủ</a>
                    </div>
                    <div class="cart-coupon">
                        <h4>Mã khuyến mãi</h4>
                        <p>Nhập mã khuyến mãi ở đây nếu bạn có.</p>
                        <div class="cuppon-form">
                            <input type="text" placeholder="Mã khuyến mãi" name="code_km" />
                            <input type="submit" value="Sử dụng" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-12 mb-40">
                    <div class="cart-total fix">
                        <h3>Tổng thanh toán</h3>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Tạm tính</th>
                                    <td><span class="amount">
                                            <?php
                                            echo number_format($total);
                                            $_SESSION['totalPrice'] = $total;
                                            ?>
                                        </span></td>
                                </tr>
                                <?php if (isset($_SESSION['voucher'])): ?>
                                    <tr>
                                        <th>Khuyến mãi</th>
                                        <td><span class="amount"> -
                                                <?php
                                                echo number_format($_SESSION['voucher']);
                                                $_SESSION['totalPrice'] = $total - $_SESSION['voucher'];
                                                ?>
                                            </span></td>
                                    </tr>
                                <?php endif; ?>
                                <tr class="order-total">
                                    <th>Tổng</th>
                                    <td>
                                        <strong><span class="amount">
                                                <?= number_format($_SESSION['totalPrice']) ?>
                                            </span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="proceed-to-checkout section mt-30">
                            <a href="<?= BASE_URL ?>?act=checkout">Mua hàng</a>
                        </div>
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
<!-- <script>
    // Lấy tất cả các phần tử inputElement
    var inputElements = document.querySelectorAll('.pro-qty p');

    // Lặp qua từng phần tử và thêm sự kiện "click" cho nút giảm và tăng của mỗi phần tử
    inputElements.forEach(function (inputElement) {
        let id_gh = inputElement.dataset.id;
        
        // Lấy nút tăng và giảm tương ứng với từng phần tử
        var decreaseButton = inputElement.closest('.pro-qty').querySelector('.dec');
        var increaseButton = inputElement.closest('.pro-qty').querySelector('.inc');

        // Thêm sự kiện "click" cho nút giảm
        decreaseButton.addEventListener('click', function () {
            console.log(id_gh);
            var value = parseInt(inputElement.innerHTML);
            if (value > 1) {
                inputElement.innerHTML = value - 1;
                check(inputElement.innerHTML);
            }
        });

        // Thêm sự kiện "click" cho nút tăng
        increaseButton.addEventListener('click', function () {
            var value = parseInt(inputElement.innerHTML);
            inputElement.innerHTML = value + 1;
            check(inputElement.innerHTML);
        });
    });


    function check(quantity) {
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
        xmlhttp.open("GET", "<?= BASE_URL ?>?act=update-quantity&quantity=" + quantity, true);
        xmlhttp.send();
    }

</script> -->