<?php
	if (isset($_GET['id_ta'])) {
	$id_ta = $_GET['id_ta'];
	
	$selTah	= mysql_query("SELECT SUM(pagu_ln) as `pagu_ln`, SUM(pagu_dn) as `pagu_dn`,SUM(pagu_dk) as `pagu_dk` FROM tb_ta WHERE tahun='$id_ta'");
	$tah	=mysql_fetch_array($selTah);
	
	$total_ln	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta IN (SELECT CAST(id_ta as CHAR) FROM tb_ta WHERE tahun='$id_ta') AND jns_tuj='Luar Negeri'"); 
	$tot_ln		=mysql_fetch_assoc($total_ln);
	$jum_ln		=$tot_ln['jml'];
	$real_ln	=($jum_ln/$tah['pagu_ln'])*100;
	$saldo_ln	=$tah['pagu_ln']-$jum_ln;
	
	$total_dn	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta IN (SELECT CAST(id_ta as CHAR) FROM tb_ta WHERE tahun='$id_ta') AND jns_tuj='Dalam Negeri'"); 
	$tot_dn		=mysql_fetch_assoc($total_dn);
	$jum_dn		=$tot_dn['jml'];
	$real_dn	=($jum_dn/$tah['pagu_dn'])*100;
	$saldo_dn	=$tah['pagu_dn']-$jum_dn;
	
	$total_dk	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta IN (SELECT CAST(id_ta as CHAR) FROM tb_ta WHERE tahun='$id_ta') AND jns_tuj='Dalam Kota'"); 
	$tot_dk		=mysql_fetch_assoc($total_dk);
	$jum_dk		=$tot_dk['jml'];
	$real_dk	=($jum_dk/$tah['pagu_dk'])*100;
	$saldo_dk	=$tah['pagu_dk']-$jum_dk;
	
	$totalall	=$jum_ln+$jum_dn+$jum_dk;
	$totalpagu	=$tah['pagu_ln']+$tah['pagu_dn']+$tah['pagu_dk'];
	$real_all	=($totalall/$totalpagu)*100;
	
	}
	
	else {
		die ("Error. No Kode Selected! ");	
	}
?>

<?php
	$filename	="Report Anggaran "."$tah[tahun]";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Report Anggaran');
	$sheet->setCellValue("A1", "Report Anggaran $tah[tahun]");
	$sheet->setCellValue("A3", "Pagu Anggaran");
	$sheet->setCellValue("A4", "Luar Negeri");
	$sheet->setCellValue("A5", "Dalam Negeri");
	$sheet->setCellValue("A6", "Dalam Kota");
	$sheet->setCellValue("B3", "Nilai Pagu");
	$sheet->setCellValue("B4", $tah['pagu_ln']);
	$sheet->setCellValue("B5", $tah['pagu_dn']);
	$sheet->setCellValue("B6", $tah['pagu_dk']);
	$sheet->setCellValue("C3", "Realisasi");
	$sheet->setCellValue("C4", $jum_ln);
	$sheet->setCellValue("C5", $jum_dn);
	$sheet->setCellValue("C6", $jum_dk);
	$sheet->setCellValue("D3", "Saldo");
	$sheet->setCellValue("D4", $saldo_ln);
	$sheet->setCellValue("D5", $saldo_dn);
	$sheet->setCellValue("D6", $saldo_dk);
	$sheet->setCellValue("A8", "No. Urut");
	$sheet->setCellValue("B8", "Pegawai");
	$sheet->setCellValue("C8", "Tgl SPD");
	$sheet->setCellValue("D8", "Nomor SPD");
	$sheet->setCellValue("E8", "Jenis Tujuan");
	$sheet->setCellValue("F8", "Penggunaan");
	
	$expKwi	=mysql_query("SELECT * FROM tb_kwitansi WHERE ta='$id_ta' ORDER BY id_peg");
	$i	=9; //Dimulai dengan baris ke 
	$eno	=1;
	while($ekwi	=mysql_fetch_array($expKwi)){
	$expPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ekwi[id_peg]'");
	$epeg	=mysql_fetch_array($expPeg);
	$expSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$ekwi[id_spd]'");
	$espd	=mysql_fetch_array($expSpd);
	$expTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$espd[tujuan]'");
	$etuj	=mysql_fetch_array($expTuj);
								
	   $sheet->setCellValue( "A" . $i, $eno);
	   $sheet->setCellValue( "B" . $i, $epeg['nama'] );
	   $sheet->setCellValue( "C" . $i, $espd['tgl'] );
	   $sheet->setCellValue( "D" . $i, $espd['nomor'] );
	   $sheet->setCellValue( "E" . $i, $etuj['jenis'] );
	   $sheet->setCellValue( "F" . $i, $ekwi['jumlah'] );
	   $eno++;
	   $i++;
	}
	 
	$writer	=new PHPExcel_Writer_Excel2007($excel);
	$file	="../../assets/excel/$filename.xlsx";
	$writer->save("$file");
