<?php 
//require các file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';


// require các file trong model và controller 
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// lấy dữ liệu ở globals
$settings = settings();
$listCate = listCategories();

$act = $_GET['act'] ?? '/';
match($act){
    '/' => homeIndex(),

    // blogs
    'blogs' => blogIndex(),

    // detail product
    'single-product' => singleProduct(),

    // list product 
    'list-product' => listProduct(),
    

    // cart 
    'cart' => showCart(),

    // login register 
    'login-register' => showLoginRegister(),

    // contact 
    'contact' => showContact(),
    
};




require_once './commons/disconnect-db.php';