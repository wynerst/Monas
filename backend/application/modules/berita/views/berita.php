<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-3">
            <a href="<?php echo current_url()?>/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Berita</a>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" width="1">No.</th>
              <th>Judul</th>
              <th>Dibuat Oleh</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              if($this->uri->segment(3) != '' ) {
                $i = $this->uri->segment(3) + 1;                
              } else {
                $i = 1;
              }
              foreach ($list as $berita) :
            ?>
            <tr>
              <td class="text-center"><?php echo $i++?></td>
              <td><?php echo $berita->judul?></td>
              <td><?php echo $this->login->user_by_id($berita->id_user)?></td>
              <td nowrap>
                <a href="<?php echo site_url()?>/berita/edit/<?php echo $berita->id_berita?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url()?>/berita/delete/<?php echo $berita->id_berita?>" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></a>
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