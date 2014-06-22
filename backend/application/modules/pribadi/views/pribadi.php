<div class="col-lg-12">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#personal" data-toggle="tab">Data Pribadi</a></li>
    <li><a href="#password" data-toggle="tab">Ubah Password</a></li>
  </ul>
  <br>
</div>

<div class="clearfix"></div>

<div class="col-lg-12">
  <?php echo $custom_error; ?>
</div>
<div class="clearfix"></div>

<div class="col-lg-12">              
     <?php echo form_open_multipart(current_url(),array('class' => 'form-horizontal', 'role' => 'form', 'data-validate' => 'parsley'))?>
        <input type="hidden" name="user_id" value="<?php echo $pribadi->id_user?>">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-lg-3">
              <div class="well well-default text-center">
                <div class="img-responsive">
                  <img src="<?php echo $photo ?>" alt=""  class="img-thumbnail" />
                </div>
                <br>
                <br>
                <input type="file" class="filestyle" data-classButton="btn btn-inverse" data-input="false" data-classIcon="fa fa-plus" id="inputFile">
              </div>
            </div>
            <div class="col-lg-9 ">
              <div class="tab-content">
                <div id="personal" class="tab-pane active">
                  <div class="well well-default">
                    <h3 class="page-header">Data Pribadi</h3>
                    <div class="form-group">
                      <label for="nama" class="col-lg-4 control-label">Nama Lengkap</label>
                      <div class="col-lg-8">
                        <input type="text" name="nama" id="nama" value="<?php echo $pribadi->nama?>" class="form-control" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Email</label>
                      <div class="col-lg-8">
                        <input type="text" name="email" id="email" value="<?php echo $pribadi->email?>" class="form-control" placeholder="yourname@mail.com" />
                      </div>                      
                    </div>
                  </div>
                </div>
                <div id="password" class="tab-pane">
                  <div class="well">
                    <h3 class="page-header">Ubah Password</h3>
                    <div class="form-group">
                      <label for="username" class="col-lg-4 control-label">Username</label>
                      <div class="col-lg-8">
                        <input type="text" name="username" id="username" value="<?php echo $pribadi->username?>" class="form-control" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="current_password" class="col-lg-4 control-label">Password Lama</label>
                      <div class="col-lg-8">
                        <input type="password" name="current_password" id="current_password" class="form-control" value="" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="new_password" class="col-lg-4 control-label">Password Baru</label>
                      <div class="col-lg-8">
                        <input type="password" name="new_password" id="new_password" class="form-control" value="" />
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="retype_password" class="col-lg-4 control-label">Retype Password</label>
                      <div class="col-lg-8">
                        <input type="password" name="retype_password" id="retype_password" class="form-control" value="" />
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
                  <button type="submit" class="but btn btn-danger" name="submit" value="submit">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </form>
</div> 
