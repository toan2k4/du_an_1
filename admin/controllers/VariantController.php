<?php
function variantListAll($id_sp)
{
    $product = showOne('tb_san_pham', $id_sp);
    // debug($product);
    $title = 'Form thêm biến thể sản phẩm: ' . $product['ten_sp'];
    $view = 'variants/index';

    $script = 'datatable';
    $script2 = 'variants/script';
    $style = 'datatable';

    $variants = listAllVariantByIdsp($id_sp);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function variantCreate()
{
    if (!empty($_POST)) {
        
        $data = [
            'id_sp' => $_POST['id_sp'] ?? null,
            'ten_mau' => ucfirst($_POST['ten_mau']) ?? null,
            'size' => $_POST['size'] ?? null,
            'ma_mau' => $_POST['ma_mau'] ?? null,
            'so_luong' => $_POST['so_luong'] ?? null,
        ];
        validateVariant($data);
        insert('tb_bien_the_sp', $data);
        $_SESSION['success'] = 'Thao tác thành công';

        $product = showOne('tb_san_pham', $data['id_sp']);
        $title = 'Form thêm biến thể sản phẩm: ' . $product['ten_sp'];
        $view = 'variants/index';

        $script = 'datatable';
        $script2 = 'variants/script';
        $style = 'datatable';

        $variants = listAllVariantByIdsp($data['id_sp']);
        header('location: '. BASE_URL_ADMIN . '?act=variants&id_sp='. $data['id_sp']);
    }
}

function validateVariant($data)
{
    $errors = [];
    $products = listAll('tb_san_pham');
    $listIdProduct = array_column($products, 'id');

    if (empty($data['id_sp'])) {
        $errors[] = "chọn sản phẩm là bắt buộc";
    } else if (!is_numeric($data['id_sp']) || !in_array($data['id_sp'], $listIdProduct)) {
        $errors[] = "Sản phẩm không đúng";
    } else {
        $product = showOne('tb_san_pham', $data['id_sp']);

    }

    if (empty($data['ten_mau'])) {
        $errors[] = "Trường tên màu là bắt buộc";
    } else if (strlen($data['ten_mau']) > 20) {
        $errors[] = "Trường tên màu < 20 ký tự";
    }else{
        $data['ten_mau'] = ucfirst($data['ten_mau']);
    }

    if (empty($data['ma_mau'])) {
        $errors[] = "Trường mã màu là bắt buộc";
    } else if (strlen($data['ma_mau']) > 20) {
        $errors[] = "Trường mã màu < 20 ký tự";
    }

    $typeSize = ['S', 'M', 'L', 'XL'];
    if (empty($data['size'])) {
        $errors[] = "Trường size là bắt buộc";
    } else if (!in_array($data['size'], $typeSize)) {
        $errors[] = "Size không hợp lệ";
    }


    if (empty($data['so_luong'])) {
        $errors[] = "Trường số lượng là bắt buộc";
    } else if (!is_numeric($data['so_luong'])) {
        $errors[] = "Trường số lượng phải là số";
    } else if ($data['so_luong'] < 0) {
        $errors[] = "Trường số lượng phải lớn hơn 0";
    } else if (isset($product) && !empty($data['id_sp'])) {
        $totalQuantityProduct = $product['so_luong'];
        $totalQuantityVariant = 0;
        $variantProduct = listAllVariantByIdsp($data['id_sp']);
        foreach ($variantProduct as $variant) {
            $totalQuantityVariant += $variant['so_luong'];
            if (ucfirst($variant['ten_mau']) == ucfirst($data['ten_mau']) && $variant['size'] == $data['size']) {
                $errors[] = "Biến thể này đã có ";
            }
        }

        if ($data['so_luong'] + $totalQuantityVariant > $totalQuantityProduct) {
            $errors[] = "Trường số lượng phải nhỏ hơn hoặc bằng " . $totalQuantityProduct - $totalQuantityVariant;
        }
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        header("location: " . BASE_URL_ADMIN . "?act=variants&id_sp=".$data['id_sp']);
        exit();
    }

}



function variantUpdate($id)
{
    $title = 'Form cập nhật biến thể';

    $variant = showOne('tb_bien_the_sp', $id);
    $view = 'variants/update';
    if (isset($_POST['gui'])) {

        $data = [
            'id_sp' => $variant['id_sp'],
            'ten_mau' => $_POST['ten_mau'] ?? $variant['ten_mau'],
            'size' => $_POST['size'] ?? $variant['size'],
            'ma_mau' => $_POST['ma_mau'] ?? $variant['ma_mau'],
            'so_luong' => $_POST['so_luong'] ?? $variant['so_luong'],
        ];
        validateVariantUpdate($data, $id);

        update('tb_bien_the_sp', $id, $data);
        $_SESSION['success'] = "Thao tác thành công";

        $variants = listAllVariantByIdsp($data['id_sp']);
        if (isset($_SESSION['variants'])) {
            unset($_SESSION['variants']);
            $_SESSION['variants'] = $variants;
        }
        $variant = showOne('tb_bien_the_sp', $id);
        header('location: '. BASE_URL_ADMIN . '?act=variants&id_sp='.$data['id_sp']);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function validateVariantUpdate($data, $id)
{
    $errors = [];
    $products = listAll('tb_san_pham');
    $listIdProduct = array_column($products, 'id');

    if (empty($data['id_sp'])) {
        $errors[] = "chọn sản phẩm là bắt buộc";
    } else if (!is_numeric($data['id_sp']) || !in_array($data['id_sp'], $listIdProduct)) {
        $errors[] = "Sản phẩm không đúng";
    } else {
        $product = showOne('tb_san_pham', $data['id_sp']);

    }

    if (empty($data['ten_mau'])) {
        $errors[] = "Trường tên màu là bắt buộc";
    } else if (strlen($data['ten_mau']) > 20) {
        $errors[] = "Trường tên màu < 20 ký tự";
    }

    if (empty($data['ma_mau'])) {
        $errors[] = "Trường mã màu là bắt buộc";
    } else if (strlen($data['ma_mau']) > 20) {
        $errors[] = "Trường mã màu < 20 ký tự";
    }

    $typeSize = ['S', 'M', 'L', 'XL'];
    if (empty($data['size'])) {
        $errors[] = "Trường size là bắt buộc";
    } else if (!in_array($data['size'], $typeSize)) {
        $errors[] = "Size không hợp lệ";
    }


    if (empty($data['so_luong'])) {
        $errors[] = "Trường số lượng là bắt buộc";
    } else if (!is_numeric($data['so_luong'])) {
        $errors[] = "Trường số lượng phải là số";
    } else if ($data['so_luong'] < 0) {
        $errors[] = "Trường số lượng phải lớn hơn 0";
    } else if (isset($product) && !empty($data['id_sp'])) {
        $totalQuantityProduct = $product['so_luong'];
        $totalQuantityVariant = 0;
        $variantProduct = listAllVariantByIdspKhacId($data['id_sp'], $id);
        // debug($variantProduct);
        foreach ($variantProduct as $variant) {
            $totalQuantityVariant += $variant['so_luong'];
            if ($variant['ten_mau'] == $data['ten_mau'] && $variant['size'] == $data['size']) {
                $errors[] = "Biến thể này đã có ";
            }
        }

        if ($data['so_luong'] + $totalQuantityVariant > $totalQuantityProduct) {
            $errors[] = "Trường số lượng phải nhỏ hơn hoặc bằng " . $totalQuantityProduct - $totalQuantityVariant;
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        header("location: " . BASE_URL_ADMIN . "?act=variant-create");
        exit();
    }

}

function variantDelete($id)
{
    $id_sp = showOne('tb_bien_the_sp', $id);
    delete2('tb_bien_the_sp', $id);
    $_SESSION['success'] = "Thao tác thành công";
    variantListAll($id_sp['id_sp']);
}