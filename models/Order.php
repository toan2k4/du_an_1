<?php 
/// Hiện list lịch sử đơn hàng
if (!function_exists('showListOrderClient')) {
    function showListOrderClient($id)
    {
        try {
            $sql = "SELECT 
                         dh.id as dh_id,
                         dh.ho_va_ten,
                         dh.tong_tien as tong_tien,
                         dh.thoi_gian as thoi_gian,
                         tt.trang_thai as ten_trang_thai
                    FROM 
                        tb_don_hang as dh
                    JOIN 
                        tb_trangthai_dh as tt ON dh.id_trang_thai = tt.id 
                    JOIN 
                        tb_tai_khoan as tk ON dh.id_tk = tk.id 
                    WHERE tk.id = :id
                    ORDER BY 
                        dh  .id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Hiện chi tiết đơn hàng
if (!function_exists('showOneOrder')) {
    function showOneOrder($id)
    {
        try {
            $sql = "SELECT 
                        dh.id as dh_id,
                        dh.ho_va_ten,
                        dh.so_dien_thoai as dien_thoai_tk,
                        tk.email_tk as email_tk,
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
// Hien list san pham
// Hien list san pham
if (!function_exists('showProductOrder')) {
    function showProductOrder($tableName, $id)
    {
        try {
            $sql = "SELECT 
                tb_chi_tiet_don_hang.id as id_ctdh, 
                tb_chi_tiet_don_hang.id_don_hang, 
                tb_chi_tiet_don_hang.so_luong, 
                tb_chi_tiet_don_hang.gia_sp,
                tb_chi_tiet_don_hang.mau, 
                tb_chi_tiet_don_hang.size, 
                tb_chi_tiet_don_hang.thanh_tien, 
                tb_chi_tiet_don_hang.id_sp, 
                tb_san_pham.ten_sp, 
                tb_san_pham.hinh_sp
            FROM tb_chi_tiet_don_hang 
            INNER JOIN tb_san_pham ON tb_chi_tiet_don_hang.id_sp = tb_san_pham.id 
            INNER JOIN tb_don_hang ON tb_chi_tiet_don_hang.id_don_hang = tb_don_hang.id 
            WHERE tb_chi_tiet_don_hang.id_don_hang = :id;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}




?>