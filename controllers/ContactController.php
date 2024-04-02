<?php

function showContact()
{
    $views = 'contact';
    if (!empty($_POST)) {
        postContact();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function postContact()
{
    $data = [
        'ten' => $_POST['ten'] ?? null,
        'email' => $_POST['email'] ?? null,
        'noi_dung' => $_POST['noi_dung'] ?? null,
        'ngay_gui' => date('Y-m-d')
    ];

    validateContact($data);

    insert('tb_lien_he', $data);
    $_SESSION['success'] = "Bạn đã gửi liên hệ cho chúng tôi thành công!";
    header('location: ' . BASE_URL . '?act=contact');
    exit();
}

function validateContact($data)
{
    $errors = [];
    if (empty($data['ten'])) {
        $errors[] = "Vui lòng nhập tên của bạn!";
    }

    if (empty($data['email'])) {
        $errors[] = "Vui lòng nhập email của bạn!";
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email của bạn không hợp lệ!";
    }

    if (empty($data['noi_dung'])) {
        $errors[] = "Vui lòng nhập nội dung liên hệ của bạn!";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        header('location: ' . BASE_URL . '?act=contact');
        exit();
    }

}