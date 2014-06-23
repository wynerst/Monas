      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-12">
                <?php echo $custom_error; ?>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-6">              
                <div class="form-group">
                  <label for="group" class="col-lg-5 control-label">Nama Group</label>
                  <div class="col-lg-7">
                    <input type="text" id="group" class="form-control" name="group" data-required="true" />                    
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
        </div>
      </div>
    </div>
