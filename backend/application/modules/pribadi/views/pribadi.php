<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
      <form class="form-horizontal" role="form" method="post">
        <input type="hidden" name="user_id" value="<?php echo $pribadi->id_user?>">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-lg-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#personal" data-toggle="tab">Data Pribadi</a></li>
                <li><a href="#contact" data-toggle="tab">Alamat Kontak</a></li>
                <li><a href="#password" data-toggle="tab">Ubah Kata Sandi</a></li>
              </ul>
              <br>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3">
              <div class="well well-default text-center">
                <div class="img-responsive">
                  <img src="<?php echo base_url().IMG?>/avatar/blank.jpg" alt=""  class="img-thumbnail" />
                </div>
                <br>
                <br>
                <input type="file" class="form-control filestyle" data-classButton="btn btn-inverse" data-input="false" data-classIcon="fa fa-plus" id="inputFile">
              </div>
            </div>
            <div class="col-lg-9 ">
              <div class="tab-content">
                <div id="personal" class="tab-pane active">
                  <div class="well well-default">
                    <h3 class="page-header">Data Pribadi</h3>
                    <div class="form-group">
                      <label for="user_login" class="col-lg-4 control-label">Username</label>
                      <div class="col-lg-8">
                        <input type="text" name="user_login" id="user_login" value="<?php echo $pribadi->username?>" class="form-control" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="first_name" class="col-lg-4 control-label">Nama Lengkap</label>
                      <div class="col-lg-8">
                        <input type="text" name="first_name" id="first_name" value="<?php echo $pribadi->nama?>" class="form-control" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="display_name" class="col-lg-4 control-label">Hak Akses</label> 
                      <div class="col-lg-8">
                        <select name="display_name" id="display_name">
                          <option value="1" selected>Administrator</option>
                          <option value="2">Staff</option>
                        </select>
                      </div>                      
                    </div>      
                  </div>
                </div>
                <div id="contact" class="tab-pane">
                  <div class="well">
                    <h3 class="page-header">Alamat Kontak</h3>
                    <div class="form-group">
                      <label for="biographical" class="col-lg-4 control-label">Alamat Rumah</label>
                      <div class="col-lg-8">
                        <textarea name="biographical" id="biographical" class="form-control"></textarea>
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Surel</label>
                      <div class="col-lg-8">
                        <input type="text" name="email" id="email" value="<?php echo $pribadi->email?>" class="form-control" placeholder="yourname@mail.com" />
                      </div>                      
                    </div>
                  </div>
                </div>
                <div id="password" class="tab-pane">
                  <div class="well">
                    <h3 class="page-header">Ubah Kata Sandi</h3>
                    <div class="form-group">
                      <label for="current_password" class="col-lg-4 control-label">Kata Sandi Aktif</label>
                      <div class="col-lg-8">
                        <input type="text" name="current_password" id="current_password" class="form-control" value="" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="new_password" class="col-lg-4 control-label">Kata Sandi Baru</label>
                      <div class="col-lg-8">
                        <input type="text" name="new_password" id="new_password" class="form-control" value="" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="retype_password" class="col-lg-4 control-label">Ketik Ulang Kata Sandi</label>
                      <div class="col-lg-8">
                        <input type="text" name="retype_password" id="retype_password" class="form-control" value="" />
                      </div>                      
                    </div>

                  </div>                      
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
              <hr>
              <div class="text-right">
                  <button type="reset" class="but btn btn-default">Reset</button>
                  <button type="submit" class="but btn btn-danger">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> 
