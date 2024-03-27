<?php 
if (!function_exists('showOneEvaluate')) {
    function showOneEvaluate($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id, noi_dung, ngay_dg, sao_dg, tb_tai_khoan.ho_va_ten, tb_tai_khoan.email_tk, $tableName.id_sp FROM $tableName 
            JOIN tb_san_pham ON $tableName.id_sp = tb_san_pham.id 
            JOIN tb_tai_khoan ON $tableName.id_tk = tb_tai_khoan.id 
            WHERE $tableName.id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('listEvaluateForProduct')) {
    function listEvaluateForProduct($id)
    {
        try {
            $sql = "SELECT 
                        dg.id        as dg_id ,
                        tk.ho_va_ten    as ho_va_ten,
                        dg.noi_dung  as noi_dung,
                        dg.sao_dg   as sao_dg,
                        dg.ngay_dg     as ngay_dg
                    FROM 
                        tb_danh_gia as  dg 
                    JOIN 
                        tb_tai_khoan as  tk 
                    ON 
                        dg.id_tk = tk.id 
                    JOIN 
                        tb_san_pham as  sp 
                    ON 
                        dg.id_sp = sp.id 
                    WHERE id_sp=:id
                    ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}
