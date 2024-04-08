<?php
// hien 1 san pham
if (!function_exists('showProductOrderOne')) {
    function showProductOrderOne($id, $id_sp, $mau, $size)
    {
        try {
            $sql = "SELECT 
            tb_chi_tiet_don_hang.id, 
            tb_chi_tiet_don_hang.id_don_hang, 
            tb_chi_tiet_don_hang.id_sp,
            tb_chi_tiet_don_hang.mau,
            tb_chi_tiet_don_hang.size,
            tb_san_pham.ten_sp, 
            tb_san_pham.hinh_sp,
            tb_san_pham.id
        FROM tb_chi_tiet_don_hang 
        INNER JOIN tb_san_pham ON tb_chi_tiet_don_hang.id_sp = tb_san_pham.id 
        INNER JOIN tb_don_hang ON tb_chi_tiet_don_hang.id_don_hang = tb_don_hang.id 
        WHERE tb_chi_tiet_don_hang.id_don_hang = :id
        AND tb_chi_tiet_don_hang.id_sp = :id_sp
        AND tb_chi_tiet_don_hang.mau = :mau
        AND tb_chi_tiet_don_hang.size = :size ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_sp', $id_sp);
            $stmt->bindParam(':mau', $mau);
            $stmt->bindParam(':size', $size);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}



?>