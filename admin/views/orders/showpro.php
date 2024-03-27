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
                    <td> <?= $order_pro_detail['ten_sp']?></td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td><img src="<?= BASE_URL . $order_pro_detail['hinh_sp']?>" width="100">
                    <?php foreach ($order_pro_img as $value): ?>
                            <img src="<?= BASE_URL . $value['anh_phu'] ?>" width="100">
                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td>Danh mục</td>
                    <td><?= $order_pro_detail['ten_dm']?></td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td><?= $order_pro_detail['gia_sp']?></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><?= $order_pro_detail['mo_ta']?></td>
                </tr>
            </table> <br><br>

            <a href="<?= BASE_URL_ADMIN ?>?act=orders"class="btn btn-info mb-2">Quay lại</a>
        </div>
    </div>
</div>