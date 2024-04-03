<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>
    <!-- <p class="mb-4">
        DataTables is a third party plugin that is used to generate the
        demo table below. For more information about DataTables, please
        visit the
        <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
    </p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?= $title ?>
            </h6>
        </div>
        <div class="card-body">
            
            <?php if(isset($_SESSION['errors'])):?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($_SESSION['errors'] as $error):?>
                        <li><?= $error?></li>
                    <?php endforeach;?>
                </ul>
                <?php unset($_SESSION['errors'])?>
            </div>
            <?php endif;?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Tên khuyến mại</label>
                    <input type="text" class="form-control" name="ten_km" 
                        placeholder="Nhập tên khuyến mại"
                        value="<?= isset($_SESSION['data'])?$_SESSION['data']['ten_km']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mã code</label>
                    <input type="text" class="form-control" name="code_km" 
                        placeholder="Nhập code khuyến mại"
                        value="<?= isset($_SESSION['data'])?$_SESSION['data']['code_km']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nội dung khuyến mại</label>
                    <input type="text" class="form-control" name="nd_km" 
                        placeholder="Nhập nội dung khuyến mại"
                        value="<?= isset($_SESSION['data'])?$_SESSION['data']['nd_km']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá khuyến mại</label>
                    <input type="text" class="form-control" name="gia_km" 
                        placeholder="Nhập Giá khuyến mại"
                        value="<?= isset($_SESSION['data'])?$_SESSION['data']['gia_km']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="text" class="form-control" name="so_luong" 
                        placeholder="Nhập Số lượng"
                        value="<?= isset($_SESSION['data'])?$_SESSION['data']['so_luong']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">ngày bắt đầu</label>
                    <input type="date" class="form-control" name="ngay_batdau"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['ngay_batdau']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" name="ngay_ketthuc"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['ngay_ketthuc']:null ?>">
                </div>
                
                <input type="submit" name="gui" class="btn btn-success" value="Thêm">
                <a href="<?= BASE_URL_ADMIN?>?act=vouchers" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
            <!-- thử xem có lỗi không -->
        </div>
    </div>
</div>
<?php if(isset($_SESSION['data'])) unset($_SESSION['data']) ?>