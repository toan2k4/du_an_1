<?php

// if (!function_exists('get_str_keys')) {
//     function get_str_keys($data)
//     {
//         return implode(',', array_keys($data));
//     }
// }

// CRUD -> Create/Read(Danh sách/Chi tiết)/Update/Delete
if (!function_exists('get_str_keys')) {
    function get_str_keys($data) {    
        $keys = array_keys($data);

        $keysTenTen = array_map(function ($key) {
            return "`$key`";
        }, $keys);

        return implode(',', $keysTenTen);
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $value) {
            $tmp[] = ":$value";
        }
       

        return implode(',', $tmp);
    }
}

// if (!function_exists('get_set_params')) {
//     function get_set_params($data)
//     {
//         $keys = array_keys($data);
//         $tmp = [];
//         foreach ($keys as $key) {
//             $tmp[] = "$key = :$key";
//         }

//         return implode(',', $tmp);
//     }
// }

if (!function_exists('get_set_params')) {
    function get_set_params($data) {     
        $keys = array_keys($data);

        $tmp = [];
        foreach($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }
        
        return implode(',', $tmp);
    }
}

if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);
            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";
            
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            
            foreach($data as $fieldName => &$value){
                $stmt->bindParam(":$fieldName",$value);
            }
            // debug($sql);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}


if (!function_exists('listAll')) {
    function listAll($tableName, $check = true) // nếu mà truyền false thì câu lệnh sql sẽ bỏ qua id bằng 0
    {
        try {
            $sql = "SELECT * FROM $tableName ";
            if($check == false){
                $sql .= "WHERE id <> 0";
            }
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt -> execute();
            return $stmt->fetchAll();
            
        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id=:id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt -> execute();
            return $stmt->fetch();
            
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('update')) {
    function update($tableName,$id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "UPDATE $tableName SET $setParams WHERE id=:id";

            $stmt = $GLOBALS['conn'] -> prepare($sql);

            foreach($data as $fieldName => &$value){
                $stmt->bindParam(":$fieldName",$value);
            }
            $stmt->bindParam(":id",$id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete2')) {
    function delete2($tableName,$id)
    {
        try {
            $sql = "DELETE FROM $tableName WHERE id=:id";

            $stmt = $GLOBALS['conn'] -> prepare($sql);
            $stmt->bindParam(":id",$id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('insert_get_last_id')) {
    function insert_get_last_id($tableName, $data = []) {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();

            return $GLOBALS['conn']->lastInsertId();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}