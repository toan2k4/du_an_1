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


if (!function_exists('checkUniqueEmailForUpdate')) {
    function checkUniqueEmailForUpdate($tableName, $id, $email_tk)
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

function sendMailPass($email, $username, $pass)
{

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'a19f7b8dec3a8f';                     //SMTP username
        $mail->Password = 'cca5b9d1a9ce50';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('babyshop@gmail.com', 'DuAn1');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body = 'Mau khau cua ban la' . $pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function sendMail($email_tk)
{
    $sql = "SELECT * FROM tb_tai_khoan WHERE email_tk = :email_tk";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindParam(":email_tk", $email_tk);
    $stmt->execute();
    // debug($stmt->fetch());
    $taikhoan = $stmt->fetch();


    if ($taikhoan != false) {
        sendMailPass($email_tk, $taikhoan['ten_tk'], $taikhoan['mat_khau']);

        return "0";
    } else {
        return "1";
    }
}

