<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(<?= BASE_URL ?>/assets/user/assets/images/hero/hero-1.jpg)">
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
                                    <img src="<?= BASE_URL . $product_one['hinh_sp'] ?>" alt=""/>
                                </a>
                            </div>
                            <!-- Single Product Thumbnail Slider -->
                            <ul id="pro-thumb-img" class="pro-thumb-img">
                                <li><a href="" data-standard=""><img src="<?= BASE_URL . $product_one['hinh_sp'] ?>" alt="" /></a></li>
								<?php foreach ($hinhPhu as $img => $value): ?>
									<li><a href="" data-standard=""><img src="<?= BASE_URL . $value['anh_phu'] ?>" alt="" /></a></li>
								<?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="col-lg-6 col-12 mb-40">
                            <div class="single-product-content">

                                <div class="head">
                                    <div class="head-left">

                                        <h3 class="title"><?= $product_one['ten_sp'] ?></h3>

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
                                            <del><?= number_format($product_one['gia_sp'], 0, ',') ?></del>    
                                            </span>
                                        </span>
                                    <?php else: ?>
                                        <span class="price mb-3 d-flex">
                                            <?= number_format($product_one['gia_sp'], 0, ',') ?>
                                        </span>
                                    <?php endif ?>
                                    </div>
                                </div>

                            
                                <span class="availability">Kho: <span><?= $product_one['so_luong'] ?></span></span>

                                <div class="quantity-colors">

                                    <div class="quantity">
                                        <h5>Số lương :</h5>
            	                            <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>                            
									<?php
										$variants = listVariantsByIdSp($product_one['id']);
										$colors = array_unique(array_column($variants, 'ma_mau'));
										$sizes = array_unique(array_column($variants, 'size'));
									?>
                                    <div class="colors">
                                        <h5>Màu :</h5>
                                        <div class="color-options">
											<?php foreach ($colors as $color): ?>
												<button style="background-color: <?= $color ?>"></button>
											<?php endforeach; ?>
                             
                                        </div>
                                    </div>                            
								
                                </div>
								<div class="row">

								<div class="quantity-colors">
									<span class="size availability">Kích thước :
                                        <?php foreach ($sizes as $size): ?>
                                            <span class="btn font-weight-bold"><?= $size ?></span> 
                                        <?php endforeach; ?>
                                    </span>
                                    
								</div>

                                <div class="actions">
                                    <button><i class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></button>
                                </div>

                                <div class="share">

                                    <h5>Share: </h5>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
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
                                <li><a href="#data-sheet" data-bs-toggle="tab">Thông số kĩ thuật</a></li>
                                <li><a href="#reviews" data-bs-toggle="tab">Bình luận</a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content col-12">
                            <div class="pro-info-tab tab-pane active" id="more-info">
								<p><?= $product_one['mo_ta'] ?></p>
                            </div>
                            <div class="pro-info-tab tab-pane" id="data-sheet">
                                <table class="table-data-sheet">
                                    <tbody>
                                        <tr class="odd">
                                            <td>Compositions</td>
                                            <td>Cotton</td>
                                        </tr>
                                        <tr class="even">
                                            <td>Styles</td>
                                            <td>Casual</td>
                                        </tr>
                                        <tr class="odd">
                                            <td>Properties</td>
                                            <td>Short Sleeve</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pro-info-tab tab-pane" id="reviews">
								<div class="comment-wrap mt-20">
									<ul class="comment-list">
										<?php foreach ($comment as $key => $value): ?>
											<li>
												<div class="single-comment">
													<div class="image h-70 "><img src="<?= BASE_URL. $value['tk_anh'] ?>" alt=""height="70px" ></div>
													<div class="content">
														<h4><?= $value['tk_ten'] ?></h4>
														<span><?= $value['bl_ngaybl'] ?> 
														<p><?= $value['bl_nd'] ?></p>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>

									<h3>Bình luận</h3>
									<div class="comment-form">
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
										<form action="#" method = "POST" enctype="multipart/form-data">
											<div class="row row-10">
												<input type="hidden" value ="<?= $product_one['id'] ?>" name="id_sp">
												<input type="hidden" value ="1" name="id_tk">
												<div class="col-12 mb-1"><textarea name="noi_dung" placeholder="Nội dung"></textarea></div>
												<div class="col-12">
													<input type="date" id="date" name="ngay_bl" readonly>
												</div>
												<div class="col-12 mt-3"><input name="submit" value="submit" type="submit"></div>
											</div>
										</form>
									</div>
									<script>
										document.addEventListener("DOMContentLoaded", function() {
										var today = new Date().toISOString().split('T')[0]; // Lấy ngày hôm nay
										document.getElementById("date").value = today; // Đưa giá trị vào trường input
										});
									</script>
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
										<h4 class="title"><a href="<?= BASE_URL ?>?act=single-product&id=<?= $value['sp_id'] ?>"><?= $value['sp_ten'] ?></a></h4>
										<?php if (!empty($value['sp_giam_gia'])): ?>
											<span class="price mb-3 d-flex"><?= number_format($value['sp_giam_gia'], 0, ',') ?>
												<span class="ms-2 fs-6 old"><?= number_format($value['sp_gia'], 0, ',') ?></span>
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