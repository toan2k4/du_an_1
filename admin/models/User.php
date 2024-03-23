<?php


if (!function_exists('listAllUsers')) {
    function listAllUsers($tableName)
    {
        try {
            $sql = "SELECT $tableName.id, gioi_tinh, ten_tk, ho_va_ten, mat_khau, anh_tk, email_tk, dien_thoai_tk, dia_chi, tb_phan_quyen.ten_chuc_vu FROM $tableName JOIN tb_phan_quyen ON $tableName.id_chuc_vu = tb_phan_quyen.id ORDER BY $tableName.id_chuc_vu DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('showOneUser')) {
    function showOneUser($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id, gioi_tinh, ten_tk, ho_va_ten, mat_khau, anh_tk, email_tk, dien_thoai_tk, dia_chi, tb_phan_quyen.ten_chuc_vu FROM $tableName JOIN tb_phan_quyen ON $tableName.id_chuc_vu = tb_phan_quyen.id WHERE $tableName.id = :id ORDER BY $tableName.id_chuc_vu DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            // debug($stmt->fetch());
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('checkUniqueEmail')) {
    function checkUniqueEmail($tableName, $email_tk)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email_tk=:email_tk LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email_tk", $email_tk);
            $stmt->execute();
            // debug($stmt->fetch());
            $data = $stmt->fetch();

            return empty($data) ? true : false;

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('checkUniqueEmailForUpdate')) {
    function checkUniqueEmailForUpdate($tableName,$id, $email_tk)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email_tk=:email_tk AND id <>:id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email_tk", $email_tk);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            // debug($stmt->fetch());
            $data = $stmt->fetch();

            return empty($data) ? true : false;

        } catch (\Exception $e) {
            debug($e);
        }

    }
}