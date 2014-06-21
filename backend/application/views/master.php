<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport"               content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1" />
  <title><?php echo $page_title?> :: <?php echo $this->config->item('brand'); ?></title>
  <meta name="description"            content="<?php echo $this->config->item('description'); ?>" /> 
  <meta name="keywords"               content="<?php echo $this->config->item('keywords'); ?>">
  <meta name="author"                 content="<?php echo $this->config->item('author'); ?>">   
  <link rel="shortcut icon" href="<?php echo base_url().ICO; ?>/favicon.png">
  <link rel="apple-touch-icon" href="<?php echo base_url().ICO; ?>/apple-touch-icon-precomposed.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url().ICO; ?>/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url().ICO; ?>/apple-touch-icon-144-precomposed.png">
  <?php if(isset($css_files)):
  foreach($css_files as $file): ?><link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />  
  <?php endforeach; endif; ?>  
  <link href="<?php echo base_url().CSS?>bootstrap.min.css" rel="stylesheet">  
  <link href="<?php echo base_url().CSS?>main.css" rel="stylesheet">     
  <script src="<?php echo base_url().JS?>modernizr.js"></script>
  <script src="<?php echo base_url().JS?>jquery.min.js"></script>  
</head>
<body>
  <!--[if lte IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->   
  <div class="wrapper" id="top">
    <header class="header">
      <div class="container-fluid">
        <h3 class="brand">
          <a class="brand-logo" href="<?php echo site_url(); ?>/beranda"></a>
          <span class="brand-name"><?php echo $this->config->item('brand'); ?></span>
          <small class="brand-tag"><?php echo $this->config->item('tagline'); ?></small>
        </h3>         
        <div class="user">           
          <h4 class="user-name"><?php echo ucwords($this->session->userdata('name'))?></h4>
          <a href="#" class="user-photo dropdown-toggle" data-toggle="dropdown" id="user">
            <img src="<?php echo base_url().IMG?>avatar/blank.jpg" width="60" alt="<?php echo ucwords($this->session->userdata('name'))?>">
          </a>           
          <div class="user-detail dropdown-menu animated-fast flipInY" role="menu" aria-labelledby="user">
            <i class="caret-alt"></i>             
            <div class="user-header">
              <h5>Data Pengguna</h5>
            </div>
            <hr>             
            <div class="user-photo-lg">
              <img src="<?php echo base_url().IMG?>/avatar/blank.jpg" alt="Bocah Brewok">
            </div>             
            <div class="user-link">
              <a href="<?php echo site_url(); ?>/pribadi" class="user-link-left"><i class="fa fa-bars"></i></a>
              <a href="<?php echo site_url(); ?>/auth/logout" class="user-link-right"><i class="fa fa-times"></i></a>
            </div>             
            <div class="user-profil">
              <h4><?php echo ucwords($this->session->userdata('name'))?></h4>
              <small>Administrasi Keuangan</small>
            </div>             
            <div class="user-network">
              <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="btn btn-social btn-google-plus"><i class="fa fa-google-plus"></i></a>
            </div> 
          </div> 
        </div>
                  
        <nav class="navbar" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
              <span class="sr-only">Navigation</span>
              <i class="fa fa-bars"></i>
            </button> 
          </div>                        
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <?php foreach($this->menu->access($this->session->userdata('id_group')) as $key => $menu_access) : ?>
              <li>
                <a href="<?php echo ($menu_access['path']!='#')? site_url().'/'.$menu_access['path'] : $menu_access['path']?>"><i class="nav-icon fa fa-home"></i> 
                  <?php echo $menu_access['menu']?>
                </a>
                <?php if(count($menu_access['sub']) > 0 ) : ?>                 
                  <ul class="dropdown-menu animated-fast flipInY">
                    <?php foreach ($menu_access['sub'] as $key => $sub) : ?>
                      <li>
                        <a href="<?php echo site_url().'/'.$key?>/"><?php echo $sub?></a>
                      </li>                
                    <?php endforeach ?>
                  </ul>
                <?php endif ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </nav>   
              
        <div class="page-title">           
          <h3><?php echo $page_title?> <small><?php echo $page_desc?></small></h3>           
        </div>
      </div>
    </header>       
      
    <div class="content" role="main">
      <div class="container-fluid">
        <aside class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <?php echo $breadcrumb?>
            </div>          
            <div class="clearfix"></div>          
            <?php echo $content; ?>
          </div>
        </aside> 
      </div>
    </div>  
     
    <footer class="footer">
      <div class="container-fluid">
        <div class="footer-wrapper">           
          <div class="row">
            <div class="col-lg-9">
              <p><?php echo $this->config->item('brand'); ?> - <?php echo $this->config->item('tagline'); ?></p>
            </div>
            <div class="col-lg-3">
              <div class="btn-group btn-group-justified">
                <a href="<?php echo site_url()?>/beranda" class="btn btn-sm btn-link" role="button">Beranda</a>
                <a href="#top" class="btn btn-sm btn-link" role="button">Kembali Ke Atas</a>
              </div>
            </div>
          </div>          
        </div>
      </div> 
    </footer>

  </div>  
  <script src="<?php echo base_url().JS?>bootstrap.min.js"></script>  
  <script src="<?php echo base_url().PLUGINS?>smartmenus/src/jquery.smartmenus.js"></script>  
  <script src="<?php echo base_url().PLUGINS?>smartmenus/src/addons/bootstrap/jquery.smartmenus.bootstrap.js"></script>  
  <script src="<?php echo base_url().JS?>script.js"></script>     
  <?php if(isset($js_files)):
    foreach($js_files as $file): ?><script src="<?php echo $file; ?>"></script>
  <?php endforeach; endif; ?>  
</body>
</html>