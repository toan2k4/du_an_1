<?php
if (!function_exists('showListOrder')) {
    function showListOrder()
    {
        try {
            $sql = "SELECT 
                         dh.id as dh_id,
                         tk.ho_va_ten,
                         tk.dien_thoai_tk as dien_thoai_tk,
                         tk.email_tk as email_tk,
                         dh.thoi_gian as thoi_gian,
                         tt.trang_thai as ten_trang_thai
                    FROM 
                        tb_don_hang as dh
                    JOIN 
                        tb_trangthai_dh as tt ON dh.id_trang_thai = tt.id 
                    JOIN 
                        tb_tai_khoan as tk ON dh.id_tk = tk.id 
                    ORDER BY 
                        dh  .id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('showOneOrder')) {
    function showOneOrder($id)
    {
        try {
            $sql = "SELECT 
                        dh.id as dh_id,
                        dh.ho_va_ten,
                        dh.so_dien_thoai as so_dien_thoai,
                        tk.email_tk ,
                        dh.thoi_gian ,
                        dh.tong_tien ,
                        dh.thanh_toan,
                        dh.thoi_gian,
                        dh.dia_chi,
                        dh.id_trang_thai,
                        tt.trang_thai as ten_trang_thai
                    FROM 
                        tb_don_hang as dh
                    JOIN 
                        tb_trangthai_dh as tt ON dh.id_trang_thai = tt.id 
                        JOIN 
                        tb_tai_khoan as tk ON dh.id_tk = tk.id 
                    WHERE 
                        dh.id = :id
                    ";
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
            $tableName.id_sp,
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

if (!function_exists('checkOrderDetailByIdOrder')) {
    function checkOrderDetailByIdOrder( $id)
    {
        try {
            $sql = "SELECT * FROM tb_chi_tiet_don_hang WHERE id_don_hang=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

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





