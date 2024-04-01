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
                    <td>Tiêu đề bài viết</td>
                    <td><?= $blog['tieu_de']?></td>
                </tr>
                
                <tr>
                    <td>Ảnh bài viết</td>
                    <td><img src="<?= BASE_URL . $blog['img_blog']?>" width="100"></td>
                </tr>
                <tr>
                    <td>Thời gian đăng tải</td>
                    <td><?= $blog['time_blog']?></td>
                </tr>
                <tr>
                    <td>Nội dung bài viết</td>
                    <td><?= $blog['nd_blog']?></td>
                </tr>
                <tr>
                    <td>Trích đoạn nổi bật bài viết</td>
                    <td><?= $blog['focus']?></td>
                </tr>
                <tr>
                    <td>Lượt xem</td>
                    <td><?= $blog['luot_xem']?></td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=blogs" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>