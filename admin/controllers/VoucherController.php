<?php

function voucherListAll()
{
    $title = "Bảng danh sách khuyến mại";
    $view = 'vouchers/index';
    $script = 'datatable';
    $script2 = 'vouchers/script';
    $style = 'datatable';
    $vouchers = listAll('tb_khuyen_mai');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function voucherShowOne($id)
{
    $title = "Bảng chi tiết khuyến mại";
    $view = 'vouchers/show';
    $style = 'datatable';
    $voucher = showOne('tb_khuyen_mai', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function voucherCreate()
{
    $title = "Bảng thêm khuyến mại";
    $view = 'vouchers/create';

    if (!empty ($_POST)) {
        $data = [
            'ten_km' => $_POST['ten_km'] ?? null,
            'nd_km' => $_POST['nd_km'] ?? null,
            'code_km' => $_POST['code_km'] ?? null,
            'gia_km' => $_POST['gia_km'] ?? null,
            'so_luong' => $_POST['so_luong'] ?? null,
            'ngay_batdau' => $_POST['ngay_batdau'] ?? null,
            'ngay_ketthuc' => $_POST['ngay_ketthuc'] ?? null,
            'trang_thai' => null,
        ];

        $errors = validatevoucher($data);
        if ($data['ngay_batdau'] <= date('Y-m-d') && date('Y-m-d') <= $data['ngay_ketthuc']) {
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
            header("location: " . BASE_URL_ADMIN . "?act=voucher-create");
            exit();
        }
        // debug($data);
        insert('tb_khuyen_mai', $data);
        $_SESSION['success'] = "Thao tác thành công";
        header("location: " . BASE_URL_ADMIN . "?act=vouchers");
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatevoucher($data)
{
    $errors = [];
    if (empty ($data['ten_km'])) {
        $errors[] = "Trường tên khuyến mại là bắt buộc";
    } else if (strlen($data['ten_km']) > 20) {
        $errors[] = "Trường tên chức vụ nhỏ hơn 20 ký tự";
    }

    if (empty ($data['code_km'])) {
        $errors[] = "Trường code khuyến mại là bắt buộc";
    } else if (strlen($data['code_km']) > 20) {
        $errors[] = "Trường code khuyến mại nhỏ hơn 20 ký tự";
    }

    if (empty ($data['nd_km'])) {
        $errors[] = "Trường nội dung khuyến mại là bắt buộc";
    } else if (strlen($data['nd_km']) > 200) {
        $errors[] = "Trường khuyến mại nhỏ hơn 200 ký tự";
    }

    if (empty ($data['gia_km'])) {
        $errors[] = "Trường giá khuyến mại là bắt buộc";
    } else if (is_int($data['gia_km'])) {
        $errors[] = "Trường giá khuyến mại không phải là số";
    } else if ($data['gia_km'] < 0) {
        $errors[] = "Trường giá khuyến mại > 0";
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

function voucherUpdate($id)
{
    $voucher = showOne('tb_khuyen_mai', $id);
    if (empty ($voucher)) {
        e404();
    }
    if (!empty ($_POST)) {

        $data = [
            'ten_km' => $_POST['ten_km'] ?? $voucher['ten_km'],
            'nd_km' => $_POST['nd_km'] ?? $voucher['nd_km'],
            'code_km' => $_POST['code_km'] ?? $voucher['code_km'],
            'gia_km' => $_POST['gia_km'] ?? $voucher['gia_km'],
            'so_luong' => $_POST['so_luong'] ?? $voucher['so_luong'],
            'ngay_batdau' => $_POST['ngay_batdau'] ?? $voucher['ngay_batdau'],
            'ngay_ketthuc' => $_POST['ngay_ketthuc'] ?? $voucher['ngay_ketthuc'],
            'trang_thai' => $voucher['trang_thai'],
        ];

        $errors = validatevoucher($data);
        if ($data['ngay_batdau'] <= date('Y-m-d') && date('Y-m-d') <= $data['ngay_ketthuc']) {
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
            update('tb_khuyen_mai', $id, $data);
            $_SESSION['success'] = "Thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=voucher-update&id=$id");
        exit();

    }
    $title = "Sửa khuyến mại: " . $voucher['ten_km'];
    $view = 'vouchers/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function voucherDelete($id)
{
    delete2('tb_khuyen_mai', $id);
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=vouchers");
    exit();
}
