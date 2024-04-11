<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Thu nhập (Theo tháng)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span id="earnMonth">
                                    <?= number_format($moneyMonth['tong']) ?>
                                </span> VND
                            </div>
                        </div>
                        <div class="col-auto">
                            <select name="" id="" class="form-control" onchange="thunhapMonth(this.value)">
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                    <option value="<?= $i ?>" <?= date('m') == $i ? 'selected' : null ?>>Tháng
                                        <?= $i ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Thu nhập (theo năm)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span id="earnYear">
                                    <?= number_format($moneyYear['tong']) ?>
                                </span> VND
                            </div>
                        </div>
                        <div class="col-auto">
                            <select name="" id="" class="form-control" onchange="thunhapYear(this.value)">
                                <?php for ($i = date('Y') - 5; $i <= date('Y'); $i++): ?>
                                    <option value="<?= $i ?>" <?= date('Y') == $i ? 'selected' : null ?>>Năm
                                        <?= $i ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Thu nhập (theo ngày)
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($moneyDay['tong']) ?> VND</div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Thu nhập (theo tuần)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= number_format($moneyWeek['tong']) ?> VND
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 ">
                    <div class="row d-flex flex-row align-items-center justify-content-between">
                        <div class="col-6">
                            <h6 class="m-0 font-weight-bold text-primary">Tổng quan thu nhập theo</h6>
                        </div>
                        <div class="col-6">
                            <select id="timePeriod" class="form-control">
                                <option value="day">Ngày</option>
                                <option value="week">Tuần</option>
                                <option value="month" selected>Tháng</option>
                                <option value="quy">Quý</option>
                                <option value="year">Năm</option>
                            </select>

                        </div>
                    </div>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myBarChart"></canvas>
                    </div>


                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Top 5 sản phẩm bán chạy</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 d-flex flex-column  small">
                        <?php
                        $mau = ['#4e73df', '#1cc88a', '#36b9cc', '#60616f', '#f6c23e'];
                        foreach ($dataProduct as $key => $value):
                            ?>
                            <span class="mr-2 my-2">
                                <i class="fas fa-circle " style="color:<?= $mau[$key] ?> ;"></i><?= $value['ten_sp'] ?>
                            </span>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<script>
    function thunhapMonth(month) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("earnMonth").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "<?= BASE_URL_ADMIN ?>?act=earn-month&month=" + month, true);
        xmlhttp.send();
    }
    function thunhapYear(year) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("earnYear").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "<?= BASE_URL_ADMIN ?>?act=earn-year&year=" + year, true);
        xmlhttp.send();
    }
</script>