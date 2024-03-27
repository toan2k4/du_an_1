<?php


function evaluateListAllProduct($id){
    $title = "Bảng danh sách đánh giá theo sản phẩm";
    $view = 'evaluates/index';
    $script = 'datatable';
    $script2 = 'evaluates/script';
    $style = 'datatable';
    $evaluates = listEvaluateForProduct($id);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function evaluateShowOne($id)
{
    $title = "Bảng chi tiết đánh giá";
    $view = 'evaluates/show';
    $style = 'datatable';
    $evaluate = showOneEvaluate('tb_danh_gia', $id);
    // debug($evaluate);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}





