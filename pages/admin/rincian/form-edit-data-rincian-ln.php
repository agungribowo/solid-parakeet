<?php
	if (isset($_GET['id_rincian'])) {
	$id_rincian = $_GET['id_rincian'];
	
	include "../../config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$id_rincian'");
	$data    =mysql_fetch_array($query);
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
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
<h1 class="page-header">Data <small>Rincian <i class="fa fa-angle-right"></i> No SPD : <span class="text-primary"><?=$spd['nomor']?></span>&nbsp; Pegawai : <span class="text-primary"><?=$peg['nama']?></span></small></h1>
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
				<h4 class="panel-title">Form edit data rincian biaya SPD</h4>
			</div>
			<div class="panel-body">
				<form action="index.php?page=edit-data-rincian-ln&id_rincian=<?=$id_rincian?>" class="form-horizontal" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-2">
							<label>Jumlah Satuan</label>
						</div>
						<div class="col-md-3">
							<label>Nilai Satuan</label>
						</div>
						<div class="col-md-3">
							<label>Keterangan</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Harian 100% di <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_harian" maxlength="1" value="<?=$data['jml_harian']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_harian" maxlength="11" value="<?=$data['nilai_harian']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_harian" maxlength="255" value="<?=$data['ket_harian']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Harian 40% di <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_harian1" maxlength="1" value="<?=$data['jml_harian1']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_harian1" maxlength="11" value="<?=$data['nilai_harian1']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_harian1" maxlength="255" value="<?=$data['ket_harian1']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Harian 30% di <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_harian2" maxlength="1" value="<?=$data['jml_harian2']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_harian2" maxlength="11" value="<?=$data['nilai_harian2']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_harian2" maxlength="255" value="<?=$data['ket_harian2']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Transportasi PP <?=$spd['asal']?> - <?=$tuj['tujuan']?></label>
						<div class="col-md-2">
							<input type="number" name="jml_berangkat" maxlength="1" value="<?=$data['jml_berangkat']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_berangkat" maxlength="11" value="<?=$data['nilai_berangkat']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_berangkat" maxlength="255" value="<?=$data['ket_berangkat']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Reprentasi</label>
						<div class="col-md-2">
							<input type="number" name="jml_reprentasi" maxlength="1" value="<?=$data['jml_reprentasi']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_reprentasi" maxlength="11" value="<?=$data['nilai_reprentasi']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_reprentasi" maxlength="255" value="<?=$data['ket_reprentasi']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Lain-lain</label>
						<div class="col-md-8">
							<input type="text" name="uraian_lain" maxlength="255" value="<?=$data['uraian_lain']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-2">
							<input type="number" name="jml_lain" maxlength="1" value="<?=$data['jml_lain']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="number" name="nilai_lain" maxlength="11" value="<?=$data['nilai_lain']?>" class="form-control" />
						</div>
						<div class="col-md-3">
							<input type="text" name="ket_lain" maxlength="255" value="<?=$data['ket_lain']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Uang Muka</label>
						<div class="col-md-8">
							<input type="number" name="uang_muka" maxlength="11" value="<?=$data['uang_muka']?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<button type="submit" name="edit" value="edit" class="btn btn-primary"><i class="fa fa-edit"></i> &nbsp;Edit</button>&nbsp;
							<a type="button" class="btn btn-default active" href="index.php?page=form-view-data-rincian"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
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