?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="<?php echo $file;?>" class="btn btn-sm btn-success m-b-10" title="Export To Excel"><i class="fa fa-file-excel-o"></i> &nbsp;Export</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Report<small> Penggunaan Anggaran <?php echo $tah['tahun']?> <i class="fa fa-angle-right"></i> <span class="text-primary">Rp <?php echo number_format($totalall,0,",",".")?></span></small></h1>
<!-- end page-header -->
<div class="row">
	<div class="col-md-9">
		<div class="profile-container">
			<!-- begin profile-section -->
			<div class="profile-section">
				<div class="panel-body">
					<form action="index.php?page=report-anggaran-bypeg&id_ta=<?=$id_ta?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
						<div class="form-group">
							<label class="col-md-3 control-label">Berdasarkan Pegawai</label>
							<div class="col-md-5">
								<?php
									$nompeg = mysql_query("SELECT * FROM tb_nominatif GROUP BY pegawai");        
									echo '<select name="pegawai" class="default-select2 form-control">';    
									while ($rownom = mysql_fetch_array($nompeg)) { 
										$pegawai = mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$rownom[pegawai]'");
										while ($rowpeg = mysql_fetch_array($pegawai)) {
										echo '<option value="'.$rowpeg['id_peg'].'">'.$rowpeg['nama'].' - '.$rowpeg['nip_val'].' '.$rowpeg['nip'].'</option>';    
										}    
									}    
									echo '</select>';
								?>
							</div>
							<div class="col-md-3">
								<button type="submit" name="report" value="report" class="btn btn-success"><i class="fa fa-search"></i> &nbsp;Get Report</button>&nbsp;
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- end profile-section -->
			<!-- begin profile-section -->
			<div class="profile-section">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Pegawai</th>
							<th>Tgl SPD</th>
							<th>Nomor SPD</th>
							<th>Tujuan</th>
							<th width="10%">Penggunaan</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query	=mysql_query("SELECT * FROM tb_kwitansi WHERE ta IN (SELECT CAST(id_ta as CHAR) FROM tb_ta WHERE tahun='$id_ta') ORDER BY id_peg");
							$no=0;
							while($data	=mysql_fetch_array($query)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php
								$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
								$peg	=mysql_fetch_array($selPeg);
								echo $peg['nama'];
								?>
							</td>
							<td><?php
								$selSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
								$spd	=mysql_fetch_array($selSpd);
								list($y,$m,$d)	=explode ("-",$spd['tgl']);
								echo $d;echo"-";echo $m;echo"-";echo $y;
								?>
							</td>
							<td><?php echo $spd['nomor']?></td>
							<td><?php
								$seltuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
								$tuj	=mysql_fetch_array($seltuj);
								echo $tuj['jenis'];
								?>
							</td>
							<td align="right"><?php echo number_format($data['jumlah'],0,",",".");?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>	
			</div>
			<!-- end profile-section -->
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

<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>