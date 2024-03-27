<?php
if (!function_exists('showListOrder')) {
    function showListOrder($tableName)
    {
        try {
            $sql = "SELECT 
            $tableName.id as dh_id, 
            tt.trang_thai as trang_thai, 
            id_trang_thai,
            tk.id as tk_id, 
            tk.ho_va_ten as ho_va_ten, 
            tk.dien_thoai_tk as dien_thoai_tk, 
            tk.email_tk as email_tk, 
            thoi_gian, 
            tong_tien, 
            thanh_toan   
            FROM $tableName 
            JOIN tb_trangthai_dh as tt ON $tableName.id_trang_thai = tt.id 
            JOIN tb_tai_khoan as tk ON $tableName.id_tk = tk.id 
            ORDER BY $tableName.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('showOneOrder')) {
    function showOneOrder($tableName, $id)
    {
        try {
            $sql = "SELECT 
            $tableName.id, 
            tt.trang_thai as trang_thai, 
            id_trang_thai,
            tk.id as tk_id, 
            tk.ho_va_ten as ho_va_ten, 
            tk.dien_thoai_tk as dien_thoai_tk, 
            tk.email_tk as email_tk,
            tk.dia_chi as dia_chi,
            thoi_gian, 
            tong_tien, 
            thanh_toan 
            FROM $tableName 
            JOIN tb_trangthai_dh as tt ON $tableName.id_trang_thai = tt.id 
            JOIN tb_tai_khoan as tk ON $tableName.id_tk = tk.id 
            WHERE $tableName.id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showProductOrder')) {
    function showProductOrder($tableName, $id)
    {
        try {
            $sql = "SELECT 
            $tableName.id_don_hang,
            sp.ten_sp,
            sp.hinh_sp,
            $tableName.so_luong,
            mau,
            size,
            thanh_tien
            FROM $tableName 
            JOIN tb_san_pham as sp ON $tableName.id_sp = sp.id 
            JOIN tb_don_hang as dh ON $tableName.id_don_hang = dh.id 
            WHERE $tableName.id_don_hang = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// if (!function_exists('showOneProductOrder')) {
//     function showOneProductOrder($tableName, $id)
//     {
//         try {
//             $sql = "SELECT $tableName.id, hinh_sp, tb_danh_muc.ten_dm, ten_sp, gia_sp, mo_ta FROM $tableName 
//             JOIN tb_danh_muc ON $tableName.id_danh_muc = tb_danh_muc.id
//             WHERE $tableName.id = :id";
//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->bindParam(':id', $id);
//             $stmt->execute();
//             return $stmt->fetchAll();
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }

if (!function_exists('listImage')) {
    function listImage($tableName, $id)
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





