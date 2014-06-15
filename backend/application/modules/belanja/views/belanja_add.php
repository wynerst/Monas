      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo site_url()?>/belanja" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-10">              
                <div class="form-group">
                  <label for="input-3" class="col-lg-4 control-label">Nama Kegiatan Belanja</label>
                  <div class="col-lg-8">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-4 control-label">Nominal</label>
                  <div class="col-lg-8">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-4 control-label">Tanggal Keluar</label>
                  <div class="col-lg-8">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-4 control-label">Status</label>
                  <div class="col-lg-8">
                    <select name="" id="input" class="form-control" required="required">
                      <option value="1">Disetujui</option>
                      <option value="0">Belum Disetujui</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-4 control-label">Catatan</label>
                  <div class="col-lg-8">
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
        </div>
      </div>
    </div>
