<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Login :: <?php echo $this->config->item('brand'); ?></title>
  <meta name="description"            content="<?php echo $this->config->item('description'); ?>" /> 
  <meta name="keywords"               content="<?php echo $this->config->item('keywords'); ?>">
  <meta name="author"                 content="<?php echo $this->config->item('author'); ?>">   

  <link rel="shortcut icon" href="<?php echo base_url().ICO; ?>/favicon.png">
  <link rel="apple-touch-icon" href="<?php echo base_url().ICO; ?>/apple-touch-icon-precomposed.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url().ICO; ?>/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url().ICO; ?>/apple-touch-icon-144-precomposed.png">
  <link href="<?php echo base_url().CSS; ?>bootstrap.min.css" rel="stylesheet">  
  <link href="<?php echo base_url().CSS; ?>main.css" rel="stylesheet">     
  <script src="<?php echo base_url().JS; ?>modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>
  <!--[if lte IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->   
  <section class="login nav nav-tabs">
    <div class="container">
      <div class="row tab-content">                 
        <div id="login" class="tab-pane active animated-fast flipInY">
          <header>Login</header>
          <form action="<?php echo current_url()?>" role="form" method="post">
            <?php if($this->session->flashdata('item') != '') { ?>
            <p class="text-danger text-center"><?php echo $this->session->flashdata('item')?></p>
            <?php } ?>
            <div class="login-error nousername hide animated shake text-center">Mohon isikan username</div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-male"></i></span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
              </div>
            </div> 
            <div class="login-error nopassword hide animated shake text-center">Mohon isikan sandi</div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                  <div class="icheck fa">
                    <input type="checkbox" id="remember" name="rememberme" value="1">
                  </div>
                </span>
                <label for="remember" class="form-control">Ingat Saya</label>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-rounded btn-block btn-inverse">Proses</button>
            <br>             
            <br>             
            <br>             
            <br>             
            <br>             
          </form>
        </div>
         
        <div id="forgot" class="tab-pane animated-fast flipInY">
          <header>Pengingat Sandi</header>
          <form action="<?php echo site_url()?>/auth/forgot" role="form" method="post">
            <div class="form-group">
              <p class="text-center">
                Silahkan Masukkan Alamat Surel Anda
                <br/>
              </p>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" id="forgot_email" name="forgot_email" placeholder="yourmail@address">
              </div>
            </div> 
            <button type="submit" class="btn btn-block btn-rounded btn-inverse">Reset Password</button>
            <br>             
            <br>             
            <br>             
            <br>             
            <br>             
          </form>
        </div>
                 
       <footer>
          <ul>
            <li><a href="#login" data-toggle="tab">Login</a></li>
            <li><a href="#forgot" data-toggle="tab">Lupa ?</a></li>
          </ul>
        </footer>        
        
      </div>
    </div> 
  </section> 
  <script src="<?php echo base_url().JS?>jquery.min.js"></script>  
  <script src="<?php echo base_url().JS?>bootstrap.min.js"></script>  
  <script src="<?php echo base_url().PLUGINS?>icheck/icheck.min.js"></script>     
  <script type="text/javascript">
  $(function(){
    $('input').iCheck({
      checkedCheckboxClass    : 'fa-check-square',
      uncheckedCheckboxClass  : 'fa-square-o',
      checkedRadioClass       : 'fa-dot-circle-o',
      uncheckedRadioClass     : 'fa-circle-o',
      disabledClass           : 'icheck-disabled'
    });


    $('footer a').click(function (e) {
      e.preventDefault();
      $($(this).attr('href')).tab('show')
    })    

    $(document).ready(function() {

      ///// LOGIN FORM SUBMIT /////
      $('#remember').click(function() {
        if($(this).is(':checked')) {
          $(this).parent().attr('style','background-color: #CA5122;');
        } else {
          $(this).parent().removeAttr('style');
        }
      });

      ///// LOGIN FORM SUBMIT /////
      $('#login').submit(function() {
        if ($('#username').val() == '' && $('#password').val() == '') {
          $('.nousername').toggleClass('hide');
          $('#username').parent().toggleClass('has-error');
          $('#username').focus();
          return false;
        }
        if ($('#username').val() == '' && $('#password').val() != '') {
          $('.nousername').toggleClass('hide');
          $('#username').parent().toggleClass('has-error');
          $('#username').focus();
          return false;
        }
        if ($('#username').val() != '' && $('#password').val() == '') {
          $('.nopassword').toggleClass('hide');
          $('#password').parent().toggleClass('has-error');
          $('#password').focus();
          return false;;
        }
      });

    });
  })
  </script>
</body>
</html>