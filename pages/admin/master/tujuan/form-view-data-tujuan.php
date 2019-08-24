<?php
	$filename	="Daftar Kota Tujuan";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Daftar Kota Tujuan');
	$sheet->setCellValue("A1", "Daftar Kota Tujuan");
	$sheet->setCellValue("A3", "No. Urut");
	$sheet->setCellValue("B3", "Kota Tujuan");
	$sheet->setCellValue("C3", "Jenis");
	$sheet->setCellValue("D3", "Uang Harian");
	$sheet->setCellValue("E3", "Uang Saku Rapat");
	$sheet->setCellValue("F3", "Hotel");
	$sheet->setCellValue("G3", "Paket Meeting");
	$sheet->setCellValue("H3", "Taksi");
	$sheet->setCellValue("I3", "Pesawat/KA/Bus");
	$sheet->setCellValue("J3", "Lain-lain");

	$expTuj	=mysql_query("SELECT * FROM tb_tujuan ORDER BY id_tujuan");
	$i	=4; //Dimulai dengan baris ke
	$no	=1;
	while($etuj	=mysql_fetch_array($expTuj)){
	   $sheet->setCellValue( "A" . $i, $no);
	   $sheet->setCellValue( "B" . $i, $etuj['tujuan'] );
	   $sheet->setCellValue( "C" . $i, $etuj['jenis'] );
	   $sheet->setCellValue( "D" . $i, $etuj['harian'] );
	   $sheet->setCellValue( "E" . $i, $etuj['saku'] );
	   $sheet->setCellValue( "F" . $i, $etuj['inap'] );
	   $sheet->setCellValue( "G" . $i, $etuj['meeting'] );
	   $sheet->setCellValue( "H" . $i, $etuj['taksi'] );
	   $sheet->setCellValue( "I" . $i, $etuj['transport'] );
	   $sheet->setCellValue( "J" . $i, $etuj['lain'] );
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
<h1 class="page-header">Master <small>Standar Biaya&nbsp;</small></h1>
<!-- end page-header -->
<?php
	$query	=mysql_query("SELECT * FROM tb_tujuan ORDER BY jenis ASC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Standar Biaya"</h4>
			</div>
           <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="3%"><i class="fa fa-lock bigger-110 hidden-480"></i> ID</th>
							<th>Tujuan</th>
							<th>Jenis</th>
							<th>Uang Harian</th>
							<th>Uang Saku</th>
							<th>Hotel</th>
							<th>Meeting</th>
							<th>Taksi</th>
							<th>Pesawat/KA/Bus</th>
							<th>Lain-lain</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
							while($tuj		=mysql_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $tuj['id_tujuan']?></td>
							<td><?php echo $tuj['tujuan']?></td>
							<td><?php echo $tuj['jenis']?></td>
							<td align="right"><?=number_format($tuj['harian'],0,",",".");?></td>
							<td align="right"><?=number_format($tuj['saku'],0,",",".");?></td>
							<td align="right"><?=number_format($tuj['inap'],0,",",".");?></td>
							<td align="right"><?=number_format($tuj['meeting'],0,",",".");?></td>
							<td align="right"><?=number_format($tuj['taksi'],0,",",".");?></td>
							<td align="right"><?=number_format($tuj['transport'],0,",",".");?></td>
							<td align="right"><?=number_format($tuj['lain'],0,",",".");?></td>
							<!-- <td class="text-center">
								<a type="button" class="btn btn-info btn-icon btn-sm" data-toggle="modal" data-target="#Edit<?php echo $tuj['id_tujuan']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del<?php echo $tuj['id_tujuan']?>" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>
							</td> -->
						</tr>
						<!-- #modal-dialog -->
						<div id="Del<?php echo $tuj['id_tujuan']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete tujuan <u><?php echo $tuj['tujuan']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-tujuan&id_tujuan=<?=$tuj['id_tujuan']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
									</div>
								</div>
							</div>
						</div>
						<!-- #modal-dialog -->
						<div id="Edit<?php echo $tuj['id_tujuan']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Edit Data Tujuan ID_<?php echo $tuj['id_tujuan']?></h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=edit-tujuan&id_tujuan=<?php echo $tuj['id_tujuan']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Tujuan</label>
													<div class="col-md-6">
														<input type="text" name="tujuan" maxlength="64" value="<?=$tuj['tujuan']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Jenis Tujuan</label>
													<div class="col-md-6">
														<select name="jenis" class="default-select2 form-control" style="width:100%">
															<option value="Dalam Kota" <?php echo ($tuj['jenis']=='Dalam Kota')?"selected":""; ?>>Dalam Kota    
															<option value="Dalam Negeri" <?php echo ($tuj['jenis']=='Dalam Negeri')?"selected":""; ?>>Dalam Negeri    
															<option value="Luar Negeri" <?php echo ($tuj['jenis']=='Luar Negeri')?"selected":""; ?>>Luar Negeri    
														</select>
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Uang Harian</label>
													<div class="col-md-6">
														<input type="text" name="harian" maxlength="11" value="<?=$tuj['harian']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Uang Saku Rapat</label>
													<div class="col-md-6">
														<input type="text" name="saku" maxlength="11" value="<?=$tuj['saku']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Hotel</label>
													<div class="col-md-6">
														<input type="text" name="inap" maxlength="11" value="<?=$tuj['inap']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Paket Meeting</label>
													<div class="col-md-6">
														<input type="text" name="meeting" maxlength="11" value="<?=$tuj['meeting']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Taksi</label>
													<div class="col-md-6">
														<input type="text" name="taksi" maxlength="11" value="<?=$tuj['taksi']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Pesawat/KA/Bus</label>
													<div class="col-md-6">
														<input type="text" name="transport" maxlength="11" value="<?=$tuj['transport']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Lain-lain</label>
													<div class="col-md-6">
														<input type="text" name="lain" maxlength="11" value="<?=$tuj['lain']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label"></label>
													<div class="col-md-6">
														<button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i> &nbsp;Edit</button>&nbsp;
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
<div id="tujuan" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data Tujuan</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-tujuan" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Tujuan</label>
							<div class="col-md-6">
								<input type="text" name="tujuan" maxlength="64" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Jenis Tujuan</label>
							<div class="col-md-6">
								<select name="jenis" class="default-select2 form-control" style="width:100%">
									<option value="">...</option>    
									<option value="Dalam Kota">Dalam Kota</option>
									<option value="Dalam Negeri">Dalam Negeri</option>
									<option value="Luar Negeri">Luar Negeri</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Uang Harian</label>
							<div class="col-md-6">
								<input type="text" name="harian" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Uang Saku Rapat</label>
							<div class="col-md-6">
								<input type="text" name="saku" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Hotel</label>
							<div class="col-md-6">
								<input type="text" name="inap" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Paket Meeting</label>
							<div class="col-md-6">
								<input type="text" name="meeting" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Taksi</label>
							<div class="col-md-6">
								<input type="text" name="taksi" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Pesawat/KA/Bus</label>
							<div class="col-md-6">
								<input type="text" name="transport" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Lain-lain</label>
							<div class="col-md-6">
								<input type="text" name="lain" maxlength="11" class="form-control" />
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