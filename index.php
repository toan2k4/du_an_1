<?php 
session_start();
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
// Biến này cần khai báo được link cần đăng nhập mới vào được
$arrRouteNeedAuth = [
    'cart',
    'add-cart'
]; 

// Kiểm tra xem user đã đăng nhập chưa
middleware_auth_check_client($act, $arrRouteNeedAuth);
match($act){
    '/' => homeIndex(),

    // blogs
    'blogs' => blogIndex(),
    'blog-single' => blogSingle($_GET['id']),
    
    // detail product
    'single-product' => singleProduct($_GET['id']),

    // list product 
    'list-product' => listProduct(),
    
    // cart 
    'cart' => showCart(),

    'checkSize' => checkSize(),
    'add-cart' => addToCart(),
    'cart-inc' => cartInc($_GET['id_ctgh'], $_GET['id_sp'], $_GET['mau'], $_GET['size'], $_GET['quantity']),
    'cart-dec' => cartDec($_GET['id_ctgh'], $_GET['id_sp'], $_GET['mau'], $_GET['size'], $_GET['quantity']),
    'del-cart' => cartDelete($_GET['id_ctgh'], $_GET['id_sp'], $_GET['mau'], $_GET['size'], $_GET['quantity']),
   
    // checkout 
    'checkout' => showCheckout(),
    'change-order' => changeOrder($_GET['id']),

    // order 
    'order-purchase' => orderPurchase(),
    'thank' => thank($_GET['id_bill']),
    'check-order' => checkOrder($_GET['resultCode']),

    // login register 
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),
    'quenmk' => showForgotPassword(),

    'my-account' => showMyAccount($_GET['id']),
    'my-order' => showMyOrder($_GET['id']),
    'my-evaluate' => showProOrder($_GET['id']),

    'register' => registerAccount(),


    // contact 
    'contact' => showContact(),

    
    
};




require_once './commons/disconnect-db.php';