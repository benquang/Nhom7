<?php
require_once('../util/main.php');?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    
  </p>
</figure>

<div class="panel panel-default">
  <div class="panel-heading">
      <h4>Chú thích</h4>
  </div>
  <div>
  <!--arr: Trí Tuệ Nhân Tạo - Mạng Và An Ninh Mạng - Hệ Thống Thông Tin - Công Nghệ Phần Mềm -->
    <a href="javascript:void();" class="list-group-item">Trí Tuệ Nhân Tạo
    <span class="badge" style="background-color: #2ecc71;"><?php echo $_SESSION['countArray0'][0];?> ĐT</span></a>
  </div>
  <div>
    <a href="javascript:void();" class="list-group-item">Mạng Và An Ninh Mạng
    <span class="badge" style="background-color: #e74c3c;"><?php echo $_SESSION['countArray0'][1];?> ĐT</span></a>
  </div>
  <div>
    <a href="javascript:void();" class="list-group-item">Hệ Thống Thông Tin
    <span class="badge" style="background-color: #8e44ad;"><?php echo $_SESSION['countArray0'][2];?> ĐT</span></a>
  </div>
  <div>
    <a href="javascript:void();" class="list-group-item">Công Nghệ Phần Mềm
    <span class="badge" style="background-color: #8e44ad;"><?php echo $_SESSION['countArray0'][3];?> ĐT</span></a>
  </div>
  <div>
    <a href="javascript:void();" class="list-group-item">Tổng Cộng
    <span class="badge" style="background-color: lightgray;"><?php echo $_SESSION['sumArray0'];?> ĐT</span></a>
  </div>
</div>

<script>
    // Data retrieved from https://netmarketshare.com
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Browser market shares in May, 2020'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    //arr: Trí Tuệ Nhân Tạo - Mạng Và An Ninh Mạng - Hệ Thống Thông Tin - Công Nghệ Phần Mềm -
    data: [{
      name: 'Trí Tuệ Nhân Tạo',
      y: <?php echo $_SESSION["countArray0"][0]/$_SESSION["sumArray0"]*100;?>,
      sliced: true,
      selected: true
    }, {
      name: 'Mạng Và An Ninh Mạng',
      y: <?php echo $_SESSION["countArray0"][1]/$_SESSION["sumArray0"]*100;?>
    },  {
      name: 'Hệ Thống Thông Tin',
      y: <?php echo $_SESSION["countArray0"][2]/$_SESSION["sumArray0"]*100;?>
    }, {
      name: 'Công Nghệ Phần Mềm',
      y: <?php echo $_SESSION["countArray0"][3]/$_SESSION["sumArray0"]*100;?>
    }
    ]
  }]
});

</script>

<style>
.panel panel-default{

  position: relative;
  display: block;
  padding: 10px 15px;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid #ddd;
  box-sizing: border-box;
    
}
a{
  text-decoration: none;
  color: rgb(3, 74, 130);
}
a:hover{
  color:hotpink;
}

    .highcharts-figure,
.highcharts-data-table table {
  min-width: 320px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

input[type="number"] {
  min-width: 50px;
}
</style>

