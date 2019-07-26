<?php
	if (isset($_GET['id_rincian'])) {
	$id_rincian = $_GET['id_rincian'];
	}
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$id_rincian'");
	$data    =mysql_fetch_array($query);
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
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
	<li><a href="index.php?page=form-edit-data-rincian-ln&id_rincian=<?=$id_rincian?>" title="edit" class="btn btn-sm btn-default m-b-10"><i class="fa fa-pencil"></i> &nbsp;Edit</a></li>
	<li><a href="../../pages/admin/rincian/cetak-rincian-ln.php?id_rincian=<?=$id_rincian?>" target="_blank" title="cetak" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-print"></i> &nbsp;Cetak</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Detail<small> Rincian <i class="fa fa-angle-right"></i> <i class="fa fa-lock"></i> No : <span class="text-primary"><?=$spd['nomor']?></span>&nbsp; Pegawai : <span class="text-primary"><?=$peg['nama']?></span></small></h1>
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
													<h4>RINCIAN BIAYA PERJALANAN DINAS</h4>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="field">Lampiran SPD Nomor</td>
												<td><?=$spd['nomor']?></td>
											</tr>
											<tr>
												<td class="field">Tanggal</td>
												<td><?=$spd['tgl']?></td>
											</tr>
										</tbody>
									</table>
									
									<table class="table">
										<thead>
											<tr>
												<th>NO</th>
												<th colspan="4">PERINCIAN BIAYA</th>
												<th>JUMLAH</th>
												<th>KETERANGAN</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Uang Harian 100% di <?=$tuj['tujuan']?></td>
												<td><?=$data['jml_harian']?></td>
												<td>x</td>
												<td align="right"><?=number_format($data['nilai_harian'],0,",",".");?></td>
												<td align="right"><?=number_format($data['jml_harian']*$data['nilai_harian'],0,",",".");?></td>
												<td><?=$data['ket_harian']?></td>
											</tr>
											<tr>
												<td>2</td>
												<td>Uang Harian 40% / 30% di <?=$tuj['tujuan']?></td>
												<td><?=$data['jml_harian1']?></td>
												<td>x</td>
												<td align="right"><?=number_format($data['nilai_harian1'],0,",",".");?></td>
												<td align="right"><?=number_format($data['jml_harian1']*$data['nilai_harian1'],0,",",".");?></td>
												<td><?=$data['ket_harian1']?></td>
											</tr>
											<tr>
												<td>3</td>
												<td>Transportasi PP <?=$spd['asal']?> - <?=$tuj['tujuan']?></td>
												<td><?=$data['jml_berangkat']?></td>
												<td>x</td>
												<td align="right"><?=number_format($data['nilai_berangkat'],0,",",".");?></td>
												<td align="right"><?=number_format($data['jml_berangkat']*$data['nilai_berangkat'],0,",",".");?></td>
												<td><?=$data['ket_berangkat']?></td>
											</tr>
											<tr>
												<td>4</td>
												<td>Uang Reprentasi</td>
												<td><?=$data['jml_reprentasi']?></td>
												<td>x</td>
												<td align="right"><?=number_format($data['nilai_reprentasi'],0,",",".");?></td>
												<td align="right"><?=number_format($data['jml_reprentasi']*$data['nilai_reprentasi'],0,",",".");?></td>
												<td><?=$data['ket_reprentasi']?></td>
											</tr>
											<tr>
												<td>5</td>
												<td><?=$data['uraian_lain']?></td>
												<td><?=$data['jml_lain']?></td>
												<td>x</td>
												<td align="right"><?=number_format($data['nilai_lain'],0,",",".");?></td>
												<td align="right"><?=number_format($data['jml_lain']*$data['nilai_lain'],0,",",".");?></td>
												<td><?=$data['ket_lain']?></td>
											</tr>
											<tr>
												<td colspan="5" align="center">Jumlah</td>
												<td align="right"><?=number_format($data['total'],0,",",".");?></td>
												<td></td>
											</tr>
											<tr>
												<td colspan="5" align="center">Uang Muka</td>
												<td align="right"><?=number_format($data['uang_muka'],0,",",".");?></td>
												<td></td>
											</tr>
											<?php
												function penyebut($nilai) {
													$nilai = abs($nilai);
													$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
													$temp = "";
													if ($nilai < 12) {
														$temp = " ". $huruf[$nilai];
													} else if ($nilai <20) {
														$temp = penyebut($nilai - 10). " belas";
													} else if ($nilai < 100) {
														$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
													} else if ($nilai < 200) {
														$temp = " seratus" . penyebut($nilai - 100);
													} else if ($nilai < 1000) {
														$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
													} else if ($nilai < 2000) {
														$temp = " seribu" . penyebut($nilai - 1000);
													} else if ($nilai < 1000000) {
														$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
													} else if ($nilai < 1000000000) {
														$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
													} else if ($nilai < 1000000000000) {
														$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
													} else if ($nilai < 1000000000000000) {
														$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
													}     
													return $temp;
												}

												function terbilang($nilai) {
													if($nilai<0) {
														$hasil = "minus ". trim(penyebut($nilai));
													} else {
														$hasil = trim(penyebut($nilai));
													}     		
													return $hasil;
												}
											?>
											<tr>
												<td></td>
												<td colspan="6">Terbilang : <i><?php echo ucwords (terbilang($data['total']));?> Rupiah</i></td>
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