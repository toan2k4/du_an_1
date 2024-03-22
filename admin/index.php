<?php 
session_start();
//require các file trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';



// require các file trong model và controller 
require_file(PATH_CONTROLLER_ADMIN);

$act = $_GET['act'] ?? '/';
match($act){
    '/' => dashboard(),

    // user
    'users' => userListAll(),

    // roles
    'roles' => roleListAll(),
    'role-detail' => roleShowOne($_GET['id']),
    'role-create' => roleCreate(),
    'role-update' => roleUpdate($_GET['id']),
    'role-delete' => roleDelete($_GET['id']),


};



require_once '../commons/disconnect-db.php';