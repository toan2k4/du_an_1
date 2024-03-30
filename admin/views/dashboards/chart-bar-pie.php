<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  document.getElementById("timePeriod").addEventListener("change", function () {
    var selectedValue = this.value;
    var newData = [];
    var newLabels = [];
    var max = [];
    switch (selectedValue) {
      <?php if(!empty($dataDay)):?>
      case 'day':
        newData = [
          <?= implode(',', array_column($dataDay, 'tong')) ?>
        ];
        newLabels = [
          <?php foreach ($dataDay as $gio) {
            echo '["' . $gio['thu'] . '"],';
          } ?>
        ];
        max = <?= max(array_column($dataDay, 'tong')) ?>;
        break;
        <?php endif?>
      case 'week':
        newData = [
          <?= implode(',', array_column($dataWeek, 'tong')) ?>
        ];
        newLabels = [
          <?php foreach ($dataWeek as $week) {
            echo '["' . $week['ngay'] . '"],';
          } ?>
        ];
        max = <?= max(array_column($dataWeek, 'tong')) ?>;
        break;
      case 'month':
        newData = [
          <?= implode(',', array_column($dataMonth, 'tong')) ?>
        ];
        newLabels = [
          <?php foreach ($dataMonth as $thang) {
            echo '["Tháng: ' . $thang['thang'] . '"],';
          } ?>
        ];
        max = <?= max(array_column($dataMonth, 'tong')) ?>;
        break;
      case 'quy':
        newData = [
          <?= implode(',', array_column($dataQuy, 'tong')) ?>
        ];
        newLabels = [
          <?php foreach ($dataQuy as $quy) {
            echo '["' . $quy['quy'] . '"],';
          } ?>
        ];
        max = <?= max(array_column($dataQuy, 'tong')) ?>;
        break;
      case 'year':
        newData = [
          <?= implode(',', array_column($dataYear, 'tong')) ?>
        ];
        newLabels = [
          <?php foreach ($dataYear as $nam) {
            echo '["Năm: ' . $nam['nam'] . '"],';
          } ?>
        ];
        max = <?= max(array_column($dataYear, 'tong')) ?>;
        break;
      default:
      newData = [
          <?= implode(',', array_column($dataMonth, 'tong')) ?>
        ];
        newLabels = [
          <?php foreach ($dataMonth as $thang) {
            echo '["Tháng: ' . $thang['thang'] . '"],';
          } ?>
        ];
        max = <?= max(array_column($dataMonth, 'tong')) ?>;
        break;
    }

    myBarChart.data.datasets[0].data = newData;
    myBarChart.data.labels = newLabels;
    myBarChart.options.scales.yAxes[0].ticks.max = max;
    myBarChart.update();
  });


  // Bar Chart Example
  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php foreach ($dataMonth as $thang) {
            echo '["Tháng: ' . $thang['thang'] . '"],';
          } ?>],
      datasets: [{
        label: "Doanh thu",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: [<?= implode(',', array_column($dataMonth, 'tong')) ?>],
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 6
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: <?= max(array_column($dataDay, 'tong')) ?>,
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              return number_format(value) + ' vnd';
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
          label: function (tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
          }
        }
      },
    }
  });






  // <!-- ==================================== chart pie ======================== -->

  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
        <?php foreach ($dataProduct as $pro) {
          echo '["' . $pro['ten_sp'] . '"],';
        } ?>
      ],
      datasets: [{
        data: [<?= implode(',', array_column($dataProduct, 'tong')) ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#60616f', '#f6c23e'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });


</script>