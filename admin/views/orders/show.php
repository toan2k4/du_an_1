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
                        <th colspan="2">Thông tin khách hàng</th>
                    </tr>
                </thead>
                <tr>
                    <td>Tên tài khoản</td>
                    <td>
                        <?= $order['ho_va_ten'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?= $order['email_tk'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <?= $order['so_dien_thoai'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Thời gian đặt</td>
                    <td>
                        <?= $order['thoi_gian'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <?= $order['dia_chi'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Hình thức thanh toán</td>
                    <td>
                        <?php 
                        switch ($order['thanh_toan']) {
                            case '1':
                                echo 'Thanh toán khi nhận hàng';
                                break;
                            case '2':
                                echo 'Thanh toán online';
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái đơn hàng</td>
                    <td>
                        <?php
                        switch ($order['ten_trang_thai']) {
                            case 'Chờ xác nhận':
                                echo '<div class="badge badge-secondary">Chờ xác nhận</div>';
                                break;
                            case 'Đã xác nhận':
                                echo '<div class="badge badge-success">Đã xác nhận</div>';
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
                                echo '<div class="badge badge-info">' . $order['ten_trang_thai'] . '</div>';
                                break;
                        }
                        ?>
                    </td>
                </tr>
            </table> <br><br>


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="8">Danh sách sản phẩm</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Màu</th>
                            <th>Kích thước</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($order_pro as $key => $value): ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value['ten_sp'] ?>
                                </td>
                                <td>
                                    <img src="<?= BASE_URL . $value['hinh_sp'] ?>" width="100">
                                </td>
                                <td>
                                    <?= $value['so_luong'] ?>
                                </td>
                                <td>
                                    <?= $value['mau'] ?>
                                </td>
                                <td>
                                    <?= $value['size'] ?>
                                </td>
                                <td>
                                    <?= $value['thanh_tien'] ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=product-detail&id=<?= $value['id_sp'] ?>"
                                        class="btn btn-info mb-2">Chi tiết</a>
                                </td>
                            </tr>
                            <?php
                            $total += $value['thanh_tien'];
                        endforeach;
                        ?>
                        <tr>
                            <td colspan="6" class="text-center fw-bold fs-5 text">Tổng tiền</td>
                            <td colspan="2" class="text-start text-danger fw-bold fs-5 text">
                                <?= $total ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <a href="<?= BASE_URL_ADMIN ?>?act=orders" type="submit" class="btn btn-warning">Quay lại </a>
        </div>
    </div>
</div>