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
                    <td> <?= $order['ho_va_ten']?></td>
                </tr>
                <tr>
                    <td>Nội dung khuyến mại</td>
                    <td><?= $order['dien_thoai_tk']?></td>
                </tr>
                <tr>
                    <td>Giá khuyến mại</td>
                    <td><div class="badge badge-danger"><?= $order['gia_km']?>K</div> </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td><div class="badge badge-info"><?= $order['so_luong']?></div></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><?php if ($order['trang_thai'] == 1) {
                        echo '<div class="badge badge-success">Đang hoạt động</div>';
                    } else {
                        echo '<div class="badge badge-danger">Không hoạt động</div>';
                    } ?></td>
                </tr>
                <tr>
                    <td>Ngày bắt đầu</td>
                    <td><?= $order['ngay_batdau']?></td>
                </tr>
                <tr>
                    <td>Ngày kết thúc</td>
                    <td><?= $order['ngay_ketthuc']?></td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=orders" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>