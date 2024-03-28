<?php


if (!function_exists('listAllProducts')) {
    function listAllProducts($tableName)
    {
        try {
            $sql = "SELECT $tableName.id, hinh_sp, tb_danh_muc.ten_dm, so_luot_xem, ten_sp, trang_thai FROM $tableName 
            JOIN tb_danh_muc ON $tableName.id_danh_muc = tb_danh_muc.id
            ORDER BY $tableName.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }     
    }
}

if (!function_exists('showOneProduct')) {
    function showOneProduct($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id, hinh_sp, so_luong, tb_danh_muc.ten_dm, so_luot_xem, ten_sp, gia_sp, mo_ta, giam_gia, ngay_nhap, trang_thai FROM $tableName 
            JOIN tb_danh_muc ON $tableName.id_danh_muc = tb_danh_muc.id
            WHERE $tableName.id = :id
            ORDER BY $tableName.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('listAllImage')) {
    function listAllImage($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName 
            WHERE $tableName.id_sp = :id
            ORDER BY $tableName.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('upload_multiple_file')) {
    function upload_multiple_file($file_name, $file_tmp, $pathFolderUpload)
    {
        $imgPath = $pathFolderUpload . time() . '-' . $file_name;

        if (move_uploaded_file($file_tmp, PATH_UPLOAD . $imgPath)) {
            return $imgPath;
        }
        return null;
    }
}

if (!function_exists('deleteAllImgPhu')) {
    function deleteAllImgPhu($tableName, $id)
    {
        try {
            $sql = "DELETE FROM $tableName 
            WHERE $tableName.id_sp = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}

