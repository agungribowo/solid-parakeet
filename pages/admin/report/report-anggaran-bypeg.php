<?php
	if (isset($_GET['id_ta'])) {
		$id_ta = $_GET['id_ta'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	if ($_POST['report'] == "report") {
		$pegawai	=$_POST['pegawai'];
	}
	
	$selTah	=mysql_query("SELECT * FROM tb_ta WHERE id_ta='$id_ta'");
	$tah	=mysql_fetch_array($selTah);
	
	$query	=mysql_query("SELECT * FROM tb_kwitansi WHERE ta='$id_ta' AND id_peg='$pegawai' ORDER BY id_kwitansi");
	
	$tamilPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$pegawai'");
	$tpeg	=mysql_fetch_array($tamilPeg);
	
	$total_ln	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta='$id_ta' AND id_peg='$pegawai' AND jns_tuj='Luar Negeri'"); 
	$tot_ln		=mysql_fetch_assoc($total_ln);
	$jum_ln		=$tot_ln['jml'];
	$real_ln	=($jum_ln/$tah['pagu_ln'])*100;
	
	$total_dn	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta='$id_ta' AND id_peg='$pegawai' AND jns_tuj='Dalam Negeri'"); 
	$tot_dn		=mysql_fetch_assoc($total_dn);
	$jum_dn		=$tot_dn['jml'];
	$real_dn	=($jum_dn/$tah['pagu_dn'])*100;

	$total_dk	=mysql_query("SELECT SUM(jumlah) AS jml FROM tb_kwitansi WHERE ta='$id_ta' AND id_peg='$pegawai' AND jns_tuj='Dalam Kota'"); 
	$tot_dk		=mysql_fetch_assoc($total_dk);
	$jum_dk		=$tot_dk['jml'];
	$real_dk	=($jum_dk/$tah['pagu_dk'])*100;
?>

<?php
	$filename	="Report Anggaran "."$tah[tahun]"."-"."$tpeg[nama]";
	
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
	$sheet->setCellValue("A2", "Pegawai :");
	$sheet->setCellValue("B2", $tpeg['nama']);
	$sheet->setCellValue("A4", "Pagu Anggaran");
	$sheet->setCellValue("A5", "Luar Negeri");
	$sheet->setCellValue("A6", "Dalam Negeri");
	$sheet->setCellValue("A7", "Dalam Kota");
	$sheet->setCellValue("B4", "Penggunaan");
	$sheet->setCellValue("B5", $jum_ln);
	$sheet->setCellValue("B6", $jum_dn);
	$sheet->setCellValue("B7", $jum_dk);
	$sheet->setCellValue("A9", "No. Urut");
	$sheet->setCellValue("B9", "Tgl SPD");
	$sheet->setCellValue("C9", "Nomor SPD");
	$sheet->setCellValue("D9", "Jenis Tujuan");
	$sheet->setCellValue("E9", "Penggunaan");
	
	$expKwi	=mysql_query("SELECT * FROM tb_kwitansi WHERE ta='$id_ta' AND id_peg='$pegawai' ORDER BY id_kwitansi");
	$i	=10; //Dimulai dengan baris ke 
	$eno	=1;
	while($ekwi	=mysql_fetch_array($expKwi)){
	$expSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$ekwi[id_spd]'");
	$espd	=mysql_fetch_array($expSpd);
	$expTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$espd[tujuan]'");
	$etuj	=mysql_fetch_array($expTuj);
	
	   $sheet->setCellValue( "A" . $i, $eno);
	   $sheet->setCellValue( "B" . $i, $espd['tgl'] );
	   $sheet->setCellValue( "C" . $i, $espd['nomor'] );
	   $sheet->setCellValue( "D" . $i, $etuj['jenis'] );
	   $sheet->setCellValue( "E" . $i, $ekwi['jumlah'] );
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
<h1 class="page-header">Report<small> Penggunaan Anggaran <?php echo $tah['tahun']?> <i class="fa fa-angle-right"></i> Pegawai : <span class="text-primary"><?php echo $tpeg['nama']?></span></small></h1>
<!-- end page-header -->
<div class="row">
	<div class="col-md-9">
		<div class="profile-container">
			<div class="profile-section">	
					<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
						<thead>
							<tr>
								<th width="4%">No</th>
								<th>Tgl SPD</th>
								<th>Nomor SPD</th>
								<th>Tujuan</th>
								<th width="10%">Penggunaan</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no=0;
								while($data	=mysql_fetch_array($query)){
								$no++
							?>
							<tr>
								<td><?php echo $no?></td>
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
			<h5># Penggunaan Anggaran <?=$tah['tahun']?></h5>
			<br />
			<label class="control-label">Luar Negeri</label>
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-primary" style="width:<?php echo round ($real_ln,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_ln,2)?>%</div>
			</div>
			<label class="control-label">Dalam Negeri</label>
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-danger" style="width:<?php echo round ($real_dn,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_dn,2)?>%</div>
			</div>
			<label class="control-label">Dalam Kota</label>
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-warning" style="width:<?php echo round ($real_dk,2)?>%"> &nbsp;&nbsp;<?php echo round ($real_dk,2)?>%</div>
			</div>
		</div>
	</div>
</div>

<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>