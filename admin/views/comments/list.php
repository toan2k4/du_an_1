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
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên người bình luận</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($comments as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['tk_ten'] ?>
                                </td>

                                <td>
                                    <?= $value['bl_nd'] ?>
                                </td>

                                <td>
                                    <?= $value['bl_ngaybl'] ?>
                                </td>


                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=comment-update&id=<?= $value['bl_id'] ?>"
                                        class="btn btn-warning">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=comment-delete&id=<?= $value['bl_id'] ?>"
                                        class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">Xóa</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <button  onclick="goBack()" class="btn btn-info">Quay lại</button>
            </div>
        </div>
    </div>
</div>