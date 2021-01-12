<?php
	$filename	="Daftar Kwitansi";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Daftar Kwitansi');
	$sheet->setCellValue("A1", "DAFTAR KWITANSI");
	$sheet->setCellValue("A3", "No. Urut");
	$sheet->setCellValue("B3", "ID");
	$sheet->setCellValue("C3", "NOMOR SPD");
	$sheet->setCellValue("D3", "TANGGAL");
	$sheet->setCellValue("E3", "PEGAWAI - NIP/NRP");
	$sheet->setCellValue("F3", "TUJUAN");
	$sheet->setCellValue("G3", "JENIS TUJUAN");
	$sheet->setCellValue("H3", "TGL BERANGKAT");
	$sheet->setCellValue("I3", "TGL KEMBALI");
	$sheet->setCellValue("J3", "JUMLAH (RP)");
	$sheet->setCellValue("K3", "TA");
	
	$expKwi	=mysql_query("SELECT * FROM tb_kwitansi ORDER BY id_kwitansi");
	$i	=4; //Dimulai dengan baris ke dua
	$no	=1;
	while($ekwi	=mysql_fetch_array($expKwi)){
	$expSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$ekwi[id_spd]'");
	$espd	=mysql_fetch_array($expSpd);
	
	$expPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ekwi[id_peg]'");
	$epeg	=mysql_fetch_array($expPeg);
	$expTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$espd[tujuan]'");
	$etuj	=mysql_fetch_array($expTuj);
	$expTah	=mysql_query("SELECT * FROM tb_ta WHERE id_ta='$espd[ta]'");
	$etah	=mysql_fetch_array($expTah);
	
	   $sheet->setCellValue( "A" . $i, $no);
	   $sheet->setCellValue( "B" . $i, $ekwi['id_kwitansi'] );
	   $sheet->setCellValue( "C" . $i, $espd['nomor'] );
	   $sheet->setCellValue( "D" . $i, $espd['tgl'] );
	   $sheet->setCellValue( "E" . $i, $epeg['nama'] .' / '.$epeg['nip']);
	   $sheet->setCellValue( "F" . $i, $etuj['tujuan'] );
	   $sheet->setCellValue( "G" . $i, $etuj['jenis'] );
	   $sheet->setCellValue( "H" . $i, $espd['tgl_berangkat'] );
	   $sheet->setCellValue( "I" . $i, $espd['tgl_kembali'] );
	   $sheet->setCellValue( "J" . $i, $ekwi['jumlah'] );
	   $sheet->setCellValue( "K" . $i, $etah['tahun'] );
	   $no++;
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
<h1 class="page-header">Daftar<small> Kwitansi&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$id_satker = $_SESSION['id_satker'];
	$query	=mysql_query("SELECT * FROM tb_kwitansi where id_satker = $id_satker ORDER BY id_kwitansi DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Daftar Kwitansi SPD"</h4>
			</div>
            <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Nomor SPD</th>
							<th>Tgl SPD</th>
							<th>Pegawai</th>
							<th>Jumlah (RP)</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($kwi	=mysql_fetch_array($query)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php
									$selSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$kwi[id_spd]'");
									$spd	=mysql_fetch_array($selSpd);
									echo $spd['nomor'];
									list($y,$m,$d)	=explode ("-",$spd['tgl']);
								?>
							</td>
							<td><?php echo $d?>-<?php echo $m?>-<?php echo $y?></td>
							<td><?php
									$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$kwi[id_peg]'");
									$peg	=mysql_fetch_array($selPeg);
									echo $peg['nama'];
								?>
							</td>
							<td align="right"><?php echo number_format($kwi['jumlah'],0,",",".");?></td>
							<td class="text-center">
								<a type="button" class="btn btn-primary btn-icon btn-sm" href="../../pages/superadmin/kwitansi/cetak-kwitansi.php?id_kwitansi=<?=$kwi['id_kwitansi']?>" target="_blank" title="cetak"><i class="fa fa-print fa-lg"></i></a>
							</td>
						</tr>
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