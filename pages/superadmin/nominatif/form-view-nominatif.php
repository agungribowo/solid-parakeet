<?php
	$filename	="Daftar All Nominatif";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Daftar All Nominatif');
	$sheet->setCellValue("A1", "DAFTAR All Nominatif");
	$sheet->setCellValue("A3", "No. Urut");
	$sheet->setCellValue("B3", "ID");
	$sheet->setCellValue("C3", "NOMOR SPD");
	$sheet->setCellValue("D3", "TANGGAL");
	$sheet->setCellValue("E3", "PEGAWAI / NIP");
	$sheet->setCellValue("F3", "TUJUAN");
	$sheet->setCellValue("G3", "JENIS TUJUAN");
	$sheet->setCellValue("H3", "TGL BERANGKAT");
	$sheet->setCellValue("I3", "TGL KEMBALI");
	
	$expNom	=mysql_query("SELECT * FROM tb_nominatif ORDER BY id_spd");
	$i	=4; //Dimulai dengan baris ke dua
	$eno	=1;
	while($enom	=mysql_fetch_array($expNom)){
	$expSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$enom[id_spd]'");
	$espd	=mysql_fetch_array($expSpd);
	
	$expPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$enom[pegawai]'");
	$epeg	=mysql_fetch_array($expPeg);
	$expTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$espd[tujuan]'");
	$etuj	=mysql_fetch_array($expTuj);
	
	   $sheet->setCellValue( "A" . $i, $eno);
	   $sheet->setCellValue( "B" . $i, $espd['id_spd'] );
	   $sheet->setCellValue( "C" . $i, $espd['nomor'] );
	   $sheet->setCellValue( "D" . $i, $espd['tgl'] );
	   $sheet->setCellValue( "E" . $i, $epeg['nama'] .' / '.$epeg['nip']);
	   $sheet->setCellValue( "F" . $i, $etuj['tujuan'] );
	   $sheet->setCellValue( "G" . $i, $etuj['jenis'] );
	   $sheet->setCellValue( "H" . $i, $espd['tgl_berangkat'] );
	   $sheet->setCellValue( "I" . $i, $espd['tgl_kembali'] );
	   $eno++;
	   $i++;
	}
	 
	$writer	=new PHPExcel_Writer_Excel2007($excel);
	$file	="../../assets/excel/$filename.xlsx";
	$writer->save("$file");
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
	<li><a href="<?php echo $file;?>" class="btn btn-sm btn-success m-b-10" title="Export To Excel"><i class="fa fa-file-excel-o"></i> &nbsp;Export</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Daftar<small> Nominatif&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$id_satker = $_SESSION['id_satker'];
	$query	=mysql_query("SELECT * FROM tb_nominatif where id_satker = $id_satker ORDER BY id_spd DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Daftar Nominatif SPD"</h4>
			</div>
            <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Nomor SPD</th>
							<th>Tgl SPD</th>
							<th>Pegawai</th>
							<th>Jenis Tujuan</th>
							<th>User</th>
							<th width="10%">Rincian / Kwitansi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($nom	=mysql_fetch_array($query)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php
									$selSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$nom[id_spd]'");
									$spd	=mysql_fetch_array($selSpd);
									list($y,$m,$d)	=explode ("-",$spd['tgl']);
									
									$brkt	=new DateTime($spd['tgl_berangkat']);
									$kmbl	=new DateTime($spd['tgl_kembali']);
									$diff	=$kmbl->diff($brkt);
									$lama	=($diff->d)+1;
								?>
								<a type="button" style="cursor:pointer;" data-toggle="modal" data-target="#Det<?php echo $nom['id_spd'];?>" title="detail spd"><?=$spd['nomor']?></a>
							</td>
							<td><?php echo $d?>-<?php echo $m?>-<?php echo $y?></td>
							<td><?php
									$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$nom[pegawai]'");
									$peg	=mysql_fetch_array($selPeg);
									echo $peg['nama'];
								?>
							</td>
							<td><?php
									$id_tujuan	=$spd['tujuan'];
									$seltuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$id_tujuan'");
									while ($tuj	=mysql_fetch_array($seltuj)){
									
									echo $tuj['jenis'];
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
									if ($tuj['jenis'] =="Dalam Kota"){
										$cekkwi	=mysql_num_rows (mysql_query("SELECT id_spd, id_peg FROM tb_kwitansi WHERE id_spd='$nom[id_spd]' AND id_peg='$nom[pegawai]'"));
										if($cekkwi > 0) {
											echo"<a type='button' class='btn btn-white active btn-icon btn-sm' href='javascript:;' title='kwitansi telah dibuat'><i class='ion-navigate fa-lg'></i></a>";
										}
										else{
											echo"<a type='button' class='btn btn-success btn-icon btn-sm' data-toggle='modal' data-target='#Kwi";echo $nom['id_spd'];echo$nom['pegawai'];echo$lama;echo"' title='create kwitansi'><i class='ion-navigate fa-lg'></i></a>";
										}
									}
									else{
										$cekrinci	=mysql_num_rows (mysql_query("SELECT id_spd, id_peg FROM tb_rincian WHERE id_spd='$nom[id_spd]' AND id_peg='$nom[pegawai]'"));
										if($cekrinci > 0) {
											echo"<a type='button' class='btn btn-white active btn-icon btn-sm' href='javascript:;' title='rincian telah dibuat'><i class='ion-ios-paper-outline fa-lg'></i></a>";
										}
										else{
											if ($tuj['jenis'] =="Luar Negeri"){
												echo"<a type='button' class='btn btn-danger btn-icon btn-sm' href='index.php?page=form-master-data-rincian-ln&id_spd=";echo $nom['id_spd'];echo"&id_peg=";echo $nom['pegawai'];echo"' title='create rincian'><i class='ion-ios-paper-outline fa-lg'></i></a>";
											}
											else{
												echo"<a type='button' class='btn btn-danger btn-icon btn-sm' href='index.php?page=form-master-data-rincian&id_spd=";echo $nom['id_spd'];echo"&id_peg=";echo $nom['pegawai'];echo"' title='create rincian'><i class='ion-ios-paper-outline fa-lg'></i></a>";
											}
										}
									}
									}
								?>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Kwi<?php echo $nom['id_spd'];echo$nom['pegawai'];echo$lama;?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Kwitansi</span> &nbsp; No. <?=$spd['nomor']?> _ <?=$peg['nama']?></h5>
									</div>
									<div class="modal-body" align="center">
										Pastikan data SPD telah diperiksa dengan benar. Kemudian klik <b>OK</b> untuk create kwitansi !
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=create-kwitansi-1&id_spd=<?=$nom['id_spd']?>&id_peg=<?=$nom['pegawai']?>&lama=<?=$lama?>" class="btn btn-danger">&nbsp; &nbsp;OK&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
									</div>
								</div>
							</div>
						</div>
						<!-- #modal-detail -->
						<div id="Det<?php echo $nom['id_spd'];?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<?php
										$modspd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$nom[id_spd]'");
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