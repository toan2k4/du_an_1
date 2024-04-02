<?php 

if (!function_exists('getUserClientByEmailAndPassword')) {
    function getUserClientByEmailAndPassword($email_tk, $mat_khau)
    {
        try {
            $sql = "SELECT 
                        tk.id, 
                        tk.ten_tk, 
                        tk.ho_va_ten, 
                        tk.mat_khau, 
                        tk.anh_tk, 
                        tk.email_tk, 
                        tk.dien_thoai_tk, 
                        tk.dia_chi, 
                        tk.id_chuc_vu, 
                        tk.gioi_tinh, 
                        pq.ten_chuc_vu 
                    FROM 
                        `tb_tai_khoan` as tk 
                        JOIN 
                        tb_phan_quyen as pq
                        ON tk.id_chuc_vu = pq.id  
                    WHERE 
                        email_tk = :email_tk 
                        AND 
                        mat_khau = :mat_khau  
                    LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email_tk", $email_tk);
            $stmt->bindParam(":mat_khau", $mat_khau);

            $stmt->execute();

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