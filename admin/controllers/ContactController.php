<?php

function contactListAll()
{
    $title = "Bảng danh sách liên hệ";
    $view = 'contacts/index';
    $script = 'datatable';
    $script2 = 'contacts/script';
    $style = 'datatable';
    $contacts = listAll('tb_lien_he');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function contactShowOne($id)
{
    $title = "Bảng chi tiết liên hệ";
    $view = 'contacts/show';
    $style = 'datatable';
    $contact = showOne('tb_lien_he', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function contactCreate()
{
    $title = "Form thêm liên hệ";
    $view = 'contacts/create';
    if (!empty ($_POST)) {
        $data = [
            'ten' => $_POST['ten'] ?? null,
            'email' => $_POST['email'] ?? null,
            'noi_dung' => $_POST['noi_dung'] ?? null,
            'ngay_gui' => $_POST['ngay_gui'] ?? null,
        ];

        $errors = validateContact($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("location: " . BASE_URL_ADMIN . "?act=contact-create");
            exit();
        }

        $avata = $data['img_contact'];
        if (!empty ($avata) && $avata['size'] > 0) {
            $data['img_contact'] = upload_file($avata, 'uploads/accounts/');
        }

        insert('tb_lien_he', $data);
        $_SESSION['success'] = "Thao tác thành công!";

        header("location: " . BASE_URL_ADMIN . "?act=contacts");
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateContact($data)
{
    $errors = [];
    if (empty ($data['ten'])) {
        $errors[] = "Trường Tiêu đề liên hệ là bắt buộc";
    } else if (strlen($data['ten']) > 50) {
        $errors[] = "Trường Tiêu đề liên hệ nhỏ hơn 50 ký tự";
    }

    if (empty ($data['email'])) {
        $errors[] = "Trường email là bắt buộc";
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email không hợp lệ";
    } else if (!checkUniqueEmailForUpdate('tb_tai_khoan', $id, $data['email'])) {
        $errors[] = "Trường email đã được sử dụng";
    }

    if (empty ($data['noi_dung'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
    } else if (!strtotime($data['noi_dung']) > 50) {
        $errors[] = "Trường Thời gian đăng tải nhỏ hơn 50 ký tự";
    }

    if (empty ($data['ngay_gui'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
    } else if (!strtotime($data['ngay_gui']) > 50) {
        $errors[] = "Trường Thời gian đăng tải nhỏ hơn 50 ký tự";
    }
    
    return $errors;
}


function contactUpdate($id)
{
    $contact = showOne('tb_lien_he', $id);
    if (empty ($contact)) {
        e404();
    }
    $title = "Form cập nhật liên hệ: " . $contact['ten'];
    $view = 'contacts/update';
    if (!empty ($_POST)) {
        $data = [
            'ten' => $_POST['ten'] ?? $contact['ten'],
            'email' => $_POST['email'] ?? $contact['email'],
            'noi_dung' => $_POST['noi_dung'] ?? $contact['noi_dung'],
            'ngay_gui' => $_POST['ngay_gui'] ?? $contact['ngay_gui'],
        ];

        $errors = validateUpdatecontact($id, $data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            
            update('tb_lien_he', $id, $data);
            $_SESSION['success'] = "Thao tác thành công!";

        }
        header("location: " . BASE_URL_ADMIN . "?act=contact-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUpdatecontact($id, $data)
{
    $errors = [];
    if (empty ($data['ten'])) {
        $errors[] = "Trường Tiêu đề liên hệ là bắt buộc";
    } else if (strlen($data['ten']) > 50) {
        $errors[] = "Trường Tiêu đề liên hệ nhỏ hơn 50 ký tự";
    }

    if (empty ($data['email'])) {
        $errors[] = "Trường Nội dung là bắt buộc";
    } else if (strlen($data['email']) > 550) {
        $errors[] = "Trường Nội dung nhỏ hơn 50 ký tự";
    }

    if (empty ($data['noi_dung'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
    } else if (!strtotime($data['noi_dung']) > 50) {
        $errors[] = "Trường Thời gian đăng tải nhỏ hơn 50 ký tự";
    }

    
    // $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
    // if ($data['img_contact'] && $data['img_contact']['size'] > 0) {
    //     if (empty ($data['img_contact'])) {
    //         $errors[] = "Trường ảnh là bắt buộc";
    //     } else if ($data['img_contact']['size'] > 2 * 1024 * 1024) {
    //         $errors[] = "file ảnh nhỏ hơn 2mb";
    //     } else if (!in_array($data['img_contact']['type'], $typeImage)) {
    //         $errors[] = "file ảnh không đúng đinh danh jpg, png, jpeg";
    //     }

    // }

    return $errors;
}

function contactDelete($id)
{
    $contact = showOne('tb_lien_he', $id);
    if (empty ($contact)) {
        e404();
    }
    delete2('tb_lien_he', $id);
    if ( !empty ($contact['img_contact']) && file_exists(PATH_UPLOAD . $contact['img_contact'])) { // có tồn tại file cũ
        unlink(PATH_UPLOAD . $contact['img_contact']);
    }
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=contacts");
    exit();
}
