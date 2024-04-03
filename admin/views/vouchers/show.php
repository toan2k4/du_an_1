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
                    <td>Tên khuyến mại</td>
                    <td> <?= $voucher['ten_km']?></td>
                </tr>
                <tr>
                    <td>Mã code khuyến mại</td>
                    <td> <?= $voucher['code_km']?></td>
                </tr>
                <tr>
                    <td>Nội dung khuyến mại</td>
                    <td><?= $voucher['nd_km']?></td>
                </tr>
                <tr>
                    <td>Giá khuyến mại</td>
                    <td><div class="badge badge-danger"><?= number_format($voucher['gia_km'])?>K</div> </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td><div class="badge badge-info"><?= $voucher['so_luong']?></div></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><?php if ($voucher['trang_thai'] == 1) {
                        echo '<div class="badge badge-success">Đang hoạt động</div>';
                    } else {
                        echo '<div class="badge badge-danger">Không hoạt động</div>';
                    } ?></td>
                </tr>
                <tr>
                    <td>Ngày bắt đầu</td>
                    <td><?= $voucher['ngay_batdau']?></td>
                </tr>
                <tr>
                    <td>Ngày kết thúc</td>
                    <td><?= $voucher['ngay_ketthuc']?></td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=vouchers" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>