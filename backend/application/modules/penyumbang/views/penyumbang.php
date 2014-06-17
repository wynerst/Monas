  <div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">   

      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-6">
            <a href="<?php echo site_url()?>/penyumbang/  add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Penyumbang</a>
          </div>
          <div class="col-lg-6 text-right">
            <form action="<?php echo current_url()?>" method="POST" class="form-inline" role="form">
            
              <div class="form-group">
                <select id="filter" name="filter" class="form-control">
                  <option value="nama">Nama</option>
                  <option value="tanggal">Tanggal Transfer</option>
                  <option value="nominal">Nominal</option>
                </select>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="q" id="search" placeholder="Keyword">
              </div>              
            
              <button type="submit" class="btn btn-inverse">Search</button>
            </form>
          </div>
        </div>
      </div>  
                         
      <div class="table-responsive">
        <table class="table table-bordered tableshorter">
          <thead>
            <tr>
              <th width="1" class="text-center">No</th>
              <th>Nama</th>
              <th>Transfer Ke Bank</th>
              <th>Tanggal Transfer</th>
              <th class="text-right">Nominal</th>
              <th width="1">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(count($list) > 0 ) :
              if($this->uri->segment(3) != '' )
              {
                $i = $this->uri->segment(3) + 1;                
              } else {
                $i = 1;
              }
              foreach ($list as $penyumbang) :
            ?>
            <tr>
              <td class="text-center"><?php echo $i++?></td>
              <td><?php echo $penyumbang->nama?></td>
              <td><?php echo $penyumbang->bank_transfer?></td>
              <td><?php echo $penyumbang->tgl?></td>
              <td class="text-right" title="<?php echo terbilang($penyumbang->nominal)?> Rupiah">Rp<?php echo ribuan($penyumbang->nominal)?></td>
              <td nowrap>
                <a href="<?php echo site_url()?>/penyumbang/edit/<?php echo $penyumbang->id_sumbangan?>" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url()?>/penyumbang/delete/<?php echo $penyumbang->id_sumbangan?>" class="btn btn-danger btn-xs" onClick="return deletechecked('<?php echo site_url()?>/penyumbang/delete/<?php echo $penyumbang->id_sumbangan?>')"><i class="fa fa-trash-o"></i></a>
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

<script type="text/javascript">
$('#filter').change(function(){
  var filter = $(this).val();
  switch(filter) {
    default:
    case 'nama' :
      $('#search').val('').removeClass('text-right date-range').removeAttr('placeholder').attr('placeholder','Keyword');
    break;

    case 'tanggal' :
      $('#search').val('').removeClass('text-right').addClass('date-range').removeAttr('placeholder').attr('placeholder','yyyy/mm/dd'); 
    break;

    case 'nominal' :
      $('#search').val('').removeClass('text-right date-range').addClass('text-right').removeAttr('placeholder').attr('placeholder','0');
    break;

  }
});
</script>