<?php

function commentListAll()
{
    $title = "Bảng thống kê bình luận theo sản phẩm";
    $view = 'comments/index';
    $script = 'datatable';
    $script2 = 'comments/script';
    $style = 'datatable';
    $products = listProductCountComment();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function commentListAllProduct($id){
    $title = "Bảng danh sách bình luận theo sản phẩm";
    $view = 'comments/list';
    $script = 'datatable';
    $script2 = 'comments/script';
    $style = 'datatable';
    $comments = listCommentForProduct($id);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function commentShowOne($id)
{
    $title = "Bảng chi tiết bình luận";
    $view = 'comments/show';
    $style = 'datatable';
    $comment = showOneComment('tb_binh_luan', $id);
    // debug($comment);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function validatecomment($data)
{
    $errors = [];
    if (empty($data['noi_dung'])) {
        $errors[] = "Trường tên nội dung là bắt buộc";
    } 
    return $errors;
}

function commentUpdate($id)
{
    $comment = showOneComment('tb_binh_luan', $id);
    if(empty($comment)){
        e404();
    }
    if (!empty ($_POST)) {

        $data = [
            'noi_dung' => $_POST['noi_dung'] ?? $comment['noi_dung'],
        ];

        $errors = validatecomment($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            update('tb_binh_luan', $id, $data);
            $_SESSION['success'] = "Thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=comment-update&id=$id");
        exit();

    }
    $title = "Sửa bình luận: " . $comment['ten_tk'];
    $view = 'comments/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function commentDelete($id){
    $comment = showOne('tb_binh_luan', $id);
    if(empty($comment)){
        e404();
    }
    delete2('tb_binh_luan', $id);
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=comments-list&id_sp=" . $comment['id_sp']);
    exit();
}

