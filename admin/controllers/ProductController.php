<?php

function productListAll()
{
    $title = "Bảng danh sách sản phẩm";
    $view = 'products/index';
    $script = 'datatable';
    $script2 = 'products/script';
    $style = 'datatable';
    $products = listAllproducts('tb_san_pham');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function productShowOne($id)
{
    $title = "Bảng chi tiết sản phẩm";
    $view = 'products/show';
    $style = 'datatable';
    $product = showOneproduct('tb_san_pham', $id);
    $hinhPhu = listAllImage('tb_hinh_anh', $id);
    $variants = listAllVariantByIdsp($id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productCreate()
{
    $script = 'datatable';
    $script2 = 'products/script';
    $title = "Form thêm sản phẩm";
    $view = 'products/create';
    $categories = listAll('tb_danh_muc', false);
    if (!empty($_POST)) {
        $dataPro = [
            'ten_sp' => $_POST['ten_sp'] ?? null,
            'gia_sp' => $_POST['gia_sp'] ?? null,
            'giam_gia' => $_POST['giam_gia'] ?? null,
            'hinh_sp' => $_FILES['hinh_sp']['size'] > 0 ? $_FILES['hinh_sp'] : null,
            'ngay_nhap' => $_POST['ngay_nhap'] ?? null,
            'id_danh_muc' => $_POST['id_danh_muc'] ?? null,
            'so_luong' => $_POST['so_luong'] ?? null,
            'mo_ta' => $_POST['mo_ta'] ?? null,
        ];
        $dataImg = [
            'id_sp' => null,
            'anh_phu' => $_FILES['anh_phu']['size'] > 0 ? $_FILES['anh_phu'] : null
        ];

        $errors = validateproduct($dataPro, $dataImg);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $dataPro;
            header("location: " . BASE_URL_ADMIN . "?act=product-create");
            exit();
        }

        $avata = $dataPro['hinh_sp'];
        if (!empty($avata) && $avata['size'] > 0) {
            $dataPro['hinh_sp'] = upload_file($avata, 'uploads/products/');
        }
        // debug($dataPro);

        // $idNewProduct = 2;
        $idNewProduct = insert_get_last_id('tb_san_pham', $dataPro);
        if (!empty($idNewProduct)) {
            $dataImg['id_sp'] = $idNewProduct;
            foreach ($dataImg['anh_phu']['tmp_name'] as $key => $value) {
                $file_name = $_FILES['anh_phu']['name'][$key];
                $file_tmp = $_FILES['anh_phu']['tmp_name'][$key];
                $dataImg['anh_phu'] = upload_multiple_file($file_name, $file_tmp, 'uploads/products/');
                // debug( );
                insert('tb_hinh_anh', $dataImg);
            }
        }


        $_SESSION['success'] = "Thao tác thành công!";

        header("location: " . BASE_URL_ADMIN . "?act=products");
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateproduct($data, $dataImg)
{
    $errors = [];
    if (empty($data['ten_sp'])) {
        $errors[] = "Trường tên sản phẩm là bắt buộc";
    } else if (strlen($data['ten_sp']) > 50) {
        $errors[] = "Trường tên sản phẩm nhỏ hơn 50 ký tự";
    }

    if (empty($data['gia_sp'])) {
        $errors[] = "Trường giá san phẩm là bắt buộc";
    } else if (!is_numeric($data['gia_sp'])) {
        $errors[] = "Trường giá sản phẩm phải là số";
    }

    if (empty($data['so_luong'])) {
        $errors[] = "Trường số lượng san phẩm là bắt buộc";
    } else if (!is_numeric($data['so_luong'])) {
        $errors[] = "Trường số lượng sản phẩm phải là số";
    } else if ($data['so_luong'] < 0) {
        $errors[] = "Trường số lượng sản phẩm phải lớn hơn 0";
    }

    if (!empty($data['giam_gia'])) {
        if (!is_numeric($data['giam_gia'])) {
            $errors[] = "Trường giá bán sản phẩm phải là số";
        } else if ($data['giam_gia'] > $data['gia_sp']) {
            $errors[] = "Trường giá bán sản phẩm phải nhỏ hơn hoặc bằng giá sản phẩm";
        }
    }

    $typeImage = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];
    if ($data['hinh_sp'] && $data['hinh_sp']['size'] > 0) {
        if ($data['hinh_sp']['size'] > 2 * 1024 * 1024) {
            $errors[] = "file ảnh sản phẩm nhỏ hơn 2mb";
        } else if (!in_array($data['hinh_sp']['type'], $typeImage)) {
            $errors[] = "file ảnh sản phẩm không đúng đinh danh jpg, png, jpeg, webp";
        }

    } else {
        $errors[] = "Trường ảnh sản phẩm là bắt buộc";
    }

    $check = true;

    foreach ($dataImg['anh_phu']['size'] as $i => $value) {
        if ($value > 0) {
            if ($value > 2 * 1024 * 1024) {
                $errors[] = 'file ảnh phụ ' . $i + 1 . ' nhỏ hơn 2mb';
                $check = false;
            }
        } else {
            $errors[] = "Trường ảnh phụ là bắt buộc";
            $check = false;
        }
    }


    foreach ($dataImg['anh_phu']['type'] as $i => $value) {
        if (!in_array($value, $typeImage) && $check) {
            $errors[] = 'file ảnh phụ ' . $i + 1 . ' không đúng đinh danh jpg, png, jpeg, webp';
        }
    }

    if (empty($data['ngay_nhap'])) {
        $errors[] = "Trường ngày nhập là bắt buộc";
    } else if (!strtotime($data['ngay_nhap'])) {
        $errors[] = "Trường ngày nhập không hợp lệ";
    }

    if (empty($data['id_danh_muc'])) {
        $errors[] = "Trường danh mục là bắt buộc";
    } else if (!is_numeric($data['id_danh_muc'])) {
        $errors[] = "Trường danh mục không hợp lệ";
    }

    if (empty($data['mo_ta'])) {
        $errors[] = "Trường mô tả là bắt buộc";
    }

    return $errors;
}



function productUpdate($id)
{
    $script = 'datatable';
    $script2 = 'products/script';
    $categories = listAll('tb_danh_muc', false);
    $product = showOne('tb_san_pham', $id);
    $imgPro = listAllImage('tb_hinh_anh', $product['id']);
    // debug($imgPro['anh_phu']);
    if (empty($product)) {
        e404();
    }
    $title = "Form cập nhật sản phẩm: " . $product['ten_sp'];
    $view = 'products/update';
    $roles = listAll('tb_phan_quyen');
    if (!empty($_POST)) {

        $dataPro = [
            'ten_sp' => $_POST['ten_sp'] ?? $product['ten_sp'],
            'gia_sp' => $_POST['gia_sp'] ?? $product['gia_sp'],
            'giam_gia' => $_POST['giam_gia'] ?? $product['giam_gia'],
            'hinh_sp' => $_FILES['hinh_sp']['size'] > 0 ? $_FILES['hinh_sp'] : $product['hinh_sp'],
            'ngay_nhap' => $_POST['ngay_nhap'] ?? $product['ngay_nhap'],
            'id_danh_muc' => $_POST['id_danh_muc'] ?? $product['id_danh_muc'],
            'so_luong' => $_POST['so_luong'] ?? $product['so_luong'],
            'mo_ta' => $_POST['mo_ta'] ?? $product['mo_ta'],
            'trang_thai' => $_POST['trang_thai'] ?? $product['trang_thai'],
        ];
        $dataImg = [
            'id_sp' => $id,
            'anh_phu' => $_FILES['anh_phu']['size'] > 0 ? $_FILES['anh_phu'] : null
        ];

        $errors = validateProductUpdate($dataPro, $dataImg);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;

        } else {
            $avata = $dataPro['hinh_sp'];
            if (!empty($avata) && is_array($avata) && $avata['size'] > 0) {

                $dataPro['hinh_sp'] = upload_file($avata, 'uploads/accounts/');

                if (
                    !empty($avata)           // có upload
                    && !empty($product['hinh_sp']) // có giá trị
                    && !empty($dataPro['hinh_sp']) // upload file thành công
                    && file_exists(PATH_UPLOAD . $product['hinh_sp'])
                ) { // có tồn tại file cũ
                    unlink(PATH_UPLOAD . $product['hinh_sp']);
                }
            }

            if (isset($_FILES['anh_phu']) && $_FILES['anh_phu']['size'][0] > 0) {
                foreach ($imgPro as $img) {
                    unlink(PATH_UPLOAD . $img['anh_phu']);
                }
                deleteAllImgPhu('tb_hinh_anh', $id);
                foreach ($dataImg['anh_phu']['tmp_name'] as $key => $value) {
                    $file_name = $_FILES['anh_phu']['name'][$key];
                    $file_tmp = $_FILES['anh_phu']['tmp_name'][$key];
                    $dataImg['anh_phu'] = upload_multiple_file($file_name, $file_tmp, 'uploads/products/');

                    insert('tb_hinh_anh', $dataImg);
                }
            }

            if (empty($data['trang_thai'])) {
                $errors[] = "Trường trạng thái là bắt buộc";
            }

            update('tb_san_pham', $id, $dataPro);
            $_SESSION['success'] = "Thao tác thành công!";

        }
        header("location: " . BASE_URL_ADMIN . "?act=product-update&id=" . $id);
        exit();
    }


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateProductUpdate($data, $dataImg)
{
    $errors = [];
    if (empty($data['ten_sp'])) {
        $errors[] = "Trường tên sản phẩm là bắt buộc";
    } else if (strlen($data['ten_sp']) > 50) {
        $errors[] = "Trường tên sản phẩm nhỏ hơn 50 ký tự";
    }

    if (empty($data['gia_sp'])) {
        $errors[] = "Trường giá san phẩm là bắt buộc";
    } else if (!is_numeric($data['gia_sp'])) {
        $errors[] = "Trường giá sản phẩm phải là số";
    }

    if (!empty($data['giam_gia'])) {
        if (!is_numeric($data['giam_gia'])) {
            $errors[] = "Trường giá bán sản phẩm phải là số";
        } else if ($data['giam_gia'] > $data['gia_sp']) {
            $errors[] = "Trường giá bán sản phẩm phải nhỏ hơn hoặc bằng giá sản phẩm";
        }
    }


    if (empty($data['so_luong'])) {
        $errors[] = "Trường số lượng san phẩm là bắt buộc";
    } else if (!is_numeric($data['so_luong'])) {
        $errors[] = "Trường số lượng sản phẩm phải là số";
    } else if ($data['so_luong'] < 0) {
        $errors[] = "Trường số lượng sản phẩm phải lớn hơn 0";
    }

    $typeImage = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];
    if (isset($data['hinh_sp']['size'])) {
        if ($data['hinh_sp'] && $data['hinh_sp']['size'] > 0) {
            if ($data['hinh_sp']['size'] > 2 * 1024 * 1024) {
                $errors[] = "file ảnh sản phẩm nhỏ hơn 2mb";
            } else if (!in_array($data['hinh_sp']['type'], $typeImage)) {
                $errors[] = "file ảnh sản phẩm không đúng đinh danh jpg, png, jpeg, webp";
            }

        }
    }

    if (isset($dataImg['anh_phu']['size'][0]) && $dataImg['anh_phu']['size'][0] > 0) {
        $check = true;
        foreach ($dataImg['anh_phu']['size'] as $i => $value) {
            if ($value > 0) {
                if ($value > 2 * 1024 * 1024) {
                    $errors[] = 'file ảnh phụ ' . $i + 1 . ' nhỏ hơn 2mb';
                    $check = false;
                }
            }
        }


        foreach ($dataImg['anh_phu']['type'] as $i => $value) {
            if (!in_array($value, $typeImage) && $check) {
                $errors[] = 'file ảnh phụ ' . $i + 1 . ' không đúng đinh danh jpg, png, jpeg';
            }
        }
    }




    if (empty($data['ngay_nhap'])) {
        $errors[] = "Trường ngày nhập là bắt buộc";
    } else if (!strtotime($data['ngay_nhap'])) {
        $errors[] = "Trường ngày nhập không hợp lệ";
    }

    if (empty($data['id_danh_muc'])) {
        $errors[] = "Trường danh mục là bắt buộc";
    } else if (!is_numeric($data['id_danh_muc'])) {
        $errors[] = "Trường danh mục không hợp lệ";
    }

    if (empty($data['mo_ta'])) {
        $errors[] = "Trường mô tả là bắt buộc";
    }

    return $errors;
}

function productDelete($id)
{
    $product = showOne('tb_san_pham', $id);
    $imgPro = showOne('tb_hinh_anh', $id);
    if (empty($product)) {
        e404();
    }

    delete2('tb_san_pham', $id);
    if (!empty($product['hinh_sp']) && file_exists(PATH_UPLOAD . $product['hinh_sp'])) { // có tồn tại file cũ
        unlink(PATH_UPLOAD . $product['hinh_sp']);
        foreach ($imgPro as $img) {
            unlink(PATH_UPLOAD . $img['anh_phu']);
        }
        deleteAllImgPhu('tb_hinh_anh', $id);
    }

    $_SESSION['success'] = "Thao tác thành công";
    header("location: " . BASE_URL_ADMIN . "?act=products");
    exit();
}
