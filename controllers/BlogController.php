<?php 

function blogIndex(){
    $views = 'blogs/blogs';
    $blogs = listAll('tb_bai_viet');
    // $blog = showOne('tb_bai_viet', $id);
    require_once PATH_VIEW . 'layouts/master.php';
}

function blogSingle($id)
{
    $views = 'blogs/single-blog';
    $blog = showOne('tb_bai_viet', $id);
    $best_blog = showBestBlog('tb_bai_viet');
    require_once PATH_VIEW . 'layouts/master.php';
}

