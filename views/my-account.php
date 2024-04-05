<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="page-banner-content col">

                    <h1>Quản lý tài khoản</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="#">Quản lý tài khoản</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Page Section Start -->
    <div class="page-section section section-padding">
        <div class="container">
			<div class="row mbn-30">
			<?php if (isset($_SESSION['user'])): ?>
				<!-- My Account Tab Menu Start -->
				<div class="col-lg-3 col-12 mb-30">
					<div class="myaccount-tab-menu nav" role="tablist">
						<a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
							Bảng điều khiển</a>

						<a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng</a>
						
						<a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i>Thông tin tài khoản</a>

						<a href="<?= BASE_URL?>?act=logout"><i class="fa fa-sign-out"></i>Đăng xuất</a>
					</div>
				</div>
				<!-- My Account Tab Menu End -->

				<!-- My Account Tab Content Start -->
				<div class="col-lg-9 col-12 mb-30">
					<div class="tab-content" id="myaccountContent">
						<!-- Single Tab Content Start Bảng điều khiển -->
						<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
							<div class="myaccount-content">
								<h3>Bảng điều khiển</h3>

								<div class="welcome">
									<p>Xin chào, <strong><?= $_SESSION['user']['ten_tk'] ?></strong> ( Nếu không phải <strong><?= $_SESSION['user']['ten_tk'] ?> !</strong><a href="login-register.html" class="logout" style=""> Đăng xuất )</a></p>
								</div>
								<p class="mb-0">Từ bảng điều khiển tài khoản của bạn. 
									Bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa chi tiết mật khẩu và tài khoản của mình.</p>
								<br> <br>
								<?php if($_SESSION['user']['id_chuc_vu'] === 1) : ?>
									<style>
										.rounded-button {
											border-radius: 25px;
											padding: 10px 20px;
											background-color : #579cca;
											color: white; /* Màu chữ trắng */
											border: none; /* Không có viền */
										}
										.btn-bc{
											border-radius: 25px;
											background-color : #579cca;
											color: white; /* Màu chữ trắng */
											border: none; /* Không có viền */
										}
									</style>
									<div class="action-buttons ">
										<a href="<?= BASE_URL_ADMIN ?>" class="btn-bc"><button class="btn rounded-button btn-sm">Quản lý Admin</button></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- Single Tab Content End -->

						<!-- Single Tab Content Start Đơn hàng -->
						<div class="tab-pane fade" id="orders" role="tabpanel">
							<div class="myaccount-content">
								<h3>Đơn hàng của tôi</h3>
								<div class="myaccount-table table-responsive text-center">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>STT</th>
													<th>Tên</th>
													<th>Ngày</th>
													<th>Tổng tiền</th>
													<th>Trạng thái</th>
													<th>Hành động</th>
												</tr>
											</thead>

											<tbody>
												<?php foreach ($order as $key => $value): ?>
													<tr>
														<td>
															<?= $key + 1 ?>
														</td>
														<td>
															<?= $value['ho_va_ten'] ?>
														</td>
														<td>
															<?= date('d-m-Y', strtotime($value['thoi_gian'])) ?>
														</td>
														<td>
															<?= number_format($value['tong_tien'], 0, ',')  ?>
														</td>

														<td>
															<?php
																switch ($value['ten_trang_thai']) {
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
														</td>

														<td>
															<a href="<?= BASE_URL ?>?act=my-order&id=<?= $value['dh_id'] ?>" class="btn btn-dark rounded-button btn-sm">Chi tiết</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
           				 			</div>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->

						<!-- Single Tab Content Start Thanh toán-->
						<div class="tab-pane fade" id="payment-method" role="tabpanel">
							<div class="myaccount-content">
								<h3>Thông tin thẻ thanh toán</h3>
								<p class="saved-message">Bạn chưa thể lưu phương thức thanh toán của mình.</p>
							</div>
						</div>
						<!-- Single Tab Content End -->


						<!-- Single Tab Content Start Thông tin tài khoản-->
						<div class="tab-pane fade" id="account-info" role="tabpanel">
							<?php if (isset ($_SESSION['success'])): ?>
								<div class="alert alert-success">
									<?php echo$_SESSION['success']; 
										unset($_SESSION['success']) ?>
								</div>
							<?php endif; ?>
							<?php if (isset ($_SESSION['errors'])): ?>
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
							<div class="myaccount-content">
								<h3>Thông tin tài khoản cá nhân</h3>
								<div class="col-lg-9 col-12 mb-40 ">
									<h4 class="fw-bolder fs-5">Địa chỉ giao hàng</h4>
									<div class="login-register-form-wrap">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="row">
												<label for="" class="mb-2" style="margin-left : 10px">Tên người nhận</label>
												<div class="col-md-8 col-12 mb-15"><input type="text" name="ho_va_ten" value="<?= $user['ho_va_ten'] ?>"></div>
												<label for="" class="mb-2" style="margin-left : 10px">Địa chỉ</label>
												<div class="col-md-8 col-12 mb-15"><input type="text" name="dia_chi" value="<?= $user['dia_chi'] ?>"></div>
												<label for="" class="mb-2" style="margin-left : 10px">Số điện thoại</label> 
												<div class="col-md-8 col-12 mb-15"><input type="text" name="dien_thoai_tk" value="<?= $user['dien_thoai_tk'] ?>"></div>
												<label for="" class="mb-2" style="margin-left : 10px">Ảnh đại diện</label> 
												<div class="col-md-8 col-12 mb-15">
													<input type="file" name="anh_tk">
													<input type="hidden" name="anh_tk" value="<?= $_SESSION['user'] ? $_SESSION['user']['anh_tk'] : null ?>">
													<img src="<?= BASE_URL . $user['anh_tk'] ?>" width="100">
												</div>

												<h4 class="fw-bolder fs-5">Thông tin cá nhân</h4>

												<label for="" class="mb-2" style="margin-left : 10px">Tên tài khoản</label>
												<div class="col-md-8 col-12 mb-15"><input type="text" name="ten_tk" value="<?= $user['ten_tk'] ?>"></div>
												<label for="" class="mb-2" style="margin-left : 10px">Email</label>
												<div class="col-md-8 col-12 mb-15"><input type="text" name="email_tk" value="<?= $user['email_tk'] ?>"></div>
												<label for="" class="mb-2" style="margin-left : 10px">Mật khẩu</label>
												<div class="col-md-8 col-12 mb-15"><input type="text" name="mat_khau" value="<?= $user['mat_khau'] ?>"></div>
												<div class="col-md-6 col-12"><input type="submit" value="Lưu thay đổi"></div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->
					</div>
				</div>
				<!-- My Account Tab Content End -->
			<?php endif; ?>
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
