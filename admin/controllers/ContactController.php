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
    } 

    if (empty ($data['noi_dung'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
    } 

    if (empty ($data['ngay_gui'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
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
            'trang_thai' => $_POST['trang_thai'] ?? $contact['trang_thai'],
        ];
// debug($data);
        $errors = validateUpdatecontact($data, $contact['trang_thai']);
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

function validateUpdatecontact( $data, $status)
{
    $errors = [];


    if($status == 1 && $data['trang_thai'] == 0){
        $errors[] = "Không đc cập nhật ngược lại";
    }

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
