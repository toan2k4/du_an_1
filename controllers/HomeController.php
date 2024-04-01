<?php 

function homeIndex(){
    $views = 'home';
    $productsPopular = listProductPopular();
    $productsNew = listProductNew();
    $productsRating = listProductRating();
    $best_blog_home = showBestBlogHome('tb_bai_viet');
    require_once PATH_VIEW . 'layouts/master.php';
}

