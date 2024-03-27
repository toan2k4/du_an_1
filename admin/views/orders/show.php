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
                        <th colspan="2">Thông tin khách hàng</th>
                    </tr>
                </thead>
                <tr>
                    <td>Tên tài khoản</td>
                    <td> <?= $order['ho_va_ten']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $order['email_tk']?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?= $order['dien_thoai_tk']?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?= $order['dia_chi']?></td>
                </tr>
            </table> 
            <a href="<?= BASE_URL_ADMIN?>?act=orders" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>