<!DOCTYPE html>
<html lang="en">
<head>
  <title>Expired Date</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <link href="style.css" rel="stylesheet">

</head>
<body>
<style>
	.responsive {
  width: 30%;
  height: auto;
}
</style>
<?php
date_default_timezone_set('Asia/Jakarta');
function hari_ini(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return "<b>" . $hari_ini . "</b>";
 
}
 
//echo "Hari ini adalah ". hari_ini();

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>
<script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);
function waktu() {
var tanggal = new Date();
setTimeout("waktu()",1000);
document.getElementById("tanggalku").innerHTML
= tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>



<div class="header">
  <div class="row">
		<div class="col-sm-3 col-xs-3">
			<div class="hari text-left" ><?php echo hari_ini() ?></div>
			<div class="tgl text-left" ><?php echo tgl_indo(date('Y-m-d')); ?></div>
			</div>
  		<div class="col-sm-6 col-xs-6 text-center ">
  			<img src="img/icon.png" width="200" height="120" class="responsive">
  		</div>
  		<div class="col-sm-3 col-xs-3 text-right">
  			<div class="jam text-right" id="tanggalku"></div>
  		</div>
  	</div>
</div>

<?php
$tgl1 = date('Y-m-d');

if (isset($_GET['ml'])){
 if ($_GET['ml'] == '220'){
	$ex = tgl_indo(date('Y-m-d', strtotime('+18 months', strtotime($tgl1))));
	$produksi = tgl_indo(date('Y-m-d'));
 }else if ($_GET['ml'] == '330'){
	$ex = tgl_indo(date('Y-m-d', strtotime('+24 months', strtotime($tgl1))));
	$produksi = tgl_indo(date('Y-m-d'));
 } else if($_GET['ml'] == '600'){
	$ex = tgl_indo(date('Y-m-d', strtotime('+24 months', strtotime($tgl1))));
	$produksi = tgl_indo(date('Y-m-d'));
 } else if ($_GET['ml'] == '1500'){
	$ex = tgl_indo(date('Y-m-d', strtotime('+24 months', strtotime($tgl1))));
	$produksi = tgl_indo(date('Y-m-d'));
 } else {
	$ex = "";
	$produksi = "";
 }
} else {
	$ex = "";
	$produksi = "";
}

?>

<div class="row">
 <div class="col-md-2"></div>
	<div class="col-md-8"  style="background-color:lavender;">
	<div class="card-header">
				<div class="box-header">
				<h3 class="box-title"> <i class="fa fa-bullhorn"></i> &nbsp Pilih Opsi Running</h3><hr>
				</div>
				<form method="GET" action="#">
				<div class="form-group row">
					
					<div class="col-md-7">
						<select  type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Masukkan Nomer Identitas" name="ml">
							<option>Pilih</option>
							<option value='220' <?php echo isset($_GET['ml']) == '220' ? 'selected' : '' ; ?>>220 - 18 bulan</option>
							<option value='330' <?php echo  isset($_GET['ml']) == '330' ? 'selected' : '' ; ?>>330 - 24 bulan</option>
							<option value='600' <?php echo  isset($_GET['ml']) == '600' ? 'selected' : '' ; ?>>600 - 24 bulan</option>
							<option value='1500' <?php echo  isset($_GET['ml']) == '1500' ? 'selected' : '' ; ?>>1500 - 24 bulan</option>
						</select>
					</div>
					<div class="col-md-2">
					<button type="submit" class="btn btn-success col-md-12" name='simpan' >Action </button> 
					</div>
					<div class="col-md-2">
							<a href='index.php' type="button" class="btn btn-info col-md-12" >Reset </a>
					</div>
				</div>
				</div>
			</form>
			</div>
	</div>
	<div class="col-md-2"></div>
</div>

<br><hr>
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-sm border m-2">
				<img src="img/date.png" class="rectangular" alt="" width="64" height="64">
				<h3>Tanggal Produksi</h3>
				<h3><b><?php echo $produksi; ?></b></h3>
			</div>
			<div class="col-sm border m-2">
				<img src="img/expired.png" class="rectangular" alt="" width="64" height="64">
				<h3>Tanggal Expired</h3>
				<h3><b><?php echo $ex; ?></b></h3>
			</div>
		</div>
	</div>

</body>
</html>
