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
            <?php if (isset($_SESSION['success'])): ?>
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
                            <th>Tên tài khoản </th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ngày đặt hàng </th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($orders as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['ho_va_ten'] ?>
                                </td>
                                <td>
                                    <?= $value['dien_thoai_tk'] ?>
                                </td>
                                <td>
                                    <?= $value['email_tk'] ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($value['thoi_gian'])) ?>
                                </td>

                                <td>
                                    <?php
                                    switch ($value['ten_trang_thai']) {
                                        case 'Chờ xác nhận':
                                            echo '<div class="badge badge-secondary">Chờ xác nhận</div>';
                                            break;
                                        case 'Đã xác nhận':
                                            echo '<div class="badge badge-dark">Đã xác nhận</div>';
                                            break;
                                        case 'Đang xử lý':
                                            echo '<div class="badge badge-warning">Đang xử lý</div>';
                                            break;
                                        case 'Đang vận chuyển':
                                            echo '<div class="badge badge-primary">Đang vận chuyển</div>';
                                            break;
                                        case 'Đã giao':
                                            echo '<div class="badge badge-success">Đã giao</div>';
                                            break;  
                                        case 'Đã hủy':
                                            echo '<div class="badge badge-danger">Đã hủy</div>';
                                            break;
                                        default:
                                            echo '<div class="badge badge-info">' . $value['ten_trang_thai'] . '</div>';
                                            break;
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=order-detail&id=<?= $value['dh_id'] ?>"
                                        class="btn btn-info mb-2">Chi tiết</a>
                                    <?php if ($value['ten_trang_thai'] != 'Đã giao'): ?>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=order-update&id=<?= $value['dh_id'] ?>"
                                        class="btn btn-warning mb-2">Sửa trạng thái</a>
                                    <?php endif; ?>
                                    
                                    <?php if ($value['ten_trang_thai'] == 'Đã hủy'): ?>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=order-delete&id=<?= $value['dh_id'] ?>"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                            class="btn btn-danger mb-2">Xóa</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>