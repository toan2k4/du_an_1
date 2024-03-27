<?php
if (!function_exists('totalMoneyMonth')) {
    function totalMoneyMonth()
    {
        try {
            $sql = "SELECT 
                        SUM(tong_tien) as tong
                    FROM 
                        `tb_don_hang`
                    WHERE 
                        MONTH(thoi_gian) = MONTH(CURRENT_DATE());";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('totalMoneyYear')) {
    function totalMoneyYear()
    {
        try {
            $sql = "SELECT 
                        SUM(tong_tien) as tong
                    FROM 
                        `tb_don_hang`
                    WHERE 
                        YEAR(thoi_gian) = YEAR(CURDATE())";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('totalMoneyDay')) {
    function totalMoneyDay()
    {
        try {
            $sql = "SELECT 
                        SUM(tong_tien) as tong
                    FROM 
                        `tb_don_hang`
                    WHERE 
                        DATE(thoi_gian) = CURRENT_DATE()";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('totalMoneyWeek')) {
    function totalMoneyWeek()
    {
        try {
            $sql = "SELECT 
                        SUM(tong_tien) AS tong
                    FROM 
                        `tb_don_hang`
                    WHERE 
                        WEEK(thoi_gian) = WEEK(CURDATE())
                            AND 
                        YEAR(thoi_gian) = YEAR(CURDATE());";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}


// thống kê biểu đồ 

if (!function_exists('thongke_ngay')) {
    function thongke_ngay()
    {
        try {
            $sql = "SELECT 
                        sum(tong_tien)                    AS tong, 
                        DATE_FORMAT(thoi_gian, '%H:%i %p') AS gio_phut
                    FROM 
                        `tb_don_hang` 
                    WHERE 
                        DATE(thoi_gian) = CURRENT_DATE()
                    GROUP BY 
                        DATE_FORMAT(thoi_gian, '%H:%i %p');";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}


if (!function_exists('thongke_tuan')) {
    function thongke_tuan()
    {
        try {
            $sql = "SELECT
                        SUM(tong_tien) AS tong,
                        CONCAT('Tuần ', WEEK(thoi_gian) - WEEK(DATE_FORMAT(thoi_gian, '%Y-%m-01')) + 1) AS ngay,
                        DATE_FORMAT(thoi_gian, '%m-%Y') AS thang
                    FROM 
                        `tb_don_hang`
                    WHERE 
                        YEAR(thoi_gian) = YEAR(CURDATE()) AND MONTH(thoi_gian) = MONTH(CURDATE())
                    GROUP BY 
                        WEEK(thoi_gian), DATE_FORMAT(thoi_gian, '%m-%Y')
                    ORDER BY 
                        DATE_FORMAT(thoi_gian, '%m-%Y'), WEEK(thoi_gian);";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('thongke_thang')) {
    function thongke_thang()
    {
        try {
            $sql = "SELECT 
            SUM(tong_tien) AS tong, 
            DATE_FORMAT(thoi_gian, '%m') AS thang
        FROM 
            `tb_don_hang`
        WHERE 
            YEAR(thoi_gian) = YEAR(CURDATE())
        GROUP BY 
            DATE_FORMAT(thoi_gian, '%m')
        ORDER BY 
            DATE_FORMAT(thoi_gian, '%m')";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('thongke_nam')) {
    function thongke_nam()
    {
        try {
            $sql = "SELECT 
                        YEAR(thoi_gian) AS nam,
                        SUM(tong_tien) AS tong
                    FROM 
                        `tb_don_hang`
                    WHERE YEAR(thoi_gian) - 2 AND YEAR(thoi_gian) + 2
                    GROUP BY
                        YEAR(thoi_gian)
                    ORDER BY
                        YEAR(thoi_gian);";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}


if (!function_exists('thongke_quy')) {
    function thongke_quy()
    {
        try {
            $sql = "SELECT 
                        SUM(tong_tien) AS tong,
                        CONCAT(YEAR(thoi_gian), '-Q', QUARTER(thoi_gian)) AS quy
                    FROM 
                        `tb_don_hang`
                    WHERE
                        YEAR(thoi_gian) = YEAR(CURDATE())
                    GROUP BY
                        YEAR(thoi_gian),
                        QUARTER(thoi_gian)
                    ORDER BY
                        YEAR(thoi_gian),
                        QUARTER(thoi_gian);
                    ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('thongke_top_ban_chay')) {
    function thongke_top_ban_chay()
    {
        try {
            $sql = "SELECT 
                        SUM(tb_chi_tiet_don_hang.so_luong) as tong,
                        tb_san_pham.ten_sp
                    FROM 
                        `tb_chi_tiet_don_hang`
                    JOIN 
                        tb_san_pham ON tb_san_pham.id = tb_chi_tiet_don_hang.id_sp
                    GROUP BY
                         tb_san_pham.id;
                    LIMIT 5;
                    ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }

    }
}
