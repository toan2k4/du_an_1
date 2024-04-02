<?php

function showMyAccount($id)
{
    $views = 'my-account';
    $order = showListOrderClient($id);
    $user = showOne('tb_tai_khoan', $id);
    if (!empty($_POST)) {
        $data = [
            'ho_va_ten' => $_POST['ho_va_ten'] ?? $user['ho_va_ten'],
            'dien_thoai_tk' => $_POST['dien_thoai_tk'] ?? $user['dien_thoai_tk'],
            'dia_chi' => $_POST['dia_chi'] ?? $user['dia_chi'],
            'ten_tk' => $_POST['ten_tk'] ?? $user['ten_tk'],
            'email_tk' => $_POST['email_tk'] ?? $user['email_tk'],
        ];

        $errors = validateUserUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('tb_tai_khoan', $id, $data);
            $_SESSION['success'] = "thao tác thành công!";

        }
        header("location: " . BASE_URL . "?act=my-account&id=" . $id);
        exit();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function registerAccount()
{
    $data = [
        'ho_va_ten' => $_POST['ho_va_ten'] ?? null,
        'ten_tk' => $_POST['ten_tk'] ?? null,
        'email_tk' => $_POST['email_tk'] ?? null,
        'mat_khau' => $_POST['mat_khau'] ?? null,
        'confirm_mk' => $_POST['confirm_mk'] ?? null,
    ];

    validateRegister($data);
    array_pop($data);
    // debug($data);
    insert('tb_tai_khoan', $data);
    $_SESSION['success'] = "Đăng ký thành công!";
    header('location: ' . BASE_URL . '?act=login');
    exit();
}

function validateRegister($data)
{
    $errors = [];
    if (empty($data['ho_va_ten'])) {
        $errors[] = "Vui lòng nhập tên của bạn!";
    }
    if (empty($data['ten_tk'])) {
        $errors[] = "Vui lòng nhập tên của bạn!";
    }

    if (empty($data['email_tk'])) {
        $errors[] = "Vui lòng nhập email của bạn!";
    } else if (!filter_var($data['email_tk'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email của bạn không hợp lệ!";
    } else if (!checkUniqueEmail('tb_tai_khoan', $data['email_tk'])) {
        $errors[] = "Trường email đã được sử dụng";
    }

    if (empty($data['mat_khau'])) {
        $errors[] = "Vui lòng nhập mật khẩu của bạn!";
    }

    if (empty($data['confirm_mk'])) {
        $errors[] = "Vui lòng nhập lại mật khẩu của bạn!";
    } else if ($data['confirm_mk'] != $data['mat_khau']) {
        $errors[] = "Mật khẩu không khớp!";
    }

    // debug($errors);
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        header('location: ' . BASE_URL . '?act=login');
        exit();
    }


}

function validateUserUpdate($id, $data)
{
    $errors = [];

    if (empty($data['ho_va_ten'])) {
        $errors[] = "Trường họ và tên là bắt buộc";
    } else if (strlen($data['ho_va_ten']) > 50) {
        $errors[] = "Trường họ và tên nhỏ hơn 50 ký tự";
    }

    if (empty($data['dia_chi'])) {
        $errors[] = "Trường địa chỉ là bắt buộc";
    } else if (strlen($data['dia_chi']) > 50) {
        $errors[] = "Trường địa chỉ nhỏ hơn 50 ký tự";
    }

    if (empty($data['dien_thoai_tk'])) {
        $errors[] = "Trường số điện thoại là bắt buộc";
    } else if (strlen($data['dien_thoai_tk']) > 11) {
        $errors[] = "Trường số điện thoại phải đủ 10 số";
    }

    if (empty($data['ten_tk'])) {
        $errors[] = "Trường tên tài khoản là bắt buộc";
    } else if (strlen($data['ten_tk']) > 50) {
        $errors[] = "Trường tên tài khoản nhỏ hơn 50 ký tự";
    }

    if (empty($data['email_tk'])) {
        $errors[] = "Trường email là bắt buộc";
    } else if (!filter_var($data['email_tk'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email không hợp lệ";
    } else if (!checkUniqueEmailForUpdate('tb_tai_khoan', $id, $data['email_tk'])) {
        $errors[] = "Trường email đã được sử dụng";
    }



    return $errors;
}

function showMyOrder($id)
{
    $views = 'su_account/show_order';
    $order = showListOrderClient($id);
    $order_detail = showOneOrder($id);
    $order_product = showProductOrder('tb_chi_tiet_don_hang', $id);
    require_once PATH_VIEW . 'layouts/master.php';
}

function changeOrder($id)
{
    $views = 'my-account';
    update('tb_don_hang', $id, [
        'id_trang_thai' => 7
    ]);
    header("location: " . BASE_URL . "?act=my-account&id=" . $_SESSION['user']['id']);
}




