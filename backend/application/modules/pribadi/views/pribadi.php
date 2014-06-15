<div class="col-lg-12">              
  <div class="panel panel-default">
    <div class="panel-body">                   
              <form class="form-horizontal" role="form" method="post">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-lg-12">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#personal" data-toggle="tab">Data Pribadi</a></li>
                        <li><a href="#contact" data-toggle="tab">Alamat Kontak</a></li>
                        <li><a href="#about" data-toggle="tab">Tentang</a></li>
                        <li><a href="#password" data-toggle="tab">Ubah Kata Sandi</a></li>
                      </ul>
                      <br>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-3">
                      <div class="well well-default text-center">
                        <div class="img-responsive">
                          <img src="<?php echo base_url().IMG?>/avatar/a1.jpg" alt=""  class="img-thumbnail" />
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
                                <input type="text" name="user_login" id="user_login" value="admin" disabled="disabled" class="form-control" />
                                <em class="help-block">Usernames tidak dapat diubah</em>
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="first_name" class="col-lg-4 control-label">Nama Depan</label>
                              <div class="col-lg-8">
                                <input type="text" name="first_name" id="first_name" value="" class="form-control" />
                              </div>                      
                            </div>

                            <div class="form-group">
                              <label for="last_name" class="col-lg-4 control-label">Nama Belakang</label>
                              <div class="col-lg-8">
                                <input type="text" name="last_name" id="last_name" value="" class="form-control" />
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="nickname" class="col-lg-4 control-label">Panggilan <span class="description">(required)</span></label>
                              <div class="col-lg-8">
                                <input type="text" name="nickname" id="nickname" value="admin" class="form-control" />
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="display_name" class="col-lg-4 control-label">Tampilan Nama Publik</label> 
                              <div class="col-lg-8">
                                <select name="display_name" id="display_name">
                                  <option selected='selected'>admin</option>
                                </select>
                              </div>                      
                            </div>      
                          </div>
                        </div>
                        <div id="contact" class="tab-pane">
                          <div class="well">
                            <h3 class="page-header">Alamat Kontak</h3>
                            <div class="form-group">
                              <label for="email" class="col-lg-4 control-label">Surel</label>
                              <div class="col-lg-8">
                                <input type="text" name="email" id="email" value="" class="form-control" />
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="website" class="col-lg-4 control-label">Website</label>
                              <div class="col-lg-8">
                                <input type="text" name="website" id="website" value="" class="form-control" />
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="facebook" class="col-lg-4 control-label">Facebook</label>
                              <div class="col-lg-8">
                                <input type="text" name="facebook" id="facebook" value="" class="form-control" />
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="twitter" class="col-lg-4 control-label">Twitter</label>
                              <div class="col-lg-8">
                                <input type="text" name="twitter" id="twitter" value="" class="form-control" />
                              </div>                      
                            </div>
                          </div>
                        </div>
                        <div id="about" class="tab-pane">
                          <div class="well">
                            <h3 class="page-header">Tentang</h3>
                            <div class="form-group">
                              <label for="biographical" class="col-lg-4 control-label">Sekilas Biografi</label>
                              <div class="col-lg-8">
                                <textarea name="biographical" id="biographical" class="form-control"></textarea>
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="education" class="col-lg-4 control-label">Kemampuan</label>
                              <div class="col-lg-8">
                                <textarea name="education" id="education" class="form-control"></textarea>
                              </div>                      
                            </div>
                            <div class="form-group">
                              <label for="experiences" class="col-lg-4 control-label">Pengalaman</label>
                              <div class="col-lg-8">
                                <textarea name="experiences" id="experiences" class="form-control"></textarea>
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
