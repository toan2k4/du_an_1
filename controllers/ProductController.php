<?php

function singleProduct()
{
    $views = 'single-product';
    require_once PATH_VIEW . 'layouts/master.php';
}

function listProduct()
{
    $views = 'list-product';
    $price = minMaxPrice();
    $id_danh_muc = isset($_GET['id_danh_muc']) ? $_GET['id_danh_muc'] : null;
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $priceMin = isset($_POST['priceMin']) ? $_POST['priceMin'] : '';
    $priceMax = isset($_POST['priceMax']) ? $_POST['priceMax'] : '';
    $productsPopular = listProductPopular(3);
    $products = getSearchProduct($id_danh_muc, $search, $priceMin, $priceMax);
    // debug($products);
    require_once PATH_VIEW . 'layouts/master.php';
}

