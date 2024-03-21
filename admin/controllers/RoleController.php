<?php

function roleListAll()
{
    $title = "Bảng danh sách chức vụ";
    $view = 'roles/index';
    $script = 'datatable';
    $script2 = 'roles/script';
    $style = 'datatable';
    $roles = listAll('tb_phan_quyen');

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

    if(!empty($_POST)){
        $data = [
            'ten_chuc_vu' => $_POST['ten_chuc_vu'],
        ];
        insert('tb_phan_quyen', $data);
        header("location: " . BASE_URL_ADMIN . "?act=roles");
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function roleUpdate($id)
{
    if (!empty($_POST['gui'])) {
        
        $data = [
            'ten_chuc_vu' => $_POST['ten_chuc_vu'],
        ];

        update('tb_phan_quyen', $id, $data);
        
    }
    $role = showOne('tb_phan_quyen', $id);
    $title = "Sửa phân quyền: ".$role['ten_chuc_vu'] ;
    $view = 'roles/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function roleDelete($id)
{
    delete2('tb_phan_quyen', $id);
    header("location: " . BASE_URL_ADMIN . "?act=roles");
    exit();
}
