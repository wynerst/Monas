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
  <link href="<?php echo base_url().PLUGINS?>select/bootstrap-select.min.css" rel="stylesheet">
  <link href="<?php echo base_url().PLUGINS?>tablesorter/addons/pager/jquery.tablesorter.pager.css" rel="stylesheet">
  <link href="<?php echo base_url().PLUGINS?>tablesorter/css/theme.bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url().CSS?>bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url().CSS?>style.css" rel="stylesheet">
  <script src="<?php echo base_url().JS?>modernizr.js"></script>
</head>
<body id="page-top">
  <!--[if lte IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#page-top"><span class="text-info">DANA</span><span class="text-danger">GOTONG</span>ROYONG</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li class="hidden">
                      <a href="#page-top"></a>
                  </li>
                  <li class="page-scroll">
                      <a href="#tentang">Tentang Kegiatan</a>
                  </li>
                  <li class="page-scroll">
                      <a href="#infografik">Infografik</a>
                  </li>
                  <li class="page-scroll">
                      <a href="#penyumbang">Penyumbang</a>
                  </li>
                  <li class="page-scroll">
                      <a href="#relawan" alt="Relawan Jokowi-JK">Relawan</a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="splitter"></div>
  </nav>

  <header>
      <div class="container">
          <div class="row">
              <div class="col-lg-9">
                  <div class="intro-text">
                      <span class="skills">Sumbangan Per 14 Juni 2014</span>
                      <a href="#infografik" title="Tiga Puluh Lima Milyar Empat Ratus Empat Puluh Lima Juta Sembilan Ratus Tujuh Puluh Enam Ribu Tujuh Ratus Tujuh Puluh Enam Rupiah"><span class="name"><span class="text-inverse">RP</span>35.445.976.776</span></a>
                      <em>Tiga Puluh Lima Milyar Empat Ratus Empat Puluh Lima Juta Sembilan Ratus Tujuh Puluh Enam Ribu Tujuh Ratus Tujuh Puluh Enam Rupiah</em>
                      <br class="hidden-xs">
                      <br>
                      <br>
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <a href="http://youtu.be/cpmqFBBCiRo" target="blank">
                          <img src="<?php echo base_url().IMG?>video.png" alt="">
                          <br>
                          Lihat Videonya
                          </a>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <img src="<?php echo base_url().IMG?>logo-big.jpg" alt="" width="132" class="revolusi">
                        </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3">
<!--                <a href="https://ib.bri.co.id/ib-bri/Login.html" target="_blank"> -->
                <a>
                <img src="<?php echo base_url().IMG?>bri.png" alt="" class="text-right">
                <p class="rekening">
                  1223 0 1000 1723 09
                  <br>
                  a.n Joko Widodo Jusuf Kalla
                </p>
                </a>
                <br>
<!--                <a href="https://ib.bankmandiri.co.id/retail/Login.do?action=form&lang=in_ID" target="_blank"> -->
                <a >
                <img src="<?php echo base_url().IMG?>mandiri.png" alt="" class="text-right">
                <p class="rekening">
                  070-00-0909096-5
                  <br>
                  a.n Joko Widodo Jusuf Kalla
                </p>
                </a>
                <br>
<!--                <a href="http://www.klikbca.com/" target="_blank"> -->
                <a >
                <img src="<?php echo base_url().IMG?>bca.png" alt="" class="text-right">
                <p class="rekening">
                  5015.500015
                  <br>
                  a.n Joko Widodo Jusuf Kalla
                </p>
                <br>
                <span class="button pull-right page-scroll">
                  <a href="#contact" class="btn btn-lg btn-inverse">Ikut Berpartisipasi</a>
                </span>
              </div>
          </div>
      </div>
  </header>

  <section id="tentang" class="first">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h2>Tentang Dana Gotong-Royong</h2>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-4">
                  <p> Sumbangan yang masuk ke Dana Gotong-Royong Jokowi-JK merupakan partisipasi aktif rakyat dalam medukung Jokowi-JKK pada Pilpres 9 Juli 2014.
                  </p>
                  <p>
                    <ul>
                      <li>Besarnya animo masyarakat yang menyumbangkan dana kepada Jokowi-JK adalah eksperesi publik yang menginginkan perubahan mendasar di Indonesia.</li>
                      <li>Sebagai bentuk akuntabilitas kepada para pendukung, kami persembahkan situs ini agar rakyat mengetahui sumbangan dikelola melali Dana Gotong-Royong Jokowi-JK.</li>
                    </ul>
                  </p>
                  <p>
                    Dengan demikian diharapkan rakyat tahu sumbangan mereke digunakan untuk kampanye yang menyuarakan aspirasi mereka
                  </p>
              </div>
              <div class="col-lg-4">
                  <p>
                    Pembukaan rekening Dana Gotong-Royong sesuai amanat Undang-undang Pilpres dan peraturan KPU. Penjelasan KPK menyatakan bahwa gratifikasi tidak berlaku untuk kepentingan kampanye Pilpres
                  </p>
                  <p>
                    Berikut ini adalah Akuntan Publik yang mengawasi penggunaan Dana Gotong-Royong Jokowi-JK :
                  </p>
              </div>
              <div class="col-lg-4 text-center">
                <canvas id="donut-chartjs" class="chartjs" height="250"></canvas>
                <br>
                <br>
                <ul class="list-inline ">
                  <li>
                    <i class="fa fa-circle" style="color:#333;"></i> Bank BRI
                  </li>
                  <li>
                    <i class="fa fa-circle" style="color:#666; "></i> Bank Mandiri
                  </li>
                  <li>
                    <i class="fa fa-circle" style="color:#999; "></i> Bank BCA
                  </li>
                </ul>
              </div>

          </div>
      </div>
  </section>

  <section id="infografik">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h2>Infografik Dana Gotong Royong</h2>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12">
                <div class="panel">
                  <div class="panel-body">
                    <canvas id="line-chartjs" class="chartjs" height="300"></canvas>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-4">
                <div class="panel">
                  <div class="panel-body">
                    <canvas id="bri-chartjs" class="chartjs" height="200"></canvas>
                  </div>
                  <div class="panel-footer">
                    <img src="<?php echo base_url().IMG?>bri.png" alt="" width="100">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel">
                  <div class="panel-body">
                    <canvas id="mandiri-chartjs" class="chartjs" height="200"></canvas>
                  </div>
                  <div class="panel-footer">
                    <img src="<?php echo base_url().IMG?>mandiri.png" alt="" width="100">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel">
                  <div class="panel-body">
                    <canvas id="bca-chartjs" class="chartjs" height="200"></canvas>
                  </div>
                  <div class="panel-footer">
                    <img src="<?php echo base_url().IMG?>bca.png" alt="" width="100">
                  </div>
                </div>
              </div>

          </div>
      </div>
  </section>

  <section id="penyumbang">
      <div class="container">
          <div class="row">`
              <div class="col-lg-12">
                  <h2>Penyumbang Dana Gotong Royong</h2>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12">

                <div class="table-responsive">
                  <table class="table tablesorter" id="tablesorter">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Sumbangan</th>
                        <th>Bank</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>13 Juni 2014</td>
                        <td>Dina Sari</td>
                        <td class="text-right">Rp212.212</td>
                        <td>BRI</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>12 Juni 2014</td>
                        <td>Saparuddin Iskak</td>
                        <td class="text-right">Rp1.113.113</td>
                        <td>BCA</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>16 Juni 2014</td>
                        <td>Didi Mulyadi</td>
                        <td class="text-right">Rp1.000.001</td>
                        <td>Mandiri</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>13 Juni 2014</td>
                        <td>Dina Sari</td>
                        <td class="text-right">Rp212.212</td>
                        <td>BRI</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>12 Juni 2014</td>
                        <td>Saparuddin Iskak</td>
                        <td class="text-right">Rp1.113.113</td>
                        <td>BCA</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="table-footer">
                  <div class="ts-pager">
                    <div class="row">

                      <div class="col-lg-6">
                        <form class="form-inline" role="form">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default first"><i class="icon-step-backward fa fa-angle-double-left"></i></button>
                            <button type="button" class="btn btn-default prev"><i class="icon-arrow-left fa fa-angle-left"></i></button>
                            <button type="button" class="btn btn-default next"><i class="icon-arrow-right fa fa-angle-right"></i></button>
                            <button type="button" class="btn btn-default last"><i class="icon-step-forward fa fa-angle-double-right"></i></button>
                          </div>
                          <select class="pagesize" title="Select page size">
                            <option selected="selected" value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                          </select>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
      </div>
  </section>

<!--  <section id="belanja">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h2>Laporan Belanja Dana Gotong Royong</h2>
                  <div class="table-responsive">
                    <table class="table tablesorter" id="tablesorter1">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Penggunaan Dana</th>
                          <th>Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>13 Juni 2014</td>
                          <td>Belanja Iklan Media Social</td>
                          <td class="text-right">Rp212.212</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>12 Juni 2014</td>
                          <td>Sewa Kendaraan Kampanye</td>
                          <td class="text-right">Rp1.113.113</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>16 Juni 2014</td>
                          <td>Belanja Spanduk &amp; Poster Kampanye</td>
                          <td class="text-right">Rp1.000.001</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>13 Juni 2014</td>
                          <td>Tiket Pesawat Ke Papua PP</td>
                          <td class="text-right">Rp5.212.212</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>12 Juni 2014</td>
                          <td>Sewa Kendaraan Kampanye</td>
                          <td class="text-right">Rp1.113.113</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="table-footer">
                    <div class="ts-pager">
                      <div class="row">

                        <div class="col-lg-6">
                          <form class="form-inline" role="form">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default first"><i class="icon-step-backward fa fa-angle-double-left"></i></button>
                              <button type="button" class="btn btn-default prev"><i class="icon-arrow-left fa fa-angle-left"></i></button>
                              <button type="button" class="btn btn-default next"><i class="icon-arrow-right fa fa-angle-right"></i></button>
                              <button type="button" class="btn btn-default last"><i class="icon-step-forward fa fa-angle-double-right"></i></button>
                            </div>
                            <select class="pagesize" title="Select page size">
                              <option selected="selected" value="5">5</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                              <option value="30">30</option>
                              <option value="40">40</option>
                            </select>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section id="berita">
      <div class="container">
          <div class="row">
              <div class="col-lg-10">
                  <h2>Berita &amp; Kegiatan Jokowi</h2>
              </div>
              <div class="col-lg-2">
                <br class="hidden-xs">
                <br class="hidden-xs">
                <br>
                <br>
                <div class="page-scroll">
                  <a href="#relawan" class="btn btn-lg btn-inverse">Relawan</a>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-4">
                <br>
                <br>
                <img src="<?php echo base_url().IMG?>jokowi.jpg" alt="" class="img-responsive">
              </div>
              <div class="col-lg-4">
                <h3>Kader Golkar Sambut Dukungan Pemuda Tangsel untuk Jokowi-JK</h3>
                <p>
                Liputan6.com, Jakarta - Aliansi mahasiswa dan pemuda yang tergabung dalam Solidaritas Mahasiswa dan Pemuda Indonesia (Sampai) dari Tangerang Selatan (Tangsel), Banten mendeklarasikan dukungan untuk capres-cawapres nomor urut 2 Jokowi Widodo (Jokowi) dan Jusuf Kalla (JK).
                </p>
              </div>
              <div class="col-lg-3">
                <h3>Berita Lainnya</h3>
                <ul>
                  <li>
                    <a href="#">Ini empat kegiatan Jokowi selama bulan Ramadan</a>
                  </li>
                  <li>
                    <a href="#">Survei LSI, Jokowi masih unggul dari Prabowo</a>
                  </li>
                  <li>
                    <a href="#">Dukung Jokowi, ratusan seniman berbagai wilayah melukis bersama</a>
                  </li>
                  <li>
                    <a href="#">Jokowi bersama ibunya saat ziarah ke makam sang ayah</a>
                  </li>
                </ul>
              </div>
          </div>
      </div>
  </section>
-->

  <section id="relawan">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <h2>Relawan Jokowi-JK</h2>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-3">
                <ul>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                </ul>
              </div>
              <div class="col-lg-3">
                <ul>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                </ul>
              </div>
              <div class="col-lg-3">
                <ul>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                </ul>
              </div>
              <div class="col-lg-3">
                <ul>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                  <li>Laskar Jokowi</li>
                </ul>
              </div>
          </div>

      </div>
  </section>

  <section id="contact">
      <div class="container">
          <div class="row">
              <div class="col-lg-4">
                <h2>Ingin Berpartisipasi</h2>
                <p>
                Untuk dapat berpartisipasi, silahkan memberikan sumbangan melalui rekening berikut :
                </p>
                <p>
                  <strong>
                  Bank BRI
                  <br>
                  1223 0 1000 1723 09 a.n
                  <br>
                  Joko Widodo Jusuf Kalla
                  </strong>
                </p>
                <p>
                  <strong>
                  Bank Mandiri
                  <br>
                  070-00-0909096-5 a.n
                  <br>
                  Joko Widodo Jusuf Kalla
                  </strong>
                </p>
                <p>
                  <strong>
                  Bank BCA
                  <br>
                  5015.500015 a.n
                  <br>
                  Joko Widodo Jusuf Kalla
                  </strong>
                </p>
              </div>
              <div class="col-lg-5">
                <h2>Syarat Berpartisipasi</h2>
                <br>
                <br>
                <p>
                Untuk dapat berpartisipasi, berikut aturan yang telah ditetapkan olek KPU :
                </p>
                <ul>
                  <li>Penyumbang atas nama pribadi atau perorangan hanya diperkenankan maksimal X Rupiah</li>
                  <li>Penyumbang atas nama kelompok atau Ormas hanya diperkenankan maksimal X Rupiah</li>
                  <li>Penyumbang atas nama koporate atau yayasan hanya diperkenankan maksimal X Rupiah</li>
                </ul>
                <p>
                  * Tambahkan 3 digit unik dari nilai nominal jika ingin memastikan sumbangan anda ditemukan dengan lebih cepat.
                </p>
              </div>
          </div>

      </div>
  </section>

  <footer>
      <div class="footer-above">
      </div>
      <div class="footer-below">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      Dikelola Oleh Tim Sukses JKWJK &copy; 2014
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <div class="scroll-top page-scroll visible-xs visble-sm">
      <a class="btn btn-inverse" href="#page-top">
          <i class="fa fa-chevron-up"></i>
      </a>
  </div>
  <script src="<?php echo base_url().JS?>jquery-1.10.2.js"></script>
  <script src="<?php echo base_url().JS?>bootstrap.min.js"></script>
  <script src="<?php echo base_url().JS?>jquery.easing.min.js"></script>
  <script src="<?php echo base_url().JS?>classie.js"></script>
  <script src="<?php echo base_url().JS?>cbpAnimatedHeader.min.js"></script>
  <script src="<?php echo base_url().PLUGINS?>chartjs/chart.min.js"></script>
  <script src="<?php echo base_url().PLUGINS?>select/bootstrap-select.min.js"></script>
  <script src="<?php echo base_url().PLUGINS?>tablesorter/js/jquery.tablesorter.min.js"></script>
  <script src="<?php echo base_url().PLUGINS?>tablesorter/js/jquery.tablesorter.widgets.min.js"></script>
  <script src="<?php echo base_url().PLUGINS?>tablesorter/addons/pager/jquery.tablesorter.pager.min.js"></script>
  <script src="<?php echo base_url().PLUGINS?>tablesorter/js/widgets/widget-print.js"></script>
  <script src="<?php echo base_url().PLUGINS?>tablesorter/js/widgets/widget-output.js"></script>
  <script src="<?php echo base_url().JS?>table.js"></script>
  <script src="<?php echo base_url().JS?>main.js"></script>
</body>
</html>
