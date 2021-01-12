<?php
	if (isset($_GET['id_spd'])) {
	$id_spd = $_GET['id_spd'];
	}
	include "../../config/koneksi.php";

	$id_satker = $_SESSION['id_satker'];

	$query   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$data    =mysql_fetch_array($query);
	list($y1,$m1,$d1)	=explode ("-",$data['tgl_berangkat']);
	list($y2,$m2,$d2)	=explode ("-",$data['tgl_kembali']);
	
	$selTah	=mysql_query("SELECT * FROM tb_ta WHERE id_ta='$data[ta]'");
	$tah	=mysql_fetch_array($selTah);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$data[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
?>
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
	<li><a href="index.php?page=form-view-data-spd" title="back" class="btn btn-sm btn-white m-b-10"><i class="fa fa-step-backward"></i> &nbsp;Back</a></li>
	<?php
		if ($tuj['jenis'] =="Luar Negeri"){
			echo'<li><a href="../../pages/superadmin/spd/cetak-spd-ln.php?id_spd=';echo $id_spd;echo'" target="_blank" title="cetak" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak SPD</a></li>';
			echo'<li><a href="../../pages/superadmin/spd/cetak-nom-ln.php?id_spd=';echo $id_spd;echo'" target="_blank" title="cetak" class="btn btn-sm btn-warning m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak Nominatif</a></li>';
		}
		else{
			if ($tuj['jenis'] =="Dalam Negeri"){
				echo'<li><a href="../../pages/superadmin/spd/cetak-spd.php?id_spd=';echo $id_spd;echo'" target="_blank" title="cetak" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak SPD</a></li>';
				echo'<li><a href="../../pages/superadmin/spd/cetak-nom-luar.php?id_spd=';echo $id_spd;echo'" target="_blank" title="cetak" class="btn btn-sm btn-warning m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak Nominatif</a></li>';
			}
			else{
				echo'<li><a href="../../pages/superadmin/spd/cetak-spd.php?id_spd=';echo $id_spd;echo'" target="_blank" title="cetak" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak SPD</a></li>';
				echo'<li><a href="../../pages/superadmin/spd/cetak-nom-dalam.php?id_spd=';echo $id_spd;echo'" target="_blank" title="cetak" class="btn btn-sm btn-warning m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak Nominatif</a></li>';
			}
		}
	?>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Detail<small> SPD <i class="fa fa-angle-right"></i> <i class="fa fa-lock"></i> No : <?=$data['nomor']?></small></h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
	<div class="col-md-8">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#detail" data-toggle="tab"><span class="visible-xs">Detail</span><span class="hidden-xs"><i class="ion-ios-paper fa-lg text-primary"></i> Detail</span></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="detail">
				<!-- begin profile-container -->
				<div class="profile-container">
					<div class="profile-section">
						<div class="profile-info">
							<!-- begin table -->
							<div class="table-responsive">
								<table class="table table-profile">
									<thead>
										<tr>
											<th><h5><span class="label label-inverse pull-right"> # Detail SPD </span></h5></th>
											<th><h4><?=$data['nomor']?> 
													<small><strong>
														<?php
															echo $tuj['tujuan'];echo " - ";echo $tuj['jenis'];
														?>
													</strong></small>
												</h4>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr class="highlight">
											<td class="field">Pejabat Pemberi Perintah</td>
											<td><?=$data['pejabat']?></td>
										</tr>
										<tr class="divider">
											<td colspan="2"></td>
										</tr>
										<tr>
											<td class="field">Pegawai</td>
											<td><?php
												$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[pegawai]'");
												$peg	=mysql_fetch_array($selPeg);
												echo $peg['nama'];
												?>
											</td>
										</tr>
										<tr>
											<td class="field">Pangkat dan Golongan</td>
											<td><?=$peg['pangkat']?>
												<?php
												$selGol	=mysql_query("SELECT * FROM tb_gol WHERE id_gol='$peg[gol]'");
												$gol	=mysql_fetch_array($selGol);
												echo $gol['gol'];
												?>
											</td>
										</tr>
										<tr>
											<td class="field">Jabatan / Instansi</td>
											<td><?=$peg['jab']?></td>
										</tr>
										<tr>
											<td class="field">Maksud Perjalanan Dinas</td>
											<td><?=$data['keperluan']?></td>
										</tr>
										<tr>
											<td class="field">Dasar Surat Perintah</td>
											<td><?=$data['no_sprin']?></td>
										</tr>
										<tr>
											<td class="field">Tempat Berangkat</td>
											<td><?=$data['asal']?></td>
										</tr>
										<tr>
											<td class="field">Tempat Tujuan</td>
											<td><?php
												$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$data[tujuan]'");
												$tuj	=mysql_fetch_array($selTuj);
												echo $tuj['tujuan'];
												?>
											</td>
										</tr>
										<tr>
											<td class="field">Tanggal Berangkat</td>
											<td><?php echo $d1?>-<?php echo $m1?>-<?php echo $y1?></td>
										</tr>
										<tr>
											<td class="field">Tanggal Kembali</td>
											<td><?php echo $d2?>-<?php echo $m2?>-<?php echo $y2?></td>
										</tr>
										<tr>
											<td class="field">Pengikut &nbsp;<a type="button" class="btn btn-danger btn-icon btn-xs" href="index.php?page=form-edit-pengikut&id_spd=<?=$id_spd?>" title="edit pengikut"><i class="fa fa-pencil fa-lg"></i></a></td>
											<td><?php
													$ikut	=$data['pengikut'];
													$array	=explode(',', $ikut);
													$no=0;
													foreach ($array as $ikut) {
														$selPeng	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ikut'");
														while ($peng	=mysql_fetch_array($selPeng)){
															$no++;
															echo $no; echo ". "; echo $peng['nama']; echo "<br />";
														}
													}
												?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- end table -->
						</div>
						<hr />
					</div>
				</div>
				<!-- end profile-container -->
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-inverse overflow-hidden">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					    <i class="fa fa-plus-circle pull-right"></i> 
						<i class="ion-filing fa-lg text-warning"></i> &nbsp;Kelengkapan
					</a>
				</h3>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in">
				<div class="panel-body">
					<?php
						$kelengkapan	=$data['kelengkapan'];
						$array1	=explode(',', $kelengkapan);
						$no=0;
						foreach ($array1 as $kelengkapan) {
							$selKel	=mysql_query("SELECT * FROM tb_kelengkapan WHERE id_kelengkapan='$kelengkapan'");
							while ($kel	=mysql_fetch_array($selKel)){
							$no++;
							echo $no; echo ". "; echo $kel['uraian']; echo "<br />";
							}
						}
					?>
					<br />
					<a type="button" class="btn btn-danger btn-icon btn-xs" href="index.php?page=form-edit-lengkap&id_spd=<?=$id_spd?>" title="edit kelengkapan"><i class="fa fa-pencil fa-lg"></i></a>
				</div>
				<div class="panel-body">
					Keterangan :<br />
					<?php echo $data['ket']?>
				</div>
				<div class="panel-body">
					Tahun Anggaran : <b><?php echo $tah['tahun']?></b>
				</div>
			</div>
		</div>
		
		<?php
			$semua_pengikut =explode(',', $data['pengikut']);
			$key			=$data['pegawai'];
			if (in_array($key, $semua_pengikut)){
				echo '<div class="tab-content">
					<div class="alert alert-warning fade in m-b-15">
						<i class="fa-lg fa fa-warning text-warning"></i> Oops! Duplikat daftar nominatif pegawai ...
					</div>
				</div>';
			}
		?>		
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>