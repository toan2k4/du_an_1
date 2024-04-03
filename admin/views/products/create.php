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

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_sp" placeholder="Nhập Tên sản phẩm" value="<?= isset($_SESSION['data'])?$_SESSION['data']['ten_sp']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="gia_sp"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['gia_sp']:null ?>"
                    placeholder="Nhập giá sản phẩm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá bán</label>
                    <input type="text" class="form-control" name="giam_gia"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['giam_gia']:null ?>"
                    placeholder="Nhập giá bán">
                </div>
                <div class="mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="text" class="form-control" name="so_luong"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['so_luong']:null ?>"
                    placeholder="Nhập số lượng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh chính sản phẩm</label>
                    <input type="file" class="form-control" name="hinh_sp" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn ảnh phụ</label>
                    <input type="file" class="form-control" name="anh_phu[]" multiple>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['ngay_nhap']:null ?>"
                    placeholder="Nhập ngày nhập hàng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn danh mục</label>
                    <select name="id_danh_muc" id="" class="form-select">
                        <?php foreach($categories as $value):?>
                            <option value="<?= $value['id']?>"
                            <?= isset($_SESSION['data']) && $_SESSION['data']['id_danh_muc'] ==  $value['id']? 'selected':null ?>
                            ><?= $value['ten_dm']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="mo_ta" class="form-control" id="default" cols="10" rows="5" placeholder="Nhập mô tả sản phẩm"><?= isset($_SESSION['data'])?$_SESSION['data']['mo_ta']:null ?></textarea>
                    
                </div>
                <input type="submit" name="gui" class="btn btn-success" value="Thêm">
                <a href="<?= BASE_URL_ADMIN ?>?act=products" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['data'])) unset($_SESSION['data']) ?>