<?php
	if (isset($_GET['id_ttdkwitansi'])) {
	$id_ttdkwitansi	= $_GET['id_ttdkwitansi'];
	
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_ttdkwitansi WHERE id_ttdkwitansi='$id_ttdkwitansi'");
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
<h1 class="page-header">Setup <small>Penandatangan Lembar Kwitansi &nbsp;</small></h1>
<!-- end page-header -->
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
				<h4 class="panel-title">Form Setup Penandatangan Lembar Kwitansi</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=setup-ttdkwitansi&id_ttdkwitansi=<?=$id_ttdkwitansi?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label">Teks Header Kiri</label>
						<div class="col-md-6">
							<textarea type="text" name="teks1" class="form-control"><?=$data['teks1']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pegawai</label>
						<div class="col-md-6">
							<?php
								$selpeg1 = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama");        
								echo '<select name="id_peg1" class="default-select2 form-control">';    
								echo '<option value="">...</option>';    
									while ($row1 = mysql_fetch_array($selpeg1)) {    
									// echo '<option value="'.$row1['id_peg'].'">'.$row1['nama'].' _ '.$row1['nip'].'</option>';    
									if ($row1['id_peg'] == $data['id_peg1'])
									echo '<option selected value="'.$row1['id_peg'].'">'.$row1['nama'].' - '.$row1['nip_val'].'</option>';  
									else 	echo '<option value="'.$row1['id_peg'].'">'.$row1['nama'].' - '.$row1['nip_val'].'</option>';   
									}    
								echo '</select>';
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Teks Header Kanan</label>
						<div class="col-md-6">
							<textarea type="text" name="teks2" class="form-control"><?=$data['teks2']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pegawai</label>
						<div class="col-md-6">
							<?php
								$selpeg2 = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama");        
								echo '<select name="id_peg2" class="default-select2 form-control">';    
								echo '<option value="">...</option>';    
									while ($row2 = mysql_fetch_array($selpeg2)) {    
									// echo '<option value="'.$row2['id_peg'].'">'.$row2['nama'].' _ '.$row2['nip'].'</option>';  
									if ($row2['id_peg'] == $data['id_peg1'])
									echo '<option selected value="'.$row2['id_peg'].'">'.$row2['nama'].' - '.$row2['nip_val'].'</option>';  
									else 	echo '<option value="'.$row2['id_peg'].'">'.$row2['nama'].' - '.$row2['nip_val'].'</option>';     
									}    
								echo '</select>';
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="setup" value="setup" class="btn btn-primary"><i class="fa fa-gear"></i> &nbsp;Setup</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-ttdkwitansi"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
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