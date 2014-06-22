<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <?php if($user_group != 0 ) { ?>
      <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
        <?php echo form_hidden('id_user', $result[0]->id_user) ?>
        <div class="col-lg-12">
          <?php echo $custom_error; ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6">              
          <div class="form-group">
            <label for="akses" class="col-lg-5 control-label">Hak Akses</label>
            <div class="col-lg-7">
            <?php 
            echo form_dropdown('akses', $user_group, $result[0]->id_group);
            ?>
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-lg-5 control-label">Nama Lengkap</label>
            <div class="col-lg-7">
              <input type="text" id="nama" class="form-control" name="nama" value="<?php echo $result[0]->nama ?>" data-required="true" />                    
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-lg-5 control-label">Email</label>
            <div class="col-lg-7">
              <input type="text" id="email" class="form-control" name="email" value="<?php echo $result[0]->email ?>" data-type="email" data-required="true" />                    
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="username" class="col-lg-5 control-label">Username</label>
            <div class="col-lg-7">
              <input type="text" id="username" class="form-control" name="username" value="<?php echo $result[0]->username ?>" data-required="true" />                    
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-lg-5 control-label">Password</label>
            <div class="col-lg-7">
              <input type="password" id="password" class="form-control" name="password" data-required="true" />                    
            </div>
          </div>
          <div class="form-group">
            <label for="retype-password" class="col-lg-5 control-label">Retype Password</label>
            <div class="col-lg-7">
              <input type="password" id="retype-password" class="form-control" name="retype-password" data-required="true" />                    
            </div>
          </div>

        </div>

        <div class="clearfix"></div>

        <div class="col-lg-12">
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
