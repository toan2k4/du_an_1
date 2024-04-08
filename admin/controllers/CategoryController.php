<?php
function categoryListAll()
{
    $title = "Bảng danh sách danh mục";
    $view = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/script';
    $style = 'datatable';

    $categories = listAll('tb_danh_muc', false);


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function categoryShowOne($id)
{
    
    $title = "Bảng chi tiết phân quyền";
    $view = 'categories/show';
    $style = 'datatable';
    $category = showOne('tb_danh_muc', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryCreate()
{
    $title = "Form thêm danh mục";
    $view = 'categories/create';

    if (!empty ($_POST)) {
        $data = [
            'ten_dm' => $_POST['ten_dm'] ?? null,
        ];

        $errors = validatecategory($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: " . BASE_URL_ADMIN . "?act=category-create");
            exit();
        }

        insert('tb_danh_muc', $data);
        $_SESSION['success'] = "Thao tác thành công";
        header("location: " . BASE_URL_ADMIN . "?act=categories");
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatecategory($data)
{
    $errors = [];
    if (empty ($data['ten_dm'])) {
        $errors[] = "Trường tên danh mục là bắt buộc";
    } else if (strlen($data['ten_dm']) > 20) {
        $errors[] = "Trường tên danh mục nhỏ hơn 20 ký tự";
    }

    return $errors;
}

function categoryUpdate($id)
{
    $category = showOne('tb_danh_muc', $id);
    if(empty($category)){
        e404();
    }
    if (!empty ($_POST)) {

        $data = [
            'ten_dm' => $_POST['ten_dm'] ?? $category['ten_dm'],
        ];

        $errors = validatecategory($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            update('tb_danh_muc', $id, $data);
            $_SESSION['success'] = "Thao tác thành công";
        }
        header("location: " . BASE_URL_ADMIN . "?act=category-update&id=$id");
        exit();

    }
    $title = "Sửa danh mục: " . $category['ten_dm'];
    $view = 'categories/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

}

function categoryDelete($id)
{
    delete2('tb_danh_muc', $id);
    $check = checkProductByIdCate($id);
    if(!empty($check)){
        foreach($check as $pro){
            update('tb_san_pham', $pro['id'], ["id_danh_muc" => 0]);
            // debug($pro['id']);
        }
    }
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=categories");
    exit();
}
