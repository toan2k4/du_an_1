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
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên trường</th>
                        <th>Giá trị</th>
                    </tr>
                </thead>
                <tr>
                    <td>Tên tài khoản</td>
                    <td><?= $user['ten_tk']?></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><?= $user['ho_va_ten']?></td>
                </tr>
                <tr>
                    <td>Ảnh tài khoản</td>
                    <td><img src="<?= BASE_URL . $user['anh_tk']?>" width="100"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $user['email_tk']?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?= $user['dien_thoai_tk']?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?= $user['dia_chi']?></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td><?= $user['gioi_tinh']?></td>
                </tr>
                <tr>
                    <td>Chức vụ</td>
                    <td><?= $user['ten_chuc_vu']?></td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=users" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>