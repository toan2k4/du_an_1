<?php 

function settingShowForm() {
    
    $title      = 'Danh sách cài đặt';
    $view       = 'settings/form';

    $settings = settingPluckKeyValue();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function settingSave() {
    $settings = settingPluckKeyValue();

    foreach($_POST as $key => $value) {
        if (isset($settings[$key])) {
            // update
            if ($value != $settings[$key]) {
                settingUpdateByKey($key, [
                    'value' => $value
                ]);
            }
        } else {
            // insert
            insert('tb_noi_dung', [
                'key' => $key,
                'value' => $value
            ]);
        }
    };

    $_SESSION['success'] = 'Thao tác thành công!';
    $fileSettings = PATH_UPLOAD . 'uploads/settings.json';

    if(file_exists($fileSettings)){
        unlink($fileSettings);
    }

    header('Location: ' . BASE_URL_ADMIN . '?act=setting-form');
    exit();
}


function settingPluckKeyValue() {
    $data = listAll('tb_noi_dung');

    $settings = [];
    foreach ($data as $item) {
        $settings[$item['key']] = $item['value'];
    }

    return $settings;
}