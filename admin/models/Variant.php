<?php 

if (!function_exists('listAllVariantByIdsp')) {
    function listAllVariantByIdsp($id)
    {
        try {
            $sql = "SELECT * FROM tb_bien_the_sp WHERE id_sp=:id_sp";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id_sp", $id);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('listAllVariantByIdspKhacId')) {
    function listAllVariantByIdspKhacId($id_sp, $id)
    {
        try {
            $sql = "SELECT * FROM tb_bien_the_sp WHERE id_sp=:id_sp AND id <> :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id_sp", $id_sp);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}