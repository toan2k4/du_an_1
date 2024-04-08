<?php

function userListAll()
{
    $title = "Bảng danh sách tài khoản";
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';
    $users = listAllUsers();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userShowOne($id)
{
    $title = "Bảng chi tiết phân quyền";
    $view = 'users/show';
    $style = 'datatable';
    $user = showOneUser('tb_tai_khoan', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = "Form thêm tài khoản";
    $view = 'users/create';
    $roles = listAll('tb_phan_quyen', false);
    if (!empty ($_POST)) {
        $data = [
            'ten_tk' => $_POST['ten_tk'] ?? null,
            'ho_va_ten' => $_POST['ho_va_ten'] ?? null,
            'mat_khau' => $_POST['mat_khau'] ?? null,
            'email_tk' => $_POST['email_tk'] ?? null,
            'dien_thoai_tk' => $_POST['dien_thoai_tk'] ?? null,
            'anh_tk' => $_FILES['anh_tk']['size'] > 0 ? $_FILES['anh_tk'] : null,
            'dia_chi' => $_POST['dia_chi'] ?? null,
            'id_chuc_vu' => $_POST['id_chuc_vu'] ?? null,
            'gioi_tinh' => $_POST['gioi_tinh'] ?? null,
        ];

        $errors = validateUser($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("location: " . BASE_URL_ADMIN . "?act=user-create");
            exit();
        }

        $avata = $data['anh_tk'];
        if (!empty ($avata) && $avata['size'] > 0) {
            $data['anh_tk'] = upload_file($avata, 'uploads/accounts/');
        }

        insert('tb_tai_khoan', $data);
        $_SESSION['success'] = "Thao tác thành công!";

        header("location: " . BASE_URL_ADMIN . "?act=users");
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUser($data)
{
    $errors = [];
    if (empty ($data['ten_tk'])) {
        $errors[] = "Trường tên tài khoản là bắt buộc";
    } else if (strlen($data['ten_tk']) > 50) {
        $errors[] = "Trường tên tài khoản nhỏ hơn 50 ký tự";
    }

    if (empty ($data['ho_va_ten'])) {
        $errors[] = "Trường họ và tên là bắt buộc";
    } else if (strlen($data['ho_va_ten']) > 50) {
        $errors[] = "Trường họ và tên nhỏ hơn 50 ký tự";
    }

    if (empty ($data['mat_khau'])) {
        $errors[] = "Trường mật khẩu là bắt buộc";
    } else if (strlen($data['mat_khau']) > 50) {
        $errors[] = "Trường mật khẩu nhỏ hơn 50 ký tự";
    }

    if (empty ($data['dia_chi'])) {
        $errors[] = "Trường địa chỉ là bắt buộc";
    } else if (strlen($data['dia_chi']) > 50) {
        $errors[] = "Trường địa chỉ nhỏ hơn 50 ký tự";
    }

    if (empty ($data['dien_thoai_tk'])) {
        $errors[] = "Trường số điện thoại là bắt buộc";
    } else if (strlen($data['dien_thoai_tk']) > 10) {
        $errors[] = "Trường số điện thoại nhỏ hơn 10 ký tự";
    }

    if (empty ($data['email_tk'])) {
        $errors[] = "Trường email là bắt buộc";
    } else if (!filter_var($data['email_tk'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email không hợp lệ";
    } else if (!checkUniqueEmail('tb_tai_khoan', $data['email_tk'])) {
        $errors[] = "Trường email đã được sử dụng";
    }


    $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
    if ($data['anh_tk'] && $data['anh_tk']['size'] > 0) {
        if ($data['anh_tk']['size'] > 2 * 1024 * 1024) {
            $errors[] = "file ảnh nhỏ hơn 2mb";
        } else if (!in_array($data['anh_tk']['type'], $typeImage)) {
            $errors[] = "file ảnh không đúng đinh danh jpg, png, jpeg";
        }

    } else {
        $errors[] = "Trường ảnh là bắt buộc";
    }


    if (empty ($data['id_chuc_vu'])) {
        $errors[] = "Trường chức vụ là bắt buộc";
    } else if (!is_numeric($data['id_chuc_vu'])) {
        $errors[] = "trường chức vụ không hợp lệ";
    }

    if (empty ($data['gioi_tinh'])) {
        $errors[] = "Trường giới tính là bắt buộc";
    } else if (!in_array($data['gioi_tinh'], ['nam', 'nữ'])) {
        $errors[] = "trường giới tính không hợp lệ";
    }
    return $errors;
}



function userUpdate($id)
{
    $user = showOne('tb_tai_khoan', $id);
    if (empty ($user)) {
        e404();
    }
    $title = "Form cập nhật tài khoản: " . $user['ten_tk'];
    $view = 'users/update';
    $roles = listAll('tb_phan_quyen');
    if (!empty ($_POST)) {
        $data = [
            'ten_tk' => $_POST['ten_tk'] ?? $user['ten_tk'],
            'ho_va_ten' => $_POST['ho_va_ten'] ?? $user['ho_va_ten'],
            'mat_khau' => $_POST['mat_khau'] ?? $user['mat_khau'],
            'anh_tk' => $_FILES['anh_tk']['size'] > 0 ? $_FILES['anh_tk'] : $user['anh_tk'],
            'email_tk' => $_POST['email_tk'] ?? $user['email_tk'],
            'dien_thoai_tk' => $_POST['dien_thoai_tk'] ?? $user['dien_thoai_tk'],
            'dia_chi' => $_POST['dia_chi'] ?? $user['dia_chi'],
            'id_chuc_vu' => $_POST['id_chuc_vu'] ?? $user['id_chuc_vu'],
            'gioi_tinh' => $_POST['gioi_tinh'] ?? $user['gioi_tinh'],
        ];

        $errors = validateUserUpdate($id, $data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            $avata = $data['anh_tk'];
            if (!empty ($avata) && is_array($avata) && $avata['size'] > 0) {

                $data['anh_tk'] = upload_file($avata, 'uploads/accounts/');

                if (
                    !empty ($avata)           // có upload
                    && !empty ($user['anh_tk']) // có giá trị
                    && !empty ($data['anh_tk']) // upload file thành công
                    && file_exists(PATH_UPLOAD . $user['anh_tk'])
                ) { // có tồn tại file cũ
                    unlink(PATH_UPLOAD . $user['anh_tk']);
                }
            }

            update('tb_tai_khoan', $id, $data);
            $_SESSION['success'] = "Thao tác thành công!";

        }
        header("location: " . BASE_URL_ADMIN . "?act=user-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUserUpdate($id, $data)
{
    $errors = [];
    if (empty ($data['ten_tk'])) {
        $errors[] = "Trường tên tài khoản là bắt buộc";
    } else if (strlen($data['ten_tk']) > 50) {
        $errors[] = "Trường tên tài khoản nhỏ hơn 50 ký tự";
    }

    if (empty ($data['ho_va_ten'])) {
        $errors[] = "Trường họ và tên là bắt buộc";
    } else if (strlen($data['ho_va_ten']) > 50) {
        $errors[] = "Trường họ và tên nhỏ hơn 50 ký tự";
    }

    if (empty ($data['mat_khau'])) {
        $errors[] = "Trường mật khẩu là bắt buộc";
    } else if (strlen($data['mat_khau']) > 50) {
        $errors[] = "Trường mật khẩu nhỏ hơn 50 ký tự";
    }

    if (empty ($data['dia_chi'])) {
        $errors[] = "Trường địa chỉ là bắt buộc";
    } else if (strlen($data['dia_chi']) > 50) {
        $errors[] = "Trường địa chỉ nhỏ hơn 50 ký tự";
    }

    if (empty ($data['dien_thoai_tk'])) {
        $errors[] = "Trường số điện thoại là bắt buộc";
    } else if (strlen($data['dien_thoai_tk']) > 10) {
        $errors[] = "Trường số điện thoại nhỏ hơn 10 ký tự";
    }

    if (empty ($data['email_tk'])) {
        $errors[] = "Trường email là bắt buộc";
    } else if (!filter_var($data['email_tk'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Trường email không hợp lệ";
    } else if (!checkUniqueEmailForUpdate('tb_tai_khoan', $id, $data['email_tk'])) {
        $errors[] = "Trường email đã được sử dụng";
    }


    $typeImage = ['image/jpg', 'image/png', 'image/jpeg'];
    if ($data['anh_tk'] && is_array($data['anh_tk']) && $data['anh_tk']['size'] > 0) {
        if (empty ($data['anh_tk'])) {
            $errors[] = "Trường ảnh là bắt buộc";
        } else if ($data['anh_tk']['size'] > 2 * 1024 * 1024) {
            $errors[] = "file ảnh nhỏ hơn 2mb";
        } else if (!in_array($data['anh_tk']['type'], $typeImage)) {
            $errors[] = "file ảnh không đúng đinh danh jpg, png, jpeg";
        }

    }


    if (empty ($data['id_chuc_vu'])) {
        $errors[] = "Trường chức vụ là bắt buộc";
    } else if (!is_numeric($data['id_chuc_vu'])) {
        $errors[] = "trường chức vụ không hợp lệ";
    }

    if (empty ($data['gioi_tinh'])) {
        $errors[] = "Trường giới tính là bắt buộc";
    } else if (!in_array($data['gioi_tinh'], ['nam', 'nữ'])) {
        $errors[] = "trường giới tính không hợp lệ";
    }
    return $errors;
}

function userDelete($id)
{
    $user = showOne('tb_tai_khoan', $id);
    if (empty ($user)) {
        e404();
    }
    delete2('tb_tai_khoan', $id);
    if (!empty ($user['anh_tk']) && file_exists(PATH_UPLOAD . $user['anh_tk'])) { // có tồn tại file cũ
        unlink(PATH_UPLOAD . $user['anh_tk']);
    }
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=users");
    exit();
}
