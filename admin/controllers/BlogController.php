<?php

function blogListAll()
{
    $title = "Bảng danh sách bài viết";
    $view = 'blogs/index';
    $script = 'datatable';
    $script2 = 'blogs/script';
    $style = 'datatable';
    $blogs = listAll('tb_bai_viet');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function blogShowOne($id)
{
    $title = "Bảng chi tiết phân quyền";
    $view = 'blogs/show';
    $style = 'datatable';
    $blog = showOne('tb_bai_viet', $id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function blogCreate()
{
    $title = "Form thêm bài viết";
    $view = 'blogs/create';
    $script2 = 'blogs/script';
    if (!empty ($_POST)) {
        $data = [
            'tieu_de' => $_POST['tieu_de'] ?? null,
            'nd_blog' => $_POST['nd_blog'] ?? null,
            'img_blog' => $_FILES['img_blog']['size'] > 0 ? $_FILES['img_blog'] : null,
            'time_blog' => $_POST['time_blog'] ?? null,
            'focus' => $_POST['focus'] ?? null,
        ];

        $errors = validateBlog($data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("location: " . BASE_URL_ADMIN . "?act=blog-create");
            exit();
        }

        $avata = $data['img_blog'];
        if (!empty ($avata) && $avata['size'] > 0) {
            $data['img_blog'] = upload_file($avata, 'uploads/blogs/');
        }

        insert('tb_bai_viet', $data);
        $_SESSION['success'] = "Thao tác thành công!";

        header("location: " . BASE_URL_ADMIN . "?act=blogs");
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateBlog($data)
{
    $errors = [];
    if (empty ($data['tieu_de'])) {
        $errors[] = "Trường Tiêu đề bài viết là bắt buộc";
    } 

    if (empty ($data['nd_blog'])) {
        $errors[] = "Trường Nội dung là bắt buộc";
    }

    if (empty ($data['focus'])) {
        $errors[] = "Trường Đoạn văn nổi bật là bắt buộc";
    } 
    
    if (empty ($data['time_blog'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
    } else if (!strtotime($data['time_blog']) > 50) {
        $errors[] = "Trường Thời gian đăng tải nhỏ hơn 50 ký tự";
    }

    
    $typeImage = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];
    if ($data['img_blog'] && $data['img_blog']['size'] > 0) {
        if (empty ($data['img_blog'])) {
            $errors[] = "Trường ảnh là bắt buộc";
        } else if ($data['img_blog']['size'] > 2 * 1024 * 1024) {
            $errors[] = "file ảnh nhỏ hơn 2mb";
        } else if (!in_array($data['img_blog']['type'], $typeImage)) {
            $errors[] = "file ảnh không đúng đinh danh jpg, png, jpeg, webp";
        }
    }
    return $errors;
}



function blogUpdate($id)
{
    $blog = showOne('tb_bai_viet', $id);
    if (empty ($blog)) {
        e404();
    }
    $title = "Form cập nhật bài viết: " . $blog['tieu_de'];
    $view = 'blogs/update';
    $script2 = 'blogs/script';
    if (!empty ($_POST)) {
        $data = [
            'tieu_de' => $_POST['tieu_de'] ?? $blog['tieu_de'],
            'nd_blog' => $_POST['nd_blog'] ?? $blog['nd_blog'],
            'img_blog' => $_FILES['img_blog']['size'] > 0 ? $_FILES['img_blog'] : $blog['img_blog'],
            'time_blog' => $_POST['time_blog'] ?? $blog['time_blog'],
            'focus' => $_POST['focus'] ?? $blog['focus'],
        ];

        $errors = validateUpdateBlog($id, $data);
        if (!empty ($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            $avata = $data['img_blog'];
            if (!empty ($avata) && is_array($avata) && $avata['size'] > 0) {

                $data['img_blog'] = upload_file($avata, 'uploads/blogs/');

                if (
                    !empty ($avata)           // có upload
                    && !empty ($blog['img_blog']) // có giá trị
                    && !empty ($data['img_blog']) // upload file thành công
                    && file_exists(PATH_UPLOAD . $blog['img_blog'])
                ) { // có tồn tại file cũ
                    unlink(PATH_UPLOAD . $blog['img_blog']);
                }
            }

            update('tb_bai_viet', $id, $data);
            $_SESSION['success'] = "Thao tác thành công!";

        }
        header("location: " . BASE_URL_ADMIN . "?act=blog-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUpdateBlog($id, $data)
{
    $errors = [];
    if (empty ($data['tieu_de'])) {
        $errors[] = "Trường Tiêu đề bài viết là bắt buộc";
    } 
    
    if (empty ($data['nd_blog'])) {
        $errors[] = "Trường Nội dung là bắt buộc";
    }

    if (empty ($data['focus'])) {
        $errors[] = "Trường Đoạn văn nổi bật là bắt buộc";
    } 
    
    if (empty ($data['time_blog'])) {
        $errors[] = "Trường Thời gian đăng tải là bắt buộc";
    } else if (!strtotime($data['time_blog']) > 50) {
        $errors[] = "Trường Thời gian đăng tải nhỏ hơn 50 ký tự";
    }

    


    return $errors;
}

function blogDelete($id)
{
    $blog = showOne('tb_bai_viet', $id);
    if (empty ($blog)) {
        e404();
    }
    delete2('tb_bai_viet', $id);
    if ( !empty ($blog['img_blog']) && file_exists(PATH_UPLOAD . $blog['img_blog'])) { // có tồn tại file cũ
        unlink(PATH_UPLOAD . $blog['img_blog']);
    }
    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=blogs");
    exit();
}
