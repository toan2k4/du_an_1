<?php

function getCartId($id_user)
{
    $cart = getCartByIdUser($id_user);
    if (empty($cart)) {
        return insert_get_last_id('tb_gio_hang', [
            'id_tk' => $id_user,
        ]);
    }

    return $cart['id'];
}

function getCartByIdUser($id_user)
{
    $sql = "SELECT * FROM tb_gio_hang WHERE id_tk=:id_tk LIMIT 1";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindParam(":id_tk", $id_user);
    $stmt->execute();
    return $stmt->fetch();
}

function updateItemOnCartDetail($id_gio_hang, $id_san_pham, $mau, $size, $so_luong)
{
    $sql = "UPDATE tb_chi_tiet_gh 
            SET so_luong = :so_luong 
            WHERE 
                id_gio_hang=:id_gio_hang
            AND 
                id_san_pham=:id_san_pham
            AND 
                mau=:mau
            AND 
                size=:size
                
            ";

    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bindParam(":id_gio_hang", $id_gio_hang);
    $stmt->bindParam(":id_san_pham", $id_san_pham);
    $stmt->bindParam(":mau", $mau);
    $stmt->bindParam(":size", $size);
    $stmt->bindParam(":so_luong", $so_luong);

    $stmt->execute();
}

function listProductByIdCart($id_gio_hang)
{
    $sql = "SELECT sp.id as id_sp,sp.ten_sp, sp.hinh_sp, gh.gia as price, gh.mau, gh.size, gh.so_luong as quantity, gh.id as id_ctgh
            FROM tb_chi_tiet_gh as gh
            JOIN  tb_san_pham as sp
            ON gh.id_san_pham = sp.id
            WHERE id_gio_hang = :id_gio_hang";

    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindParam(":id_gio_hang", $id_gio_hang);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getOneProductOnCartDetail($id_sp, $id_gh, $mau, $size)
{
    $sql = "SELECT * FROM tb_chi_tiet_gh
            WHERE 
                id_san_pham = :id_sp 
            AND 
                id_gio_hang = :id_gh 
            AND 
                mau = :mau 
            AND 
                size = :size";

    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindParam(":id_sp", $id_sp);
    $stmt->bindParam(":id_gh", $id_gh);
    $stmt->bindParam(":mau", $mau);
    $stmt->bindParam(":size", $size);
    $stmt->execute();
    return $stmt->fetch();
}

function deleteDetailCartByCartID($cartID){
    try {
        $sql = "DELETE FROM tb_chi_tiet_gh WHERE id_gio_hang=:id_gio_hang";

        $stmt = $GLOBALS['conn'] -> prepare($sql);
        $stmt->bindParam(":id_gio_hang",$cartID);

        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}