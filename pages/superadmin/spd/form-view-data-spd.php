<?php
	$filename	="Daftar SPD";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Daftar SPD');
	$sheet->setCellValue("A1", "DAFTAR SPD");
	$sheet->setCellValue("A3", "No. Urut");
	$sheet->setCellValue("B3", "ID");
	$sheet->setCellValue("C3", "NOMOR SPD");
	$sheet->setCellValue("D3", "TANGGAL");
	$sheet->setCellValue("E3", "PEGAWAI / NIP");
	$sheet->setCellValue("F3", "KEPERLUAN");
	$sheet->setCellValue("G3", "ASAL");
	$sheet->setCellValue("H3", "TUJUAN");
	$sheet->setCellValue("I3", "TGL BERANGKAT");
	$sheet->setCellValue("J3", "TGL KEMBALI");
	$sheet->setCellValue("K3", "SATKER");
	$sheet->setCellValue("L3", "TA");
	$sheet->setCellValue("M3", "MATA ANGGARAN");
	$sheet->setCellValue("N3", "JENIS PENGELUARAN");
	$sheet->setCellValue("O3", "PEJABAT PEMBERI PERINTAH");
	$sheet->setCellValue("P3", "TRANSPORTASI");
	$sheet->setCellValue("Q3", "TINGKAT BIAYA");
	$sheet->setCellValue("R3", "KET");
	
	$satker = $_SESSION['id_satker'];

	$expSpd	=mysql_query("SELECT * FROM tb_spd  ORDER BY id_spd ");
	$i	=4; //Dimulai dengan baris ke dua
	$no	=1;
	while($espd	=mysql_fetch_array($expSpd)){
	$expPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$espd[pegawai]'");
	$epeg	=mysql_fetch_array($expPeg);
	$expTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$espd[tujuan]'");
	$etuj	=mysql_fetch_array($expTuj);
	$expSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$espd[satker]'");
	$esat	=mysql_fetch_array($expSat);
	$expTah	=mysql_query("SELECT * FROM tb_ta WHERE id_ta='$espd[ta]'");
	$etah	=mysql_fetch_array($expTah);
	$expTra	=mysql_query("SELECT * FROM tb_transport WHERE id_transport='$espd[transport]'");
	$etra	=mysql_fetch_array($expTra);
	
	   $sheet->setCellValue( "A" . $i, $no);
	   $sheet->setCellValue( "B" . $i, $espd['id_spd'] );
	   $sheet->setCellValue( "C" . $i, $espd['nomor'] );
	   $sheet->setCellValue( "D" . $i, $espd['tgl'] );
	   $sheet->setCellValue( "E" . $i, $epeg['nama'] .' / '.$epeg['nip']);
	   $sheet->setCellValue( "F" . $i, $espd['keperluan'] );
	   $sheet->setCellValue( "G" . $i, $espd['asal'] );
	   $sheet->setCellValue( "H" . $i, $etuj['tujuan'] );
	   $sheet->setCellValue( "I" . $i, $espd['tgl_berangkat'] );
	   $sheet->setCellValue( "J" . $i, $espd['tgl_kembali'] );
	   $sheet->setCellValue( "K" . $i, $esat['satker'] );
	   $sheet->setCellValue( "L" . $i, $etah['tahun'] );
	   $sheet->setCellValue( "M" . $i, $espd['ma'] );
	   $sheet->setCellValue( "N" . $i, $espd['jenis_pengeluaran'] );
	   $sheet->setCellValue( "O" . $i, $espd['pejabat'] );
	   $sheet->setCellValue( "P" . $i, $etra['transport'] );
	   $sheet->setCellValue( "Q" . $i, $espd['tingkat_biaya'] );
	   $sheet->setCellValue( "R" . $i, $espd['ket'] );
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
	<li><a href="index.php?page=form-master-data-spd" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-plus-circle"></i> &nbsp;Add SPD</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data<small> SPD&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$satker = $_SESSION['id_satker'];
	$query	=mysql_query("SELECT * FROM tb_spd ORDER BY id_spd DESC ");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Data SPD"</h4>
			</div>
            <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>Nomor SPD</th>
							<th>Tgl SPD</th>
							<th>Pegawai</th>
							<th>Tujuan</th>
							<th>User</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($spd	=mysql_fetch_array($query)){
							list($y,$m,$d)	=explode ("-",$spd['tgl']);
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><a href="index.php?page=detail-data-spd&id_spd=<?=$spd['id_spd']?>" title="detail"><?php echo $spd['nomor'];?></a></td>
							<td><?php echo $d?>-<?php echo $m?>-<?php echo $y?></td>
							<td><?php
								$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$spd[pegawai]'");
								$peg	=mysql_fetch_array($selPeg);
								echo $peg['nama'];
								?>
							</td>
							<td><?php
								$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
								$tuj	=mysql_fetch_array($selTuj);
								echo $tuj['tujuan'];
								?>
							</td>
							<td><?php
								$pegawai	=mysql_query("SELECT nama_user FROM tb_user WHERE id_user='$spd[id_user]'");
								$peg	=mysql_fetch_array($pegawai);
								echo $peg['nama_user'];
								?>
							</td>
							<td class="text-center">
								<a type="button" class="btn btn-success btn-icon btn-sm" href="index.php?page=detail-data-spd&id_spd=<?=$spd['id_spd']?>" title="detail"><i class="fa fa-folder-open-o fa-lg"></i></a>
								<a type="button" class="btn btn-info btn-icon btn-sm" href="index.php?page=form-edit-data-spd&id_spd=<?=$spd['id_spd']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del<?php echo $spd['id_spd']?>" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>								
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Del<?php echo $spd['id_spd']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete SPD <u><?php echo $spd['nomor']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-data-spd&id_spd=<?=$spd['id_spd']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
									</div>
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