<?php 

function showCheckout(){
    $views = 'checkout';
    $products = listProductByIdCart($_SESSION['cartID']);
    require_once PATH_VIEW . 'layouts/master.php';
}