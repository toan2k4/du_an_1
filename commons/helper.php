<?php

if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($file, $pathFolderUpload)
    {
        $imgPath = $pathFolderUpload . time() . '-' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imgPath)) {
            return $imgPath;
        }

        return null;

    }
}

if (!function_exists('e404')) {
    function e404()
    {
        echo "404 - Not found";
        die;
    }
}

if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act)
    {
        if ($act == 'login') {
            if (isset($_SESSION['user']) && $_SESSION['user']['ten_chuc_vu'] == "Admin") {
                header('Location: ' . BASE_URL_ADMIN);
                exit();
            }else if (isset($_SESSION['user']) && $_SESSION['user']['ten_chuc_vu'] == "User") {
                header('Location: ' . BASE_URL);
                exit();
            }
        } else if (!isset($_SESSION['user']) || $_SESSION['user']['ten_chuc_vu'] != "Admin") {
            header('Location: ' . BASE_URL. '?act=login');
            exit();
        }
    }
}

if (!function_exists('middleware_auth_check_client')) {
    function middleware_auth_check_client($act, $arrRouteNeedAuth) {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        } 
        elseif (empty($_SESSION['user']) && in_array($act, $arrRouteNeedAuth)) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}

if (!function_exists('settings')) {
    function settings()
    {
        $fileSettings = PATH_UPLOAD . '/uploads/settings.json';

        if (file_exists($fileSettings)) {
            $data = json_decode(file_get_contents($fileSettings), true);
        } else {
            $settings = listAll('tb_noi_dung');

            $keys = array_column($settings, 'key');
            $values = array_column($settings, 'value');

            $data = array_combine($keys, $values);
            // ['logo' => ZenBlog, ....]

            file_put_contents($fileSettings, json_encode($data));
        }

        return $data;
    }
}
