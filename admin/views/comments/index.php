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

        </div>
        <div class="card-body">
            <?php if (isset ($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success']?>
                </div>
                <?php unset($_SESSION['success'])?>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Tổng số bình luận</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($products as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['sp_ten'] ?>
                                </td>
                              
                                <td>
                                    <img src="<?= BASE_URL . $value['sp_anh'] ?>" width="100">
                                </td>

                                <td>
                                    <?= $value['sp_gia'] ?>
                                </td>
                                <td>
                                    <?= $value['bl_count'] ?>
                                </td>

                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=comments-list&id_sp=<?= $value['sp_id'] ?>"
                                        class="btn btn-info">Chi tiết</a>
                                   
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>