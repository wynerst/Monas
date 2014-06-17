      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-12">
                <?php echo $custom_error; ?>
              </div>
              <div class="col-lg-10">              
                <div class="form-group">
                  <label for="nama" class="col-lg-4 control-label">Nama Penyumbang</label>
                  <div class="col-lg-8">
                    <input id="nama" type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" data-required="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="bank_nama" class="col-lg-4 control-label">Transfer Ke Bank</label>
                  <div class="col-lg-8">
                  <?php 
                  echo form_dropdown('bank_transfer', $bank_list, 'BRI');
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal_transfer" class="col-lg-4 control-label">Tanggal Transfer</label>
                  <div class="col-lg-8">
                    <input id="tanggal_transfer" type="text" class="form-control date-range" name="tanggal_transfer" placeholder="yyyy/mm/dd" data-required="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="nominal" class="col-lg-4 control-label">Nominal</label>
                  <div class="col-lg-8">
                    <div class="input-group">
                      <span class="input-group-addon">RP</span>
                      <input id="nominal" type="text" class="form-control text-right" name="nominal" value="<?php echo set_value('nominal'); ?>"  />
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
