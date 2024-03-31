<?php 
if (!function_exists('showBestBlog')) {
    function showBestBlog($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY $tableName.luot_xem DESC LIMIT 5";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            debug($e);
        }     
    }
}

?>