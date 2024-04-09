<?php

function showProOrder($id, $id_sp, $mau, $size)
{
    if (!empty($_POST)) {
        $data = [
            'noi_dung' => $_POST['noi_dung'] ?? null,
            'ngay_dg' => date("Y-m-d"),
            'id_tk' => $_POST['id_tk'] ?? null,
            'id_sp' => $_POST['id_sp'] ?? null,
            'sao_dg' => $_POST['sao_dg'] ?? null,
            'mau' => $_POST['mau'] ?? null,
            'size' => $_POST['size'] ?? null,
        ];


        // debug($data);
        $errors = validateEvaluate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("location: " . BASE_URL . "?act=my-evaluate&id=$id &id_sp=$id_sp &mau=$mau &size=$size");
            exit();
        }

        insert('tb_danh_gia', $data);
        
        $_SESSION['success'] = "Thao tác thành công!";

        header("location: " . BASE_URL . "?act=my-evaluate&id=$id &id_sp=$id_sp &mau=$mau &size=$size");
        exit();
    }

    $views = 'su_account/evaluate';
    $order_product_one = showProductOrderOne($id, $id_sp, $mau, $size);
    require_once PATH_VIEW . 'layouts/master.php';
}

function validateEvaluate($data)
{
    $errors = '';
    if (empty($data['noi_dung'])) {
        $errors = "Bạn phải điền nội dung";
    }

    if (empty($data['sao_dg'])) {
        $errors = "Bạn phải chọn sao đánh giá";
    }

    return $errors;
}






