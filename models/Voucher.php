<?php 

function checkVoucher($code){
    $sql = "SELECT * FROM tb_khuyen_mai WHERE code_km = :code_km AND trang_thai=1";
    $stmt = $GLOBALS['conn'] -> prepare($sql);
    $stmt->bindParam(':code_km', $code);
    $stmt->execute();
    return $stmt->fetch();
}