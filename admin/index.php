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
match($act){
    '/' => dashboard(),

    // user
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),

    // roles
    'roles' => roleListAll(),
    'role-detail' => roleShowOne($_GET['id']),
    'role-create' => roleCreate(),
    'role-update' => roleUpdate($_GET['id']),
    'role-delete' => roleDelete($_GET['id']),


};



require_once '../commons/disconnect-db.php';