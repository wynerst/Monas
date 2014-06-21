      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php echo form_open_multipart(current_url(),array('class' => 'form-horizontal', 'role' => 'form', 'data-validate' => 'parsley'))?>
              <div class="col-lg-12">
                <?php echo $custom_error; ?>
              </div>
              <div class="col-lg-6">              
                <div class="form-group">
                  <label for="userfile" class="col-lg-6 control-label">CSV File</label>
                  <div class="col-lg-6">
                    <input id="userfile" type="file" class="form-control" name="userfile" value="<?php echo set_value('nama'); ?>" data-required="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="delimiter" class="col-lg-6 control-label">Delimiter</label>
                  <div class="col-lg-6">
                    <select name="delimiter" class="form-control">
                      <option value="," selected>[ , ] Comma</option>
                      <option value=";">[ ; ] Semicolon</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12">
                <hr>
                <div class="text-right">
                  <button type="reset" class="btn btn-default">Reset</button>
                  <button type="submit" class="btn btn-danger" name="submit">Simpan</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
