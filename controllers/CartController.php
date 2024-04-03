<?php

function showCart()
{
    // debug($_SESSION['cart']);
    $views = 'cart';
    $cartID = getCartId($_SESSION['user']['id']);
    $_SESSION['cartID'] = $cartID;
    $products = listProductByIdCart($cartID);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $code_km = $_POST['code_km'];
        $check = checkVoucher($code_km);
        if(!empty($check)){
            $gia_km = $check['gia_km'];
            $_SESSION['voucher'] = $gia_km;
            header('location: '. BASE_URL . '?act=cart');
            exit();
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}



function checkSize()
{
    $id_sp = $_GET['id_sp'];
    $color = $_GET['color'];
    $size = $_GET['size'];
    $quantity = $_GET['quantity'];
    // echo $size ;
    // debug($quantity);
    $check = checkVariant($id_sp, $color, $size);
    if (empty($check) || $check['so_luong'] == 0) {
        echo 'errorSize';
    } else {
        if ($quantity > $check['so_luong']) {
            echo 'errorQty';
        }
    }

}

function addToCart()
{
    $data = [
        'id_sp' => $_POST['id_sp'] ?? null,
        'quantity' => $_POST['quantity'] ?? 1,
        'mau' => $_POST['mau'] ?? null,
        'size' => $_POST['size'] ?? null,
        'price' => $_POST['price'] ?? null
    ];
    if (empty($data['id_sp']) || empty($data['mau']) || empty($data['size'])) {
        echo '<script>alert("Vui lòng chọn biến thể sản phẩm")</script>';
        echo '<script>window.history.back()</script>';
        die();
    }
    // debug($data);
    // kiểu tra có product có id này k 
    $product = showOne('tb_san_pham', $data['id_sp']);
    $data['ten_sp'] = $product['ten_sp'];
    $data['hinh_sp'] = $product['hinh_sp'];
    if (empty($product)) {
        e404();
    }
    // trong bảng cart có bản ghi nào của user này ch
    $cartID = getCartId($_SESSION['user']['id']);
    $_SESSION['cartID'] = $cartID;
    // add sp vào session 
    // add sp vào chi tiết giỏ hang 
    $check = getOneProductOnCartDetail($data['id_sp'],$cartID,$data['mau'],$data['size']);
    if (empty($check)) {
        insert('tb_chi_tiet_gh', [
            'id_gio_hang' => $cartID,
            'id_san_pham' => $data['id_sp'],
            'mau' => $data['mau'],
            'size' => $data['size'],
            'so_luong' => $data['quantity'],
            'gia' => $data['price'],
        ]);
        updateQuatityVariant($data['id_sp'], $data['mau'], $data['size'], $data['quantity']);
    } else {
        $qtyTMP = $check['so_luong'] += $data['quantity'];
        updateItemOnCartDetail($cartID, $data['id_sp'], $data['mau'], $data['size'], $qtyTMP);
        updateQuatityVariant($data['id_sp'], $data['mau'], $data['size'], $data['quantity']);
    }

    header('location: ' . BASE_URL . '?act=cart');
}

function cartInc($id_ctgh, $id_sp, $mau, $size, $quantity)
{
    // $variant = checkVariant($id_sp, $mau, $size);
    if ($quantity > 1) {
        // debug($quantity);
        update('tb_chi_tiet_gh', $id_ctgh, [
            'so_luong' => $quantity - 1
        ]);
        updateQuatityVariant($id_sp, $mau, $size, -1);
        
    }else{
        echo '<script>alert("Số lượng không đc nhỏ hơn 1")</script>';
        echo '<script>window.history.back()</script>';
        die();
    }
    header('location: ' . BASE_URL . '?act=cart');
}

function cartDec($id_ctgh, $id_sp, $mau, $size, $quantity)
{
    $variant = checkVariant($id_sp, $mau, $size);
    // debug($variant['so_luong']);
    if ($variant['so_luong'] > $quantity) {
        // debug($qtyOld);
        update('tb_chi_tiet_gh', $id_ctgh, [
            'so_luong' => $quantity + 1
        ]);
        updateQuatityVariant($id_sp, $mau, $size, 1);
       
    }else{
        echo '<script>alert("Số lượng quá trong kho")</script>';
        echo '<script>window.history.back()</script>';
        die();
    }
    header('location: ' . BASE_URL . '?act=cart');
}


function cartDelete($id_ctgh, $id_sp, $mau, $size, $quantity)
{
    delete2('tb_chi_tiet_gh', $id_ctgh);
    updateQuatityVariant($id_sp, $mau, $size, - $quantity);
    header('location: ' . BASE_URL . '?act=cart');
}

