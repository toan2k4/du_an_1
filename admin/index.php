<?php
session_start();
//require các file trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';



// require các file trong model và controller 
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

$act = $_GET['act'] ?? '/';

// Kiểm tra xem user đã đăng nhập chưa
middleware_auth_check($act);

match ($act) {
    '/' => dashboard(),
    'earn-month'=> earnMonth($_GET['month']),
    'earn-year'=> earnYear($_GET['year']),

    //authen
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),

    // user
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),

    // product
    'products' => productListAll(),
    'product-detail' => productShowOne($_GET['id']),
    'product-create' => productCreate(),
    'product-update' => productUpdate($_GET['id']),
    'product-delete' => productDelete($_GET['id']),

    // variant
    'variants' => variantListAll($_GET['id_sp']),
    'variant-create' => variantCreate(),
    'variant-update' => variantUpdate($_GET['id']),    
    'variant-delete' => variantDelete($_GET['id']),    


    // roles
    'roles' => roleListAll(),
    'role-detail' => roleShowOne($_GET['id']),
    'role-create' => roleCreate(),
    'role-update' => roleUpdate($_GET['id']),
    'role-delete' => roleDelete($_GET['id']),

    // categories
    'categories' => categoryListAll(),
    'category-detail' => categoryShowOne($_GET['id']),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($_GET['id']),
    'category-delete' => categoryDelete($_GET['id']),

    // vouchers
    'vouchers' => voucherListAll(),
    'voucher-detail' => voucherShowOne($_GET['id']),
    'voucher-create' => voucherCreate(),
    'voucher-update' => voucherUpdate($_GET['id']),
    'voucher-delete' => voucherDelete($_GET['id']),

    // comments
    'comments-list' => commentListAllProduct($_GET['id_sp']),
    'comment-update' => commentUpdate($_GET['id']),
    'comment-delete' => commentDelete($_GET['id']),

    // evaluates
    'evaluates-list' => evaluateListAllProduct($_GET['id_sp']),
    'evaluate-detail' => evaluateShowOne($_GET['id']),
    

    // statuses
    'statuses' => statusesListAll(),
    'status-create' => statusCreate(),
    'status-update' => statusUpdate($_GET['id']),
    'status-delete' => statusDelete($_GET['id']),

    // blog
    'blogs' => blogListAll(),
    'blog-detail' => blogShowOne($_GET['id']),
    'blog-create' => blogCreate(),
    'blog-update' => blogUpdate($_GET['id']),
    'blog-delete' => blogDelete($_GET['id']),

    // contact
    'contacts' => contactListAll(),
    'contact-detail' => contactShowOne($_GET['id']),
    'contact-create' => contactCreate(),
    'contact-update' => contactUpdate($_GET['id']),
    'contact-delete' => contactDelete($_GET['id']),

    // orders
    'orders' => orderListAll(),
    'order-detail' => orderShowOne($_GET['id']),
    'order-detail-pro' => orderShowOneProduct($_GET['id']),
    'order-update' => orderUpdateStatus($_GET['id']),
    'order-delete' => orderDelete($_GET['id']),
    
    // Setting - Nội dung
    'setting-form' => settingShowForm(),
    'setting-save' => settingSave(),
};



require_once '../commons/disconnect-db.php';