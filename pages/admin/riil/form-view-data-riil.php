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
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Daftar<small> Pengeluaran Riil&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$id_satker = $_SESSION['id_satker'];
	$query	=mysql_query("SELECT * FROM tb_riil WHERE id_satker='$id_satker' ORDER BY id_riil DESC");
?>
<div class="row">
	<!-- begin col-12 -->
    <div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Daftar Pengeluaran Riil SPD"</h4>
			</div>
            <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Nomor SPD</th>
							<th>Tgl SPD</th>
							<th>Pegawai</th>
							<th>User</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($rii	=mysql_fetch_array($query)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php
									$selSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$rii[id_spd]'");
									$spd	=mysql_fetch_array($selSpd);
									list($y,$m,$d)	=explode ("-",$spd['tgl']);
								?>
								<a type="button" style="cursor:pointer;" data-toggle="modal" data-target="#Det<?php echo $rii['id_spd'];?>" title="detail spd"><?=$spd['nomor']?></a>
							</td>
							<td><?php echo $d?>-<?php echo $m?>-<?php echo $y?></td>
							<td><?php
									$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$rii[id_peg]'");
									$peg	=mysql_fetch_array($selPeg);
									echo $peg['nama'];
								?>
							</td>
							<td><?php
								$pegawai	=mysql_query("SELECT nama_user FROM tb_user WHERE id_user='$spd[id_user]'");
								$peg	=mysql_fetch_array($pegawai);
								echo $peg['nama_user'];
								?>
							</td>
							<td class="text-center">
								<?php
								$seltuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
								while ($tuj	=mysql_fetch_array($seltuj)){
								if ($rii['id_user'] === $_SESSION['id_user']) {
									if ($tuj['jenis'] =="Luar Negeri"){
										echo"<a type='button' class='btn btn-success btn-icon btn-sm' href='index.php?page=detail-data-riil-ln&id_riil=";echo$rii['id_riil'];echo"' title='detail'><i class='fa fa-folder-open-o fa-lg'></i></a>
										<a type='button' class='btn btn-info btn-icon btn-sm' href='index.php?page=form-edit-data-riil-ln&id_riil=";echo$rii['id_riil'];echo"' title='edit'><i class='fa fa-pencil fa-lg'></i></a>";
									}
									else{
										echo"<a type='button' class='btn btn-success btn-icon btn-sm' href='index.php?page=detail-data-riil&id_riil=";echo$rii['id_riil'];echo"' title='detail'><i class='fa fa-folder-open-o fa-lg'></i></a>
										<a type='button' class='btn btn-info btn-icon btn-sm' href='index.php?page=form-edit-data-riil&id_riil=";echo$rii['id_riil'];echo"' title='edit'><i class='fa fa-pencil fa-lg'></i></a>";
									}
								} else {
									if ($tuj['jenis'] =="Luar Negeri"){
										echo"<a type='button' class='btn btn-success btn-icon btn-sm' href='index.php?page=detail-data-riil-ln&id_riil=";echo$rii['id_riil'];echo"' title='detail'><i class='fa fa-folder-open-o fa-lg'></i></a>
										";
									}
									else{
										echo"<a type='button' class='btn btn-success btn-icon btn-sm' href='index.php?page=detail-data-riil&id_riil=";echo$rii['id_riil'];echo"' title='detail'><i class='fa fa-folder-open-o fa-lg'></i></a>";
									}
								}
							}
								?>
							</td>
						</tr>
						<!-- #modal-detail -->
						<div id="Det<?php echo $rii['id_spd'];?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<?php
										$modspd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$rii[id_spd]'");
										$detspd    =mysql_fetch_array($modspd);
										
										$modtuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$detspd[tujuan]'");
										$dettuj	=mysql_fetch_array($modtuj);
										
										$modpeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$detspd[pegawai]'");
										$detpeg	=mysql_fetch_array($modpeg);
										
										$modgol	=mysql_query("SELECT * FROM tb_gol WHERE id_gol='$detpeg[gol]'");
										$detgol	=mysql_fetch_array($modgol);
									?>
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-close-circled"></i></button>
										<h5 class="modal-title"><i class="ion-ios-briefcase-outline text-primary"></i> &nbsp;Detail SPD No. <b><?php echo $detspd['nomor'];?> - <?php echo $dettuj['tujuan'];?> - <?php echo $dettuj['jenis'];?></b></h5>
									</div>
									<div class="col-md-12">
										<div class="profile-section">
											<div class="col-md-4">
												<div class="modal-body">
													<label>Pengikut</label>
													<br />
													<?php
														$detikut	=$detspd['pengikut'];
														$array	=explode(',', $detikut);
														$noikut=0;
														foreach ($array as $detikut) {
															$selPeng	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$detikut'");
															while ($peng	=mysql_fetch_array($selPeng)){
																$noikut++;
																echo $noikut; echo ". "; echo $peng['pangkat']; echo" "; echo $peng['nama']; echo "<br />";
															}
														}
													?>
												</div>
											</div>
											<div class="col-md-8">
												<div class="modal-body">
													<label class="col-md-4">Pejabat Pemberi Perintah</label>
													<span class="col-md-8"><?=$detspd['pejabat']?></span>
												</div>
												<div class="modal-body">
													<label class="col-md-4">Pegawai</label>
													<span class="col-md-8"><?=$detpeg['nama']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Pangkat dan Golongan</label>
													<span class="col-md-8"><?=$detpeg['pangkat']?> <?=$detgol['gol']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Jabatan / Instansi</label>
													<span class="col-md-8"><?=$detpeg['jab']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Maksud Perjalanan Dinas</label>
													<span class="col-md-8"><?=$detspd['keperluan']?></span>	
												</div>
												<br /><br />
												<div class="modal-body">
													<label class="col-md-4">Dasar Surat Perintah</label>
													<span class="col-md-8"><?=$detspd['no_sprin']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Tempat Berangkat</label>
													<span class="col-md-8"><?=$detspd['asal']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Tempat Tujuan</label>
													<span class="col-md-8"><?=$dettuj['tujuan']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Tanggal Berangkat</label>
													<span class="col-md-8"><?=$detspd['tgl_berangkat']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Tanggal Kembali</label>
													<span class="col-md-8"><?=$detspd['tgl_kembali']?></span>	
												</div>
												<div class="modal-body">
													<label class="col-md-4">Keterangan</label>
													<span class="col-md-8"><?=$detspd['ket']?></span>	
												</div>
												<hr />
												<div class="modal-body">
													<label class="col-md-4">Kelengkapan</label>
													<span class="col-md-8">
														<?php
														$detkel	=$detspd['kelengkapan'];
														$array1	=explode(',', $detkel);
														$nokel=0;
														foreach ($array1 as $detkel) {
															$selkel	=mysql_query("SELECT * FROM tb_kelengkapan WHERE id_kelengkapan='$detkel'");
															while ($kel	=mysql_fetch_array($selkel)){
															$nokel++;
															echo $nokel; echo ". "; echo $kel['uraian']; echo "<br />";
															}
														}
													?>
													</span>	
												</div>
												<br />
												<br />
											</div>
										</div>	
									</div>
									<div class="modal-footer no-margin-top"></div>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- end panel -->
	</div>
    <!-- end col-10 -->
</div>
<!-- end row -->

<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>