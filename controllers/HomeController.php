<?php 

function homeIndex(){
    $views = 'home';
    $productsPopular = listProductPopular();
    $productsNew = listProductNew();
    $productsRating = listProductRating();
    require_once PATH_VIEW . 'layouts/master.php';
}