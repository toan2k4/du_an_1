<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col">

				<h1>Thanh toán</h1>
				<ul class="page-breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="#">Thanh toán</a></li>
				</ul>

			</div>
		</div>
	</div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">

		<!-- Checkout Form s-->
		<form action="<?= BASE_URL ?>?act=order-purchase" class="checkout-form" method="post">
			<div class="row row-50 mbn-40">

				<div class="col-lg-7">

					<!-- Billing Address -->
					<div id="billing-form" class="mb-20">
						<h4 class="checkout-title">Địa chỉ thanh toán</h4>
						<?php if (isset($_SESSION['errors'])): ?>
							<div class="alert alert-danger">
								<ul>
									<?php foreach ($_SESSION['errors'] as $error): ?>
										<li>
											<?= $error ?>
										</li>
									<?php endforeach; ?>
								</ul>
								<?php unset($_SESSION['errors']) ?>
							</div>
						<?php endif; ?>
						<div class="row">

							<div class="col-md-6 col-12 mb-5">
								<label>Họ và Tên*</label>
								<input type="hidden" name="id_tk" value="<?= $_SESSION['user']['id'] ?>">
								<input type="text" placeholder="Nhập họ và tên" required name="ho_va_ten"
									value="<?= $_SESSION['user']['ho_va_ten'] ?>">
							</div>


							<div class="col-md-6 col-12 mb-5">
								<label>Địa chỉ Email*</label>
								<input type="email" placeholder="Nhập email" required name="email"
									value="<?= $_SESSION['user']['email_tk'] ?>">
							</div>

							<div class="col-12 mb-5">
								<label>Số điện thoại*</label>
								<input type="text" placeholder="Nhập số điện thoại" required name="so_dien_thoai"
									value="<?= $_SESSION['user']['dien_thoai_tk'] ?>">
							</div>

							<div class="col-12 mb-5">
								<label>Địa chỉ</label>
								<input type="text" placeholder="Nhập địa chỉ" required name="dia_chi"
									value="<?= $_SESSION['user']['dia_chi'] ?>">
							</div>


						</div>

					</div>
				</div>

				<div class="col-lg-5">
					<div class="row">

						<!-- Cart Total -->
						<div class="col-12 mb-40">

							<h4 class="checkout-title">Tổng số giỏ hàng</h4>

							<div class="checkout-cart-total">

								<h4>Sản phẩm <span>Tổng</span></h4>

								<ul>
									<?php
									$total = 0;
									foreach ($products as $pro):
										$total += $pro['price'] * $pro['quantity'];
										?>
										<div class="mb-3">
											<li class="mb-0">
												<?= $pro['ten_sp'] ?> x <small class="fw-semibold fs-6">
													<?= $pro['quantity'] ?>
												</small>
												<span>
													<?= number_format($pro['price'] * $pro['quantity']) ?>
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
								<?php if (isset($_SESSION['voucher'])): ?>
									<p>Khuyến mại <span>-
											<?= number_format($_SESSION['voucher']) ?>
										</span></p>
								<?php endif; ?>

								<h4>Tổng cộng <span>
									
										<?= $_SESSION['totalPrice'] ?>
									</span></h4>

							</div>

						</div>

						<!-- Payment Method -->
						<div class="col-12 mb-40">

							<h4 class="checkout-title">Phương thức thanh toán</h4>

							<div class="checkout-payment-method">

								<div class="single-method">
									<input type="radio" id="payment_check" name="thanh_toan" value="0">
									<label for="payment_check">Thanh toán tiền mặt</label>
									<p data-method="check">Thanh toán bằng tiền mặt khi nhận hàng</p>
								</div>

								<div class="single-method">
									<input type="radio" id="payment_bank" name="thanh_toan" value="payUrl">
									<label for="payment_bank">Thanh toán chuyển khoản bằng MoMo</label>
									<p data-method="bank"><img src="assets/user/assets/images/momo.jpg" width="100px">
									</p>
								</div>
								<div class="single-method">
									<input type="radio" id="payment_banks" name="thanh_toan" value="redirect">
									<label for="payment_banks">Thanh toán chuyển khoản bằng VnPay</label>
									<p data-method="bank"><img src="assets/user/assets/images/vnpay.jpg" width="100px">
									</p>
								</div>
							</div>

							<button type="submit" class="place-order">Đặt hàng</button>

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