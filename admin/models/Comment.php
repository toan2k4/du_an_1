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
            $sql = "SELECT $tableName.id,$tableName.noi_dung, tb_san_pham.ten_sp, tb_tai_khoan.ten_tk, $tableName.id_sp FROM $tableName 
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

if (!function_exists('listProductCountComment')) {
    function listProductCountComment()
    {
        try {
            $sql = "SELECT  
                        sp.id        as  sp_id,
                        sp.ten_sp    as  sp_ten,
                        sp.hinh_sp   as  sp_anh,
                        sp.gia_sp    as  sp_gia,
                        COUNT(bl.id) as  bl_count
                    FROM 
                        tb_binh_luan as  bl 
                    JOIN 
                        tb_san_pham  as  sp 
                    ON 
                        bl.id_sp = sp.id 
                    GROUP BY sp.id;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('listCommentForProduct')) {
    function listCommentForProduct($id)
    {
        try {
            $sql = "SELECT 
                        bl.id        as bl_id ,
                        tk.ten_tk    as tk_ten,
                        bl.noi_dung  as bl_nd,
                        bl.ngay_bl   as bl_ngaybl,
                        bl.id_sp     as bl_id_sp
                    FROM 
                        tb_binh_luan as  bl 
                    JOIN 
                        tb_tai_khoan as  tk 
                    ON 
                        bl.id_tk = tk.id 
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