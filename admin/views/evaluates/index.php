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
        <div class="card-body">
            <?php if (isset ($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success'])?>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tài khoản</th>
                            <th>Nội dung</th>
                            <th>Sao đánh giá</th>
                            <th>Ngày đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($evaluates as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td> <?= $value['ho_va_ten']; ?> </td>
                                <td> <?= $value['noi_dung']; ?>  </td>
                                <td> <?php 
                                $a = $value['sao_dg'];
                                for($i = 0; $i < $a; $i++){
                                    echo '<i class="bi bi-star-fill text-warning"></i>';
                                }
                                 ?> </td>
                                <td> <?= date('d-m-Y', strtotime($value['ngay_dg'])) ?> </td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=evaluate-detail&id=<?= $value['dg_id'] ?>"
                                        class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <button onclick="goBack()" class="btn btn-info">Quay lại</button>
            </div>
        </div>
    </div>
</div>