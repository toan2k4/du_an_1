<?php

function roleListAll()
{
    $title = "Bảng danh sách chức vụ";
    $view = 'roles/index';
    $script = 'datatable';
    $script2 = 'roles/script';
    $style = 'datatable';
    $roles = listAll('tb_phan_quyen', false);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function roleShowOne($id)
{
    $title = "Bảng chi tiết phân quyền";
    $view = 'roles/show';
    $style = 'datatable';
    $role = showOne('tb_phan_quyen', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function roleCreate()
{
    $title = "Bảng thêm phân quyền";
    $view = 'roles/create';

    if (!empty ($_POST)) {
        $data = [
            'ten_chuc_vu' => ucfirst($_POST['ten_chuc_vu']) ?? null,
        ];

        $errors = validateRole($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: " . BASE_URL_ADMIN . "?act=role-create");
            exit();
        }

        insert('tb_phan_quyen', $data);
        $_SESSION['success'] = "Thao tác thành công";
        header("location: " . BASE_URL_ADMIN . "?act=roles");
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateRole($data)
{
    $errors = [];
    if (empty ($data['ten_chuc_vu'])) {
        $errors[] = "Trường tên phân quyền là bắt buộc";
    } else if (strlen($data['ten_chuc_vu']) > 20) {
        $errors[] = "Trường tên chức vụ nhỏ hơn 20 ký tự";
    }

    return $errors;
}

function roleUpdate($id)
{
    $role = showOne('tb_phan_quyen', $id);
    if(empty($role)){
        e404();
    }
    if (!empty ($_POST)) {

        $data = [
            'ten_chuc_vu' => ucfirst($_POST['ten_chuc_vu']) ?? $role['ten_chuc_vu'],
        ];

        $errors = validateRole($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            update('tb_phan_quyen', $id, $data);
            $_SESSION['success'] = "Thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=role-update&id=$id");
        exit();

    }
    $title = "Sửa phân quyền: " . $role['ten_chuc_vu'];
    $view = 'roles/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function roleDelete($id)
{

    $check = checkUserByIdRole($id);
    if(!empty($check)){
        foreach($check as $user){
            update('tb_tai_khoan', $user['id'], ["id_chuc_vu" => 0]);
            // debug($pro['id']);
        }
    }
    delete2('tb_phan_quyen', $id);
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=roles");
    exit();
}
