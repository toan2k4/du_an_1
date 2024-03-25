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
                    <td>Tên sản phẩm</td>
                    <td>
                        <?= $product['ten_sp'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Tên danh mục</td>
                    <td>
                        <?= $product['ten_dm'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Hình sản phẩm</td>
                    <td><img src="<?= BASE_URL . $product['hinh_sp'] ?>" width="100"></td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>
                        <?= $product['gia_sp'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Giá Bán</td>
                    <td>
                        <?= $product['giam_gia'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <?= $product['so_luong'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <?= $product['mo_ta'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Số lượt xem</td>
                    <td>
                        <?= $product['so_luot_xem'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Ngày nhập</td>
                    <td>
                        <?= date('d-m-Y', strtotime($product['ngay_nhap'])) ?>
                    </td>
                </tr>
                <tr>
                    <td>Các hình phụ</td>
                    <td>
                        
                        <?php foreach ($hinhPhu as $value): ?>
                            <img src="<?= BASE_URL . $value['anh_phu'] ?>" width="100">
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN ?>?act=products" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>