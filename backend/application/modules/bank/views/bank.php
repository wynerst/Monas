<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">   
      
      <div class="table-header">
        <div class="row">                     
          <div class="col-lg-7">
            <a href="<?php echo site_url()?>/bank/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Berdasar Bank</a>
            <a href="<?php echo site_url()?>/bank/import" class="btn btn-danger"><i class="fa fa-upload"></i> Import CSV</a>
            <a href="<?php echo site_url()?>/bank/prints" target="_blank" class="btn btn-inverse"><i class="fa fa-print"></i> Print Table</a>
            <a href="<?php echo site_url()?>/bank/csv" class="btn btn-inverse"><i class="fa fa-download"></i> CSV Table</a>
          </div>
          <div class="col-lg-5 text-right">
            <form action="<?php echo current_url()?>" method="POST" class="form-inline" role="form">            

              <div class="form-group">
                <select id="filter" name="filter" class="form-control">
                  <option value="tanggal">Tanggal</option>
                  <option value="bca">BCA</option>
                  <option value="bri">BRI</option>
                  <option value="mandiri">Mandiri</option>
                </select>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="q" id="search" placeholder="yyyy/mm/dd">
              </div>              
            
              <button type="submit" class="btn btn-inverse">Search</button>
            </form>
          </div>
        </div>
      </div>  
                         
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
              if($this->uri->segment(3) != '' )
              {
                $i = $this->uri->segment(3) + 1;                
              } else {
                $i = 1;
              }

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
    case 'tanggal' :
      $('#search').val('').removeClass('text-right').addClass('date-range').removeAttr('placeholder').attr('placeholder','yyyy/mm/dd'); 
    break;

    case 'bca' :
    case 'bri' :
    case 'mandiri' :
      $('#search').val('').addClass('text-right').removeAttr('placeholder').attr('placeholder','0');
    break;

  }
});
</script>
