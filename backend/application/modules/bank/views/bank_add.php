      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-10">              
                <div class="form-group">
                  <label for="tanggal" class="col-lg-4 control-label">Tanggal</label>
                  <div class="col-lg-8">
                    <input type="text" id="tanggal" class="form-control date-range" name="tanggal" value="<?php echo set_value('tanggal'); ?>" data-required="true" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="bca" class="col-lg-4 control-label">Total Rekening BCA</label>
                  <div class="col-lg-8">
                    <input type="text" id="bca" class="form-control" name="bca" value="<?php echo set_value('bca'); ?>" data-required="true" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="bri" class="col-lg-4 control-label">Total Rekening BRI</label>
                  <div class="col-lg-8">
                    <input type="text" id="bri" class="form-control" name="bri" value="<?php echo set_value('bri'); ?>" data-required="true" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="mandiri" class="col-lg-4 control-label">Total Rekening Mandiri</label>
                  <div class="col-lg-8">
                    <input type="text" id="mandiri" class="form-control" name="mandiri" value="<?php echo set_value('mandiri'); ?>" data-required="true" />                    
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
