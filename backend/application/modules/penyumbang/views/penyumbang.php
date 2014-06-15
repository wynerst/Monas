<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-3">
            <a href="<?php echo current_url()?>/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Penyumbang</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered tableshorter">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Rekening</th>
              <th>Identitas</th>
              <th>Status</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Umur</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              foreach ($list as $penyumbang) :
            ?>
            <tr>
              <td><?php echo $penyumbang->nama?></td>
              <td><?php echo $penyumbang->bank_nama?> <?php echo $penyumbang->bank_akun?></td>
              <td><?php echo $penyumbang->jenis_id?> <?php echo $penyumbang->no_id?></td>
              <td><?php echo $penyumbang->status?></td>
              <td><?php echo $penyumbang->alamat?> <?php echo $penyumbang->kodepos?></td>
              <td><?php echo $penyumbang->hp?></td>
              <td><?php echo $penyumbang->email?></td>
              <td><?php echo $penyumbang->umur?></td>
              <td nowrap>
                <a href="<?php echo base_url()?>penyumbang/edit/<?php echo $penyumbang->id_penyumbang?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo base_url()?>penyumbang/delete/<?php echo $penyumbang->id_penyumbang?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            <?php 
              endforeach;
            else : ?>
            <tr>
              <td colspan="11">Belum Ada Data</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
       
    </div>

  </div>


</div> 
