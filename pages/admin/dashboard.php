<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<span class='pesan'><div class='btn btn-sm btn-inverse m-b-10'><i class='fa fa-bell text-warning'></i>&nbsp; ".$_SESSION['pesan']." &nbsp; &nbsp; &nbsp;</div></span>";
			}
			$_SESSION['pesan'] ="";
		?>
	</li>
	<li><a href="javascript:;" class="btn btn-sm btn-primary m-b-10"><i class="ion-android-calendar fa-lg"></i> &nbsp; <?php echo date("d F Y")?></a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Dashboard <small>Overview &amp; statistic</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$satker = $_SESSION['id_satker'];
	$filterSatker = " WHERE id_satker = '$satker' ";
	$jmlpeg	=mysql_query("SELECT * FROM tb_pegawai where satker = '$satker' ");
	$jpeg	=mysql_num_rows($jmlpeg);
			
	$jmlspd	=mysql_query("SELECT * FROM tb_spd $filterSatker");
	$jspd	=mysql_num_rows($jmlspd);
		
	$jmlkwi	=mysql_query("SELECT * FROM tb_kwitansi $filterSatker");
	$jkwi	=mysql_num_rows($jmlkwi);
		
	$now	=date("Y");
	$selTah	=mysql_query("SELECT * FROM tb_ta WHERE tahun='$now' and id_satker='$satker'");
	$tah	=mysql_fetch_array($selTah);
	
	$total_ln	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta='$tah[id_ta]' AND jns_tuj='Luar Negeri' and id_satker='$satker'"); 
	$tot_ln		=mysql_fetch_assoc($total_ln);
	$jum_ln		=$tot_ln['jml'];
	$real_ln	=@($jum_ln/$tah['pagu_ln'])*100;
	$saldo_ln	=$tah['pagu_ln']-$jum_ln;
	
	$total_dn	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta='$tah[id_ta]' AND jns_tuj='Dalam Negeri' and id_satker='$satker'"); 
	$tot_dn		=mysql_fetch_assoc($total_dn);
	$jum_dn		=$tot_dn['jml'];
	$real_dn	=@($jum_dn/$tah['pagu_dn'])*100;
	$saldo_dn	=$tah['pagu_dn']-$jum_dn;
	
	$total_dk	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta='$tah[id_ta]' AND jns_tuj='Dalam Kota' and id_satker='$satker'"); 
	$tot_dk		=mysql_fetch_assoc($total_dk);
	$jum_dk		=$tot_dk['jml'];
	$real_dk	=@($jum_dk/$tah['pagu_dk'])*100;
	$saldo_dk	=$tah['pagu_dk']-$jum_dk;
	
	$totalall	=$jum_ln+$jum_dn+$jum_dk;
	$totalpagu	=$tah['pagu_ln']+$tah['pagu_dn']+$tah['pagu_dk'];
	$real_all	=@($totalall/$totalpagu)*100;
