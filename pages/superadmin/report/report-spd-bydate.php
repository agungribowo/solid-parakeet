<?php
	if ($_POST['report'] == "report") {
		$start	=$_POST['start'];
		$end	=$_POST['end'];
	}
	if (empty($_POST['start']) || empty($_POST['end'])){
		$_SESSION['pesan'] = "Oops! Tanggal tidak boleh kosong...";
		header("location:index.php?page=report-spd");
	}
	include "../../config/koneksi.php";
	$query	=mysql_query("SELECT A.id_nominatif, A.pegawai, A.id_satker, B.nomor, B.tgl, B.keperluan, B.asal, B.tujuan, B.tgl_berangkat, B.tgl_kembali, B.no_sprin FROM tb_nominatif A INNER JOIN tb_spd B ON B.id_spd=A.id_spd WHERE B.tgl BETWEEN '$start' AND '$end' ORDER BY A.pegawai,B.tgl DESC");
?>
<?php
	$filename	="Report SPD";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Report SPD');
	$sheet->setCellValue("A1", "Report SPD");
	$sheet->setCellValue("A2", "Dari :");
	$sheet->setCellValue("A3", "Sampai :");
	$sheet->setCellValue("B2", $start);
	$sheet->setCellValue("B3", $end);
	$sheet->setCellValue("A5", "No. Urut");
	$sheet->setCellValue("B5", "NOMOR SPD");
	$sheet->setCellValue("C5", "TANGGAL");
	$sheet->setCellValue("D5", "PEGAWAI / NIP");
	$sheet->setCellValue("E5", "TUJUAN");
	$sheet->setCellValue("F5", "TGL BERANGKAT");
	$sheet->setCellValue("G5", "TGL KEMBALI");
	$sheet->setCellValue("H5", "JML HARI");
	$sheet->setCellValue("I5", "SATKER");
	$sheet->setCellValue("J5", "TA");
	$sheet->setCellValue("K5", "TRANSPORTASI");
	$sheet->setCellValue("L5", "KEPERLUAN");
	$sheet->setCellValue("M5", "KET");
	
	$expSpd	=mysql_query("SELECT A.id_nominatif, A.pegawai, A.id_satker, B.nomor, B.tgl, B.keperluan, B.asal, B.tujuan, B.tgl_berangkat, B.tgl_kembali, B.no_sprin FROM tb_nominatif A INNER JOIN tb_spd B ON B.id_spd=A.id_spd WHERE B.tgl BETWEEN '$start' AND '$end' ORDER BY A.pegawai,B.tgl DESC");
	$i	=6; //Dimulai dengan baris ke 
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
	
	$brkt	=new DateTime($espd['tgl_berangkat']);
	$kmbl	=new DateTime($espd['tgl_kembali']);
	$diff	=$kmbl->diff($brkt);
	$lama	=($diff->d)+1;
	
	   $sheet->setCellValue( "A" . $i, $no);
	   $sheet->setCellValue( "B" . $i, $espd['nomor'] );
	   $sheet->setCellValue( "C" . $i, $espd['tgl'] );
	   $sheet->setCellValue( "D" . $i, $epeg['nama'] .' / '.$epeg['nip']);
	   $sheet->setCellValue( "E" . $i, $etuj['tujuan'] );
	   $sheet->setCellValue( "F" . $i, $espd['tgl_berangkat'] );
	   $sheet->setCellValue( "G" . $i, $espd['tgl_kembali'] );
	   $sheet->setCellValue( "H" . $i, $lama );
	   $sheet->setCellValue( "I" . $i, $esat['satker'] );
	   $sheet->setCellValue( "J" . $i, $etah['tahun'] );
	   $sheet->setCellValue( "K" . $i, $etra['transport'] );
	   $sheet->setCellValue( "L" . $i, $espd['keperluan'] );
	   $sheet->setCellValue( "M" . $i, $espd['ket'] );
	   $no++;
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
<h1 class="page-header">Report<small> SPD <i class="fa fa-angle-right"></i> Periode: <span class="text-primary"><?=$start?></span> s/d <span class="text-primary"><?=$end?></span></small></h1>
<!-- end page-header -->
<div class="profile-container">
	<!-- begin profile-section -->
	<div class="profile-section">
		<div class="panel-body">
			<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Pegawai</th>
						<th>Nomor SPD/No.Sprin</th>
						<th>Tgl SPD</th>
						<th>Kepeluran</th>
						
						<th>Tujuan</th>
						<th>Tgl Berangkat</th>
						<th>JML Hari</th>
						<th width="4%">Unit</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						while($spd	=mysql_fetch_array($query)){
						list($y1,$m1,$d1)	=explode ("-",$spd['tgl']);
						list($y2,$m2,$d2)	=explode ("-",$spd['tgl_berangkat']);
						$no++
					?>
					<tr>
						<td><?php echo $no?></td>
						<td><?php
							$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$spd[pegawai]'");
							$peg	=mysql_fetch_array($selPeg);
							echo $peg['nama'].' <br> '.$peg['nip_val'].' '.$peg['nip'];
							?>
						</td>
						<td><?php echo $spd['nomor'].'<br>'.$spd['no_sprin'];?></td>
						<td><?php echo $d1?>-<?php echo $m1?>-<?php echo $y1?></td>
						<td><?php echo $spd['keperluan'];?></td>
						<td><?php
							$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
							$tuj	=mysql_fetch_array($selTuj);
							echo $tuj['tujuan'];
							?>
						</td>
						<td><?php echo $d2?>-<?php echo $m2?>-<?php echo $y2?></td>
						<td><?php
							$brkt	=new DateTime($spd['tgl_berangkat']);
							$kmbl	=new DateTime($spd['tgl_kembali']);
							$diff	=$kmbl->diff($brkt);
							$lama	=($diff->d)+1;
							echo $lama;
							?>
						</td>
						<td><?php
							$selSat	=mysql_query("SELECT satker FROM tb_satker WHERE id_satker='$peg[satker]'");
							$tuj	=mysql_fetch_array($selSat);
							echo $tuj['satker'];
							?>
						</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- end profile-section -->
</div>

<script> // 500 = 0,5 s
	Date.prototype.addDays = function(days) {
		var date = new Date(this.valueOf());
		date.setDate(date.getDate() + days);
		return date;
	}

	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
	$(document).ready(function(){
	$('#datatable').DataTable({
		"fnDrawCallback": function() {
		$table = $(this);
		// for each row in the table body...

		
		let rows = $table.find("tbody>tr");
		var no = 1;
		rows.each(function(idx, value) {
		var $tr = $(value);

		if (idx>0) 
		if ($tr.context.cells[1].innerText == $(rows[idx-1]).context.cells[1].innerText) {
	  	    $($tr.context.cells[1]).css('color', 'rgba(0, 0, 0, 0)');
			$($tr.context.cells[0]).text('');

			let st = $tr.context.cells[6].innerText;
			let st2 = $(rows[idx-1]).context.cells[6].innerText;
			let hr = parseInt($tr.context.cells[7].innerText);
			let hr2 = $(rows[idx-1]).context.cells[7].innerText;

			let pattern = /(\d{2})\-(\d{2})\-(\d{4})/;
			let dt = new Date(st.replace(pattern,'$3-$2-$1'));
			let dt2 = new Date(st2.replace(pattern,'$3-$2-$1'));

			let limit = dt.addDays(hr);
			let limit2 = dt2.addDays(hr2);
			
			if (dt<=limit2 && dt>=dt2) {
				$($tr.context.cells[6]).css('background', 'red');
				$($tr.context.cells[7]).css('background', 'red');
			}
				
		} else {
			no++;
			$($tr.context.cells[0]).text(no);
		}
	
  });

 // end if the table has the proper class
} // end fnDrawCallback()
	});
});

</script>