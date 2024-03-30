<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?= $title ?>
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset ($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success']?>
                    <?php unset($_SESSION['success']) ?>
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

            <form action="" method="POST">
            <div class="mb-3 row justify-content-between">
                    <div class="col-6">
                        <label class="form-label">Tên màu </label>
                        <input type="text" class="form-control " name="ten_mau" placeholder="Nhập tên màu" value="<?= $variant['ten_mau']?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">mã màu</label>
                        <input type="color" class="form-control col-3" name="ma_mau" value="<?= $variant['ma_mau']?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Size</label>
                    <select name="size" id="" class="form-control">
                        <option value="">--- Chọn size -----</option>
                        <option <?= $variant['size'] == 'S'?'selected' :null?> value="S">S</option>
                        <option <?= $variant['size'] == 'M'?'selected' :null?> value="M">M</option>
                        <option <?= $variant['size'] == 'L'?'selected' :null?> value="L">L</option>
                        <option <?= $variant['size'] == 'XL'?'selected' :null?> value="XL">XL</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="text" class="form-control" name="so_luong" value="<?= $variant['so_luong']?>" placeholder="Nhập số lượng">
                </div>

                <input type="submit" name="gui" class="btn btn-success" value="Cập nhật">
                <a onclick="goBack()" class="btn btn-warning">Quay lại </a>
            </form>
        </div>
    </div>
</div>

    