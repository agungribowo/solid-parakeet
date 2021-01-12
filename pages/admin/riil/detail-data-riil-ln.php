<?php
	if (isset($_GET['id_riil'])) {
	$id_riil = $_GET['id_riil'];
	}
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_riil WHERE id_riil='$id_riil'");
	$data    =mysql_fetch_array($query);
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	// $selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
	// $tuj	=mysql_fetch_array($selTuj);
	
	// $selRin	=mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$data[id_rincian]'");
	// $rin	=mysql_fetch_array($selRin);
	// $inap	=$rin['jml_inap']*$rin['nilai_inap'];
	// $taxi_berangkat	=$rin['jml_taxi_berangkat']*$rin['nilai_taxi_berangkat'];
	// $taxi_kembali	=$rin['jml_taxi_kembali']*$rin['nilai_taxi_kembali'];
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
	<?php if ($data['id_user'] == $_SESSION['id_user']) {?>
	<li><a href="index.php?page=form-edit-data-riil&id_riil=<?=$id_riil?>" title="edit" class="btn btn-sm btn-default m-b-10"><i class="fa fa-pencil"></i> &nbsp;Edit</a></li>
	<?php }?>
	<li><a href="../../pages/superadmin/riil/cetak-riil.php?id_riil=<?=$id_riil?>" target="_blank" title="cetak" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Detail<small> Pengeluaran Riil <i class="fa fa-angle-right"></i> <i class="fa fa-lock"></i> No : <span class="text-primary"><?=$spd['nomor']?></span>&nbsp; Pegawai : <span class="text-primary"><?=$peg['nama']?></span></small></h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#profile" data-toggle="tab"><span class="visible-xs">Detail</span><span class="hidden-xs"><i class="ion-filing fa-lg text-primary"></i> Detail</span></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="profile">
				<!-- begin profile-container -->
				<div class="profile-container">
                <!-- begin profile-section -->
					<div class="profile-section col-sm-10 col-sm-offset-1">
						
							<!-- begin profile-info -->
							<div class="profile-info">
								<!-- begin table -->
								<div class="table-responsive">
									<table class="table table-profile">
										<thead>
											<tr>
												<th><h5><span class="label label-inverse pull-right"></span></h5></th>
												<th>
													<h4>DAFTAR PENGELUARAN RIIL</h4>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="field">Nama</td>
												<td><?=$peg['nama']?></td>
											</tr>
											<tr>
												<td class="field">Pangkat / NRP </td>
												<td><?=$peg['pangkat']?> / <?=$peg['nip']?></td>
											</tr>
											<tr>
												<td class="field">Jabatan</td>
												<td><?=$peg['jab']?></td>
											</tr>
										</tbody>
									</table>
									
									<table class="table">
										<thead>
											<tr>
												<th style="width:5%;text-align:left">NO</th>
												<th style="width:70%;text-align:left">URAIAN</th>
												<th style="width:25%;text-align:right">JUMLAH</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td><?=$data['uraian1']?></td>
												<td align="right"><?=number_format($data['jml1'],0,",",".");?></td>
											</tr>
											<tr>
												<td>2</td>
												<td><?=$data['uraian2']?></td>
												<td align="right"><?=number_format($data['jml2'],0,",",".");?></td>
											</tr>
											<tr>
												<td>3</td>
												<td><?=$data['uraian3']?></td>
												<td align="right"><?=number_format($data['jml3'],0,",",".");?></td>
											</tr>
											<tr>
												<td>4</td>
												<td><?=$data['uraian4']?></td>
												<td align="right"><?=number_format($data['jml4'],0,",",".");?></td>
											</tr>
											<tr>
												<td></td>
												<td align="center"><b>Jumlah</b></td>
												<td align="right"><b><?=number_format($data['jml1']+$data['jml2']+$data['jml3']+$data['jml4'],0,",",".");?></b></td>
											</tr>	
										</tbody>
									</table>
								</div>
								<!-- end table -->
							</div>
							<!-- end profile-info -->
					
					</div>
					<!-- end profile-section -->
				</div>
				<!-- end profile-container -->
			</div>
		</div>
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>