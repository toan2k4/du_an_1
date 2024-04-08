<?php

function orderListAll()
{
    $title = "Bảng danh sách đơn hàng ";
    $view = 'orders/index';
    $script = 'datatable';
    $script2 = 'orders/script';
    $style = 'datatable';
    $orders = showListOrder();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function orderShowOne($id)
{
    $title = "Bảng chi tiết đơn hàng ";
    $view = 'orders/show';
    $style = 'datatable';
    $order = showOneOrder($id);
    $order_pro = showProductOrder('tb_chi_tiet_don_hang', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function orderShowOneProduct($id)
{
    $title = "Bảng chi tiết sản phẩm đơn hàng ";
    $view = 'orders/showpro';
    $style = 'datatable';
    $order_pro_detail = showOneProduct('tb_san_pham', $id);
    $order_pro_img = listImage('tb_hinh_anh', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function validateorder($data, $trang_thai)
{
    $errors = [];
    $id_trang_thai = array_column(listAll('tb_trangthai_dh'), 'id');
    if (empty($data['id_trang_thai'])) {
        $errors[] = "Trường trạng thái đơn hàng là bắt buộc";
    } else if (!in_array($data['id_trang_thai'], $id_trang_thai)) {
        $errors[] = "Trường trạng thái đơn hàng không hợp lệ";
    }

    if($trang_thai == 'Đã xác nhận'){
        if ($data['id_trang_thai'] == 1) {
            $errors[] = "Đã xác nhận không chuyển trạng thái về trước đc";
        }
    }else if($trang_thai == 'Đang xử lý'){
        if ($data['id_trang_thai'] < 4) {
            $errors[] = "Đang xử lý không chuyển trạng thái về trước đc";
        }
    }else if ($trang_thai == 'Đang vận chuyển') {
        if ($data['id_trang_thai'] != 6) {
            $errors[] = "Đang vận chuyển không chuyển trạng thái trước được";
        }
    }else if($trang_thai == 'Đã giao'){
        if ($data['id_trang_thai'] < 6) {
            $errors[] = "Đã giao không chuyển đc trạng thái";
        }
    }

    // debug($errors);
    return $errors;
}

function orderUpdateStatus($id)
{
    $order = showOneOrder($id);
    $statusOrder = listAll('tb_trangthai_dh', false);
    if (empty($order)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            'id_trang_thai' => $_POST['id_trang_thai'] ?? $order['id_trang_thai'],
        ];

        $errors = validateorder($data, $order['ten_trang_thai']);

        // debug($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('tb_don_hang', $id, $data);
            $_SESSION['success'] = "Thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=order-update&id=$id");
        exit();

    }
    $title = "Sửa đơn hàng : " . $order['ho_va_ten'];
    $view = 'orders/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function orderDelete($id)
{
    delete2('tb_don_hang', $id);
    $check = checkOrderDetailByIdOrder($id);
    if (!empty($check)) {
        foreach ($check as $order) {
            delete2('tb_chi_tiet_don_hang', $order['id']);
        }
    }
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=orders");
    exit();
}
