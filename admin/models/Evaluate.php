<?php 

/////////////////////////////////////////////////

if (!function_exists('showEvaluates')) {
    function showEvaluates($tableName)
    {
        try {
            $sql = "SELECT $tableName.id, noi_dung, tb_san_pham.ten_sp, ngay_dg, sao_dg, tb_tai_khoan.ho_va_ten FROM $tableName 
            JOIN tb_san_pham ON $tableName.id_sp = tb_san_pham.id 
            JOIN tb_tai_khoan ON $tableName.id_tk = tb_tai_khoan.id 
            ORDER BY $tableName.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('showOneEvaluate')) {
    function showOneEvaluate($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id, noi_dung, tb_san_pham.ten_sp, tb_san_pham.hinh_sp, ngay_dg, sao_dg, tb_tai_khoan.ho_va_ten FROM $tableName 
            JOIN tb_san_pham ON $tableName.id_sp = tb_san_pham.id 
            JOIN tb_tai_khoan ON $tableName.id_tk = tb_tai_khoan.id 
            WHERE $tableName.id = :id
            ORDER BY $tableName.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}