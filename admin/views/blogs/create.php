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

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tiêu đề bài viết</label>
                    <input type="text" class="form-control" name="tieu_de" placeholder="Nhập Tiêu đề bài viết" value="<?= isset($_SESSION['data'])?$_SESSION['data']['tieu_de']:null ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh</label>
                    <input type="file" class="form-control" name="img_blog">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày đăng tải</label>
                    <input type="date" class="form-control" name="time_blog"
                    value="<?= isset($_SESSION['data'])?$_SESSION['data']['time_blog']:null ?>"
                    placeholder="Nhập mật khẩu">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nội dung</label>
                    <textarea name="nd_blog" id="blog" cols="30" rows="10"><?= isset($_SESSION['data'])?$_SESSION['data']['nd_blog']:null ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Trích đoạn nổi bật</label>
                    <textarea name="focus" id="blog" cols="20" rows="10"><?= isset($_SESSION['data'])?$_SESSION['data']['focus']:null ?></textarea>
                </div>
                <input type="submit" name="gui" class="btn btn-success" value="Thêm">
                <a href="<?= BASE_URL_ADMIN ?>?act=blogs" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['data'])) unset($_SESSION['data']) ?>