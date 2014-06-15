<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-3">
            <a href="<?php echo current_url()?>/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Belanja</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Belanja</th>
              <th>Nominal</th>
              <th>Tanggal Keluar</th>
              <th>Persetujuan</th>
              <th>Catatan</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              foreach ($list as $belanja) :
            ?>
            <tr>
              <td><?php echo $belanja->belanja?></td>
              <td class="text-right">Rp<?php echo $belanja->nominal?></td>
              <td><?php echo $belanja->tgl_keluar?></td>
              <td><?php echo $belanja->persetujuan?></td>
              <td><?php echo $belanja->catatan?></td>
              <td nowrap>
                <a href="<?php echo base_url()?>bank/edit/<?php echo $belanja->id_belanja?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo base_url()?>bank/delete/<?php echo $belanja->id_belanja?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            <?php 
              endforeach;
            else : ?>
            <tr>
              <td colspan="6">Belum Ada Data</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
       
    </div>

  </div>


</div> 
