<?php


if (!function_exists('listRatingForProduct')) {
    function listRatingForProduct($id)
    {
        try {
            $sql = "SELECT  
                        tb_danh_gia.noi_dung, 
                        tb_danh_gia.ngay_dg, 
                        tb_danh_gia.sao_dg, 
                        tb_danh_gia.mau, 
                        tb_danh_gia.size, 
                        tb_tai_khoan.anh_tk, 
                        tb_tai_khoan.ten_tk
                    FROM tb_danh_gia
                    INNER JOIN 
                        tb_san_pham 
                    ON  
                        tb_danh_gia.id_sp = tb_san_pham.id   
                    INNER JOIN 
                        tb_tai_khoan 
                    ON 
                        tb_danh_gia.id_tk = tb_tai_khoan.id
                    WHERE tb_san_pham.id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}