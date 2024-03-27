<?php

function orderListAll()
{
    $title = "Bảng danh sách đơn hàng ";
    $view = 'orders/index';
    $script = 'datatable';
    $script2 = 'orders/script';
    $style = 'datatable';
    $orders = showListOrder('tb_don_hang');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function orderShowOne($id)
{
    $title = "Bảng chi tiết đơn hàng ";
    $view = 'orders/show';
    $style = 'datatable';
    $order = showOneOrder('tb_don_hang', $id);
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


function orderCreate()
{
    $title = "Bảng thêm đơn hàng ";
    $view = 'orders/create';

    if (!empty ($_POST)) {
        $data = [
            'ten_km' => $_POST['ten_km'] ?? null,
            'nd_km' => $_POST['nd_km'] ?? null,
            'gia_km' => $_POST['gia_km'] ?? null,
            'so_luong' => $_POST['so_luong'] ?? null,
            'ngay_batdau' => $_POST['ngay_batdau'] ?? null,
            'ngay_ketthuc' => $_POST['ngay_ketthuc'] ?? null,
            'trang_thai' => null,
        ];

        $errors = validateorder($data);
        if ($data['ngay_batdau'] < date('Y-m-d') && date('Y-m-d') < $data['ngay_ketthuc']) {
            $data['trang_thai'] = 1;

        } else {
            $data['trang_thai'] = 0;
        }

        if ($data['so_luong'] - 0 == 0) {
            $data['trang_thai'] = 0;
        }
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("location: " . BASE_URL_ADMIN . "?act=order-create");
            exit();
        }
        // debug($data);
        insert('tb_don_hang', $data);
        $_SESSION['success'] = "thao tác thành công";
        header("location: " . BASE_URL_ADMIN . "?act=orders");
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateorder($data)
{
    $errors = [];
    if (empty ($data['ten_km'])) {
        $errors[] = "Trường tên đơn hàng  là bắt buộc";
    } else if (strlen($data['ten_km']) > 20) {
        $errors[] = "Trường tên chức vụ nhỏ hơn 20 ký tự";
    }

    if (empty ($data['nd_km'])) {
        $errors[] = "Trường nội dung đơn hàng  là bắt buộc";
    } else if (strlen($data['nd_km']) > 200) {
        $errors[] = "Trường đơn hàng  nhỏ hơn 200 ký tự";
    }

    if (empty ($data['gia_km'])) {
        $errors[] = "Trường giá đơn hàng  là bắt buộc";
    } else if (is_int($data['gia_km'])) {
        $errors[] = "Trường giá đơn hàng  không phải là số";
    } else if ($data['gia_km'] < 0) {
        $errors[] = "Trường giá đơn hàng  > 0";
    }

    if (empty($data['so_luong'])) {
        $errors[] = "Trường số lượng là bắt buộc";
    } else if (is_int($data['so_luong'])) {
        $errors[] = "Trường số lượng không phải là số";
    } else if ($data['so_luong'] < 0) {
        $errors[] = "Trường số lượng > 0";
    }

    if (empty ($data['ngay_batdau'])) {
        $errors[] = "Trường ngày bắt đầu là bắt buộc";
    } else if (!strtotime($data['ngay_batdau'])) {
        $errors[] = "Trường ngày bắt đầu không hợp lệ";
    }

    if (empty ($data['ngay_ketthuc'])) {
        $errors[] = "Trường ngày kết thúc là bắt buộc";
    } else if (!strtotime($data['ngay_ketthuc'])) {
        $errors[] = "Trường ngày kết thúc không hợp lệ";
    } else if (strtotime($data['ngay_batdau']) >= strtotime($data['ngay_ketthuc'])) {
        $errors[] = "Trường ngày kết thúc phải lớn hơn ngày bắt đầu";
    }



    return $errors;
}

function orderUpdate($id)
{
    $order = showOne('tb_don_hang', $id);
    if (empty ($order)) {
        e404();
    }
    if (!empty ($_POST)) {

        $data = [
            'ten_km' => $_POST['ten_km'] ?? $order['ten_km'],
            'nd_km' => $_POST['nd_km'] ?? $order['nd_km'],
            'gia_km' => $_POST['gia_km'] ?? $order['gia_km'],
            'so_luong' => $_POST['so_luong'] ?? $order['so_luong'],
            'ngay_batdau' => $_POST['ngay_batdau'] ?? $order['ngay_batdau'],
            'ngay_ketthuc' => $_POST['ngay_ketthuc'] ?? $order['ngay_ketthuc'],
            'trang_thai' => $order['trang_thai'],
        ];

        $errors = validateorder($data);
        if ($data['ngay_batdau'] < date('Y-m-d') && date('Y-m-d') < $data['ngay_ketthuc']) {
            $data['trang_thai'] = 1;

        } else {
            $data['trang_thai'] = 0;
        }

        if ($data['so_luong'] - 0 == 0) {
            $data['trang_thai'] = 0;
        }
        // debug($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('tb_don_hang', $id, $data);
            $_SESSION['success'] = "thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=order-update&id=$id");
        exit();

    }
    $title = "Sửa đơn hàng : " . $order['ten_km'];
    $view = 'orders/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function orderDelete($id)
{
    delete2('tb_don_hang', $id);
    $_SESSION['success'] = "thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=orders");
    exit();
}
