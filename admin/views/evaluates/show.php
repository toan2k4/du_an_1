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
                    <td>Tài khoản</td>
                    <td><?= $evaluate['ho_va_ten']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $evaluate['email_tk']?></td>
                </tr>
                <tr>
                    <td>Nội dung </td>
                    <td><?= $evaluate['noi_dung']?></td>
                </tr>
                <tr>
                    <td>Sao đánh giá</td>
                    <td><?php
                    $a = $evaluate['sao_dg'];
                    for($i = 0; $i < $a; $i++){
                        echo '<i class="bi bi-star-fill text-warning"></i>';
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>Thời gian đáng giá </td>
                    <td><?= date('d-m-Y', strtotime($evaluate['ngay_dg'])) ?></td>
                </tr>
                
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=evaluates-list&id_sp=<?= $evaluate['id_sp'] ?>" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>