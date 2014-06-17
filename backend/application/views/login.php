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
  <section class="login">
    <div class="container">
      <div class="row">                
        <?php echo $content?>                          

        <footer>
          Monas System
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