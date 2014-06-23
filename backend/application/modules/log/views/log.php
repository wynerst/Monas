<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-12 text-right">
            <a href="<?php echo site_url()?>/log/clear" class="btn btn-inverse"><i class="fa fa-refresh"></i> Clear Log</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Modul</th>
              <th>User</th>
              <th>Message</th>
              <th>Last Update</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              foreach ($list as $log) :
            ?>
            <tr>
              <td><?php echo $log->modul?></td>
              <td><?php echo $log->nama?></td>
              <td><?php echo $log->message?></td>
              <td class="text-right"><?php echo $log->waktu?></td>
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
