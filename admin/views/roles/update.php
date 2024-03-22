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
            <?php if (isset ($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success']?>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
            <?php if (isset ($_SESSION['errors'])): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <li>
                                <?= $error ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php unset($_SESSION['errors']) ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên phân quyền</label>
                    <input type="text" class="form-control" name="ten_chuc_vu" value="<?= $role['ten_chuc_vu'] ?>"
                        placeholder="Nhập tên phân quyền">
                </div>

                <input type="submit" name="gui" class="btn btn-success" value="Cập nhật">
                <a href="<?= BASE_URL_ADMIN ?>?act=roles" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
        </div>
    </div>
</div>