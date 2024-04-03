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
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['errors'])): ?>
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
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" class="form-control" readonly value="<?= $order['ho_va_ten'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" readonly value="<?= $order['so_dien_thoai'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" readonly value="<?= $order['email_tk'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Thời gian</label>
                    <input type="text" class="form-control" readonly value="<?= $order['thoi_gian'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tổng tiền</label>
                    <input type="text" class="form-control" readonly value="<?= $order['tong_tien'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phương thức thanh toán</label>
                    <input type="text" class="form-control" readonly value="<?php 
                        switch ($order['thanh_toan']) {
                            case '0':
                                echo 'Thanh toán tiền mặt';
                                break;
                            case '1':
                                echo 'Thanh toán MOMO';
                                break;
                            
                        } ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Trạng thái thanh toán</label>
                    <select name="id_trang_thai" id="" class="form-control">
                        <?php foreach ($statusOrder as $status): ?>
                            
                            <option value="<?= $status['id'] ?>" 
                            <?= $order['id_trang_thai'] == $status['id'] ? 'selected' : null ?>
                            <?= $order['ten_trang_thai'] != 'Chờ xác nhận' &&  $status['trang_thai'] == 'Đã hủy'? 'hidden' : null ?> 
                            >
                                    <?= $status['trang_thai'] ?>
                                </option>   
                        <?php endforeach; ?>
                    </select>
                </div>


                <input type="submit" class="btn btn-success" value="Cập nhật">
                <a href="<?= BASE_URL_ADMIN ?>?act=orders" type="submit" class="btn btn-warning">Quay lại </a>
            </form>
        </div>
    </div>
</div>