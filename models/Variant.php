<?php 

if (!function_exists('checkVariant')) {
    function checkVariant($id_sp, $color, $size)
    {
        try {
            $sql = "SELECT * FROM `tb_bien_the_sp` WHERE id_sp = :id_sp AND ten_mau = :color AND size = :size";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_sp', $id_sp);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':size', $size);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('updateQuatityVariant')) {
    function updateQuatityVariant($id_sp, $color, $size, $quantity)
    {
        $variant = checkVariant($id_sp, $color, $size);
        $so_luong = $variant['so_luong'] - $quantity;
        try {
            $sql = "UPDATE tb_bien_the_sp SET so_luong=:so_luong WHERE id_sp = :id_sp AND ten_mau =:color AND size = :size";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':id_sp', $id_sp);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':size', $size);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}