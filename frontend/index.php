<?php
require 'sysconfig.inc.php';

/**
 * Terbilang
 * @author Rio Astamal <me@rioastamal.net>
 */

function terbilang($angka) {
	$angka = (float)$angka;
	$bilangan = array(
			'',
			'Satu',
			'Dua',
			'Tiga',
			'Empat',
			'Lima',
			'Enam',
			'Tujuh',
			'Delapan',
			'Sembilan',
			'Sepuluh',
			'Sebelas'
	);
	if ($angka < 12) {
		return $bilangan[$angka];
	} else if ($angka < 20) {
		return $bilangan[$angka - 10] . ' Belas';
	} else if ($angka < 100) {
		$hasil_bagi = (int)($angka / 10);
		$hasil_mod = $angka % 10;
		return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
	} else if ($angka < 200) {
		return sprintf('Seratus %s', terbilang($angka - 100));
	} else if ($angka < 1000) {
		$hasil_bagi = (int)($angka / 100);
		$hasil_mod = $angka % 100;
		return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
	} else if ($angka < 2000) {
		return trim(sprintf('Seribu %s', terbilang($angka - 1000)));
	} else if ($angka < 1000000) {
		$hasil_bagi = (int)($angka / 1000);
		$hasil_mod = $angka % 1000;
		return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
	} else if ($angka < 1000000000) {
		$hasil_bagi = (int)($angka / 1000000);
		$hasil_mod = $angka % 1000000;
		return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else if ($angka < 1000000000000) {
		$hasil_bagi = (int)($angka / 1000000000);
		$hasil_mod = fmod($angka, 1000000000);
		return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else if ($angka < 1000000000000000) {
		$hasil_bagi = $angka / 1000000000000;
		$hasil_mod = fmod($angka, 1000000000000);
		return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else {
		return 'Wow...';
	}
}

// Create table total
$sql="SELECT bca,bri,mandiri,date_update FROM settings";
// Execute query
$result=$dbs->query($sql);

while($row = $result->fetch_array()) {
	$_temp['bca']=$row['bca'];
	$_temp['bri']=$row['bri'];
	$_temp['mandiri']=$row['mandiri'];
	$_temp['total']=$row['bca']+$row['bri']+$row['mandiri'];
	$_temp['tanggal']=date_format(date_create($row['date_update']),'d-m-Y');
}

// Create table donuts
//$sql="SELECT bca+bri+mandiri as total,bca,bri,mandiri,date_create FROM sumbangan2 ORDER BY date_create DESC LIMIT 0,1";
$sql="SELECT sum(bca)+sum(bri)+sum(mandiri) as total,sum(bca) as bca,sum(bri) as bri,sum(mandiri) as mandiri, max(date_create) as date_create FROM sumbangan";
// Execute query
$result=$dbs->query($sql);

while($row = $result->fetch_array()) {
	$_data['bca']=$row['bca'];
	$_data['bri']=$row['bri'];
	$_data['mandiri']=$row['mandiri'];
	$_data['total']=$row['total'];
	$_data['tanggal']=date_format(date_create($row['date_create']),'d-m-Y');
}

if ($_temp['total'] > $_data['total']) {
	$_data['total'] = $_temp['total'];
	$_data['tanggal'] = $_temp['tanggal'];
}

// Create table daily bank
$sql="SELECT sum(bca) as bca, sum(bri) as bri, sum(mandiri) as mandiri, tanggal FROM sumbangan GROUP BY tanggal ORDER BY tanggal DESC LIMIT 0,7";
// Execute query
$result=$dbs->query($sql);
$_bank = array();
$i = 0;
while($row = $result->fetch_array()) {
//	$_bank['bca'][$i]=number_format($row['bca']/1000, 2,',','.');
//	$_bank['bri'][$i]=number_format($row['bri']/1000, 2,',','.');
//	$_bank['mandiri'][$i]=number_format($row['mandiri']/1000, 2,',','.');
	$_bank['bca'][$i]=(int)($row['bca']);
	$_bank['bri'][$i]=(int)($row['bri']);
	$_bank['mandiri'][$i]=(int)($row['mandiri']);
	$_bank['tgl'][$i] = date_format(date_create($row['tanggal']),'d/m');
	$_bank['subtotal'][$i]=$row['bca']+$row['bri']+$row['mandiri'];
	$_bank['total']=$_bank['total']+$_data['sub_total'][$i];
	$i = $i+1;
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport"               content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1" />
  <title>Beranda :: Dana Gotong Royong</title>
  <meta name="description"            content="Website Dana Gotong Royong ini digunakan untuk untuk mendata penerimaan sumbangan dari masyarakat kepada pasangan capres Jokowo dan Jusuf Kalla serta memberikan laporan penggunaan secara terbuka agar dapat diakses dan diketahui secara luas guna mendukung transparansi penggunaan keuangan hasil sumbangan masyarakat Indonesia" />
  <meta name="keywords"               content="jokowi jk, jk4p, sumbangan, donasi, capres">
  <meta name="author"                 content="Eddy Subratha, Wardiyono">
  <link rel="shortcut icon" href="assets/ico//favicon.png">
  <link rel="apple-touch-icon" href="assets/ico//apple-touch-icon-precomposed.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/ico//apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/ico//apple-touch-icon-144-precomposed.png">
  <link href="assets/plugins/select/bootstrap-select.min.css" rel="stylesheet">
  <link href="assets/plugins/tablesorter/addons/pager/jquery.tablesorter.pager.css" rel="stylesheet">
  <link href="assets/plugins/tablesorter/css/theme.bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="assets/js/modernizr.js"></script>
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
                      <span class="skills">Sumbangan Per <?php echo $_data['tanggal']; ?></span>
                      <a href="#infografik" title="<?php echo terbilang($_data['total']); ?>"><span class="name"><span class="text-inverse">RP</span>
                      <?php echo number_format($_data['total'],0,' ','.'); ?></span></a>
                      <em><?php echo terbilang($_data['total']); ?></em>
                      <br class="hidden-xs">
                      <br>
                      <br>
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <a class="youtube" href="http://youtu.be/cpmqFBBCiRo">
                          <img src="assets/img/video.png" alt="">
                          <br>
                          Lihat Videonya
                          </a>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <img src="assets/img/logo-big.jpg" alt="" width="132" class="revolusi">
                        </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3">
<!--                <a href="https://ib.bri.co.id/ib-bri/Login.html" target="_blank"> -->
                <a>
                <img src="assets/img/bri.png" alt="" class="text-right">
                <p class="rekening">
                  1223 0 1000 1723 09
                  <br>
                  a.n Joko Widodo Jusuf Kalla
                </p>
                </a>
                <br>
<!--                <a href="https://ib.bankmandiri.co.id/retail/Login.do?action=form&lang=in_ID" target="_blank"> -->
                <a >
                <img src="assets/img/mandiri.png" alt="" class="text-right">
                <p class="rekening">
                  070-00-0909096-5
                  <br>
                  a.n Joko Widodo Jusuf Kalla
                </p>
                </a>
                <br>
<!--                <a href="http://www.klikbca.com/" target="_blank"> -->
                <a >
                <img src="assets/img/bca.png" alt="" class="text-right">
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
                    <img src="assets/img/bri.png" alt="" width="100">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel">
                  <div class="panel-body">
                    <canvas id="mandiri-chartjs" class="chartjs" height="200"></canvas>
                  </div>
                  <div class="panel-footer">
                    <img src="assets/img/mandiri.png" alt="" width="100">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel">
                  <div class="panel-body">
                    <canvas id="bca-chartjs" class="chartjs" height="200"></canvas>
                  </div>
                  <div class="panel-footer">
                    <img src="assets/img/bca.png" alt="" width="100">
                  </div>
                </div>
              </div>

          </div>
      </div>
  </section>

  <section id="penyumbang">
      <div class="container">
          <div class="row">
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
                        <th>Kota</th>
                        <th>Sumbangan</th>
                        <th>Bank</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$sql='SELECT nama,bank_transfer as bank,kota,tgl,nominal FROM penyumbang ORDER BY tgl';

// Execute query
$result=$dbs->query($sql);
$i=0;
while($row = $result->fetch_array()) {
	$i=$i+1;
	echo "<tr>\n<td>".$i."</td>\n";
	echo "<td>".$row['tgl']."</td>\n";
	echo "<td>".$row['nama']."</td>\n";
	echo "<td>".$row['kota']."</td>\n";
	echo '<td class="text-right">Rp'.number_format($row['nominal'],0,' ','.')."</td>\n";
	echo "<td>".$row['bank']."</td>\n</tr>\n";
}

?>
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

  <section id="relawan">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <h2>Relawan Jokowi-JK</h2>
              </div>
              <div class="clearfix"></div>
<?php
$sql='SELECT nama_relawan,url FROM relawan ORDER BY nama_relawan limit 0,30';

// Execute query
$result=$dbs->query($sql);
$i=0; $j=1;
echo '<div class="col-lg-3">';
echo ' <ul>';
while($row = $result->fetch_array()) {
	if ($row['url']<>'') {
		$_url = 'http://'.$row['url'];
	} else {
		$_url = '#';
	}
	echo '  <li><a href="'.$_url.'">'.$row['nama_relawan'].'</a></li>';
	$i = $i+1;
	if ($i>=10) {
		echo ' </ul>';
		echo '</div>';
		$j = $j +1;
		$i = 0;
		if ($j <=3) {
			echo '<div class="col-lg-3">';
			echo ' <ul>';
			$j = 0;
		}
	}
}
?>
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

  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.min.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/cbpAnimatedHeader.min.js"></script>
  <script src="assets/plugins/chartjs/chart.min.js"></script>
  <script src="assets/plugins/select/bootstrap-select.min.js"></script>
  <script src="assets/plugins/tablesorter/js/jquery.tablesorter.min.js"></script>
  <script src="assets/plugins/tablesorter/js/jquery.tablesorter.widgets.min.js"></script>
  <script src="assets/plugins/tablesorter/addons/pager/jquery.tablesorter.pager.min.js"></script>
  <script src="assets/plugins/tablesorter/js/widgets/widget-print.js"></script>
  <script src="assets/plugins/tablesorter/js/widgets/widget-output.js"></script>
  <script src="assets/js/table.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/bootstrap.youtubepopup.min.js"></script>

<script>
// Youtube popup
  $("a.youtube").YouTubeModal({autoplay:0, width:640, height:480});
//ChartJS
$(function(){
  //Line
  var chartData = {
      labels : [<?php echo '"'.implode($_bank['tgl'],'","'),'"'; ?>],
      datasets : [
          {
              fillColor : "#999999",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [<?php echo implode($_bank['bri'],','); ?>]
          },
          {
              fillColor : "#cc0000",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [<?php echo implode($_bank['mandiri'],','); ?>]
          },
          {
              fillColor : "#000000",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [<?php echo implode($_bank['bca'],','); ?>]
          }
      ]
  }

  var chartOption = {
      animation : false,
      scaleOverlay : true
  }

  //Line
  var l = $('#line-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( lineChartx );
  function lineChartx(){
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var lineChart = new Chart(cl).Bar(chartData,chartOption);

  }
  lineChartx();

  //Line
  var briData = {
      labels : [<?php echo '"'.implode($_bank['tgl'],'","'),'"'; ?>],
      datasets : [
          {
              fillColor : "#999999",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [<?php echo implode($_bank['bri'],','); ?>]
          }
      ]
  }

  var l = $('#bri-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( ChartBri );
  function ChartBri(){
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var briChart = new Chart(cl).Bar(briData,chartOption);

  }
  ChartBri();

  var mandiriData = {
      labels : [<?php echo '"'.implode($_bank['tgl'],'","'),'"'; ?>],
      datasets : [
          {
              fillColor : "#cc0000",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [<?php echo implode($_bank['mandiri'],','); ?>]
          }
      ]
  }

  //Line
  var l = $('#mandiri-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( ChartMandiri );
  function ChartMandiri(){
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var briChart = new Chart(cl).Bar(mandiriData,chartOption);

  }
  ChartMandiri();

  var bcaData = {
      labels : [<?php echo '"'.implode($_bank['tgl'],'","'),'"'; ?>],
      datasets : [
          {
              fillColor : "#000000",
              strokeColor : "#fff",
              pointColor : "#000000",
              pointStrokeColor : "#fff",
              data : [<?php echo implode($_bank['bca'],','); ?>]
          }
      ]
  }

  //Line
  var l = $('#bca-chartjs');
  var container = $(l).parent();
  var cl = l.get(0).getContext("2d");
  $(window).resize( ChartBca );
  function ChartBca(){
      l.attr('width', $(container).width() ); //max width
      l.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var briChart = new Chart(cl).Bar(bcaData,chartOption);

  }
  ChartBca();

  var polarData = [
    {
      value : <?php echo $_data['bri'];?>,
      color: "#333"
    },
    {
      value : <?php echo $_data['mandiri'];?>,
      color: "#666"
    },
    {
      value : <?php echo $_data['bca'];?>,
      color: "#999"
    }
  ]

  var polarOption =
  {
              segmentShowStroke : false,
              animation : false
  }


  //Polar
  var p = $('#donut-chartjs');
  var container = $(p).parent();
  var cp = p.get(0).getContext("2d");
  $(window).resize(donutChart);
  function donutChart(){
      p.attr('width', $(container).width() ); //max width
      p.attr('height', $(container).height() ); //max height
      //Call a function to redraw other content (texts, images etc)
      var donutChart = new Chart(cp).Doughnut(polarData,polarOption);
  }

  donutChart();

});
</script>

</body>
</html>
