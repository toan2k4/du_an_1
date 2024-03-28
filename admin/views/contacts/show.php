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
                    <td><?= $contact['ten']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $contact['email']?></td>
                </tr>
                
                <tr>
                    <td>Nội dung</td>
                    <td><?= $contact['noi_dung']?></td>
                </tr>
                <tr>
                    <td>Ngày gửi</td>
                    <td><?= $contact['ngay_gui']?></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><?php
                            switch ($contact['trang_thai']) {
                                case '0':
                                    echo '<div class="badge badge-dark">Chưa liên hệ</div>';
                                    break;
                                case '1':
                                    echo '<div class="badge badge-success">Đã liên hệ</div>';
                                    break;
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN?>?act=contacts" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>