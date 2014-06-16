      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo site_url()?>/akses" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-7">              
                <div class="form-group">
                  <label for="input-3" class="col-lg-5 control-label">Hak Akses</label>
                  <div class="col-lg-7">
                    <select name="" id="input" class="form-control" required="required">
                      <option value="1">Administrator</option>
                      <option value="2">Staf</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Modul</th>
                      <th>Read</th>
                      <th>Write</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Masterfile</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Kelompok Penyumbang</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Bank</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>Sumbangan</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Penyumbang</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Belanja</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>Laporan</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Suluruh Sumbangan</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Sumbangan Per Bank</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>Chat</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>Pengguna</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Data Operator</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Hak Akses</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>                  
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Data Pribadi</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>                  
                    <tr>
                      <td>Konfigurasi</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Umum</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-level-down"></i>&nbsp;&nbsp;Log System</td>
                      <td><input type="checkbox"></td>
                      <td><input type="checkbox"></td>
                    </tr>                  
                  </tbody>
                </table>

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
