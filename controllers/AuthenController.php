<?php

function authenShowFormLogin()
{
    $views = 'login-register';
    if ($_POST) {
        authenLogin();
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function authenLogin()
{
    $user = getUserClientByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($user)) {
        $_SESSION['error'] = 'Email hoặc password chưa đúng!';

        header('Location: ' . BASE_URL . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;
    if ($_SESSION['user']['ten_chuc_vu'] == "Admin") {
        header('Location: ' . BASE_URL_ADMIN);
        exit();
    }else if($_SESSION['user']['ten_chuc_vu'] == "User"){
        header('Location: ' . BASE_URL);
        exit();
    }


}

function authenLogout()
{
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('Location: ' . BASE_URL);
    exit();
}