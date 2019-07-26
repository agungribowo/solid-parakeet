<?php
	$filename	="Daftar Tahun Anggaran";
	
	include "../../config/koneksi.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel.php";
	include "../../assets/plugins/PHPExcel-1.8.1/Classes/PHPExcel/Writer/Excel2007.php";
	 
	$excel	=new PHPExcel;
	 
	$excel->getProperties()->setCreator("Raja Putra Media");
	$excel->getProperties()->setLastModifiedBy("Raja Putra Media");
	$excel->getProperties()->setTitle("Raja Putra Media Report");
	$excel->removeSheetByIndex(0);
	 
	$sheet =$excel->createSheet();
	$sheet->setTitle('Daftar Tahun Anggaran');
	$sheet->setCellValue("A1", "Daftar Tahun Anggaran");
	$sheet->setCellValue("A3", "No. Urut");
	$sheet->setCellValue("B3", "Tahun Anggaran");
	$sheet->setCellValue("C3", "Pagu Luar Negeri");
	$sheet->setCellValue("D3", "Pagu Dalam Negeri");
	$sheet->setCellValue("F3", "Pagu Dalam Kota");
	
	$expTa	=mysql_query("SELECT * FROM tb_ta ORDER BY id_ta");
	$i	=4; //Dimulai dengan baris ke
	$eno	=1;
	while($eta	=mysql_fetch_array($expTa)){
	   $sheet->setCellValue( "A" . $i, $eno);
	   $sheet->setCellValue( "B" . $i, $eta['tahun'] );
	   $sheet->setCellValue( "C" . $i, $eta['pagu_ln'] );
	   $sheet->setCellValue( "D" . $i, $eta['pagu_dn'] );
	   $sheet->setCellValue( "F" . $i, $eta['pagu_dk'] );
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
	<li><a class="btn btn-sm btn-primary m-b-10" data-toggle="modal" data-target="#tahun"><i class="fa fa-plus-circle"></i> &nbsp;Add Tahun</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Master <small>Tahun Anggaran&nbsp;</small></h1>
<!-- end page-header -->
<?php
	$query	=mysql_query("SELECT * FROM tb_ta ORDER BY id_ta");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Data Tahun Anggaran"</h4>
			</div>
           <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="5%"><i class="fa fa-lock bigger-110 hidden-480"></i> ID</th>
							<th>Tahun</th>
							<th>Pagu Luar Negeri</th>
							<th>Pagu Dalam Negeri</th>
							<th>Pagu Dalam Kota</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($ta		=mysql_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $ta['id_ta']?></td>
							<td><?php echo $ta['tahun']?></td>
							<td align="right"><?=number_format($ta['pagu_ln'],0,",",".");?></td>
							<td align="right"><?=number_format($ta['pagu_dn'],0,",",".");?></td>
							<td align="right"><?=number_format($ta['pagu_dk'],0,",",".");?></td>
							<td class="text-center">
								<a type="button" class="btn btn-info btn-icon btn-sm" data-toggle="modal" data-target="#Edit<?php echo $ta['id_ta']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Edit<?php echo $ta['id_ta']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Edit Data Tahun Anggaran ID_<?php echo $ta['id_ta']?></h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=edit-ta&id_ta=<?php echo $ta['id_ta']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-4 control-label">Tahun</label>
													<div class="col-md-6">
														<input type="text" name="tahun" maxlength="4" value="<?=$ta['tahun']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-4 control-label">Pagu Luar Negeri</label>
													<div class="col-md-6">
														<input type="text" name="pagu_ln" maxlength="11" value="<?=$ta['pagu_ln']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-4 control-label">Pagu Dalam Negeri</label>
													<div class="col-md-6">
														<input type="text" name="pagu_dn" maxlength="11" value="<?=$ta['pagu_dn']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-4 control-label">Pagu Dalam Kota</label>
													<div class="col-md-6">
														<input type="text" name="pagu_dk" maxlength="11" value="<?=$ta['pagu_dk']?>" class="form-control" />
													</div>
												</div>
												<div class="form-group col-sm-12">
													<label class="col-md-4 control-label"></label>
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
<div id="tahun" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data Tahun Anggaran</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-ta" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-4 control-label">Tahun</label>
							<div class="col-md-6">
								<input type="text" name="tahun" maxlength="4" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Pagu Luar Negeri</label>
							<div class="col-md-6">
								<input type="text" name="pagu_ln" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Pagu Dalam Negeri</label>
							<div class="col-md-6">
								<input type="text" name="pagu_dn" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Pagu Dalam Kota</label>
							<div class="col-md-6">
								<input type="text" name="pagu_dk" maxlength="11" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label"></label>
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