<?php
	$filename	="Daftar Pegawai";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Daftar Pegawai');
	$sheet->setCellValue("A1", "DAFTAR PEGAWAI");
	$sheet->setCellValue("A3", "No. Urut");
	$sheet->setCellValue("B3", "ID");
	$sheet->setCellValue("C3", "NIP / NRP");
	$sheet->setCellValue("D3", "Nama");
	$sheet->setCellValue("E3", "Pangkat");
	$sheet->setCellValue("F3", "Golongan");
	$sheet->setCellValue("G3", "Jabatan");
	$sheet->setCellValue("H3", "Satuan Kerja");
	
	$expPeg	=mysql_query("SELECT * FROM tb_pegawai ORDER BY id_peg");
	$i	=4; //Dimulai dengan baris ke dua
	$no	=1;
	while($epeg	=mysql_fetch_array($expPeg)){
	$expGol	=mysql_query("SELECT * FROM tb_gol WHERE id_gol='$epeg[gol]'");
	$egol	=mysql_fetch_array($expGol);
	$expSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$epeg[satker]'");
	$esat	=mysql_fetch_array($expSat);
	
	   $sheet->setCellValue( "A" . $i, $no);
	   $sheet->setCellValue( "B" . $i, $epeg['id_peg'] );
	   $sheet->setCellValue( "C" . $i, $epeg['nip'] );
	   $sheet->setCellValue( "D" . $i, $epeg['nama'] );
	   $sheet->setCellValue( "E" . $i, $epeg['pangkat'] );
	   $sheet->setCellValue( "F" . $i, $egol['gol'] );
	   $sheet->setCellValue( "G" . $i, $epeg['jab'] );
	   $sheet->setCellValue( "H" . $i, $esat['satker'] );
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
	<li><a class="btn btn-sm btn-primary m-b-10" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-circle"></i> &nbsp;Add Pegawai</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data <small>Pegawai&nbsp;</small></h1>
<!-- end page-header -->
<?php
	$tampilPeg	=mysql_query("SELECT * FROM tb_pegawai ORDER BY id_peg DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($tampilPeg);?></span> rows for "Data Pegawai"</h4>
			</div>
            <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="4%">No</th>
							<th>NIP / NRP</th>
							<th>Nama</th>
							<th>Pangkat</th>
							<th>Gol</th>
							<th>Unit Kerja</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							while($peg	=mysql_fetch_array($tampilPeg)){
							$no++
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><a href="index.php?page=detail-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="detail"><?php echo $peg['nip'];?></a></td>
							<td><?php echo $peg['nama']?></td>
							<td><?php echo $peg['pangkat']?></td>
							<td><?php
								$selGol	=mysql_query("SELECT * FROM tb_gol WHERE id_gol='$peg[gol]'");
								$gol	=mysql_fetch_array($selGol);
								echo $gol['gol'];
								?>
							</td>
							<td><?php
								$selSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$peg[satker]'");
								$sat	=mysql_fetch_array($selSat);
								echo $sat['satker']
								?>
							</td>
							<td class="text-center">
								<a type="button" class="btn btn-success btn-icon btn-sm" href="index.php?page=detail-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="detail"><i class="fa fa-folder-open-o fa-lg"></i></a>
								<a type="button" class="btn btn-info btn-icon btn-sm" href="index.php?page=form-edit-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del<?php echo $peg['id_peg']?>" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>								
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Del<?php echo $peg['id_peg']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u><?php echo $peg['nama']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-data-pegawai&id_peg=<?=$peg['id_peg']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
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

<!-- modal master-->
<div id="addpeg" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data Pegawai</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-data-pegawai" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">NIP / NRP</label>
							<div class="col-md-2">
								<select name="nip_val" class="default-select2 form-control" style="width:100%">
									<option value="NIP">NIP</option>
									<option value="NRP">NRP</option>
								</select>
							</div>
							<div class="col-md-6">
								<input type="text" name="nip" maxlength="64" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Nama</label>
							<div class="col-md-8">
								<input type="text" name="nama" maxlength="255" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Pangkat</label>
							<div class="col-md-8">
								<input type="text" name="pangkat" maxlength="64" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Golongan</label>
							<div class="col-md-8">
								<?php
									$golongan = mysql_query("SELECT * FROM tb_gol ORDER BY kode_gol ASC");        
									echo '<select name="id_gol" class="default-select2 form-control" style="width:100%">';    
									echo '<option value="">...</option>';    
										while ($rowgol = mysql_fetch_array($golongan)) {    
										echo '<option value="'.$rowgol['id_gol'].'">'.$rowgol['gol'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Jabatan</label>
							<div class="col-md-8">
								<input type="text" name="jab" maxlength="64" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Satuan Kerja</label>
							<div class="col-md-8">
								<?php
									$satker = mysql_query("SELECT * FROM tb_satker");        
									echo '<select name="id_satker" class="default-select2 form-control" style="width:100%">';    
									echo '<option value="">...</option>';    
										while ($rowsat = mysql_fetch_array($satker)) {    
										echo '<option value="'.$rowsat['id_satker'].'">'.$rowsat['satker'].'</option>';    
										}    
									echo '</select>';
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<button type="submit" name="save" value="save" class="btn btn-primary"><i class="fa fa-floppy-o"></i> &nbsp;Save</button>&nbsp;
								<a type="button" class="btn btn-default active" class="close" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>