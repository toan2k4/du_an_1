<?php 

// session_start();

//require các file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// Lấy dữ liệu global settings
$settings = settings();

// require các file trong model và controller 
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

$act = $_GET['act'] ?? '/';



match($act){
    '/' => homeIndex(),

    // blogs
    'blogs' => blogIndex(),
};




require_once './commons/disconnect-db.php';