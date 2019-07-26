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
	<li><a class="btn btn-sm btn-primary m-b-10" data-toggle="modal" data-target="#satker"><i class="fa fa-plus-circle"></i> &nbsp;Add Unit Kerja</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Master <small>Unit Kerja&nbsp;</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	$query	=mysql_query("SELECT A.id_satker, A.satker, A.no_ppk, A.id_kpa, A.id_ppk, A.id_bendahara, (SELECT B.nama FROM tb_pegawai B WHERE B.id_peg=A.id_kpa) AS `kpa`, (SELECT C.nama FROM tb_pegawai C WHERE C.id_peg=A.id_ppk) AS `ppk`, (SELECT D.nama FROM tb_pegawai D WHERE D.id_peg=A.id_bendahara) AS `bendahara` FROM tb_satker A ORDER BY id_satker DESC");
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
				<h4 class="panel-title">Results <span class="text-info"><?php echo mysql_num_rows($query);?></span> rows for "Data Unit Kerja"</h4>
			</div>
           <div class="panel-body">
				<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
							<th width="5%"><i class="fa fa-lock bigger-110 hidden-480"></i> ID</th>
							<th>Unit Kerja</th>
							<th>Nama KPA</th>
							<th>Nama PPK</th>
							<th>Nama Bendahara</th>
							<th>Kodering</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($sat=mysql_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $sat['id_satker']?></td>
							<td><?php echo $sat['satker']?></td>
							<td><?php echo $sat['kpa']?></td>
							<td><?php echo $sat['ppk']?></td>
							<td><?php echo $sat['bendahara']?></td>
							<td><?php echo $sat['no_ppk']?></td>
							<td class="text-center">
								<a type="button" class="btn btn-info btn-icon btn-sm" data-toggle="modal" data-target="#Edit<?php echo $sat['id_satker']?>" title="edit"><i class="fa fa-pencil fa-lg"></i></a>
								<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Del<?php echo $sat['id_satker']?>" title="delete"><i class="fa fa-trash-o fa-lg"></i></a>
							</td>
						</tr>
						<!-- #modal-dialog -->
						<div id="Del<?php echo $sat['id_satker']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete Unit Kerja <u><?php echo $sat['satker']?></u> from Database?</h5>
									</div>
									<div class="modal-body" align="center">
										<a href="index.php?page=delete-satker&id_satker=<?=$sat['id_satker']?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
									</div>
									<div class="modal-footer">
										<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
									</div>
								</div>
							</div>
						</div>
						<!-- #modal-dialog -->
						<div id="Edit<?php echo $sat['id_satker']?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Edit Master Unit Kerja ID_<?php echo $sat['id_satker']?></h4>
									</div>
									<div class="col-sm-12">
										<div class="modal-body">
											<form action="index.php?page=edit-satker&id_satker=<?php echo $sat['id_satker']?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Unit Kerja</label>
													<div class="col-md-9">
														<input type="text" name="satker" maxlength="255" value="<?=$sat['satker']?>"class="form-control" />
													</div>
												</div>

												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label">Kodering</label>
													<div class="col-md-9">
														<input type="text" name="no_ppk" maxlength="255" value="<?=$sat['no_ppk']?>"class="form-control" />
													</div>
												</div>

												<div class="form-group col-sm-12">
												<label class="col-md-3 control-label">Nama KPA</label>
												<div class="col-md-9">
													<?php
														$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
														echo '<select name="id_kpa" class="default-select2 form-control">';    
											
															while ($peg = mysql_fetch_array($pegawai)) {    

																if ($peg['id_peg'] == $sat['id_kpa'])
																echo '<option selected value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';  
																else 	echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
															   
															}    
														echo '</select>';
													?>
												</div>
												</div>
											
												<div class="form-group col-sm-12">
												<label class="col-md-3 control-label">Nama PPK</label>
												<div class="col-md-9">
													<?php
														$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
														echo '<select name="id_ppk" class="default-select2 form-control">';    
											
															while ($peg = mysql_fetch_array($pegawai)) {    

																if ($peg['id_peg'] == $sat['id_ppk'])
																echo '<option selected value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';  
																else 	echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
															   
															}    
														echo '</select>';
													?>
												</div>
												</div>


												<div class="form-group col-sm-12">
												<label class="col-md-3 control-label">Nama Bendahara</label>
												<div class="col-md-9">
													<?php
														$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
														echo '<select name="id_bendahara" class="default-select2 form-control">';    
											
															while ($peg = mysql_fetch_array($pegawai)) {    

																if ($peg['id_peg'] == $sat['id_bendahara'])
																echo '<option selected value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';  
																else 	echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
															   
															}    
														echo '</select>';
													?>
												</div>
												</div>

												<div class="form-group col-sm-12">
													<label class="col-md-3 control-label"></label>
													<div class="col-md-9">
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
<div id="satker" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data Unit Kerja</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="index.php?page=master-satker" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Unit Kerja</label>
							<div class="col-md-9">
								<input type="text" name="satker" maxlength="255" class="form-control" />
							</div>
						</div>

						<div class="form-group col-sm-12">
						<label class="col-md-3 control-label">Nama KPA</label>
						<div class="col-md-9">
							<?php
								$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
								echo '<select name="id_kpa" class="default-select2 form-control">';    
					
									while ($peg = mysql_fetch_array($pegawai)) {    
										echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
				
									}    
								echo '</select>';
							?>
						</div>
						</div>
					
						<div class="form-group col-sm-12">
						<label class="col-md-3 control-label">Nama PPK</label>
						<div class="col-md-9">
							<?php
								$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
								echo '<select name="id_ppk" class="default-select2 form-control">';    
					
									while ($peg = mysql_fetch_array($pegawai)) {    
										echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
			   
										
									}    
								echo '</select>';
							?>
						</div>
						</div>


						<div class="form-group col-sm-12">
						<label class="col-md-3 control-label">Nama Bendahara</label>
						<div class="col-md-9">
							<?php
								$pegawai = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama ASC");        
								echo '<select name="id_bendahara" class="default-select2 form-control">';    
					
									while ($peg = mysql_fetch_array($pegawai)) {    
										echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' - '.$peg['nip'].'</option>';   
				
									}    
								echo '</select>';
							?>
						</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-9">
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

<style>
	.select2 {
		width:100% !important;
	}
	</style>