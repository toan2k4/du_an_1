<?php 

function showAllDetailBillByIdBill($idBill){
    try {
        $sql = "SELECT tb_san_pham.ten_sp, tb_chi_tiet_don_hang.so_luong as quantity, tb_chi_tiet_don_hang.mau, tb_chi_tiet_don_hang.size, tb_chi_tiet_don_hang.thanh_tien
        FROM tb_chi_tiet_don_hang JOIN tb_san_pham
        ON tb_chi_tiet_don_hang.id_sp = tb_san_pham.id
        WHERE id_don_hang=:id_don_hang;";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':id_don_hang', $idBill);
        $stmt -> execute();
        return $stmt->fetchAll();
        
    } catch (\Exception $e) {
        debug($e);
    }

}