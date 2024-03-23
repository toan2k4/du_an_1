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
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" class="form-control" name="ten_tk" placeholder="Nhập Tên tài khoản" value="<?= isset($_SESSION['data'])?$_SESSION['data']['ten_tk']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_va_ten"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['ho_va_ten']:null ?>"
                    placeholder="Nhập Tên tài khoản">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="text" class="form-control" name="mat_khau"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['mat_khau']:null ?>"
                    placeholder="Nhập mật khẩu">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh</label>
                    <input type="file" class="form-control" name="anh_tk">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email_tk"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['email_tk']:null ?>"
                    placeholder="Nhập email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Điện thoại</label>
                    <input type="text" class="form-control" name="dien_thoai_tk"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['dien_thoai_tk']:null ?>"
                    placeholder="Nhập địa chỉ">
                </div>
                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['dia_chi']:null ?>"
                    placeholder="Nhập địa chỉ">
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn chức vụ</label>
                    <select name="id_chuc_vu" id="" class="form-select ">
                        <?php foreach($roles as $value):?>
                            <option value="<?= $value['id']?>"
                            <?= isset($_SESSION['data']) && $_SESSION['data']['id_chuc_vu'] ==  $value['id']? 'selected':null ?>
                            ><?= $value['ten_chuc_vu']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn giới tính</label>
                    <select name="gioi_tinh" id="" class="form-select ">
                        <option value="nam" <?= isset($_SESSION['data']) && $_SESSION['data']['id_chuc_vu'] ==  'nam'? 'selected':null ?>>Nam</option>
                        <option value="nữ" <?= isset($_SESSION['data']) && $_SESSION['data']['id_chuc_vu'] ==  'nữ'? 'selected':null ?>>Nữ</option>
                    </select>
                </div>

                <input type="submit" name="gui" class="btn btn-success" value="Thêm">
                <a href="<?= BASE_URL_ADMIN ?>?act=users" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['data'])) unset($_SESSION['data']) ?>