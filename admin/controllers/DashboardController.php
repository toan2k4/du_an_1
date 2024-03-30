<?php 

function dashboard(){
    $view = 'dashboards/dashboard';
    $script = 'dashboard';


    // chart pie
    $dataProduct = thongke_top_ban_chay();
    // chart bar
    // if(!empty($dataDay))
    
    $dataDay = thongke_ngay();
    $dataWeek = thongke_tuan();
    $dataMonth = thongke_thang();
    $dataYear = thongke_nam();
    $dataQuy = thongke_quy();
    // debug($dataYear);
    $script2 = 'dashboards/chart-bar-pie';


    // doanh thu
    $moneyDay = totalMoneyDay();
    $moneyMonth = totalMoneyMonth(date('m'));
    $moneyYear = totalMoneyYear(date('Y'));
    $moneyWeek = totalMoneyWeek();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function earnMonth($month){
    $moneyMonth = totalMoneyMonth($month);
    if(empty($moneyMonth['tong'])){
        echo '0';
    }else{
        echo number_format($moneyMonth['tong'], 0, ',');
    }
}

function earnYear($year){
    $moneyYear = totalMoneyYear($year);
    if(empty($moneyYear['tong'])){
        echo '0';
    }else{
        echo number_format($moneyYear['tong'], 0, ',');
    }
}