?>
<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="widget widget-stats bg-white text-inverse">
					<a href="index.php?page=form-view-data-pegawai"><div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-orange"><i class="ion-ios-personadd"></i></div></a>
					<div class="stats-title">PEGAWAI</div>
					<div class="stats-number"><?=$jpeg?></div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 70%;"></div>
					</div>
					<div class="stats-desc">Total Data Pegawai</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="widget widget-stats bg-white text-inverse">
					<a href="index.php?page=form-view-data-spd"><div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-red"><i class="ion-ios-paper"></i></div></a>
					<div class="stats-title">SPD</div>
					<div class="stats-number"><?=$jspd?></div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 50%;"></div>
					</div>
					<div class="stats-desc">Total Data SPD</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="widget widget-stats bg-white text-inverse">
					<a href="index.php?page=form-view-data-kwitansi"><div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-blue"><i class="fa fa-money"></i></div></a>
					<div class="stats-title">KWITANSI</div>
					<div class="stats-number"><?=$jkwi?></div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 85%;"></div>
					</div>
					<div class="stats-desc">Total Data Kwitansi</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- begin col-12 -->
			<div class="col-md-12">
				<div class="panel panel-inverse" data-sortable-id="index-1">
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title"><i class="ion-stats-bars fa-lg text-warning"></i> &nbsp;Statistik SPD</h4>
					</div>
					<div class="panel-body">
						<div id="sta_year_spd" class="height-sm"></div>
					</div>
				</div>				
			</div>
			<!-- end col-12 -->
		</div>
	</div>
	<div class="col-md-3">
		<div class="profile-container">
			<h4># Pagu Anggaran <?=$tah['tahun']?></h4>
			<br />
			<label class="control-label">Anggaran Luar Negeri</label>
			<div class="progress progress-striped">
				<div class="progress-bar" style="width: 100%"><span class="pull-right"><?php echo number_format($tah['pagu_ln'],0,",",".");?> &nbsp;</span></div>
			</div>
			<label class="control-label">Realisasi Luar Negeri</label>
			<div class="progress progress-striped active">
				<div class="progress-bar" style="width:<?php echo round ($real_ln,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_ln,2)?>%</div>
			</div>
			<br />
			<label class="control-label">Anggaran Dalam Negeri</label>
			<div class="progress progress-striped">
				<div class="progress-bar progress-bar-danger" style="width: 100%"><span class="pull-right"><?php echo number_format($tah['pagu_dn'],0,",",".");?> &nbsp;</span></div>
			</div>
			<label class="control-label">Realisasi Dalam Negeri</label>
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-danger" style="width:<?php echo round ($real_dn,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_dn,2)?>%</div>
			</div>
			<br />
			<label class="control-label">Anggaran Dalam Kota</label>
			<div class="progress progress-striped">
				<div class="progress-bar progress-bar-warning" style="width: 100%"><span class="pull-right"><?php echo number_format($tah['pagu_dk'],0,",",".");?> &nbsp;</span></div>
			</div>
			<label class="control-label">Realisasi Dalam Kota</label>
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-warning" style="width:<?php echo round ($real_dk,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_dk,2)?>%</div>
			</div>
			<br />
			<label class="control-label">Semua Anggaran</label>
			<div class="progress progress-striped">
				<div class="progress-bar progress-bar-success" style="width: 100%"><span class="pull-right"><?php echo number_format($totalpagu,0,",",".");?> &nbsp;</span></div>
			</div>
			<label class="control-label">Semua Realisasi</label>
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-success" style="width:<?php echo round ($real_all,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_all,2)?>%</div>
			</div>
		</div>
	</div>
</div>

<script src="../../assets/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
		$(document).ready(function() {
			chart1 = new Highcharts.Chart({
				chart: {
					renderTo: 'sta_year_spd',
					type: 'column'
				},   
				title: {
					text: "Statistik SPD Tahun <?php echo $tah['tahun']?> pada <?= $unit['satker']?>"
				},
				xAxis: {
					categories: ['Bulan']
				},
					yAxis: {
					title: {
						text: 'Jumlah'
					}
				},
				series:             
					[
					<?php 
					$id_satker = $_SESSION['id_satker'];
					$sql   = "SELECT * FROM tb_spd WHERE ta='$tah[id_ta]' AND id_satker = '$id_satker' GROUP BY extract(month from tgl) ORDER BY tgl";

					


					$query = mysql_query( $sql )  or die(mysql_error());
						while( $ret = mysql_fetch_array( $query ) ){
								$tgl	=$ret['tgl'];
								list($y,$m,$d)	=explode ("-",$tgl);
								$new_tgl	="-"."$m"."-";
								
								if ($m == "01"){
									$prn	="Januari";
								}
								else if ($m == "02"){
									$prn ="Februari";
								}
								else if ($m == "03"){
									$prn ="Maret";
								}
								else if ($m == "04"){
									$prn ="April";
								}
								else if ($m == "05"){
									$prn ="Mei";
								}
								else if ($m == "06"){
									$prn ="Juni";
								}
								else if ($m == "07"){
									$prn ="Juli";
								}
								else if ($m == "08"){
									$prn ="Agustus";
								}
								else if ($m == "09"){
									$prn ="September";
								}
								else if ($m == "10"){
									$prn ="Oktober";
								}
								else if ($m == "11"){
									$prn ="November";
								}
								else if ($m == "12"){
									$prn ="Desember";
								}
									
								$sql_jumlah   = "SELECT * FROM tb_spd WHERE tgl LIKE '%$new_tgl%' AND id_satker = '$id_satker'";        
								$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
								$data = mysql_num_rows( $query_jumlah );																									
						?>
							{
								name: '<?php echo $prn; ?>',
								data: [<?php echo $data; ?>]
							},
						<?php 
						
						}
						?>
					]
			});
		});	
</script>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>