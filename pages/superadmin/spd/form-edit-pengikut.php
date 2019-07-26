<?php
	if (isset($_GET['id_spd'])) {
	$id_spd = $_GET['id_spd'];
	
	include "../../config/koneksi.php";
	$id_satker = $_SESSION['id_satker'];
	$query   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
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
<h1 class="page-header">Data<small> Pengikut <i class="fa fa-angle-right"></i> Nomor <?= $data['nomor']?></small></h1>
<!-- end page-header -->
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
				<h4 class="panel-title">Form edit data pengikut</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=edit-pengikut&id_spd=<?=$id_spd?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label">Pengikut</label>
						<div class="col-md-6">
							<?php
								$pengikut = mysql_query("SELECT * FROM tb_pegawai ORDER BY nama");        
								echo '<select name="pengikut[]" class="default-select2 form-control" multiple="multiple">';    
								// echo '<option value="">...</option>';    
							  	$arr = explode(",", $data['pengikut']);
									while ($peng = mysql_fetch_array($pengikut)) {    
										if (in_array($peng['id_peg'], $arr))
										echo '<option selected value="'.$peng['id_peg'].'">'.$peng['nama'].'</option>';  
										else 	echo '<option value="'.$peng['id_peg'].'">'.$peng['nama'].'</option>';   
									// echo '<option value="'.$peng['id_peg'].'">'.$peng['nama'].'</option>';    
									}    
								echo '</select>';
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i> &nbsp;Edit</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=detail-data-spd&id_spd=<?=$id_spd?>"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
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