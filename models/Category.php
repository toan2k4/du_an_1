<?php

if (!function_exists('listCategories')) {
    function listCategories()
    {
        try {
            $sql = "SELECT 
                        dm.id, 
                        dm.ten_dm,  
                        COUNT(sp.id) as tong
                    FROM 
                        tb_danh_muc     dm
                        JOIN 
                        tb_san_pham     sp 
                        ON 
                        sp.id_danh_muc = dm.id
                    WHERE dm.id <> 0
                    GROUP BY dm.id;";
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}