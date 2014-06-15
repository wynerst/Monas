<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-3">
            <a href="<?php echo current_url()?>/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Bank</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Rekening</th>
              <th>Atas Nama</th>
              <th>Kelompok Penyumbang</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              foreach ($list as $bank) :
            ?>
            <tr>
              <td><?php echo $bank->nama?></td>
              <td><?php echo $bank->no_akun?></td>
              <td><?php echo $bank->atas_nama?></td>
              <td><?php echo ($bank->kel_penyumbang_id == 1)? 'Pribadi':'Korporat'; ?></td>
              <td nowrap>
                <a href="<?php echo base_url()?>bank/edit/<?php echo $bank->id_bank?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo base_url()?>bank/delete/<?php echo $bank->id_bank?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
              </td>
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
