      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
              <div class="col-lg-12">
                <?php echo $custom_error; ?>
              </div>
              <div class="col-lg-6">              
                <div class="form-group">
                  <label for="nama" class="col-lg-4 control-label">Nama Lengkap*</label>
                  <div class="col-lg-8">
                    <input id="nama" type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" data-required="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="akun_bank" class="col-lg-4 control-label">Akun Bank</label>
                  <div class="col-lg-8">
                    <input id="akun_bank" type="text" class="form-control" name="akun_bank" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="bank_nama" class="col-lg-4 control-label">Transfer Ke Bank *</label>
                  <div class="col-lg-8">
                  <?php 
                  echo form_dropdown('bank_transfer', $bank_list, 'BRI');
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nominal" class="col-lg-4 control-label">Nominal *</label>
                  <div class="col-lg-8">
                    <div class="input-group">
                      <span class="input-group-addon">RP</span>
                      <input id="nominal" type="text" class="form-control text-right" name="nominal" value="<?php echo set_value('nominal'); ?>"  />
                      <span class="input-group-addon">.00</span>
                    </div>                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal_transfer" class="col-lg-4 control-label">Tanggal Transfer *</label>
                  <div class="col-lg-8">
                    <input id="tanggal_transfer" type="text" class="form-control date-range" name="tanggal_transfer" placeholder="yyyy/mm/dd" data-required="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="sumber_dana" class="col-lg-4 control-label">Sumber Dana</label>
                  <div class="col-lg-8">
                    <input id="sumber_dana" type="text" class="form-control" name="sumber_dana" placeholder="Ex. Pribadi/Kelompok" />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">              
                <div class="form-group">
                  <label for="identitas" class="col-lg-4 control-label">Nomor Identitas</label>
                  <div class="col-lg-8">
                    <input id="identitas" type="text" class="form-control" name="identitas" placeholder="123 456879" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="npwp" class="col-lg-4 control-label">NPWP</label>
                  <div class="col-lg-8">
                    <input id="npwp" type="text" class="form-control" name="npwp" placekotaholder="12 34 56" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-lg-4 control-label">Alamat</label>
                  <div class="col-lg-8">
                    <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Alamat" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="kota" class="col-lg-4 control-label">Kota</label>
                  <div class="col-lg-8">
                    <input id="kota" type="text" class="form-control" name="kota" placeholder="Alamat" />
                  </div>
                </div>
<!-- 
                <div class="form-group">
                  <label for="telp" class="col-lg-4 control-label">Telepon</label>
                  <div class="col-lg-8">
                    <input id="telp" type="text" class="form-control" name="telp" placeholder="0123-456" />
                  </div>
                </div>
 -->
                <div class="form-group">
                  <label for="pekerjaan" class="col-lg-4 control-label">Pekerjaan</label>
                  <div class="col-lg-8">
                    <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" placeholder="Ex. Pegawai Swasta" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="kantor" class="col-lg-4 control-label">Alamat Kantor</label>
                  <div class="col-lg-8">
                    <input id="kantor" type="text" class="form-control" name="kantor" placeholder="Alamat Kantor" />
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
