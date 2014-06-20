      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-7">              
                <div class="form-group">
                  <label for="relawan" class="col-lg-5 control-label">Nama Relawan</label>
                  <div class="col-lg-7">
                    <input type="text" id="relawan" class="form-control" name="relawan" data-required="true" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="link" class="col-lg-5 control-label">Tautan</label>
                  <div class="col-lg-7">
                    <input type="text" id="link" class="form-control" name="link" />                    
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
