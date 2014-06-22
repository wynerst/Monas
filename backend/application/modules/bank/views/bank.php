<div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">   
          <div class="table-header">
            <div class="row">                     
              <div class="col-lg-8">
                <a href="<?php echo current_url()?>/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Berdasar Bank</a>
                <a href="<?php echo current_url()?>/import" class="btn btn-danger"><i class="fa fa-upload"></i> Import CSV</a>
                <a href="<?php echo current_url()?>/prints" target="_blank" class="btn btn-inverse"><i class="fa fa-print"></i> Print Table</a>
                <a href="<?php echo current_url()?>/csv" class="btn btn-inverse"><i class="fa fa-download"></i> CSV Table</a>
              </div>
              <div class="col-lg-4 text-right">
                <ul class="nav nav-pills nav-justified">
                  <li class="active"><a href="#grafik" data-toggle="tab">Grafik</a></li>
                  <li><a href="#table" data-toggle="tab" >Table</a></li>
                </ul>
              </div>
            </div>
          </div>  
                             
          <div class="tab-content">
            <div id="grafik" class="tab-pane active">
              <div class="panel panel-default">                
                <div class="panel-heading">
                  <h3 class="panel-title">Jumlah Sumbangan Per Bank</h3>
                </div>
                <hr>
                <div class="panel-body">
                  <div class="chart">
                    <canvas id="perbank" class="chartjs" height="300"></canvas>
                  </div>
                </div>
                <div class="panel-footer">
                  <i class="fa fa-circle" style="color:#cc;"></i> BCA 
                  <i class="fa fa-circle" style="color:#666;"></i> BRI
                  <i class="fa fa-circle" style="color:#333;"></i> MANDIRI
                </div>
              </div>  
            </div>            
            <div id="table" class="tab-pane ">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Tanggal</th>
                      <th>BCA</th>
                      <th>BRI</th>
                      <th>Mandiri</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(count($list) > 0 ) :
                      $i      = 1;
                      $jumlah_bca = $jumlah_bri = $jumlah_mandiri = 0;
                      foreach ($list as $bank) :
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $bank->tanggal?></td>
                      <td class="text-right" title="<?php echo terbilang($bank->bca)?>">Rp<?php echo ribuan($bank->bca)?></td>
                      <td class="text-right" title="<?php echo terbilang($bank->bri)?>">Rp<?php echo ribuan($bank->bri)?></td>
                      <td class="text-right" title="<?php echo terbilang($bank->mandiri)?>">Rp<?php echo ribuan($bank->mandiri)?></td>
                    </tr>
                    <?php 
                      $jumlah_bca     += $bank->bca;
                      $jumlah_bri     += $bank->bri;
                      $jumlah_mandiri += $bank->mandiri;
                      endforeach;
                    ?>
                    <tfooter>
                      <tr>
                        <th colspan="2">Jumlah</th>
                        <th class="text-right" title="<?php echo terbilang($jumlah_bca)?>">Rp<?php echo ribuan($jumlah_bca)?></th>
                        <th class="text-right" title="<?php echo terbilang($jumlah_bri)?>">Rp<?php echo ribuan($jumlah_bri)?></th>
                        <th class="text-right" title="<?php echo terbilang($jumlah_mandiri)?>">Rp<?php echo ribuan($jumlah_mandiri)?></th>
                      </tr>
                    </tfoot>
                    <?php else : ?>
                    <tr>
                      <td colspan="5">Belum Ada Data</td>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>            
        </div>
      </div>
    </div>

<script type="text/javascript">
$(function(){
  //Line
  var chartData = {
      labels : [<?php echo $graph->tanggal?>],
      datasets : [
          {
              fillColor         : "#ccc",
              strokeColor       : "#fff",
              pointColor        : "#000",
              pointStrokeColor  : "#fff",
              data : [<?php echo $graph->bca?>]
          },
          {
              fillColor         : "#66",
              strokeColor       : "#fff",
              pointColor        : "#000",
              pointStrokeColor  : "#fff",
              data : [<?php echo $graph->bri?>]
          },                
          {
              fillColor         : "#333",
              strokeColor       : "#fff",
              pointColor        : "#000",
              pointStrokeColor  : "#fff",
              data : [<?php echo $graph->mandiri?>]
          }
      ]
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
      var lineChart = new Chart(cl).Bar(chartData);

  }
  lineChart();
});
</script>