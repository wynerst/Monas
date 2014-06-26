<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <form action="<?php echo current_url()?>" method="post" role="form" class="form-horizontal" data-validate="parsley">
        <?php echo form_hidden('id_berita', $result[0]->id_berita) ?>
        <div class="col-lg-12">
          <?php echo $custom_error; ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">              
          <div class="form-group">
            <label for="judul" class="col-lg-2 control-label">Judul</label>
            <div class="col-lg-10">
              <input type="text" id="judul" class="form-control" name="judul" value="<?php echo $result[0]->judul ?>" data-required="true" />                    
            </div>
          </div>
          <div class="form-group">
            <label for="link" class="col-lg-2 control-label">Berita</label>
            <div class="col-lg-10">
              <textarea id="berita" name="berita" style="width:100%;height:200px;"><?php echo $result[0]->berita ?></textarea>
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

<script type="text/javascript">
$(document).ready(function() {
  // Summernote
  $('#berita').summernote({
    height: 300,
    tabsize: 2,
    codemirror: {
      theme: 'monokai'
    }
  });
});
</script>