      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php if($group != 0 ) { ?>
            <form action="<?php echo site_url()?>/operator" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-7">              
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Hak Akses</label>
                  <div class="col-lg-7">
                    <select name="" id="input" class="form-control" required="required">
                      <option value="1">Administrator</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Username</label>
                  <div class="col-lg-7">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Password</label>
                  <div class="col-lg-7">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Nama Lengkap</label>
                  <div class="col-lg-7">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Email</label>
                  <div class="col-lg-7">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
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
