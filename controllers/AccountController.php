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
            'mat_khau' => $_POST['mat_khau'] ?? $user['mat_khau'],
            'dia_chi' => $_POST['dia_chi'] ?? $user['dia_chi'],
            'anh_tk' => $_FILES['anh_tk']['size'] > 0 ? $_FILES['anh_tk'] : $user['anh_tk'],
            'ten_tk' => $_POST['ten_tk'] ?? $user['ten_tk'],
            'email_tk' => $_POST['email_tk'] ?? $user['email_tk'],
        ];

        $errors = validateUserUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            $avata = $data['anh_tk'];
            if (!empty($avata) && is_array($avata) && $avata['size'] > 0) {

                $data['anh_tk'] = upload_file($avata, 'uploads/accounts/');

                if (
                    !empty($avata)           // có upload
                    && !empty($user['anh_tk']) // có giá trị
                    && !empty($data['anh_tk']) // upload file thành công
                    && file_exists(PATH_UPLOAD . $user['anh_tk'])
                ) { // có tồn tại file cũ
                    unlink(PATH_UPLOAD . $user['anh_tk']);
                }
            }
            update('tb_tai_khoan', $id, $data);
            $_SESSION['user'] = showOne('tb_tai_khoan', $id);
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
    if (empty($data['ten_tk'])) {
        $errors[] = "Trường tên tài khoản là bắt buộc";
    } else if (strlen($data['ten_tk']) > 50) {
        $errors[] = "Trường tên tài khoản nhỏ hơn 50 ký tự";
    }

    if (empty($data['ho_va_ten'])) {
        $errors[] = "Trường họ và tên là bắt buộc";
    } else if (strlen($data['ho_va_ten']) > 50) {
        $errors[] = "Trường họ và tên nhỏ hơn 50 ký tự";
    }

    if (empty($data['mat_khau'])) {
        $errors[] = "Trường mật khẩu là bắt buộc";
    } else if (strlen($data['mat_khau']) > 50) {
        $errors[] = "Trường mật khẩu nhỏ hơn 50 ký tự";
    }

    if (empty($data['dia_chi'])) {
        $errors[] = "Trường địa chỉ là bắt buộc";
    } else if (strlen($data['dia_chi']) > 50) {
        $errors[] = "Trường địa chỉ nhỏ hơn 50 ký tự";
    }

    if (empty($data['dien_thoai_tk'])) {
        $errors[] = "Trường số điện thoại là bắt buộc";
    } else if (strlen($data['dien_thoai_tk']) > 10) {
        $errors[] = "Trường số điện thoại nhỏ hơn 10 ký tự";
    }

    if (empty($data['email_tk'])) {
        $errors[] = "Trường email là bắt buộc";
    } else if (!filter_var($data['email_tk'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email không hợp lệ";
    } else if (!checkUniqueEmailForUpdate('tb_tai_khoan', $id, $data['email_tk'])) {
        $errors[] = "Trường email đã được sử dụng";
    }


    $typeImage = ['image/jpg', 'image/png', 'image/jpeg'];
    if ($data['anh_tk'] && is_array($data['anh_tk']) && $data['anh_tk']['size'] > 0) {
        if (empty($data['anh_tk'])) {
            $errors[] = "Trường ảnh là bắt buộc";
        } else if ($data['anh_tk']['size'] > 2 * 1024 * 1024) {
            $errors[] = "file ảnh nhỏ hơn 2mb";
        } else if (!in_array($data['anh_tk']['type'], $typeImage)) {
            $errors[] = "file ảnh không đúng đinh danh jpg, png, jpeg";
        }
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



function showForgotPassword()
{
    $views = 'forgot-password';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $sendMailMess = sendMail($email);
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function changeOrderFinal($id)
{
    $views = 'su_account/show_order';
    update('tb_don_hang', $id, [
        'id_trang_thai' => 6
    ]);
    header("location: " . BASE_URL . "?act=my-order&id=" . $id);
}



