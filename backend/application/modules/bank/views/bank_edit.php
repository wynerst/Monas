      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <?php echo form_hidden('id_sumbangan', $result[0]->id_sumbangan) ?>
              <div class="col-lg-12">
                <?php echo $custom_error; ?>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-8">              
                <div class="form-group">
                  <label for="tanggal" class="col-lg-5 control-label">Tanggal</label>
                  <div class="col-lg-7">
                    <input type="text" id="tanggal" class="form-control date-range" name="tanggal" value="<?php echo $result[0]->tanggal ?>" data-required="true" placeholder="yyyy/mm/dd" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="bca" class="col-lg-5 control-label">Total Rekening BCA</label>
                  <div class="col-lg-7">
                     <div class="input-group">
                      <span class="input-group-addon">RP</span>
                      <input id="bca" type="text" class="form-control text-right" name="bca" value="<?php echo (int)$result[0]->bca ?>" placeholder="0" data-required="true" />
                      <span class="input-group-addon">.00</span>
                    </div>                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="bri" class="col-lg-5 control-label">Total Rekening BRI</label>
                  <div class="col-lg-7">
                     <div class="input-group">
                      <span class="input-group-addon">RP</span>
                      <input id="bri" type="text" class="form-control text-right" name="bri" value="<?php echo (int)$result[0]->bri ?>" placeholder="0" data-required="true" />
                      <span class="input-group-addon">.00</span>
                    </div>                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="mandiri" class="col-lg-5 control-label">Total Rekening Mandiri</label>
                  <div class="col-lg-7">
                     <div class="input-group">
                      <span class="input-group-addon">RP</span>
                      <input id="mandiri" type="text" class="form-control text-right" name="mandiri" value="<?php echo (int)$result[0]->mandiri ?>" placeholder="0" data-required="true" />
                      <span class="input-group-addon">.00</span>
                    </div>                    
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
