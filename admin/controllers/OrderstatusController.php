<?php

function statusesListAll()
{
    $title = "Bảng danh sách trạng thái đơn hàng";
    $view = 'orderstatus/index';
    $script = 'datatable';
    $script2 = 'orderstatus/script';
    $style = 'datatable';
    $statuses = listAll('tb_trangthai_dh', false);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function statusCreate()
{
    $title = "Bảng thêm trạng thái";
    $view = 'orderstatus/create';

    if (!empty ($_POST)) {
        $data = [
            'trang_thai' => $_POST['trang_thai'] ?? null,
        ];

        $errors = validatestatus($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: " . BASE_URL_ADMIN . "?act=status-create");
            exit();
        }

        insert('tb_trangthai_dh', $data);
        $_SESSION['success'] = "Thao tác thành công";
        header("location: " . BASE_URL_ADMIN . "?act=statuses");
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatestatus($data)
{
    $errors = [];
    if (empty ($data['trang_thai'])) {
        $errors[] = "Trường tên trạng thái là bắt buộc";
    } else if (strlen($data['trang_thai']) > 20) {
        $errors[] = "Trường tên chức vụ nhỏ hơn 20 ký tự";
    }
    return $errors;
}

function statusUpdate($id)
{
    $status = showOne('tb_trangthai_dh', $id);
    if(empty($status)){
        e404();
    }
    if (!empty ($_POST)) {

        $data = [
            'trang_thai' => $_POST['trang_thai'] ?? $status['trang_thai'],
        ];

        $errors = validatestatus($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            update('tb_trangthai_dh', $id, $data);
            $_SESSION['success'] = "Thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=status-update&id=$id");
        exit();

    }
    $title = "Sửa trạng thái: " . $status['trang_thai'];
    $view = 'orderstatus/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function statusDelete($id)
{
    delete2('tb_trangthai_dh', $id);
    $check = checkOrderbyIdStatus($id);
    if(!empty($check)){
        foreach($check as $order){
            update('tb_don_hang', $order['id'], ["id_trang_thai" => 0]);
            // debug($pro['id']);
        }
    }
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=statuses");
    exit();
}
