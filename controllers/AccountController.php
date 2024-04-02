<?php 

function showMyAccount(){
    $views = 'my-account';
    require_once PATH_VIEW . 'layouts/master.php';
}

function registerAccount(){
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
    }else if($data['confirm_mk'] != $data['mat_khau']){
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