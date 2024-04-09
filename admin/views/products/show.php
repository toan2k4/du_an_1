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
                        <?= number_format($product['gia_sp'], 0, ',')  ?>
                    </td>
                </tr>
                <tr>
                    <td>Giá Bán</td>
                    <td>
                        <?= number_format($product['giam_gia'], 0, ',')  ?>
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
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <?php
                        switch ($product['trang_thai']) {
                            case '0':
                                echo '<div class="badge badge-success">Đang hoạt động</div>';
                                break;
                            case '1':
                                echo '<div class="badge badge-dark">Ngừng hoạt động</div>';
                                break;
                        }
                        ?>
                    </td>
                </tr>

            </table>

            <p class="fw-bold mt-4">Biến thể sản phẩm</p>
            <table class="table table-bordered mb-4" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Size</th>
                        <th>Tên màu</th>
                        <th>Màu</th>
                        <th>Sô lượng</th>
                    </tr>
                </thead>

                <tbody id="">
                    <?php
                    foreach ($variants as $key => $value):
                        ?>
                        <tr>
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= $value['size'] ?>
                            </td>
                            <td>
                                <?= $value['ten_mau'] ?>
                            </td>
                            <td>
                                <div class="py-3 border border-black" style="background-color: <?= $value['ma_mau'] ?>"></div>
                            </td>
                            <td>
                                <?= $value['so_luong'] ?>
                            </td>
                        </tr>
                        <?php
                    endforeach; ?>
                </tbody>
            </table>

            <button onclick="goBack()" class="btn btn-warning">Quay lại </button>
            <a href="<?= BASE_URL_ADMIN ?>?act=comments-list&id_sp=<?= $product['id'] ?>" class="btn btn-info">Bình Luận
            </a>
            <a href="<?= BASE_URL_ADMIN ?>?act=evaluates-list&id_sp=<?= $product['id'] ?>" class="btn btn-primary">Đánh
                giá </a>
            <a href="<?= BASE_URL_ADMIN ?>?act=variants&id_sp=<?= $product['id'] ?>" class="btn btn-success">Thêm biến
                thể </a>
        </div>
    </div>
</div>