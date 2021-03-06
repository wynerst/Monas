<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-3">
            <a href="<?php echo site_url()?>/operator/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Operator</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Last Update</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              foreach ($list as $operator) :
            ?>
            <tr>
              <td><?php echo $operator->nama?></td>
              <td><?php echo $operator->email?></td>
              <td class="text-right"><?php echo $operator->create_time?></td>
              <td nowrap>
                <a href="<?php echo site_url()?>/operator/edit/<?php echo $operator->id_user?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url()?>/operator/delete/<?php echo $operator->id_user?>" class="btn btn-danger btn-xs delete" ><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            <?php 
              endforeach;
            else : ?>
            <tr>
              <td colspan="4">Belum Ada Data</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="table-footer">
        <div class="row">                     
          <div class="col-lg-12 text-right">
            <?php echo $this->pagination->create_links()?>
          </div>
        </div>
      </div>  
       
    </div>
  </div>
</div> 
