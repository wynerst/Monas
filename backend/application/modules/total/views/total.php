<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">   
      <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
        <div class="col-lg-12">
          <?php echo $custom_error; ?>
        </div>
        <div class="col-lg-4">              
          <div class="form-group">
            <label for="bca" class="col-lg-4 control-label">BCA</label>
            <div class="col-lg-8">
              <input id="bca" type="text" class="form-control text-right" name="bca" value="<?php echo $bca; ?>" data-required="true" />
            </div>
          </div>
        </div>
        <div class="col-lg-4">              
          <div class="form-group">
            <label for="bri" class="col-lg-4 control-label">BRI</label>
            <div class="col-lg-8">
              <input id="bri" type="text" class="form-control text-right" name="bri" value="<?php echo $bri; ?>" data-required="true" />
            </div>
          </div>
        </div>
        <div class="col-lg-4">              
          <div class="form-group">
            <label for="mandiri" class="col-lg-4 control-label">Mandiri</label>
            <div class="col-lg-8">
              <input id="mandiri" type="text" class="form-control text-right" name="mandiri" value="<?php echo $mandiri; ?>" data-required="true" />
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
          <hr>
        </div>
        <div class="col-lg-6">
          <a href="<?php echo current_url()?>/import" class="btn btn-inverse">Import Dari Data Total Sebenarnya</a>
        </div>
        <div class="col-lg-6">
          <div class="text-right">
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </div>
      </form>                
    </div>
  </div>
</div>

