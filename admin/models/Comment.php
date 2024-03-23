<?php 
if (!function_exists('listAllComments')) {
    function listAllComments($tableName)
    {
        try {
            $sql = "SELECT $tableName.id,$tableName.noi_dung,tb_san_pham.ten_sp,tb_tai_khoan.ten_tk   FROM $tableName 
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

if (!function_exists('showOneComment')) {
    function showOneComment($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id,$tableName.noi_dung,tb_san_pham.ten_sp,tb_tai_khoan.ten_tk   FROM $tableName 
            JOIN tb_san_pham ON $tableName.id_sp = tb_san_pham.id
            JOIN tb_tai_khoan ON $tableName.id_tk = tb_tai_khoan.id
            WHERE $tableName.id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}