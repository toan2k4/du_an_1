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
                    <td> <?= $comment['ten_tk']?></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><?= $comment['noi_dung']?></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><?= $comment['ten_sp']?></td>
                </tr>
                
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=comments" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>