<?php

function singleProduct($id)
{
    $views = 'single-product';
    
    if (!empty($_POST)) {
        $data = [
            'noi_dung' => $_POST['noi_dung'] ?? null,
            'ngay_bl' => date("Y-m-d"),
            'id_tk' => $_POST['id_tk'] ?? null,
            'id_sp' => $_POST['id_sp'] ?? null,
        ];
        // debug($data);
        $errors = validate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("location: " . BASE_URL . "?act=single-product&id=$id");
            exit();
        }

        insert('tb_binh_luan', $data);
        $_SESSION['success'] = "Thao tác thành công!";

        header("location: " . BASE_URL . "?act=single-product&id=$id");
        exit();
    }

    $product_one = showOneProduct('tb_san_pham', $id);
    update('tb_san_pham', $id,[
        'so_luot_xem' => $product_one['so_luot_xem'] + 1
    ]);
    $hinhPhu = listAllImage('tb_hinh_anh', $id);
    $variants = listAllVariantByIdsp($id);
    $comment = listCommentForProduct($id);
    $ratings = listRatingForProduct($id);
    $same = listProductSame(8);
    require_once PATH_VIEW . 'layouts/master.php';
}

function listProduct()
{
    $views = 'list-product';
    $price = minMaxPrice();
    $id_danh_muc = isset($_POST['id_danh_muc']) ? $_POST['id_danh_muc'] : null;
    $id_danh_muc = isset($_GET['id_danh_muc']) ? $_GET['id_danh_muc'] : null;
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $priceMin = isset($_POST['priceMin']) ? $_POST['priceMin'] : '';
    $priceMax = isset($_POST['priceMax']) ? $_POST['priceMax'] : '';
    $productsPopular = listProductPopular(3);
    $products = getSearchProduct($id_danh_muc, $search, $priceMin, $priceMax);
    // debug($products);
    require_once PATH_VIEW . 'layouts/master.php';
}

function validate($data)
{
    $errors = '';
    if (empty($data['noi_dung'])) {
        $errors = "Trường bình luận là bắt buộc";
    }

    return $errors;
}


