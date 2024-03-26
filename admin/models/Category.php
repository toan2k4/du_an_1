<?php 

if (!function_exists('checkProductByIdCate')) {
    function checkProductByIdCate($id)
    {
        try {
            $sql = "SELECT * FROM tb_san_pham WHERE id_danh_muc=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

