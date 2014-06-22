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
              <div class="chart">
                <canvas id="perbank" class="chartjs" height="300"></canvas>
              </div>
              <hr>
              <div class="text-center">
                <i class="fa fa-circle" style="color:#cc;"></i> BCA &nbsp;&nbsp; 
                <i class="fa fa-circle" style="color:#666;"></i> BRI &nbsp;&nbsp;
                <i class="fa fa-circle" style="color:#333;"></i> MANDIRI &nbsp;&nbsp;
              </div>
            </div>            
            <div id="table" class="tab-pane">
              <div class="table-responsive">
                <table class="table table-bordered tablesorter">
                  <thead>
                    <tr>
                      <th class="text-center" data-lockedorder="asc">No</th>
                      <th>Tanggal</th>
                      <th data-filtered="false">BCA</th>
                      <th>BRI</th>
                      <th>Mandiri</th>
                      <th width="1" data-sorter="false"></th>
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
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td class="text-right"><?php echo tanggal($bank->tanggal)?></td>
                      <td class="text-right" title="<?php echo terbilang($bank->bca)?>">Rp<?php echo ribuan($bank->bca)?></td>
                      <td class="text-right" title="<?php echo terbilang($bank->bri)?>">Rp<?php echo ribuan($bank->bri)?></td>
                      <td class="text-right" title="<?php echo terbilang($bank->mandiri)?>">Rp<?php echo ribuan($bank->mandiri)?></td>
                      <td nowrap>
                        <a href="<?php echo site_url()?>/bank/edit/<?php echo $bank->id_sumbangan?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?php echo site_url()?>/bank/delete/<?php echo $bank->id_sumbangan?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></a>
                      </td>                      
                    </tr>
                    <?php 
                      $jumlah_bca     += $bank->bca;
                      $jumlah_bri     += $bank->bri;
                      $jumlah_mandiri += $bank->mandiri;
                      endforeach;
                    ?>
                    <?php else : ?>
                    <tr>
                      <td colspan="5">Belum Ada Data</td>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>              
            <div class="table-footer">
              <div class="ts-pager">
                <div class="row">
                  <div class="col-lg-6">
                    <form class="form-inline" role="form">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default first"><i class="icon-step-backward fa fa-angle-double-left"></i></button>
                        <button type="button" class="btn btn-default prev"><i class="icon-arrow-left fa fa-angle-left"></i></button>
                        <button type="button" class="btn btn-default next"><i class="icon-arrow-right fa fa-angle-right"></i></button>
                        <button type="button" class="btn btn-default last"><i class="icon-step-forward fa fa-angle-double-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-6">
                    <form class="form-inline text-right" role="form">
                      <div class="form-group">
                          <small class="pagedisplay text-muted"></small> 
                          <small class="text-muted">- Page</small>
                          <select id="page" class="pagenum form-control"></select>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
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