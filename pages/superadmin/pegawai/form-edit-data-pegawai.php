<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$data    =mysql_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected!");	
	}
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
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Data <small>Pegawai <i class="fa fa-angle-right"></i> Edit <i class="fa fa-key"></i> NIP/NRP_<?=$data['nip']?></small></h1>
<!-- begin row -->
<div class="row">
	<!-- begin col-12 -->
    <div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Form edit data pegawai</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=edit-data-pegawai&id_peg=<?=$id_peg?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label">NIP/NRP</label>
						<div class="col-md-1">
							<select name="nip_val" class="default-select2 form-control" style="width:100%">
								<option value="NIP" <?php echo ($data['nip_val']=='NIP')?"selected":""; ?>>NIP    
								<option value="NRP" <?php echo ($data['nip_val']=='NRP')?"selected":""; ?>>NRP
							</select>
						</div>
						<div class="col-md-5">
							<input type="text" name="nip" maxlength="64" value="<?=$data['nip']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama</label>
						<div class="col-md-6">
							<input type="text" name="nama" maxlength="255" value="<?=$data['nama']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pangkat</label>
						<div class="col-md-6">
							<input type="text" name="pangkat" maxlength="64" value="<?=$data['pangkat']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Golongan</label>
						<div class="col-md-6">
							<?php
								$golongan = mysql_query("SELECT * FROM tb_gol");        
								echo '<select name="id_gol" class="default-select2 form-control">';    
								// echo '<option value="'.$data['gol'].'">...</option>';    
									while ($rowgol = mysql_fetch_array($golongan)) {   
										if ($rowgol['id_gol'] == $data['gol']) 
											echo '<option value="'.$rowgol['id_gol'].'">'.$rowgol['gol'].'</option>';    
										else echo '<option selected value="'.$rowgol['id_gol'].'">'.$rowgol['gol'].'</option>'; 
									}    
								echo '</select>';
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Jabatan</label>
						<div class="col-md-6">
							<input type="text" name="jab" maxlength="64" value="<?=$data['jab']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Satuan Kerja</label>
						<div class="col-md-6">
							<?php
								$satker = mysql_query("SELECT * FROM tb_satker");        
								echo '<select name="id_satker" class="default-select2 form-control">';    
								// echo '<option value="'.$data['satker'].'">...</option>';    
									while ($rowsat = mysql_fetch_array($satker)) {    
										if ($rowgol['id_satker'] == $data['satker']) 
											echo '<option selected value="'.$rowsat['id_satker'].'">'.$rowsat['satker'].'</option>';  
										else 	echo '<option value="'.$rowsat['id_satker'].'">'.$rowsat['satker'].'</option>';  
									}    
								echo '</select>';
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i> &nbsp;Edit</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-data-pegawai"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end panel -->
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>