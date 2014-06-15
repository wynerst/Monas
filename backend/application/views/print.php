<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport"               content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1" />
  <title>Print</title>
  <meta name="description"            content="<?php echo $this->config->item('description'); ?>" /> 
  <meta name="keywords"               content="<?php echo $this->config->item('keywords'); ?>">
  <meta name="author"                 content="<?php echo $this->config->item('author'); ?>">   

  <link href="<?php echo base_url().CSS; ?>bootstrap.min.css" rel="stylesheet">  
  <link href="<?php echo base_url().CSS; ?>main.css" rel="stylesheet">     
  <script src="<?php echo base_url().JS; ?>modernizr.js"></script>
</head>
<body>
  <div class="wrapper">
    <?php echo $content?>
  </div>  
  <script src="<?php echo base_url().JS?>/jquery.min.js"></script>  
  <script src="<?php echo base_url().JS?>/bootstrap.min.js"></script>  
  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>