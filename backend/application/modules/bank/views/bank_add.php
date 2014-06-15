      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo site_url()?>/bank" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-7">              
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Kelompok Penyumbang</label>
                  <div class="col-lg-7">
                    <select name="" id="input" class="form-control" required="required">
                      <option value="1">Pribadi</option>
                      <option value="2">Korporat</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Nama Bank</label>
                  <div class="col-lg-7">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Nomor Rekening</label>
                  <div class="col-lg-7">
                    <input type="text" id="input-3" class="form-control" name="website" data-trigger="change" data-type="url" />                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Atas Nama</label>
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
        </div>
      </div>
    </div>
