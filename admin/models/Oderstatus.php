<?php 

if (!function_exists('checkOrderbyIdStatus')) {
    function checkOrderbyIdStatus($id)
    {
        try {
            $sql = "SELECT * FROM tb_don_hang WHERE id_trang_thai=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}