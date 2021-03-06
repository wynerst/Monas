<div class="col-lg-4 col-sm-6 col-xs-12">
  <div class="well">
    <div class="row">
      <div class="col-lg-5 col-xs-6"><span class="sparkline-1">3,9,2,3,4,16,5,4,2,13,4,6,5,4</span></div>
      <div class="col-lg-7 col-xs-6">
        <h1 class="no-padding tip" title="Rp<?php echo ribuan($kemaren) ?>"><span class="text-muted">Rp</span><?php echo str_replace('.',',',substr(($kemaren/100000000),0,3)) ?> J</h1>
        <small>Kemaren</small>
      </div>
    </div>                                                           
  </div>
</div>
              
<div class="col-lg-4 col-sm-6 col-xs-12">
  <div class="well">
    <div class="row">
      <div class="col-lg-5 col-xs-6"><span class="sparkline-1">3,9,2,3,4,16,5,4,2,13,4,6,5,4</span></div>
      <div class="col-lg-7 col-xs-6">
        <h1 class="no-padding tip" title="Rp<?php echo ribuan($total) ?>"><span class="text-muted">Rp</span><?php echo str_replace('.',',',substr(($total/1000000000),0,3)) ?> M</h1>
        <small>Total Sementara</small>
      </div>
    </div>                                                           
  </div>
</div>

<div class="col-lg-4 col-sm-6 col-xs-12">
  <div class="well">
    <div class="row">
      <div class="col-lg-5 col-xs-6"><span class="sparkbar-1">6:7,3:5,8:12,5:9,2:4,5:8,7:9,3:5</span></div>
      <div class="col-lg-7 col-xs-6">
        <h1 class="no-padding"><?php echo ribuan($donatur) ?></h1>
        <small>Jumlah Donatur</small>
      </div>
    </div>                                                           
  </div>
</div>
 
<div class="clearfix"></div>
             
<div class="col-lg-12">               
  <div class="panel panel-default">                
    <div class="panel-heading">
      <h3 class="panel-title">Sumbangan Berdasar Bank</h3>
    </div>
    <hr>
    <div class="panel-body">
      <div class="chart">
        <canvas id="perbank" class="chartjs" height="300"></canvas>
      </div>
    </div>
    <div class="panel-footer">
      <i class="fa fa-circle" style="color:#ccc;"></i> BRI 
      <i class="fa fa-circle" style="color:#666;"></i> BCA
      <i class="fa fa-circle" style="color:#333;"></i> Bank Mandiri
    </div>
  </div>  
</div> 

<script type="text/javascript">
$(function(){
  //Line
  var chartData = {
      labels : [<?php echo $tanggal?>],
      datasets : [
          {
              fillColor         : "#ccc",
              strokeColor       : "#fff",
              pointColor        : "#000",
              pointStrokeColor  : "#fff",
              data : [<?php echo $bca?>]
          },
          {
              fillColor         : "#666",
              strokeColor       : "#fff",
              pointColor        : "#000",
              pointStrokeColor  : "#fff",
              data : [<?php echo $bri?>]
          },                
          {
              fillColor         : "#333",
              strokeColor       : "#fff",
              pointColor        : "#000",
              pointStrokeColor  : "#fff",
              data : [<?php echo $mandiri?>]
          }
      ]
  }

  var chartOption = {
      animation : false
  }
  //Line
  var l = $('#perbank');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChart );
  function lineChart(){ 
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var lineChart = new Chart(cl).Bar(chartData,chartOption);

  }
  lineChart();
});
</script>