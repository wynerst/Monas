<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-3">
            <a href="<?php echo current_url()?>/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Group</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Group</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              foreach ($list as $group) :
            ?>
            <tr>
              <td><?php echo $group->nama_group?></td>
              <td nowrap>
                <a href="<?php echo site_url()?>/group/edit/<?php echo $group->id_group?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <?php 
                  $used_group = $this->db->get_where('user', array('id_group' => $group->id_group));
                  if($used_group->num_rows() > 0 ) :
                ?>
                <a href="#" title="Tidak diperkenankan untuk dihapus karena masih ada operator yang terdaftar dalam group ini." class="btn btn-danger btn-xs undelete"><i class="fa fa-trash-o"></i></a>
              <?php else : ?>
                <a href="<?php echo site_url()?>/group/delete/<?php echo $group->id_group?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></a>
              <?php endif ?>
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
       
    </div>

  </div>


</div> 
