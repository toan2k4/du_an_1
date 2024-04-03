<?php 
// list san pham noi bat - single blog
if (!function_exists('showBestBlog')) {
    function showBestBlog($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY $tableName.luot_xem DESC LIMIT 7";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }     
    }
}
// list san pham noi bat - home
if (!function_exists('showBestBlogHome')) {
    function showBestBlogHome($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY $tableName.luot_xem DESC LIMIT 2";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }     
    }
}

// chi tiet bai viet co the co khuyen mai
if (!function_exists('showCodeVoucher')) {
    function showCodeVoucher($id)
    {
        try {
            $sql = "SELECT 
                        tb_khuyen_mai.code_km, 
                        tb_khuyen_mai.bai_viet 
                    FROM `tb_khuyen_mai` 
                    INNER JOIN tb_bai_viet ON tb_khuyen_mai.bai_viet = tb_bai_viet.id 
                    WHERE tb_bai_viet.id = :id
                    ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt -> execute();
            return $stmt->fetch();
            
        } catch (\Exception $e) {
            debug($e);
        }
    }
}




?>