<?php 
if (!function_exists('checkUserByIdRole')) {
    function checkUserByIdRole($id)
    {
        try {
            $sql = "SELECT * FROM tb_tai_khoan WHERE id_chuc_vu=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}