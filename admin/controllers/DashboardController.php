<?php 

function dashboard(){
    $view = 'dashboards/dashboard';
    $script = 'dashboard';


    // chart pie
    $dataProduct = thongke_top_ban_chay();
    // chart bar
    $dataDay = thongke_ngay();
    $dataWeek = thongke_tuan();
    $dataMonth = thongke_thang();
    $dataYear = thongke_nam();
    $dataQuy = thongke_quy();
    // debug($dataYear);
    $script2 = 'dashboards/chart-bar-pie';


    // doanh thu
    $moneyDay = totalMoneyDay();
    $moneyMonth = totalMoneyMonth();
    $moneyYear = totalMoneyYear();
    $moneyWeek = totalMoneyWeek();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

