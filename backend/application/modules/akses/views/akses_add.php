<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <?php if($user_group != 0 ) { ?>
      <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
        <?php echo $custom_error?>
        <div class="col-lg-7">              
          <div class="form-group">
            <label for="input-3" class="col-lg-5 control-label">Hak Akses</label>
            <div class="col-lg-7">
            <?php 
            echo form_dropdown('akses', $user_group, '2');
            ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Modul</th>
                <th class="text-center" width="1">Status Akses</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=0;
              foreach ($menu as $key => $modul) : 
              ?>
              <tr>
                <td><label for="check<?php echo $i?>"><strong><?php echo $modul['menu']?></strong></label></td>
                <td class="text-center"><input type="checkbox" id="check<?php echo $i?>" name="modul_id[]" value="<?php echo $key?>"></td>
              </tr>
              <?php 
              if(count($modul['sub']) > 0 ) :
                foreach ($modul['sub'] as $key => $sub) : ?>
                <tr>
                  <td><label for="check<?php echo $i?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-out"></i>&nbsp;&nbsp;<?php echo $sub?></label></td>
                  <td class="text-center"><input type="checkbox" id="check<?php echo $i?>" name="modul_id[]" value="<?php echo $key?>"></td>
                </tr>                
                <?php $i++; endforeach; endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>

          <hr>
          <div class="text-right">
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </div>
      </form>
      <?php } else { ?>
        <div class="alert alert-info">
          Data Group Operator belum Tersedia. Mohon isikan terlebih dahulu. <a href="<?php echo site_url()?>/group/add">Klik Disini</a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
