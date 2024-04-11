<?php

if (!function_exists('listProductPopular')) {
    function listProductPopular($limit = 8)
    {
        try {
            $sql = "SELECT 
                        sp.id       as  sp_id, 
                        sp.gia_sp   as  sp_gia, 
                        sp.giam_gia as  sp_giam_gia, 
                        sp.hinh_sp  as  sp_hinh,
                        sp.ten_sp   as  sp_ten, 
                        AVG(dg.sao_dg) as dg_sao
                    FROM 
                        tb_san_pham     sp 
                    lEFT JOIN 
                        tb_danh_gia     dg 
                    ON 
                        sp.id = dg.id_sp
                    GROUP BY sp.id
                    ORDER BY so_luot_xem DESC 
                    LIMIT $limit";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('listVariantsByIdSp')) {
    function listVariantsByIdSp($id_sp)
    {
        try {
            $sql = "SELECT * FROM `tb_bien_the_sp` WHERE id_sp = :id_sp";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id_sp", $id_sp);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('listProductNew')) {
    function listProductNew()
    {
        try {
            $sql = "SELECT 
                        sp.id       as  sp_id, 
                        sp.gia_sp   as  sp_gia, 
                        sp.giam_gia as  sp_giam_gia, 
                        sp.hinh_sp  as  sp_hinh,
                        sp.ten_sp   as  sp_ten, 
                        AVG(dg.sao_dg) as dg_sao
                    FROM 
                        tb_san_pham     sp 
                        lEFT JOIN 
                        tb_danh_gia     dg 
                        ON 
                        sp.id = dg.id_sp

                       GROUP BY sp.id 
                    ORDER BY ngay_nhap DESC 
                    LIMIT 3;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('listProductRating')) {
    function listProductRating()
    {
        try {
            $sql = "SELECT 
                        sp.id       as  sp_id, 
                        sp.gia_sp   as  sp_gia, 
                        sp.giam_gia as  sp_giam_gia, 
                        sp.hinh_sp  as  sp_hinh,
                        sp.ten_sp   as  sp_ten,
                        AVG(dg.sao_dg) as dg_sao
                    FROM 
                        tb_san_pham     sp 
                        lEFT JOIN 
                        tb_danh_gia     dg 
                        ON 
                        sp.id = dg.id_sp

                    GROUP BY sp.id
                    ORDER BY sao_dg DESC 
                    LIMIT 8;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('getSearchProduct')) {
    function getSearchProduct($id_danh_muc = null, $search = '', $priceMin = null, $priceMax = null)
    {
        try {
            $sql = "SELECT 
                        sp.id       as  sp_id, 
                        sp.gia_sp   as  sp_gia, 
                        sp.giam_gia as  sp_giam_gia, 
                        sp.hinh_sp  as  sp_hinh,
                        sp.ten_sp   as  sp_ten, 
                        AVG(dg.sao_dg) as dg_sao
                    FROM 
                        tb_san_pham     sp 
                        lEFT JOIN 
                        tb_danh_gia dg  ON  sp.id = dg.id_sp
                    WHERE 1=1"; // Bắt đầu câu truy vấn với điều kiện luôn đúng

            // Thêm điều kiện cho catalogue_id nếu được chỉ định
            if ($id_danh_muc != null) {
                $sql .= " AND id_danh_muc = :id_danh_muc";
            }

            if ($priceMin != null && $priceMax != null) {
                $sql .= "  AND giam_gia BETWEEN :priceMin AND :priceMax";
            }

            if ($search != '') {
                $sql .= " AND ten_sp LIKE :ten_sp";
                $ten_sp = '%' . $search . '%';
            }



            $sql .= " GROUP BY sp_id
            ORDER BY sp_id DESC"; // Sắp xếp kết quả theo id giảm dần

            $stmt = $GLOBALS['conn']->prepare($sql);

            // Bind các tham số vào câu truy vấn nếu chúng được chỉ định
            if ($id_danh_muc != null) {
                $stmt->bindParam(':id_danh_muc', $id_danh_muc);
            }
            if ($search != '') {
                $stmt->bindParam(':ten_sp', $ten_sp);
            }

            if ($priceMin != null && $priceMax != null) {
                $stmt->bindParam(':priceMin', $priceMin);
                $stmt->bindParam(':priceMax', $priceMax);
            }

            // debug($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            debug($e);
        }
    }
}

if (!function_exists('minMaxPrice')) {
    function minMaxPrice()
    {
        try {
            $sql = "SELECT 
                        MIN(giam_gia) as min, 
                        MAX(giam_gia) as max 
                    FROM `tb_san_pham` 
                    WHERE giam_gia;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}


///////////////////////////////////////////////////////////////////////

if (!function_exists('showOneProduct')) {
    function showOneProduct($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id, hinh_sp, so_luong, so_luot_xem, ten_sp, gia_sp, mo_ta, giam_gia, AVG(dg.sao_dg) as dg_sao FROM $tableName
            lEFT JOIN tb_danh_gia AS dg ON $tableName.id = dg.id_sp 
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

if (!function_exists('showCommentProduct')) {
    function showCommentProduct($tableName, $id)
    {
        try {
            $sql = "SELECT $tableName.id, $tableName.noi_dung, $tableName.ngay_bl, tb_tai_khoan.anh_tk, tb_tai_khoan.ten_tk
            FROM $tableName
            INNER JOIN tb_san_pham ON $tableName.id_sp = tb_san_pham.id
            INNER JOIN tb_tai_khoan ON $tableName.id_tk = tb_tai_khoan.id
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

if (!function_exists('listCommentForProduct')) {
    function listCommentForProduct($id)
    {
        try {
            $sql = "SELECT 
                        bl.id        as bl_id ,
                        tk.ten_tk    as tk_ten,
                        bl.noi_dung  as bl_nd,
                        bl.ngay_bl   as bl_ngaybl,
                        bl.id_sp     as bl_id_sp,
                        tk.anh_tk    as tk_anh
                    FROM 
                        tb_binh_luan as  bl 
                    JOIN 
                        tb_tai_khoan as  tk 
                    ON 
                        bl.id_tk = tk.id 
                    WHERE id_sp=:id
                    ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('listProductSame')) {
    function listProductSame($limit = 8)
    {
        try {
            $sql = "SELECT 
                        sp.id       as  sp_id, 
                        sp.gia_sp   as  sp_gia, 
                        sp.giam_gia as  sp_giam_gia, 
                        sp.hinh_sp  as  sp_hinh,
                        sp.ten_sp   as  sp_ten, 
                        AVG(dg.sao_dg) as dg_sao
                    FROM 
                        tb_san_pham     sp 
                    lEFT JOIN 
                        tb_danh_gia     dg 
                    ON 
                        sp.id = dg.id_sp
                    lEFT JOIN 
                        tb_danh_muc     dm 
                    ON 
                        sp.id_danh_muc = dm.id
                    WHERE 
                        dm.id = sp.id_danh_muc
                    GROUP BY sp.id
                    LIMIT $limit";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

