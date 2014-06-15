<div class="col-lg-12">
  <ul class="nav nav-pills">
    <li class="active"><a href="#grafik" data-toggle="tab">Grafik</a></li>
    <li><a href="#table" data-toggle="tab" >Table</a></li>
  </ul>
  <br>    

  <div class="tab-content">
    <div id="table" class="tab-pane ">                
      <div class="panel panel-default">
        <div class="panel-body">                   
          <div class="table-header">
            <div class="row">                     
              <div class="col-lg-12 text-right">
                <a href="<?php echo current_url()?>/print" target="_blank" class="btn btn-inverse"><i class="fa fa-print"></i> Print</a>
                <a href="<?php echo current_url()?>/csv" class="btn btn-inverse"><i class="fa fa-arrow-down"></i> Unduh CSV</a>
              </div>
            </div>
          </div>  
                             
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nominal</th>
                  <th>Tanggal Menyumbang</th>
                  <th>Penyumbang</th>
                  <th>Disimpan Dalam Rekening </th>
                  <th>Tanggal Dibuat</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if(count($list) > 0 ) :
                  foreach ($list as $laporan) :
                ?>
                <tr>
                  <td class="text-right">Rp<?php echo ribuan($laporan->nominal)?></td>
                  <td><?php echo $laporan->tgl?></td>
                  <td><a href="#"><?php echo $laporan->penyumbang?></a></td>
                  <td><?php echo $laporan->bank?></td>
                  <td><?php echo $laporan->create?></td>
                </tr>
                <?php 
                  endforeach;
                else : ?>
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
          <i class="fa fa-circle" style="color:#cc;"></i> Bank A 
          <i class="fa fa-circle" style="color:#666;"></i> Bank B
          <i class="fa fa-circle" style="color:#333;"></i> Bank C
        </div>
      </div>  
    </div>    
  </div>

</div> 
