<?php
	if (isset($_GET['id_riil'])) {
	$id_riil = $_GET['id_riil'];
	
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_riil WHERE id_riil='$id_riil'");
	$data    =mysql_fetch_array($query);
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	// $selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
	// $tuj	=mysql_fetch_array($selTuj);
	
	// $selRin	=mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$data[id_rincian]'");
	// $rin	=mysql_fetch_array($selRin);
	// $inap	=$rin['jml_inap']*$rin['nilai_inap'];
	// $taxi_berangkat	=$rin['jml_taxi_berangkat']*$rin['nilai_taxi_berangkat'];
	// $taxi_kembali	=$rin['jml_taxi_kembali']*$rin['nilai_taxi_kembali'];
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
<h1 class="page-header">Data <small>Pengeluaran Riil <i class="fa fa-angle-right"></i> No SPD : <span class="text-primary"><?=$spd['nomor']?></span>&nbsp; Pegawai : <span class="text-primary"><?=$peg['nama']?></span></small></h1>
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
				<h4 class="panel-title">Form edit data pengeluaran riil SPD</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=edit-data-riil&id_riil=<?=$id_riil?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-2">
							<label>Jumlah</label>
						</div>
						<div class="col-md-6">
							<label>Uraian</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Biaya 1</label>
						<div class="col-md-2">
							<input type="number" name="jml1" value="<?php echo $data['jml1']?>" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian1" class="form-control"><?=$data['uraian1']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Biaya 2</label>
						<div class="col-md-2">
							<input type="number" name="jml2" value="<?php echo $data['jml2']?>" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text"  name="uraian2" class="form-control"><?=$data['uraian2']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Biaya 3</label>
						<div class="col-md-2">
							<input type="number" name="jml3" value="<?php echo $data['jml3']?>" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian3" class="form-control"><?=$data['uraian3']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Biaya 4</label>
						<div class="col-md-2">
							<input type="number" name="jml4" value="<?php echo $data['jml4']?>" maxlength="11" class="form-control"/>
						</div>
						<div class="col-md-6">
							<textarea type="text" name="uraian4" maxlength="255" class="form-control"><?=$data['uraian4']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-5 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i> &nbsp;Edit</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-data-riil"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
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